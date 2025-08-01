document.addEventListener("DOMContentLoaded", async () => {
  const tablaBody = document.getElementById("tablaReservasActivasBody");

  try {
    const response = await fetch("http://localhost:3000/api/reservas/activas");
    const reservas = await response.json();

    if (!reservas.length) {
      const fila = document.createElement("tr");
      fila.innerHTML = `<td colspan="6">No hay reservas activas</td>`;
      tablaBody.appendChild(fila);
      return;
    }

    reservas.forEach((reserva) => {
      const fila = document.createElement("tr");
      fila.innerHTML = `
        <td>R-${reserva.id_reserva}</td>
        <td>${reserva.cliente}</td>
        <td>${reserva.espacio}</td>
        <td>${reserva.placa}</td>
        <td>₡${reserva.pago}</td>
      `;
      tablaBody.appendChild(fila);
    });
  } catch (error) {
    console.error("Error al cargar reservas activas:", error);
    const fila = document.createElement("tr");
    fila.innerHTML = `<td colspan="6">Error al obtener reservas activas</td>`;
    tablaBody.appendChild(fila);
  }
});
