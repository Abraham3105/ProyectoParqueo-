document.addEventListener("DOMContentLoaded", async () => {
  const tablaBody = document.getElementById("tablaReservasBody");
  const modal = document.getElementById("modalPago");
  const formPago = document.getElementById("formPago");

  // Cargar reservas pendientes
  try {
    const response = await fetch("http://localhost:3000/api/reservas/pendientes");
    const reservas = await response.json();

    if (!reservas.length) {
      const fila = document.createElement("tr");
      fila.innerHTML = `<td colspan="5">No hay reservas pendientes</td>`;
      tablaBody.appendChild(fila);
      return;
    }

    reservas.forEach((reserva) => {
      const fila = document.createElement("tr");
      fila.innerHTML = `
        <td>R-${reserva.id_reserva}</td>
        <td>${reserva.nombre_usuario}</td>
        <td>${reserva.placa_vehiculo}</td>
        <td>
          <button class="btn-historial" onclick="abrirModal('${reserva.id_reserva}', ${reserva.monto_total})">
            Confirmar
          </button>
        </td>
      `;
      tablaBody.appendChild(fila);
    });
  } catch (error) {
    console.error("Error al cargar reservas pendientes:", error);
  }

  // Envío del formulario de pago
  formPago.addEventListener("submit", async (e) => {
    e.preventDefault();

    const idReserva = document.getElementById("idReserva").value;
    const metodo = document.getElementById("metodo").value;
    const monto = document.getElementById("monto").value;

    if (!metodo || !idReserva) {
      Swal.fire("Campos incompletos", "Seleccione método de pago", "warning");
      return;
    }

    try {
      const res = await fetch("http://localhost:3000/api/pagos", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          id_reserva: idReserva,
          id_metodo_pago: parseInt(metodo),
          id_descuento: null
        }),
      });

      const data = await res.json();

      if (res.ok) {
        Swal.fire("¡Pago exitoso!", `Factura #: ${data.id_factura}`, "success");
        cerrarModal();
        setTimeout(() => location.reload(), 1500);
      } else {
        Swal.fire("Error", data.error || "No se pudo realizar el pago", "error");
      }
    } catch (err) {
      console.error("Error al procesar el pago:", err);
      Swal.fire("Error del servidor", "No se pudo conectar al backend", "error");
    }
  });
});

// Mostrar modal con datos
function abrirModal(idReserva, monto) {
  document.getElementById("modalPago").style.display = "block";
  document.getElementById("idReserva").value = idReserva;
  document.getElementById("monto").value = monto;
}

// Ocultar modal
function cerrarModal() {
  document.getElementById("modalPago").style.display = "none";
}
