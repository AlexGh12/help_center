# Registro de Cambios

Todos los cambios notables de este paquete serán documentados en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/),
y este proyecto adhiere a [Versionado Semántico](https://semver.org/spec/v2.0.0.html).

## [1.1.0] - 2026-03-23

### Agregado

- Sistema de documentación por rol de usuario
- Nueva opción de configuración `role_column` para especificar columna de rol en tabla users
- Nueva opción de configuración `role_paths` para definir rutas de documentación por rol
- Directorio `public/` para documentación de usuarios no autenticados
- Directorio `auth/{rol}/` para documentación específica por rol autenticado
- Fallback automático a `public/` cuando el directorio del rol no existe

### Compatibilidad

| Requisito         | Versión            |
| ----------------- | ------------------ |
| PHP               | `^7.4`             |
| Laravel           | `^6.0\|^7.0\|^8.0` |
| league/commonmark | `^1.0`             |

### Opciones de Configuración

| Clave          | Descripción                                           | Valor por defecto |
| -------------- | ----------------------------------------------------- | ----------------- |
| `enabled`      | Activar/desactivar el centro de ayuda                | `true`            |
| `path_views`   | Prefijo de URL para las rutas                         | `help-center`     |
| `path_docs`    | Ruta a los archivos de documentación                  | `resources/docs/` |
| `default_file` | Archivo predeterminado a mostrar                      | `introduction.md` |
| `auth`         | Requerir autenticación                                | `false`           |
| `role_column`  | Columna de la tabla users para el rol                | `null`            |
| `role_paths`   | Array asociativo rol => directorio de documentación | `null`            |

### Variables de Entorno

| Variable                   | Clave de configuración | Descripción                                           |
| -------------------------- | ---------------------- | ----------------------------------------------------- |
| `HELP_CENTER_ENABLED`      | `enabled`              | Activar/desactivar el centro de ayuda                |
| `HELP_CENTER_PATH_VIEWS`  | `path_views`           | Prefijo de URL para las rutas                         |
| `HELP_CENTER_PATH_DOCS`   | `path_docs`            | Ruta a los archivos de documentación                  |
| `HELP_CENTER_DEFAULT_FILE`| `default_file`         | Archivo predeterminado a mostrar                      |
| `HELP_CENTER_AUTH`        | `auth`                 | Requerir autenticación                                |
| `HELP_CENTER_ROLE_COLUMN`  | `role_column`          | Columna de rol en tabla users                         |
| `HELP_CENTER_ROLE_PATHS`  | `role_paths`           | Array JSON rol => directorio (ej: `{"admin":"auth/admin"}`) |

## [1.0.0] - 2026-03-23

### Agregado

- Lanzamiento inicial
- Generación de página del centro de ayuda desde archivos `.md`
- Estructura de árbol de navegación desde el directorio `resources/docs/`
- Renderizado de Markdown con CommonMark y extensión de tablas
- Configuración a través de `config/HelpCenter.php`
- Publicación de vendor para configuración y documentación de ejemplo
- Soporte de middleware de autenticación
- Estilos con Bootstrap 5
- Prism.js para resaltado de sintaxis de código
- Mermaid.js para renderizado de diagramas

### Compatibilidad

| Requisito         | Versión            |
| ----------------- | ------------------ |
| PHP               | `^7.4`             |
| Laravel           | `^6.0\|^7.0\|^8.0` |
| league/commonmark | `^1.0`             |

### Opciones de Configuración

| Clave          | Descripción                           | Valor por defecto |
| -------------- | ------------------------------------- | ----------------- |
| `enabled`      | Activar/desactivar el centro de ayuda | `true`            |
| `path_views`   | Prefijo de URL para las rutas         | `help-center`     |
| `path_docs`    | Ruta a los archivos de documentación  | `resources/docs/` |
| `default_file` | Archivo predeterminado a mostrar      | `introduction.md` |
| `auth`         | Requerir autenticación                | `false`           |

### Variables de Entorno

| Variable                   | Clave de configuración | Descripción                           |
| -------------------------- | ---------------------- | ------------------------------------- |
| `HELP_CENTER_ENABLED`      | `enabled`              | Activar/desactivar el centro de ayuda |
| `HELP_CENTER_PATH_VIEWS`   | `path_views`           | Prefijo de URL para las rutas         |
| `HELP_CENTER_PATH_DOCS`    | `path_docs`            | Ruta a los archivos de documentación  |
| `HELP_CENTER_DEFAULT_FILE` | `default_file`         | Archivo predeterminado a mostrar      |
| `HELP_CENTER_AUTH`         | `auth`                 | Requerir autenticación                |
