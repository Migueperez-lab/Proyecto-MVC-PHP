# Proyecto de 11 aplicaciones web con arquitectura MVC (PHP)

## Descripción
Este proyecto reúne los 11 ejercicios del documento de clase en una sola aplicación web. Cada ejercicio tiene su controlador, modelo de datos y vista. Se utiliza PHP nativo, HTML, CSS y JavaScript, sin frameworks ni dependencias externas.

## Requisitos
- PHP 8.0 o superior.
- Navegador web actualizado.
- Permiso de escritura en la carpeta `storage` (para guardar los datos JSON).

## Cómo ejecutar
1. Descomprime la carpeta `Proyecto_MVC_PHP`.
2. Abre una terminal dentro de esa carpeta.
3. Ejecuta: `php -S localhost:8000 -t public`
4. Abre `http://localhost:8000` en el navegador.

Los registros se guardan automáticamente en archivos JSON dentro de `storage`; no se necesita configurar MySQL.

## Estructura MVC
- `app/Models/`: clases de acceso y almacenamiento de datos de cada ejercicio.
- `app/Views/`: interfaces HTML que muestran la información y los formularios.
- `app/Controllers/`: reciben las acciones del usuario, validan los datos y coordinan el modelo y la vista.
- `app/Core/`: clase base de modelo, controlador y enrutador principal.
- `public/`: punto de entrada web y archivos CSS/JavaScript.
- `storage/`: archivos JSON donde persisten los registros.

## Los 11 ejercicios incluidos
1. **Lista de tareas:** crear, eliminar y marcar como completadas.
2. **Calculadora de propinas:** calcular propina, total y valor por persona.
3. **Generador de contraseñas:** longitud configurable y selección de minúsculas, mayúsculas, números y símbolos. Usa `random_int()` de PHP.
4. **Gestor de gastos:** registrar, categorizar y resumir gastos por mes.
5. **Sistema de reservas:** registrar citas y evitar dos reservas para la misma fecha y hora.
6. **Gestor de notas:** crear, eliminar, categorizar y buscar notas.
7. **Calendario de eventos:** agregar, editar y eliminar eventos ordenados por fecha.
8. **Plataforma de recetas:** guardar recetas, filtrar por categoría o ingredientes y compartir el enlace.
9. **Juego de memoria:** emparejar 8 parejas y contar movimientos.
10. **Plataforma de encuestas:** crear encuestas de dos opciones, votar y consultar resultados.
11. **Cronómetro online:** iniciar, pausar, continuar, reiniciar y registrar vueltas.

## Observación académica
La persistencia se realiza en archivos JSON para que el proyecto sea sencillo de ejecutar en un entorno de clase sin instalar ni configurar un servidor de base de datos. La separación MVC se conserva: el modelo administra los datos, el controlador procesa las acciones y la vista presenta la interfaz.
