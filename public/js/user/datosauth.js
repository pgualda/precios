import { getOpcionesEscuela } from './cargarEscuelas.js';

// ==================    Valida a medida que va escribiendo el usuario    ==================
document.addEventListener("DOMContentLoaded", function () {

    // if (document.getElementById('alerta-errores') != null) {
    //     document.getElementById('cerrar_alert').addEventListener('click', function () {
    //         document.getElementById('alerta-errores').classList.add('d-none');
    //     })
    // }

    getOpcionesEscuela();
});

