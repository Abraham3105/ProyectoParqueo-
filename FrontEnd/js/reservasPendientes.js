// reservasPendientes.js

document.addEventListener("DOMContentLoaded", async () => {
  const tablaBody = document.getElementById("tablaReservasBody");

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
});

// Función global para abrir modal y pasar datos
function abrirModal(idReserva, monto) {
  document.getElementById("modalPago").style.display = "block";
  document.getElementById("idReserva").value = idReserva;
  document.getElementById("monto").value = monto;
}

// Cierra el modal
function cerrarModal() {
  document.getElementById("modalPago").style.display = "none";
}

// Envío del formulario
document.addEventListener("submit", async (e) => {
  if (e.target.closest("form")) {
    e.preventDefault();
    const idReserva = document.getElementById("idReserva").value;
    const metodo = document.getElementById("metodo").value;
    const monto = document.getElementById("monto").value;

    try {
      const res = await fetch("http://localhost:3000/api/pagos", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          id_reserva: idReserva,
          id_metodo_pago: metodo,
          id_descuento: null, // si luego agregás descuento lo cambiás aquí
        }),
      });

      const data = await res.json();
      if (!data.ok) return alert("Error: " + data.mensaje);

      alert(`Pago exitoso. Total: ${data.total}, Factura #: ${data.id_factura}`);
      location.reload();
    } catch (err) {
      console.error("Error al procesar el pago:", err);
      alert("Hubo un error al procesar el pago.");
    }
  }
});
