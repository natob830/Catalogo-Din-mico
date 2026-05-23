<?php
require_once 'funciones_sesion.php';
verificarSesion();

$nombre = $_SESSION['usuario_nombre'] ?? 'Usuario';
$correo = $_SESSION['usuario_correo'] ?? '';
$rol = $_SESSION['usuario_rol'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Privado - <?php echo htmlspecialchars($nombre); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <header class="page-header bg-gradient py-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-white mb-3">Panel privado</h1>
            <p class="lead text-light">Bienvenido, <?php echo htmlspecialchars($nombre); ?>. Aquí puedes acceder a las funciones seguras del sistema.</p>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="section-title text-primary mb-4">Información de sesión</h2>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <div class="p-4 bg-light rounded shadow-sm h-100">
                                        <h3 class="h6 text-uppercase text-secondary">Nombre</h3>
                                        <p class="fw-bold mb-0"><?php echo htmlspecialchars($nombre); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-4 bg-light rounded shadow-sm h-100">
                                        <h3 class="h6 text-uppercase text-secondary">Correo</h3>
                                        <p class="fw-bold mb-0"><?php echo htmlspecialchars($correo); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-4 bg-light rounded shadow-sm h-100">
                                        <h3 class="h6 text-uppercase text-secondary">Rol</h3>
                                        <p class="fw-bold mb-0 text-capitalize"><?php echo htmlspecialchars($rol); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <a href="mensajes.php" class="btn btn-primary w-100 btn-lg">
                                        <i class="fas fa-envelope-open-text me-2"></i> Ver mensajes
                                    </a>
                                </div>
                                <?php if ($rol === 'admin'): ?>
                                    <div class="col-md-4">
                                        <a href="crear_usuario.php" class="btn btn-secondary w-100 btn-lg">
                                            <i class="fas fa-user-plus me-2"></i> Crear usuario
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <a href="logout.php" class="btn btn-outline-danger w-100 btn-lg">
                                        <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Byron V. Ñato. Área privada segura.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
