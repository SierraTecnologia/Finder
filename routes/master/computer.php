<?php

Route::resource('/computerfiles', 'ComputerFileController')->parameters([
    'computerfiles' => 'id'
]);
