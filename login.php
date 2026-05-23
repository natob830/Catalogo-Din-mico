<?php
require_once 'funciones_sesion.php';

iniciarSesionSegura();

if (!empty($_SESSION['usuario_id'])) {
    header('Location: panel.php');
    exit;
}

$error = '';
$correo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingrese un correo electrónico válido.';
    } elseif (empty($password)) {
        $error = 'Ingrese la contraseña.';
    } else {
        $sql = 'SELECT id, nombre, correo, password, rol FROM usuarios WHERE correo = ? LIMIT 1';
        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $correo);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $nombre, $correoBD, $hashPassword, $rol);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            $loginSuccess = false;

            if (!empty($id)) {
                if (password_verify($password, $hashPassword)) {
                    $loginSuccess = true;
                } elseif ($password === $hashPassword) {
                    $loginSuccess = true;

                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $updateSql = 'UPDATE usuarios SET password = ? WHERE id = ?';
                    $updateStmt = mysqli_prepare($conexion, $updateSql);

                    if ($updateStmt) {
                        mysqli_stmt_bind_param($updateStmt, 'si', $newHash, $id);
                        mysqli_stmt_execute($updateStmt);
                        mysqli_stmt_close($updateStmt);
                    }
                }
            }

            if ($loginSuccess) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = $id;
                $_SESSION['usuario_nombre'] = $nombre;
                $_SESSION['usuario_correo'] = $correoBD;
                $_SESSION['usuario_rol'] = $rol;

                header('Location: panel.php');
                exit;
            }
        }

        $error = 'Correo o contraseña incorrectos. Verifique sus credenciales.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Byron V. Ñato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <header class="page-header bg-gradient py-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-white mb-3">Acceso seguro al panel privado</h1>
            <p class="lead text-light">Solo usuarios registrados por el administrador pueden iniciar sesión.</p>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="section-title text-primary mb-4">Iniciar sesión</h2>

                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="login.php" novalidate>
                                <div class="mb-4">
                                    <label for="correo" class="form-label fw-bold">Correo electrónico</label>
                                    <input type="email" id="correo" name="correo" class="form-control form-control-lg" placeholder="tu@dominio.com" value="<?php echo htmlspecialchars($correo); ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-bold">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="********" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-right-to-bracket me-2"></i> Entrar
                                    </button>
                                </div>
                            </form>

                            <p class="text-muted small mt-4">Si aún no tiene una cuenta, solicite al administrador que le cree un usuario.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Byron V. Ñato. Autenticación profesional con PHP y MySQL.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
