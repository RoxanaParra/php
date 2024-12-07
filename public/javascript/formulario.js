document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar el formulario y los campos
    const form = document.querySelector('form');
    const emailInput = document.getElementById('emailInput');
    const passwordInput = document.getElementById('passwordInput');

    // Agregar evento al formulario
    form.addEventListener('submit', function (event) {
        let isValid = true;

        // Limpiar mensajes de error
        emailInput.classList.remove('is-invalid');
        passwordInput.classList.remove('is-invalid');

        // Validar el correo electrónico
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(emailInput.value)) {
            isValid = false;
            emailInput.classList.add('is-invalid');
            alert('Por favor, ingresa un correo electrónico válido.');
        }

        // Validar la contraseña
        const password = passwordInput.value;
        const passwordRegex = /^[a-zA-Z0-9]{8,20}$/; // Solo letras y números, entre 8 y 20 caracteres
        if (!passwordRegex.test(password)) {
            isValid = false;
            passwordInput.classList.add('is-invalid');
            alert('La contraseña debe tener entre 8 y 20 caracteres y contener solo letras y números.');
        }

        // Si no es válido, prevenir el envío del formulario
        if (!isValid) {
            event.preventDefault();
        }
    });
});
