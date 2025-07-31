document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const idReserva = params.get("id_reserva");
  document.getElementById("idReserva").value = idReserva;

  document.getElementById("btnPagar").addEventListener("click", async () => {
    const id_reserva = document.getElementById("idReserva").value;
    const id_metodo_pago = document.getElementById("metodoPago").value;
    const id_descuento = document.getElementById("descuento").value || null;

    try {
      const res = await fetch("http://localhost:3000/api/pagos", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id_reserva, id_metodo_pago, id_descuento }),
      });

      const data = await res.json();
      if (!data.ok) return alert("Error: " + data.mensaje);

      alert(`Pago exitoso. Total: ${data.total}, Factura #: ${data.id_factura}`);
      window.location.href = "reservas.html";
    } catch (err) {
      alert("Error al procesar el pago");
      console.error(err);
    }
  });
});

