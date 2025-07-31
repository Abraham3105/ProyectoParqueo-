function abrirModal(idReserva, monto) {
  document.getElementById("idReserva").value = idReserva;
  document.getElementById("monto").value = monto;
  document.getElementById("modalPago").style.display = "block";
}

function cerrarModal() {
  document.getElementById("modalPago").style.display = "none";
}

document.addEventListener("DOMContentLoaded", () => {
  const formulario = document.querySelector("#modalPago form");

  formulario.addEventListener("submit", async (e) => {
    e.preventDefault();

    const id_reserva = document.getElementById("idReserva").value;
    const id_metodo_pago = document.getElementById("metodo").value;

    if (!id_metodo_pago) {
      alert("Seleccione un método de pago.");
      return;
    }

    try {
      const res = await fetch("http://localhost:3000/api/pagos", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          id_reserva,
          id_metodo_pago,
          id_descuento: null // Si luego agregás select de descuento lo cambiamos
        }),
      });

      const data = await res.json();

      if (!data.ok) {
        alert("Error: " + data.mensaje);
      } else {
        alert(`Reserva pagada. Total: ₡${data.total}`);
        cerrarModal();
        location.reload(); // actualiza la tabla de reservas pendientes
      }
    } catch (error) {
      console.error("Error al pagar:", error);
      alert("Ocurrió un error al procesar el pago.");
    }
  });
});
