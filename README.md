# Catalog Dinámico - Byron V. Ñato

## Descripción

Proyecto web en PHP y MySQL que presenta un portafolio personal con:
- página de inicio
- página "Sobre mí"
- formulario de contacto
- sistema de login y panel privado

Es una aplicación simple para gestionar mensajes y usuarios desde un sitio dinámico.

## Hosting

- Sitio en vivo: https://tecnobyronN830.infinityfreeapp.com
- Panel de hosting: https://dash.infinityfree.com

## Conexión MySQL

Usa estos datos en `conexion.php` para el hosting remoto:

- Servidor: `sql105.infinityfree.com`
- Base de datos: `if0_42000126_natoBdata`
- Usuario: `if0_42000126`
- Contraseña: `OsdpB8Z0Q5RgM`

## Uso rápido

1. Copia el proyecto en `C:\xampp\htdocs\CatalogDinamico_DesarrolloWeb_BN`
2. Inicia Apache y MySQL en XAMPP
3. Edita `conexion.php` con tus credenciales locales o remotas
4. Abre `index.html` en el navegador o usa la URL del hosting

### Ejemplo local

```php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basedatos = "sitio_personal";
```

### Ejemplo remoto

```php
$servidor = "sql105.infinityfree.com";
$usuario = "if0_42000126";
$contraseña = "OsdpB8Z0Q5RgM";
$basedatos = "if0_42000126_natoBdata";
```

## Archivos principales

- `index.html`
- `sobre_mi.html`
- `contacto.php`
- `login.php`
- `panel.php`
- `conexion.php`
- `crear_usuario.php`
- `logout.php`

## Qué hace el proyecto

- Muestra información personal y profesional.
- Permite enviar mensajes desde `contacto.php`.
- Guarda mensajes en MySQL.
- Permite iniciar sesión y entrar a un panel privado.
- Administra usuarios y protege el acceso con sesiones.

## Base de datos

La aplicación necesita MySQL para guardar contactos y usuarios.

Tablas principales:
- `contactos`
- `usuarios`

Si usas el hosting remoto, la base de datos ya está en `if0_42000126_natoBdata`.

---

## Cómo probar

- Abre `contacto.php`
- Envía un mensaje válido
- Revisa que se guarde en la base de datos
- Usa `login.php` para acceder al panel

---

## Nota

Edita `conexion.php` con los datos del hosting o de tu servidor local antes de ejecutar el proyecto.

- 🔗 **Infinity Free**: https://www.infinityfree.net/
- 🔗 **Hostinger** (Prueba gratis)

---

## 📞 Información de Contacto

**Nombre**: Byron V. Ñato  
**Ubicación**: Sangolquí, Rumiñahui, Pichincha, Ecuador  
**Institución**: UTPL (Universidad Técnica Particular de Loja)  
**Interés**: Tecnología, Programación, Desarrollo Web  

Para contactarme, usa el formulario en la página de contacto del sitio.

---

## ✏️ Notas Importantes

- ✅ No se ha modificado la estructura de carpetas
- ✅ Todos los archivos están nombrados correctamente
- ✅ La conexión a MySQL funciona sin crear nuevas bases de datos
- ✅ El código es legible y principiante-friendly
- ✅ Incluye comentarios claros en archivos clave
- ✅ Compatible con XAMPP y otros servidores locales

---

## 📚 Recursos Utilizados

- **Bootstrap 5**: https://getbootstrap.com/
- **Font Awesome**: https://fontawesome.com/
- **Unsplash (Imágenes)**: https://unsplash.com/
- **HTML5 Guide**: https://www.w3.org/TR/html5/
- **MDN Web Docs**: https://developer.mozilla.org/

---

## 📜 Licencia

Este proyecto es de uso académico para la UTPL. Puede ser modificado y adaptado según sea necesario.

---

## 🎓 Información Académica

**Materia**: Desarrollo Web  
**Universidad**: UTPL  
**Año Académico**: 2026  
**Evaluación**: Actividad Académica de Sitio Web Personal  

---

## ✅ Checklist de Verificación

- ✅ Página principal (index.html) funcional
- ✅ Página sobre mí (sobre_mi.html) con información completa
- ✅ Formulario de contacto (contacto.php) funcional
- ✅ Conexión a MySQL (conexion.php) correcta
- ✅ Estilos CSS aplicados (Bootstrap + CSS personalizado)
- ✅ JavaScript para validación incluido
- ✅ Responsive en móviles y desktops
- ✅ Imágenes genéricas de internet
- ✅ Navegación coherente entre páginas
- ✅ Información profesional y académica

---
**Usuario de prueba de ingreso es docente@utpl.edu.ec y la contraseña es 12345678** 
**Última Actualización**: Enero 2026  
**Estado**: ✅ Completo y Funcional

