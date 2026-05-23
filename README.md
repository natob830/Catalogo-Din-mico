# Sitio Personal - Byron V. Ñato

## 📋 Descripción del Proyecto

Este es un sitio web académico personal desarrollado como actividad universitaria para la UTPL (Universidad Técnica Particular de Loja). El sitio presenta información profesional, hobbies e intereses, además de incluir un formulario de contacto funcional conectado a una base de datos MySQL.

**Estudiante:** Byron V. Ñato  
**Carrera:** Ingeniería en Tecnologías de la Información  
**Universidad:** UTPL (Universidad Técnica Particular de Loja)  
**Año:** 2026

---

## ✨ Características

- ✅ **Diseño Responsivo**: Compatible con dispositivos móviles, tablets y computadoras
- ✅ **HTML5 Semántico**: Código bien estructurado usando etiquetas semánticas
- ✅ **Bootstrap 5**: Framework CSS moderno desde CDN
- ✅ **Formulario Funcional**: Validación en HTML5 y PHP
- ✅ **Base de Datos**: Conexión a MySQL para guardar mensajes de contacto
- ✅ **Autenticación Segura**: Login con roles y panel privado en PHP/MySQL
- ✅ **Gestión de Usuarios**: Administrador crea cuentas seguras con `password_hash`
- ✅ **Estilo Profesional**: Diseño limpio y académico apto para evaluación universitaria
- ✅ **Imágenes Genéricas**: Imágenes de internet con temática relevante
- ✅ **Navegación Intuitiva**: Menú completo y fácil de usar
- ✅ **Página Sobre Mí**: Sección detallada con hobbies e intereses
- ✅ **Página de Contacto**: Formulario con validación y almacenamiento

---

## 📁 Estructura del Proyecto

```
sitio_personal/
│
├── index.html              # Página principal
├── sobre_mi.html           # Página sobre mí y mis intereses
├── contacto.php            # Página de contacto con formulario
├── conexion.php            # Archivo de conexión a MySQL
│
├── css/
│   └── estilos.css        # Estilos CSS personalizados
│
├── js/
│   └── script.js          # Scripts JavaScript
│
├── img/                   # Carpeta para imágenes (si es necesario)
│
└── README.md              # Este archivo
```

---

## 🛠️ Requisitos Técnicos

### Requisitos del Sistema
- **PHP**: 7.0 o superior
- **MySQL**: 5.7 o superior
- **Servidor Web**: Apache, Nginx o similar
- **Navegador**: Chrome, Firefox, Safari o Edge (versión moderna)

### Herramientas Utilizadas
- **HTML5**: Lenguaje de marcado
- **CSS3**: Diseño y estilos (Bootstrap + CSS personalizado)
- **JavaScript**: Validación del lado del cliente
- **PHP**: Procesamiento del formulario y validación del lado del servidor
- **MySQL**: Base de datos para almacenar contactos

---

## 🚀 Instalación y Configuración Local

### Paso 1: Descargar el Proyecto
```bash
# Clonar o descargar el repositorio
git clone https://github.com/usuario/sitio-personal.git
# O descargar como ZIP
```

### Paso 2: Colocar en el Directorio Web
```bash
# En XAMPP (Windows)
C:\xampp\htdocs\sitio_personal\

# En XAMPP (Mac/Linux)
/Applications/XAMPP/htdocs/sitio_personal/

# O en tu servidor de hosting local
```

### Paso 3: Crear la Base de Datos

#### Opción A: Usando phpMyAdmin (XAMPP)
1. Abre http://localhost/phpmyadmin
2. Crea una base de datos llamada `sitio_personal`
3. No es necesario crear las tablas manualmente, se crean automáticamente al enviar el primer mensaje

#### Opción B: Usando MySQL Directo (CMD/Terminal)
```sql
CREATE DATABASE sitio_personal;
USE sitio_personal;

-- La tabla se creará automáticamente al usar el formulario
```

### Paso 4: Configurar la Conexión
El archivo `conexion.php` contiene las credenciales por defecto de XAMPP:

```php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basedatos = "sitio_personal";
```

**Si tienes credenciales diferentes**, edita el archivo `conexion.php` con tus datos.

### Paso 5: Acceder al Sitio

Abre tu navegador y ve a:
```
http://localhost/sitio_personal/
```

---

## 📄 Páginas del Sitio

### 1. **index.html** - Página Principal
- Presentación de Byron V. Ñato
- Rol y biografía corta
- Imagen representativa
- Enlaces a otras páginas
- Información resumida sobre la carrera y ubicación

### 2. **sobre_mi.html** - Página de Presentación Ampliada
- Historia personal detallada
- **Hobbies e Intereses:**
  - 💻 Tecnología y Programación
  - 📚 Estudios y Aprendizaje Continuo
  - 🏃 Deporte (Correr)
  - 🎵 Música (Salsa, Rock Clásico, Años 80)
  - ❤️ Actividades Familiares
  - 💡 Innovación y Creatividad
- Sección de valores personales
- Diseño coherente con el sitio

### 3. **contacto.php** - Formulario de Contacto
- **Campos del Formulario:**
  - Nombre (requerido, mínimo 3 caracteres)
  - Correo Electrónico (requerido, validación de formato)
  - Mensaje (requerido, mínimo 10 caracteres)
- **Validación:**
  - Validación HTML5 del lado del cliente
  - Validación PHP del lado del servidor
  - Sanitización de datos para seguridad
- **Funcionalidad:**
  - Almacena los mensajes en la base de datos MySQL
  - Muestra mensaje de confirmación al enviar
  - Muestra errores si hay problemas

