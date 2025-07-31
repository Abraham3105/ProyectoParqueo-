document.addEventListener("DOMContentLoaded", async () => {
  const tabla = document.getElementById("tablaVehiculos");
  const idUsuario = localStorage.getItem("id_usuario") || 1; 

  try {
    const response = await fetch(`http://localhost:3000/api/listarvehiculo/usuario/${idUsuario}`);
    const vehiculos = await response.json();

    tabla.innerHTML = "";

    if (vehiculos.length === 0) {
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
        <td><span class="badge badge-success">${vehiculo.estado}</span></td>
        <td>
          <button class="btn-warning">Editar</button>
          <button class="btn-danger">Eliminar</button>
        </td>`;
      tabla.appendChild(fila);
    });
  } catch (err) {
    console.error("Error al cargar vehículos:", err);
  }
});

//  Crear reserva rápida
async function usarHoy(idVehiculo) {
  const idUsuario = localStorage.getItem("id_usuario") || 1;

  try {
    const res = await fetch("http://localhost:3000/api/reservas/crear", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        ID_Usuario: parseInt(idUsuario),
        ID_Espacio: parseInt(idVehiculo) // OJO: si este no es el ID del espacio, corrígelo por el correcto
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
