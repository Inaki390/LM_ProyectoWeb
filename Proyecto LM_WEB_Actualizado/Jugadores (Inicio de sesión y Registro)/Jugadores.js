document.addEventListener('DOMContentLoaded', () => {
    const formularioRegistro = document.querySelector('.form');
    
    // Validar contraseñas coincidentes en el formulario de registro
    if (formularioRegistro) {
        formularioRegistro.addEventListener('submit', function(event) {
            const contraseña = document.getElementById('contraseña').value;
            const confirmarContraseña = document.getElementById('confirmar-contraseña').value;

            if (contraseña !== confirmarContraseña) {
                alert("Las contraseñas no coinciden. Intenta de nuevo.");
                event.preventDefault(); // Evita el envío del formulario
            }
        });
    }
});
