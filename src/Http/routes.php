<?php

use Illuminate\Support\Facades\Route;

/*-------------------------------- Rutas vistas ------------------------------*/

Route::redirect('/ayuda', '/help', 301)->name('ayuda');
Route::get('/help', 'HelpCenterController@index')->name('help_center');

/*------------------------------------------------------------------------*/
