document.getElementById("loginForm").addEventListener("submit", async function (e) {
  e.preventDefault();

  const correo = document.getElementById("correo").value;
  const contrasenna = document.getElementById("contrasenna").value;

  try {
    const response = await fetch("http://localhost:3000/api/auth/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ correo, contrasenna }),
    });

    const data = await response.json();

    if (response.ok) {
      alert(data.message);
      window.location.href = "agenda.html";
    } else {
      alert(data.message);
    }
  } catch (error) {
    alert("Error al conectar con el servidor");
    console.error(error);
  }
});