document.getElementById("formReserva").addEventListener("submit", async (e) => {
  e.preventDefault();

  const idUsuario = document.getElementById("idUsuario").value;
  const idEspacio = document.getElementById("idEspacio").value;
  const montoTotal = document.getElementById("montoTotal").value;

  try {
    const response = await fetch("http://localhost:3000/api/reservas/crear", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ idUsuario, idEspacio, montoTotal })
    });

    const data = await response.json();

    if (response.ok) {
      Swal.fire({
        icon: "success",
        title: "¡Reserva guardada!",
        text: data.message,
        confirmButtonColor: "#3085d6"
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error al guardar",
        text: data.message,
        confirmButtonColor: "#d33"
      });
    }
  } catch (err) {
    Swal.fire({
      icon: "error",
      title: "Error del servidor",
      text: "No se pudo conectar al servidor.",
      confirmButtonColor: "#d33"
    });
  }
});