### 4. **login.php** - Inicio de sesión seguro
- Permite el acceso solo a usuarios existentes en la base de datos
- Valida credenciales con `password_verify`
- Genera sesión PHP con rol, correo y nombre

### 5. **panel.php** - Zona privada del usuario
- Muestra el nombre y rol del usuario autenticado
- Enlaces a `mensajes.php`, `crear_usuario.php` (solo admin) y `logout.php`

### 6. **crear_usuario.php** - Creación de usuarios solo por admin
- Solo accesible para el rol `admin`
- Valida correo único y crea usuarios con `password_hash`
- No permite registro público ni acceso directo no autorizado

### 7. **logout.php** - Cierre de sesión seguro
- Destruye la sesión completa
- Elimina la cookie de sesión
- Redirige a `login.php`

---

## 🗄️ Base de Datos

### Tabla: `contactos`
Se crea automáticamente con la siguiente estructura:

```sql
CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabla: `usuarios`
Se crea automáticamente al acceder por primera vez a `login.php` o `crear_usuario.php`.

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin','usuario') NOT NULL DEFAULT 'usuario',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

> Nota: Para iniciar el sistema necesita al menos un usuario administrador. Inserte el primer administrador en la base de datos de forma manual si aún no existe.
>
> Ejemplo SQL:
> ```sql
> INSERT INTO usuarios (cedula, nombre, correo, password, rol)
> VALUES ('1234567890', 'Admin Inicial', 'admin@localhost', '$2y$10$XXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'admin');
> ```
>
> Genere el hash de la contraseña con PHP utilizando `password_hash`, por ejemplo:
>
> ```php
> <?php
> echo password_hash('Admin1234!', PASSWORD_DEFAULT);
> ```

### Campos:
- **id**: Identificador único del mensaje
- **nombre**: Nombre del remitente
- **correo**: Correo del remitente
- **mensaje**: Contenido del mensaje
- **fecha_envio**: Fecha y hora del envío (automática)

---

## 🎨 Diseño y Estilos

### Colores Principales
- 🔵 **Azul Primario**: #0d6efd (Bootstrap)
- 🟣 **Gradiente**: Azul a púrpura en secciones hero
- ⚫ **Negro**: #212529 (Texto y elementos oscuros)
- ⚪ **Blanco**: #ffffff (Fondo principal)

### Tipografía
- **Font**: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
- **Bootstrap Icons**: Font Awesome 6.4
- **Línea Base**: 1.6rem para buena legibilidad

### Características de Diseño
- Sombras suaves en tarjetas y botones
- Efectos hover en elementos interactivos
- Animaciones suave al desplazarse
- Bordes redondeados modernos
- Transiciones fluidas en todas las interacciones

---

## 📱 Responsividad

El sitio es completamente responsivo y se adapta a:
- 📱 Móviles (320px - 576px)
- 📱 Tablets (576px - 992px)
- 🖥️ Computadoras (992px en adelante)

---

## 🔐 Seguridad

### Medidas Implementadas
✅ Validación en HTML5 (cliente)  
✅ Validación en PHP (servidor)  
✅ Escapado de caracteres especiales con `mysqli_real_escape_string()`  
✅ Uso de prepared statements recomendado para futuras versiones  
✅ Formularios POST con atributos name consistentes  

### Buenas Prácticas
- No se almacenan contraseñas en el código
- Los errores de conexión son manejados correctamente
- Las entradas del usuario son validadas y sanitizadas

---

## 📝 Archivos Importantes

| Archivo | Descripción |
|---------|-------------|
| `index.html` | Página principal con presentación |
| `sobre_mi.html` | Información detallada sobre Byron |
| `contacto.php` | Formulario de contacto funcional |
| `conexion.php` | Conexión a base de datos MySQL |
| `css/estilos.css` | Estilos personalizados y complementarios a Bootstrap |
| `js/script.js` | JavaScript para validación y animaciones |
| `README.md` | Documentación del proyecto (este archivo) |

---

## 🧪 Pruebas del Formulario

### Para Probar el Formulario de Contacto:

1. Accede a http://localhost/sitio_personal/contacto.php
2. Completa los campos:
   - **Nombre**: Ingresa un nombre con al menos 3 caracteres
   - **Correo**: Ingresa un email válido (ej: usuario@ejemplo.com)
   - **Mensaje**: Escribe un mensaje con al menos 10 caracteres
3. Haz clic en "Enviar Mensaje"
4. Deberás ver un mensaje de confirmación verde
5. Verifica en phpMyAdmin si el mensaje se guardó en la tabla `contactos`

### Validaciones que Prueba:
- ✅ Campo requerido (no puedes dejar en blanco)
- ✅ Mínimo de caracteres (Nombre: 3, Mensaje: 10)
- ✅ Formato de email válido
- ✅ Almacenamiento en base de datos

---

## 🌐 Despliegue en Hosting

### Para publicar en un hosting en línea:

1. **Comprime el proyecto**: Crea un archivo ZIP
2. **Sube al hosting**: Usa FTP o el panel del hosting
3. **Crea la base de datos**: Usa phpMyAdmin en el panel del hosting
4. **Configura conexion.php**: Actualiza con los datos del hosting
5. **Accede a tu sitio**: http://tucorreo.dominio.com/sitio_personal/

### Hosting Recomendado (Gratuito):
- 🔗 **000webhost**: https://www.000webhost.com/
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

**Última Actualización**: Enero 2026  
**Estado**: ✅ Completo y Funcional

