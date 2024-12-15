function validarFormulario() {
        // Obtener los valores de los campos
        const nombre = document.getElementById('nombre');
        const apellidos = document.getElementById('apellidos');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const telefono = document.getElementById('telefono');
        const fechaNacimiento = document.getElementById('fecha_de_nacimiento');
        const rol = document.getElementById('rol');
        const sexo = document.getElementById('sexo');

        // Regex para validaciones
        const regexNombre = /^[a-zA-ZÀ-ÿ\u00f1\u00d1\s]{1,15}$/;
        const regexApellidos = /^[a-zA-ZÀ-ÿ\u00f1\u00d1\s]{1,40}$/;
        const regexTelefono = /^[0-9]{9}$/;
        const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const regexPassword = /^(?:[a-zA-Z\d@$!%*?&]{8,})$/;

        let esValido = false;

        function borrarErrores () {
            //Borrar mensajes de error previos 
            document.getElementById('errorNombre').textContent = "";
            document.getElementById('errorApellidos').textContent = "";
            document.getElementById('errorTelefono').textContent = "";
            document.getElementById('errorEmail').textContent = "";
            document.getElementById('errorRol').textContent = "";
            document.getElementById('errorFecha').textContent = "";
            document.getElementById('errorSexo').textContent = "";
            document.getElementById('errorPassword').textContent = "";

        }
    
        // Validaciones
        nombre.addEventListener('input', function() {
            const nombre = this.value;
    
            if (! regexNombre.test(nombre)) {
                document.getElementById('errorNombre').innerHTML = "El nombre solo debe contener letras y máximo 15 caracteres.";
                
                esValido = false;
                return;
                
            }
    
            document.getElementById('errorNombre').textContent = "";
            esValido = true;

            document.getElementById('errorNombre').textContent = "";
    
            return;
        });

        apellidos.addEventListener('input', function () {
            const apellidos = this.value;
    
            if (!regexApellidos.test(apellidos)) {
                document.getElementById('errorApellidos').textContent = "Los apellidos solo deben contener letras y máximo 40 caracteres.";
    
                esValido = false;
                return;
            }
    
            document.getElementById('errorApellidos').textContent = "";
            esValido = true;
    
            return;
        });

        telefono.addEventListener('input', function () {
            const valorTelefono = this.value;
    
            if (valorTelefono === '' || !regexTelefono.test(valorTelefono)) {
                document.getElementById('errorTelefono').textContent = "El teléfono debe tener 9 dígitos.";
                esValido = false;
            } else {
                document.getElementById('errorTelefono').textContent = "";
                esValido = true;
            }
        });
    
        // Validación para el correo electrónico
        email.addEventListener('input', function () {
            const valorEmail = this.value;
    
            if (valorEmail === '' || !regexEmail.test(valorEmail)) {
                document.getElementById('errorEmail').textContent = "El formato del correo electrónico no es válido.";
                esValido = false;
            } else {
                document.getElementById('errorEmail').textContent = "";
                esValido = true;
            }
        });
    
        // Validación para la contraseña
        password.addEventListener('input', function () {
            const valorPassword = this.value;
    
            if (valorPassword === '' || !regexPassword.test(valorPassword)) {
                document.getElementById('errorPassword').textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, un número y un símbolo.";
                esValido = false;
            } else {
                document.getElementById('errorPassword').textContent = "";
                esValido = true;
            }
        });
    
        // Validación para la fecha de nacimiento
        fechaNacimiento.addEventListener('change', function () {
            const valorFecha = this.value;
            const fechaActual = new Date().toISOString().split('T')[0]; // Fecha actual en formato YYYY-MM-DD
    
            if (valorFecha >= fechaActual || valorFecha === 'mm/dd/yyyy') {
                document.getElementById('errorFecha').textContent = "La fecha de nacimiento debe ser anterior al día actual.";
                esValido = false;
            } else {
                document.getElementById('errorFecha').textContent = "";
                esValido = true;
            }
        });
    
        // Validación para el rol
        rol.addEventListener('change', function () {
            const valorRol = this.value;
    
            if (valorRol === '') {
                document.getElementById('errorRol').textContent = "Debes seleccionar un rol.";
                esValido = false;
            } else {
                document.getElementById('errorRol').textContent = "";
                esValido = true;
            }
        });
    
        // Validación para el sexo
        sexo.addEventListener('change', function () {
            const valorSexo = this.value;
    
            if (valorSexo === '') {
                document.getElementById('errorSexo').textContent = "Debes seleccionar un sexo.";
                esValido = false;
            } else {
                document.getElementById('errorSexo').textContent = "";
                esValido = true;
            }
        });
    
        // Asegúrate de prevenir el envío del formulario si no es válido
        const formulario = document.querySelector('form');
        formulario.addEventListener('submit', function (event) {
            if (!esValido) {
                event.preventDefault();
                alert('Por favor, corrige los errores en el formulario antes de enviarlo.');
            }

            borrarErrores();
        });
 }
validarFormulario();
