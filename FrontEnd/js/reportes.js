document.addEventListener("DOMContentLoaded", async () => {
  const idUsuario = localStorage.getItem("id_usuario");

  if (!idUsuario || isNaN(parseInt(idUsuario))) {
    console.error("ID de usuario no válido en localStorage:", idUsuario);
    document.getElementById("cantidadVehiculos").textContent = "N/A";
    document.getElementById("cantidadReservas").textContent = "N/A";
    return;
  }

  try {
    const resVehiculos = await fetch(`http://localhost:3000/api/reportes/cantidadVehiculos/${idUsuario}`);
    const dataVehiculos = await resVehiculos.json();
    document.getElementById("cantidadVehiculos").textContent = dataVehiculos.cantidad;

    const resReservas = await fetch(`http://localhost:3000/api/reportes/cantidadReservas/${idUsuario}`);
    const dataReservas = await resReservas.json();
    document.getElementById("cantidadReservas").textContent = dataReservas.cantidad;
  } catch (error) {
    console.error("Error al obtener resumen:", error);
    document.getElementById("cantidadVehiculos").textContent = "Error";
    document.getElementById("cantidadReservas").textContent = "Error";
  }
});
