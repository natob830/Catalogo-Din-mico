<?php
require_once 'funciones_sesion.php';
verificarRol(['admin']);

$mensaje_exito = '';
$mensaje_error = '';
$cedula = '';
$nombre = '';
$correo = '';
$rol = 'usuario';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = trim($_POST['cedula'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';
    $rol = $_POST['rol'] ?? 'usuario';

    $errores = [];

    if (empty($cedula)) {
        $errores[] = 'La cédula es obligatoria.';
    } elseif (!preg_match('/^[0-9]{6,15}$/', $cedula)) {
        $errores[] = 'La cédula debe contener solo números y tener entre 6 y 15 dígitos.';
    }

    if (empty($nombre)) {
        $errores[] = 'El nombre es obligatorio.';
    } elseif (strlen($nombre) < 3 || strlen($nombre) > 100) {
        $errores[] = 'El nombre debe tener entre 3 y 100 caracteres.';
    }

    if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El correo no es válido.';
    }

    if (empty($password)) {
        $errores[] = 'La contraseña es obligatoria.';
    } elseif (strlen($password) < 8) {
        $errores[] = 'La contraseña debe tener al menos 8 caracteres.';
    }

    if ($rol !== 'admin' && $rol !== 'usuario') {
        $errores[] = 'El rol seleccionado no es válido.';
    }

    if (empty($errores)) {
        $sql = 'SELECT id FROM usuarios WHERE correo = ? LIMIT 1';
        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $correo);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                $errores[] = 'El correo ya está registrado. Use otro correo.';
            }

            mysqli_stmt_close($stmt);
        }
    }

    if (empty($errores)) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios (cedula, nombre, correo, password, rol) VALUES (?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sssss', $cedula, $nombre, $correo, $hashPassword, $rol);
            if (mysqli_stmt_execute($stmt)) {
                $mensaje_exito = 'Usuario creado correctamente.';
                $cedula = '';
                $nombre = '';
                $correo = '';
                $rol = 'usuario';
            } else {
                $mensaje_error = 'Error al guardar el usuario. Intente nuevamente.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $mensaje_error = 'Error interno al preparar la base de datos.';
        }
    } else {
        $mensaje_error = implode('<br>', $errores);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario - Panel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>


    <header class="page-header bg-gradient py-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-white mb-3">Crear nuevo usuario</h1>
            <p class="lead text-light">Solo el administrador puede generar cuentas para usuarios registrados.</p>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if (!empty($mensaje_exito)): ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo $mensaje_exito; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($mensaje_error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i><?php echo $mensaje_error; ?>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <form method="POST" action="crear_usuario.php" novalidate>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="cedula" class="form-label fw-bold">Cédula</label>
                                        <input type="text" id="cedula" name="cedula" class="form-control form-control-lg" value="<?php echo htmlspecialchars($cedula); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label fw-bold">Nombre completo</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="<?php echo htmlspecialchars($nombre); ?>" required>
                                    </div>
                                </div>
                                <div class="mt-4 row g-3">
                                    <div class="col-md-6">
                                        <label for="correo" class="form-label fw-bold">Correo electrónico</label>
                                        <input type="email" id="correo" name="correo" class="form-control form-control-lg" value="<?php echo htmlspecialchars($correo); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rol" class="form-label fw-bold">Rol</label>
                                        <select id="rol" name="rol" class="form-select form-select-lg" required>
                                            <option value="usuario" <?php echo $rol === 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                                            <option value="admin" <?php echo $rol === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="password" class="form-label fw-bold">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Mínimo 8 caracteres" required>
                                </div>
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-user-plus me-2"></i> Guardar usuario
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Byron V. Ñato. Gestión de usuarios segura.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
