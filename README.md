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

Centro de ayuda, genera una pagina web para mostrar los articulos de ayuda y/o documentación, leyendo los archivos .md de la carpeta resources/docs

## Instalación

Ejecutar en la consola:

```bash
composer require AlexGh12/help_center
```

Despues agregar en `config/app.php`

```php
'providers' => ServiceProvider::defaultProviders()->merge([
	/* ... */
	AlexGh12\HelpCenter\HelpCenterServiceProvider::class,
	/* ... */
])->toArray(),
```

## Uso

Solo hay agregar los archivos .md en la carpeta resources/docs/ y se mostrarán en la página de ayuda.
el paquete se encarga de leer los archivos .md y mostrarlos en la página de ayuda ademas de tomar la estructura de carpetas para generar un menu lateral.

## Licencia

AlexGh12 es de codigo abierto software con licencia [MIT](LICENSE.md).
