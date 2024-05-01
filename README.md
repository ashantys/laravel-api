# Aplicación de Notas Personales

Esta aplicación es una **API** que permite a los usuarios realizar operaciones **CRUD** (Crear, Leer, Actualizar y Eliminar) en notas personales. Cada nota tiene los siguientes atributos:

- **Título**: El título de la nota.
- **Autor**: El nombre del autor o creador de la nota.
- **Fecha y Hora**: La fecha y hora en que se creó o modificó la nota.
- **Cuerpo de la Nota**: El contenido principal de la nota.
- **Clasificación**: Una categoría que puede ser personal, laboral, escolar u otras.

## Características Principales

1. **Operaciones CRUD**: La API admite las siguientes operaciones:
   - **Crear**: Permite a los usuarios agregar nuevas notas.
   - **Leer**: Permite a los usuarios consultar notas existentes.
   - **Actualizar**: Permite a los usuarios modificar el contenido de una nota.
   - **Eliminar**: Permite a los usuarios borrar una nota.

2. **Interfaz de API**: Todas las solicitudes se manejan a través de una interfaz de API. Los usuarios pueden enviar solicitudes HTTP (como GET, POST, PUT y DELETE) para interactuar con las notas.

3. **Persistencia de Datos**: La aplicación almacena las notas en una base de datos o en algún otro sistema de almacenamiento persistente.

## Diagrama ER
!ERACT14.jpeg