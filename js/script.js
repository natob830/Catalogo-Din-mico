/**
 * Script JavaScript para el sitio personal
 * Byron V. Ñato - Sitio Académico
 */

// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    console.log('Sitio de Byron V. Ñato cargado exitosamente');
    
    // Animación de entrada suave para los elementos
    animarElementos();
    
    // Validación adicional del formulario de contacto
    validarFormularioContacto();
});

/**
 * Animar elementos cuando se cargan en la pantalla
 */
function animarElementos() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Observar todas las tarjetas
    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });

    // Observar secciones
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
}

/**
 * Validación mejorada del formulario de contacto
 */
function validarFormularioContacto() {
    const formulario = document.getElementById('formularioContacto');
    
    if (!formulario) return;

    const campoNombre = document.getElementById('nombre');
    const campoCorreo = document.getElementById('correo');
    const campoMensaje = document.getElementById('mensaje');

    // Validación en tiempo real - Nombre
    if (campoNombre) {
        campoNombre.addEventListener('blur', function() {
            validarNombre(this);
        });
        
        campoNombre.addEventListener('input', function() {
            // Solo permitir letras y espacios
            this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
            mostrarEstadoInput(this);
        });
    }

    // Validación en tiempo real - Correo
    if (campoCorreo) {
        campoCorreo.addEventListener('blur', function() {
            validarCorreo(this);
        });
        
        campoCorreo.addEventListener('input', function() {
            mostrarEstadoInput(this);
        });
    }

    // Validación en tiempo real - Mensaje
    if (campoMensaje) {
        campoMensaje.addEventListener('blur', function() {
            validarMensaje(this);
        });
        
        campoMensaje.addEventListener('input', function() {
            mostrarEstadoInput(this);
        });
    }

    // Validación al enviar el formulario
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let formularioValido = true;

        // Validar todos los campos
        if (campoNombre) {
            if (!validarNombre(campoNombre)) {
                formularioValido = false;
            }
        }

        if (campoCorreo) {
            if (!validarCorreo(campoCorreo)) {
                formularioValido = false;
            }
        }

        if (campoMensaje) {
            if (!validarMensaje(campoMensaje)) {
                formularioValido = false;
            }
        }

        if (formularioValido) {
            formulario.submit();
        } else {
            console.log('Formulario contiene errores');
        }
    });
}

/**
 * Validar campo nombre
 */
function validarNombre(input) {
    const nombre = input.value.trim();
    const regexNombre = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;

    let esValido = true;

    if (nombre === '') {
        mostrarError(input, 'El nombre es requerido');
        esValido = false;
    } else if (nombre.length < 3) {
        mostrarError(input, 'El nombre debe tener al menos 3 caracteres');
        esValido = false;
    } else if (nombre.length > 100) {
        mostrarError(input, 'El nombre no puede exceder 100 caracteres');
        esValido = false;
    } else if (!regexNombre.test(nombre)) {
        mostrarError(input, 'El nombre solo debe contener letras y espacios (sin números)');
        esValido = false;
    } else {
        mostrarExito(input, 'Nombre válido');
    }

    return esValido;
}

/**
 * Validar campo correo
 */
function validarCorreo(input) {
    const correo = input.value.trim();
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let esValido = true;

    if (correo === '') {
        mostrarError(input, 'El correo es requerido');
        esValido = false;
    } else if (!regexCorreo.test(correo)) {
        mostrarError(input, 'Formato de correo inválido (ejemplo: usuario@dominio.com)');
        esValido = false;
    } else if (correo.length > 100) {
        mostrarError(input, 'El correo no puede exceder 100 caracteres');
        esValido = false;
    } else {
        mostrarExito(input, 'Correo válido');
    }

    return esValido;
}

/**
 * Validar campo mensaje
 */
function validarMensaje(input) {
    const mensaje = input.value.trim();

    let esValido = true;

    if (mensaje === '') {
        mostrarError(input, 'El mensaje es requerido');
        esValido = false;
    } else if (mensaje.length < 10) {
        mostrarError(input, 'El mensaje debe tener al menos 10 caracteres');
        esValido = false;
    } else if (mensaje.length > 5000) {
        mostrarError(input, 'El mensaje no puede exceder 5000 caracteres');
        esValido = false;
    } else {
        mostrarExito(input, 'Mensaje válido');
    }

    return esValido;
}

