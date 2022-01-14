<?php

namespace App;

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
