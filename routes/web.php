<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/quem-sou', function () {
    return view('pages.quem-sou');
})->name('quem-sou');

Route::get('/consultoria', function () {
    return view('pages.consultoria');
})->name('consultoria');

Route::get('/mentoria', function () {
    return view('pages.mentoria');
})->name('mentoria');

Route::get('/cursos', function () {
    return view('pages.cursos');
})->name('cursos');

Route::get('/contato', function () {
    return view('pages.contato');
})->name('contato');