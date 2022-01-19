<?php

namespace App;

use App\Models\Course;
use App\Models\Permission;
use App\Models\Preference;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\elementType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/many-to-many', function () {
    // Criando as permissoes
    // dd(Permission::create(['name' => 'menu_03']));

    // Filtrando as permissoes
    $user = User::with('permissions')->find(1);

    dd($user);
});

Route::get('/one-to-many', function () {
    //Criando um curso

    // $course = Course::create(['name' => 'Curso de laravel 8']);

    // Listando o curso

    // $course = Course::first();

    // Para trazer os relacioamentos na consulta dos modulos e das liçoes
    $course = Course::with('modules.lessons')->first();

    // criando um modulo para um curso.

    // $data = [
    //     'name' => 'Módulo x2'
    // ];
    // $course->modules()->create($data);

    // Exemplo de consulta para trazer as informações do array

    echo $course->name;
    echo '<br>';
    foreach ($course->modules as $module) {
        echo "Módulo {$module->name} <br>";

        foreach ($module->lessons as $lesson) {
            echo "Aulas {$lesson->name} <br>";
        }
    }

    $modules = $course->modules;

    // dd($modules);
    dd($course);
});

Route::get('/one-to-one', function () {
    // $user = User::first();
    // Dessa forma já vai trazer o relacionamento
    $user = User::with('preference')->find(7);
    // $users = User::get();

    $data = [
        'background_color' => '#fff',
    ];

    if ($user->preference) {
        $user->preference->update($data);
    } else {
        // $user->preference()->create($data);
        $preference = new Preference($data);

        $user->preference()->save($preference);
    }

    $user->refresh();
    var_dump($user->preference);

    $user->preference->delete();
    $user->refresh();

    dd($user->preference, $user->id);
});

Route::get('/', function () {
    return view('welcome');
});
