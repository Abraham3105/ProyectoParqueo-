document.getElementById("vehiculoForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const idUsuario = 1; // Obtener esto de sesión o localStorage
  const idTipoVehiculo = 1; // Puedes obtener este valor de un select si deseas
  const idPlaca = 1; // Este también debe venir de una selección o búsqueda previa
  const idModelo = document.getElementById("modelo").value;

  const response = await fetch("http://localhost:3000/api/vehiculos/registrar", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ idTipoVehiculo, idModelo, idPlaca, idUsuario })
  });

  const data = await response.json();

  if (response.ok) {
    alert(data.message);
    window.location.href = "misVehiculos.html";
  } else {
    alert(data.message);
  }
});
