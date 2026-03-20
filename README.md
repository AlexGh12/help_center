<p align="center"><img src="art/logo.svg" alt="Logo Alex Gh"></p>

<p align="center">
    <a href="https://packagist.org/packages/alexgh12/help_center">
        <img src="https://img.shields.io/packagist/dt/alexgh12/help_center" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/alexgh12/help_center">
        <img src="https://img.shields.io/packagist/v/alexgh12/help_center" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/alexgh12/help_center">
        <img src="https://img.shields.io/packagist/l/alexgh12/help_center" alt="License">
    </a>
</p>

# Introducción

Centro de ayuda para Laravel que genera una página web para mostrar artículos de ayuda y/o documentación, leyendo archivos `.md` desde la carpeta `resources/docs`.

## Requisitos

- PHP 7.4+ u 8.0+
- Laravel 7.0+, 8.37+, 9.0+, 10.0+, 11.0+, 12.0+ o 13.0+
- Composer

## Instalación

1. Ejecuta el siguiente comando en tu terminal:

```bash
composer require alexgh12/help_center
```

2. El paquete se auto-registra gracias a Laravel Package Auto-Discovery. No necesitas agregar el Service Provider manualmente.

3. (Opcional) Publica los archivos de configuración y documentación de ejemplo:

```bash
# Publicar configuración
php artisan vendor:publish --tag=help-center-config

# Publicar documentación de ejemplo
php artisan vendor:publish --tag=help-center-docs
```

## Configuración

### Archivo de configuración

Después de publicar la configuración, puedes modificar `config/HelpCenter.php`:

```php
<?php

return [
    'enabled' => env('HELP_CENTER_ENABLED', true),
    'path_views' => env('HELP_CENTER_PATH_VIEWS', 'help-center'),
    'path_docs' => env('HELP_CENTER_PATH_DOCS', 'resources/docs/'),
    'default_file' => env('HELP_CENTER_DEFAULT_FILE', 'introduction.md'),
    'auth' => env('HELP_CENTER_AUTH', false),
];
```

### Opciones disponibles

| Opción | Descripción | Valor por defecto |
|--------|-------------|-------------------|
| `enabled` | Activa o desactiva el centro de ayuda | `true` |
| `path_views` | Prefijo de la ruta URL para acceder al help center | `help-center` |
| `path_docs` | Ruta relativa a los archivos de documentación (.md) | `resources/docs/` |
| `default_file` | Archivo markdown que se muestra por defecto | `introduction.md` |
| `auth` | Requiere autenticación para acceder | `false` |

### Variables de entorno

Puedes configurar todas las opciones usando variables de entorno en tu archivo `.env`:

```env
HELP_CENTER_ENABLED=true
HELP_CENTER_PATH_VIEWS=help-center
HELP_CENTER_PATH_DOCS=resources/docs/
HELP_CENTER_DEFAULT_FILE=introduction.md
HELP_CENTER_AUTH=false
```

## Publicar archivos

El paquete proporciona los siguientes tags de publicación:

```bash
# Publicar configuración
php artisan vendor:publish --tag=help-center-config

# Publicar documentación de ejemplo
php artisan vendor:publish --tag=help-center-docs

# Publicar ambos
php artisan vendor:publish --tag=help-center-config --tag=help-center-docs
```

## Uso

### Estructura de documentos

Crea archivos `.md` en la carpeta `resources/docs/`. La estructura de carpetas se refleja automáticamente en el menú lateral.

Ejemplo de estructura:

```
resources/docs/
├── introduction.md
├── getting-started/
│   ├── installation.md
│   └── configuration.md
└── api/
    ├── documentation.md
    └── reference.md
```

### URL de acceso

Por defecto, el help center está disponible en `/help-center`.

### Características de Markdown

El paquete soporta:

- Encabezados (h1-h6)
- Listas (ordenadas y desordenadas)
- Código con resaltado de sintaxis (usando Prism.js)
- Tablas
- Blockquotes
- Diagramas Mermaid
- Imágenes
- Links

### Ejemplo de documento

```markdown
# Título del artículo

Este es un párrafo de ejemplo.

## Subtítulo

- Elemento 1
- Elemento 2

### Código

\`\`\`php
<?php

echo "Hola mundo";
\`\`\`

### Tabla

| Columna 1 | Columna 2 |
|-----------|-----------|
| Dato 1    | Dato 2    |
```

## Documentación de ejemplo

Después de ejecutar `php artisan vendor:publish --tag=help-center-docs`, tendrás la siguiente estructura de ejemplo:

```
resources/docs/
├── introduction.md
├── getting-started/
│   └── installation.md
├── authentication.md
├── api/
│   ├── documentation.md
│   └── reference.md
└── ejemplos.md
```

Puedes usar estos archivos como punto de partida para tu documentación.

## Licencia

AlexGh12 es software de código abierto bajo licencia [MIT](LICENSE.md).
