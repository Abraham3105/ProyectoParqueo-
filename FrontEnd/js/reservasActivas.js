document.addEventListener("DOMContentLoaded", async () => {
  const tablaBody = document.getElementById("tablaReservasActivasBody");

  const idUsuario = localStorage.getItem("id_usuario");

  if (!idUsuario || isNaN(idUsuario)) {
    console.error("ID de usuario no válido en localStorage:", idUsuario);
    const fila = document.createElement("tr");
    fila.innerHTML = `<td colspan="5">Usuario no válido o no autenticado</td>`;
    tablaBody.appendChild(fila);
    return;
  }

  try {
    const response = await fetch(`http://localhost:3000/api/reservas/activas/${idUsuario}`);

    if (!response.ok) {
      throw new Error("Error en la respuesta del servidor");
    }

    const reservas = await response.json();

    if (!reservas.length) {
      const fila = document.createElement("tr");
      fila.innerHTML = `<td colspan="5">No hay reservas activas</td>`;
      tablaBody.appendChild(fila);
      return;
    }

    reservas.forEach((reserva) => {
      const fila = document.createElement("tr");
      fila.innerHTML = `
        <td>R-${reserva.id_reserva}</td>
        <td>${reserva.nombre_usuario}</td>
        <td>${reserva.placa_vehiculo}</td>
        <td>₡${reserva.monto_total}</td>
      `;
      tablaBody.appendChild(fila);
    });
  } catch (error) {
    console.error("Error al cargar reservas activas:", error);
    const fila = document.createElement("tr");
    fila.innerHTML = `<td colspan="5">Error al obtener reservas activas</td>`;
    tablaBody.appendChild(fila);
  }
});

document.getElementById("logoutBtn")?.addEventListener("click", () => {
  localStorage.clear();      // Limpia todo lo del usuario
  sessionStorage.clear();
  window.location.href = "/html/login.html"; // Redirige al login
});