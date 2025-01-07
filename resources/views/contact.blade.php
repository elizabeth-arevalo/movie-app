<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0f2d3c; 
        }
        .navbar-brand {
            color: #40E0D0; 
        }
        .navbar-brand:hover {
            color: #69d7b9; 
        }
        .btn-turquoise {
            background-color: #40E0D0; 
            color: #0f2d3c; 
        }
        .btn-turquoise:hover {
            background-color: #69d7b9; 
            color: f8f9fa;
        }
        
        .content {
            flex: 1;
        }
        .footer {
            background-color: #0f2d3c; 
            color: f8f9fa;
            padding: 10px 0;
        }
        .footer a {
            color: #40E0D0; 
            text-decoration: none;
        }
        .footer a:hover {
            color: #69d7b9; 
        }
    </style>
</head>
<body class="auto">
    
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{'/'}}">Regresar</a>
    </div>
</nav>

<div class="container my-5 content">
    <h2 class="text-center mb-4">Formulario de Contacto</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="contactForm">
                <div class="mb-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-4 py-2">
                    <label for="message" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="text-center py-3">
                    <button type="submit" class="btn btn-turquoise">Enviar</button>
                </div>
            </form>
            <div id="responseMessage" class="mt-3 text-center"></div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer text-center py-5">
    <div class="container py-5">
        <p class="text-muted">&copy; 2025 MovieHub. Todos los derechos reservados.</p>
        <p><a href="#">Política de Privacidad</a> | <a href="#">Términos y Condiciones</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para manejar el formulario -->
<script>
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let message = document.getElementById("message").value;

        if (name && email && message) {
            //Solicitud AJAX o mostrar un mensaje de éxito
            document.getElementById("responseMessage").innerHTML = `<div class="alert alert-success">Gracias, ${name}. Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.</div>`;
            document.getElementById("contactForm").reset(); // Limpia el formulario
        } else {
            document.getElementById("responseMessage").innerHTML = `<div class="alert alert-danger">Por favor, completa todos los campos del formulario.</div>`;
        }
    });
</script>

</body>
</html>
