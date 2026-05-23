<?php
require_once 'funciones_sesion.php';

if (session_status() === PHP_SESSION_NONE) {
    iniciarSesionSegura();
}

$currentPage = basename($_SERVER['PHP_SELF']);
$loggedIn = !empty($_SESSION['usuario_id']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fas fa-code"></i> Byron V. Ñato
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage === 'index.php' ? 'active' : ''; ?>" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage === 'sobre_mi.php' ? 'active' : ''; ?>" href="sobre_mi.php">Sobre Mí</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage === 'contacto.php' ? 'active' : ''; ?>" href="contacto.php">Contacto</a>
                </li>
                <?php if ($loggedIn): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'panel.php' ? 'active' : ''; ?>" href="panel.php">Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'login.php' ? 'active' : ''; ?>" href="login.php">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
