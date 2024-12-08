function validarFormulario() 
{
    // Obtener los valores de los campos
    const nombre = document.getElementById('nombre'); 
    const apellidos = document.getElementById('apellidos');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const direccion = document.getElementById('direccion');
    const telefono = document.getElementById('telefono');
    const fecha_de_nacimiento = document.getElementById('fecha_de_nacimiento');
    const rol = document.getElementById('rol');
    const sexo = document.getElementById("sexo");
    const enviarFormulario = document.getElementById('registrar');

    //Regex para validaciones de los formatos especificados
    const regexNombre = /^[a-zA-ZÀ-ÿ\u00f1\u00d1\s]{1,15}$/; //Para la comprobación de letras y espacios
    const regexApellidos = /^[a-zA-ZÀ-ÿ\u00f1\u00d1\s]{1,40}$/; 
    const regexTelefono = /^[0-9]{9}$/; // Para la comprobación de números 
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Comprobación del campo de Email

    function borrarErrores () {
    //Borrar mensajes de error previos 
    document.getElementById('errorNombre').textContent = "";
    document.getElementById('errorApellidos').textContent = "";
    document.getElementById('errorEmail').textContent = "";
    document.getElementById('errorDireccion').textContent = "";
    document.getElementById('errorTelefono').textContent = "";
    document.getElementById('errorFecha_de_nacimiento').textContent = "";
    }

    borrarErrores()

    //Validaciones
    nombre.addEventListener('input', function() {
        const nombre = this.value;

        if (! regexNombre.test(nombre)) {
            document.getElementById('errorNombre').textContent = "El nombre solo debe contener letras y máximo 15 caracteres.";
            
            esValido = false;
            return;
            
        }

        document.getElementById('errorNombre').textContent = "";
        esValido = true;

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
        const telefono = this.value;

        if (!regexTelefono.test(telefono)) {
            document.getElementById('errorTelefono').textContent = "El teléfono debe tener 9 dígitos.";

            esValido = false;
            return;
        }

        document.getElementById('errorTelefono').textContent = "";

        esValido = true;
        return;
    });

    email.addEventListener('input', function () {
        const email = this.value;

        if (!regexEmail.test(email)) {
            document.getElementById('errorEmail').textContent = "El formato del correo electrónico no es válido.";

            esValido = false;
            return;
        }

        document.getElementById('errorEmail').textContent = "";

        esValido = true;
        return;

    });

    plazoSeleccionado.addEventListener('change', function () {
        const plazo = parseInt(this.value);

        if (plazo === "" || isNaN(plazo)) {
            document.getElementById('errorPlazo').textContent = "Debes seleccionar un plazo.";

            esValido = false;
            return;
        }

        esValido = true;

        document.getElementById('errorPlazo').textContent = "";

        return
    });


    enviarFormulario.addEventListener('click', function (event) {
        let estaSeleccionado = document.getElementById ('condiciones').checked;
        let productos = productoSeleccionado.options
        let productoPorDefecto = false;

        for (let i = 0; i < productos.length; i++) {
            if (productos[i].selected && productos[i].value === "0") {
                productoPorDefecto = true;
                break;
               
            }
        }

        if(! esValido || ! estaSeleccionado || productoPorDefecto) {
            event.preventDefault();

            alert('Errores de validacion');
            
            return
        }


        alert('Formulario enviado correctamente');
    });

       // Validar contraseña
       if (password.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres.");
        e.preventDefault();
        return;
    }

    if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden.");
        e.preventDefault();
        return;
    }

    // Validación exitosa
    alert("Formulario válido. Enviando datos...");

}



validarFormulario()

        
