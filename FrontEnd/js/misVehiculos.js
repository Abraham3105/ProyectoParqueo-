document.addEventListener("DOMContentLoaded", async () => {
  const tabla = document.getElementById("tablaVehiculos");
  const idUsuario = localStorage.getItem("id_usuario");


  if (!idUsuario || isNaN(parseInt(idUsuario))) {
    console.warn("ID de usuario no válido o no existe:", idUsuario);
    tabla.innerHTML = `
      <tr>
        <td colspan="7" style="text-align:center;color:red;">
          Sesión inválida. Por favor inicie sesión.
        </td>
      </tr>`;
    setTimeout(() => {
      window.location.href = "login.html";
    }, 2500); // Redirige después de mostrar el mensaje
    return;
  }

  try {
    const response = await fetch(`http://localhost:3000/api/listarvehiculo/usuario/${idUsuario}`);
    const vehiculos = await response.json();

    tabla.innerHTML = "";

    if (!Array.isArray(vehiculos) || vehiculos.length === 0) {
      const fila = document.createElement("tr");
      fila.innerHTML = `<td colspan="7" style="text-align: center;">No hay vehículos registrados</td>`;
      tabla.appendChild(fila);
      return;
    }

    vehiculos.forEach((vehiculo, index) => {
      const fila = document.createElement("tr");
      fila.innerHTML = `
        <td>${index + 1}</td>
        <td>${vehiculo.placa}</td>
        <td>${vehiculo.modelo}</td>
        <td>${vehiculo.tipo}</td>
        <td><span class="badge badge-success">${vehiculo.estado}</span></td>`;
      tabla.appendChild(fila);
    });
  } catch (err) {
    console.error("Error al cargar vehículos:", err);
    tabla.innerHTML = `<tr><td colspan="7" style="text-align: center; color: red;">Error al obtener los vehículos</td></tr>`;
  }
});


// Crear reserva rápida
async function usarHoy(idVehiculo) {
  const idUsuario = localStorage.getItem("id_usuario");

  if (!idUsuario || isNaN(parseInt(idUsuario))) {
    alert("Sesión no válida. Inicie sesión nuevamente.");
    window.location.href = "login.html";
    return;
  }

  try {
    const res = await fetch("http://localhost:3000/api/reservas/crear", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        ID_Usuario: parseInt(idUsuario),
        ID_Espacio: parseInt(idVehiculo) // Asegúrate de usar el ID del espacio si aplica
      })
    });

    const data = await res.json();

    if (data.mensaje === "RESERVA_EXITOSA") {
      alert("Reserva creada exitosamente.");
      window.location.href = "reservasPendientes.html";
    } else {
      alert("No se pudo crear la reserva: " + data.mensaje);
    }
  } catch (err) {
    console.error("Error al crear reserva:", err);
    alert("Hubo un error al crear la reserva.");
  }
}
