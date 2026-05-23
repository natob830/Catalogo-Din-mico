<?php
/**
 * Página de contacto con formulario funcional
 * Valida los datos y los guarda en la base de datos MySQL
 */

// Incluir archivo de conexión
require_once 'conexion.php';

$mensaje_exito = '';
$mensaje_error = '';
$nombre = '';
$correo = '';
$mensaje = '';

// Procesar el formulario si se envía por método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y sanitizar los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

    // Validación en PHP
    $errores = array();

    // Validar nombre (solo letras, espacios y acentos)
    if (empty($nombre)) {
        $errores[] = "El nombre es requerido.";
    } elseif (strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    } elseif (strlen($nombre) > 100) {
        $errores[] = "El nombre no puede exceder 100 caracteres.";
    } elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre)) {
        $errores[] = "El nombre solo debe contener letras y espacios (sin números ni caracteres especiales).";
    }

    // Validar correo
    if (empty($correo)) {
        $errores[] = "El correo es requerido.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo no es válido. Ejemplo: usuario@dominio.com";
    } elseif (strlen($correo) > 100) {
        $errores[] = "El correo no puede exceder 100 caracteres.";
    }

    // Validar mensaje
    if (empty($mensaje)) {
        $errores[] = "El mensaje es requerido.";
    } elseif (strlen($mensaje) < 10) {
        $errores[] = "El mensaje debe tener al menos 10 caracteres.";
    } elseif (strlen($mensaje) > 5000) {
        $errores[] = "El mensaje no puede exceder 5000 caracteres.";
    }

    // Si no hay errores, guardar en la base de datos
    if (empty($errores)) {
        // Escapar caracteres especiales para seguridad
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $correo = mysqli_real_escape_string($conexion, $correo);
        $mensaje = mysqli_real_escape_string($conexion, $mensaje);

        // Verificar si la tabla existe, si no, crearla con restricciones profesionales
        $sql_crear_tabla = "CREATE TABLE IF NOT EXISTS contactos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
            correo VARCHAR(100) NOT NULL UNIQUE COLLATE utf8mb4_unicode_ci,
            mensaje LONGTEXT NOT NULL,
            fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            estado ENUM('pendiente', 'respondido') DEFAULT 'pendiente',
            INDEX idx_correo (correo),
            INDEX idx_fecha (fecha_envio)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

        if (!mysqli_query($conexion, $sql_crear_tabla)) {
            $mensaje_error = "Error al preparar la base de datos: " . mysqli_error($conexion);
        } else {
            // Insertar los datos en la tabla
            $sql_insertar = "INSERT INTO contactos (nombre, correo, mensaje) 
                           VALUES ('$nombre', '$correo', '$mensaje')";

            if (mysqli_query($conexion, $sql_insertar)) {
                $mensaje_exito = "¡Mensaje enviado exitosamente! Te contactaré pronto.";
                // Limpiar el formulario
                $nombre = '';
                $correo = '';
                $mensaje = '';
            } else {
                // Verificar si el error es por correo duplicado
                if (strpos(mysqli_error($conexion), 'Duplicate entry') !== false) {
                    $mensaje_error = "Este correo ya ha sido registrado anteriormente. Por favor usa un correo diferente.";
                } else {
                    $mensaje_error = "Error al enviar el mensaje: " . mysqli_error($conexion);
                }
            }
        }
    } else {
        $mensaje_error = "Por favor, corrige los siguientes errores:\n" . implode("\n", $errores);
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Byron V. Ñato</title>
    
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <!-- Encabezado de la página -->
    <section class="page-header bg-gradient py-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-white mb-3">Contáctame</h1>
            <p class="lead text-light">Me gustaría escuchar de ti. Envíame un mensaje.</p>
        </div>
    </section>

    <!-- Contenido principal -->
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Mostrar mensaje de éxito -->
                    <?php if (!empty($mensaje_exito)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>¡Éxito!</strong> <?php echo $mensaje_exito; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Mostrar mensaje de error -->
                    <?php if (!empty($mensaje_error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Error:</strong>
                            <div><?php echo nl2br(htmlspecialchars($mensaje_error)); ?></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de contacto -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="section-title text-primary mb-4">Formulario de Contacto</h2>
                            <form method="POST" action="contacto.php" novalidate id="formularioContacto">
                                <!-- Campo Nombre -->
                                <div class="mb-4">
                                    <label for="nombre" class="form-label fw-bold">
                                        <i class="fas fa-user text-primary"></i> Nombre
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-lg" 
                                        id="nombre" 
                                        name="nombre" 
                                        placeholder="Tu nombre completo"
                                        value="<?php echo htmlspecialchars($nombre); ?>"
                                        required
                                        minlength="3"
                                    >
                                    <small class="form-text text-muted">Mínimo 3 caracteres</small>
                                </div>

                                <!-- Campo Correo -->
                                <div class="mb-4">
                                    <label for="correo" class="form-label fw-bold">
                                        <i class="fas fa-envelope text-primary"></i> Correo Electrónico
                                    </label>
                                    <input 
                                        type="email" 
                                        class="form-control form-control-lg" 
                                        id="correo" 
                                        name="correo" 
                                        placeholder="tu@correo.com"
                                        value="<?php echo htmlspecialchars($correo); ?>"
                                        required
                                    >
                                    <small class="form-text text-muted">Formato: usuario@dominio.com</small>
                                </div>

                                <!-- Campo Mensaje -->
                                <div class="mb-4">
                                    <label for="mensaje" class="form-label fw-bold">
                                        <i class="fas fa-message text-primary"></i> Mensaje
                                    </label>
                                    <textarea 
                                        class="form-control form-control-lg" 
                                        id="mensaje" 
                                        name="mensaje" 
                                        rows="6" 
                                        placeholder="Escribe tu mensaje aquí..."
                                        required
                                        minlength="10"
                                    ><?php echo htmlspecialchars($mensaje); ?></textarea>
                                    <small class="form-text text-muted">Mínimo 10 caracteres</small>
                                </div>

                                <!-- Botón de envío -->
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="reset" class="btn btn-outline-secondary btn-lg">
                                        <i class="fas fa-redo"></i> Limpiar
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane"></i> Enviar Mensaje
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Información de contacto adicional -->
                    <div class="row g-4 mt-5">
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 text-center">
                                <div class="card-body">
                                    <h5 class="card-title text-primary mb-3">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </h5>
                                    <h6 class="fw-bold">Ubicación</h6>
                                    <p class="text-muted small">
                                        Sangolquí, Rumiñahui<br>
                                        Pichincha, Ecuador
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 text-center">
                                <div class="card-body">
                                    <h5 class="card-title text-primary mb-3">
                                        <i class="fas fa-clock fa-2x"></i>
                                    </h5>
                                    <h6 class="fw-bold">Tiempo de Respuesta</h6>
                                    <p class="text-muted small">
                                        Respondré dentro de<br>
                                        24 a 48 horas
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2026 Byron V. Ñato. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Sitio académico para la UTPL</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript personalizado -->
    <script src="js/script.js"></script>
</body>
</html>
