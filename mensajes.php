<?php
// mensajes.php
// Acceso restringido a usuarios autenticados con rol admin o usuario
require_once 'funciones_sesion.php';

verificarRol(['admin', 'usuario']);

$mensajes = [];
$error = '';

$sql = "SELECT id, nombre, correo, mensaje, fecha_envio, estado FROM contactos ORDER BY fecha_envio DESC";
$resultado = mysqli_query($conexion, $sql);

if ($resultado === false) {
    $error = 'No se pudo cargar la lista de mensajes. Por favor inténtalo más tarde.';
} else {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensajes[] = $fila;
    }
    mysqli_free_result($resultado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes - Byron V. Ñato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <header class="page-header bg-gradient py-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-white mb-3">Catálogo de mensajes</h1>
            <p class="lead text-light">Consulta los mensajes recibidos desde el formulario de contacto.</p>
        </div>
    </header>

    <main class="py-5">
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php if ($error !== ''): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (empty($mensajes) && $error === ''): ?>
                        <div class="card shadow-sm border-0">
                            <div class="card-body py-5 text-center">
                                <h2 class="section-title text-primary">No hay mensajes registrados.</h2>
                                <p class="text-muted mb-0">Todavía no se ha recibido ningún mensaje desde el formulario de contacto.</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row g-4">
                            <?php foreach ($mensajes as $mensaje): ?>
                                <div class="col-12">
                                    <article class="card shadow-sm border-0">
                                        <div class="card-body">
                                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                                <div>
                                                    <h3 class="h5 fw-bold mb-1"><?php echo htmlspecialchars($mensaje['nombre']); ?></h3>
                                                    <p class="mb-1 text-muted">
                                                        <i class="fas fa-envelope me-2"></i>
                                                        <a href="mailto:<?php echo htmlspecialchars($mensaje['correo']); ?>" class="text-decoration-none">
                                                            <?php echo htmlspecialchars($mensaje['correo']); ?>
                                                        </a>
                                                    </p>
                                                    <span class="badge bg-secondary text-uppercase small">
                                                        <?php echo htmlspecialchars($mensaje['estado']); ?>
                                                    </span>
                                                </div>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                    <?php echo date('d/m/Y H:i', strtotime($mensaje['fecha_envio'])); ?>
                                                </small>
                                            </div>
                                            <section>
                                                <h4 class="h6 text-primary mb-2">Mensaje</h4>
                                                <p class="text-muted mb-0"><?php echo nl2br(htmlspecialchars($mensaje['mensaje'])); ?></p>
                                            </section>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
