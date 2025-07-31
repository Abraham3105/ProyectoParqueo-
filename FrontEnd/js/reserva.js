document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formReserva");
  const usuarioInput = document.getElementById("idUsuario");
  const espacioInput = document.getElementById("idEspacio");
  const vehiculoSelect = document.getElementById("vehiculo");

  // Función para cargar los vehículos del usuario
  const cargarVehiculos = async (idUsuario) => {
    try {
      const response = await fetch(`http://localhost:3000/api/listarvehiculo/usuario/${idUsuario}`);
      const data = await response.json();

      // Limpiar opciones anteriores
      vehiculoSelect.innerHTML = `<option value="">Seleccione un vehículo</option>`;

      if (data.length === 0) {
        const noData = document.createElement("option");
        noData.disabled = true;
        noData.textContent = "No tiene vehículos registrados";
        vehiculoSelect.appendChild(noData);
        return;
      }

      // Agregar nuevas opciones
      data.forEach((vehiculo) => {
        const option = document.createElement("option");
        option.value = vehiculo.idVehiculo;
        option.textContent = `${vehiculo.placa} - ${vehiculo.modelo} (${vehiculo.tipo})`;
        vehiculoSelect.appendChild(option);
      });

      console.log("Vehículos cargados:", data);
    } catch (error) {
      console.error("Error al cargar vehículos:", error);
      Swal.fire("Error", "No se pudieron cargar los vehículos del usuario.", "error");
    }
  };

  // Escuchar cambio en el ID de usuario
  usuarioInput.addEventListener("change", () => {
    const idUsuario = usuarioInput.value.trim();
    if (idUsuario) {
      cargarVehiculos(idUsuario);
    }
  });

  // Envío del formulario de reserva
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const ID_Usuario = usuarioInput.value.trim();
    const ID_Espacio = espacioInput.value.trim();
    const ID_Vehiculo = vehiculoSelect.value.trim();

    if (!ID_Usuario || !ID_Espacio || !ID_Vehiculo) {
      Swal.fire({
        icon: "warning",
        title: "Campos incompletos",
        text: "Por favor, complete todos los campos antes de enviar.",
        confirmButtonColor: "#d33"
      });
      return;
    }

    try {
      const response = await fetch("http://localhost:3000/api/reservas/crear", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ ID_Usuario, ID_Espacio, ID_Vehiculo })
      });

      const data = await response.json();
      console.log("Respuesta del backend:", data);

      if (response.ok) {
        Swal.fire({
          icon: "success",
          title: "¡Reserva guardada!",
          text: data.mensaje || "Reserva creada exitosamente.",
          confirmButtonColor: "#3085d6"
        });

        form.reset();
        vehiculoSelect.innerHTML = `<option value="">Seleccione un vehículo</option>`;
      } else {
        Swal.fire({
          icon: "error",
          title: "Error al guardar",
          text: data.error || "No se pudo crear la reserva.",
          confirmButtonColor: "#d33"
        });
      }
    } catch (err) {
      console.error("Error al enviar reserva:", err);
      Swal.fire({
        icon: "error",
        title: "Error del servidor",
        text: "No se pudo conectar al servidor.",
        confirmButtonColor: "#d33"
      });
    }
  });
});
