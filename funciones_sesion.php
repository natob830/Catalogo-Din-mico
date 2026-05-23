<?php
/**
 * Funciones de sesión y control de acceso.
 * Incluye verificación de roles y helpers de sesión.
 */

require_once 'conexion.php';

function iniciarSesionSegura(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.use_only_cookies', '1');
        ini_set('session.use_strict_mode', '1');

        $secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'] ?? '',
            'secure' => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        session_start();
    }
}

function verificarSesion(): void
{
    iniciarSesionSegura();

    if (empty($_SESSION['usuario_id']) || empty($_SESSION['usuario_correo'])) {
        header('Location: login.php');
        exit;
    }
}

function verificarRol(array $roles): void
{
    verificarSesion();

    $rolActual = $_SESSION['usuario_rol'] ?? '';
    if (!in_array($rolActual, $roles, true)) {
        header('Location: login.php');
        exit;
    }
}

function esAdmin(): bool
{
    iniciarSesionSegura();
    return isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin';
}

function estaLogueado(): bool
{
    iniciarSesionSegura();
    return !empty($_SESSION['usuario_id']);
}

function limpiarTexto(string $texto): string
{
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}
