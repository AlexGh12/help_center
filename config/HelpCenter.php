<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Help Center Interruptor maestro
    |--------------------------------------------------------------------------
    |
	| Esta opción se puede utilizar para desactivar las vistas del centro de ayuda
	| independientemente de su configuración individual, que simplemente proporciona un único
	| y una manera conveniente de habilitar o deshabilitar el almacenamiento de datos de Help Center.
    |
    */

	'enabled' => env('HELP_CENTER_ENABLED', true),

	/*
    |--------------------------------------------------------------------------
    | Help Center Ruta de las vistas
    |--------------------------------------------------------------------------
    |
    | Esta es la ruta es donde se encuentran los archivos de documentación
    | en formato markdown y que se mostrarán en la página de ayuda.
    |
    */

	'path_views' => env('HELP_CENTER_PATH_VIEWS', 'HelpCenter'),

	/*
    |--------------------------------------------------------------------------
    | Help Center Path
    |--------------------------------------------------------------------------
    |
    | Esta es la ruta es donde se encuentran los archivos de documentación
    | en formato markdown y que se mostrarán en la página de ayuda.
    |
    */

	'path_docs' => env('HELP_CENTER_PATH_DOCS', 'resources/docs/'),

	/*
    |--------------------------------------------------------------------------
    | Help Center Archivo por defecto
    |--------------------------------------------------------------------------
    |
    | Este es el archivo markdown que se mostrará cuando se acceda
    | a la raíz del centro de ayuda sin especificar un documento.
    |
    */

	'default_file' => env('HELP_CENTER_DEFAULT_FILE', 'introduction.md'),

	/*
    |--------------------------------------------------------------------------
    | Help Center Autenticación
    |--------------------------------------------------------------------------
    |
    | Esta opción permite proteger el centro de ayuda con autenticación.
    | Si se establece en true, los usuarios deberán iniciar sesión
    | para acceder a la documentación.
    |
    */

	'auth' => env('HELP_CENTER_AUTH', false),

];