/**
 * Mostrar mensaje de error
 */
function mostrarError(input, mensaje) {
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
    
    let feedback = input.nextElementSibling;
    if (feedback && feedback.classList.contains('invalid-feedback')) {
        feedback.textContent = mensaje;
    } else {
        feedback = document.createElement('div');
        feedback.className = 'invalid-feedback d-block';
        feedback.textContent = mensaje;
        input.parentNode.insertBefore(feedback, input.nextSibling);
    }
}

/**
 * Mostrar mensaje de éxito
 */
function mostrarExito(input, mensaje) {
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
    
    let feedback = input.nextElementSibling;
    if (feedback && feedback.classList.contains('valid-feedback')) {
        feedback.textContent = mensaje;
    } else {
        // Solo mostrar feedback de éxito si es necesario
        feedback = input.nextElementSibling;
        if (feedback && feedback.classList.contains('form-text')) {
            // No cambiar el feedback de ayuda
        }
    }
}

/**
 * Mostrar estado del input en tiempo real
 */
function mostrarEstadoInput(input) {
    if (input.id === 'nombre') {
        if (input.value.trim().length > 0) {
            validarNombre(input);
        }
    } else if (input.id === 'correo') {
        if (input.value.trim().length > 0) {
            validarCorreo(input);
        }
    } else if (input.id === 'mensaje') {
        if (input.value.trim().length > 0) {
            validarMensaje(input);
        }
    }
}

    // Agregar evento de envío
    formulario.addEventListener('submit', function(e) {
        // La validación HTML5 es suficiente, pero podemos agregar lógica adicional
        const nombre = document.getElementById('nombre').value.trim();
        const correo = document.getElementById('correo').value.trim();
        const mensaje = document.getElementById('mensaje').value.trim();

        // Validación adicional
        if (nombre.length < 3) {
            mostrarError('El nombre debe tener al menos 3 caracteres');
            e.preventDefault();
            return false;
        }

        if (!validarEmail(correo)) {
            mostrarError('Por favor, ingresa un correo válido');
            e.preventDefault();
            return false;
        }

        if (mensaje.length < 10) {
            mostrarError('El mensaje debe tener al menos 10 caracteres');
            e.preventDefault();
            return false;
        }

        // Si todo está bien, el formulario se envía normalmente
        mostrarCarga(true);
    });

    // Eventos de enfoque para mejor UX
    const inputs = formulario.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('has-focus');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('has-focus');
        });
    });
}

/**
 * Validar formato de email
 */
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

/**
 * Mostrar mensaje de error personalizado
 */
function mostrarError(mensaje) {
    // Crear alerta de error
    const alerta = document.createElement('div');
    alerta.className = 'alert alert-danger alert-dismissible fade show mt-3';
    alerta.role = 'alert';
    alerta.innerHTML = `
        <i class="fas fa-exclamation-circle me-2"></i>
        <strong>Error:</strong> ${mensaje}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    // Insertar alerta al principio del formulario
    const formulario = document.getElementById('formularioContacto');
    formulario.parentElement.insertBefore(alerta, formulario);

    // Auto-cerrar después de 5 segundos
    setTimeout(() => {
        alerta.remove();
    }, 5000);
}

/**
 * Mostrar indicador de carga
 */
function mostrarCarga(mostrar) {
    const boton = document.querySelector('button[type="submit"]');
    
    if (mostrar && boton) {
        boton.disabled = true;
        boton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
    }
}

/**
 * Scroll suave para los enlaces internos
 */
document.querySelectorAll('a[href^="#"]').forEach(enlace => {
    enlace.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            const elemento = document.querySelector(href);
            elemento.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

/**
 * Detectar modo oscuro del sistema (opcional)
 */
function detectarModoOscuro() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // El usuario prefiere modo oscuro, pero nuestro sitio usa un esquema claro
        console.log('Preferencia de modo oscuro detectada');
    }
}

// Llamar al detectar modo oscuro cuando el documento esté listo
detectarModoOscuro();

/**
 * Estadísticas y tracking (opcional para desarrollo)
 */
function registrarEstadisticas() {
    console.log('Usuario visitó:', window.location.pathname);
    console.log('Tiempo:', new Date().toLocaleTimeString('es-ES'));
}

// Registrar cuando el usuario visita la página
window.addEventListener('load', registrarEstadisticas);
