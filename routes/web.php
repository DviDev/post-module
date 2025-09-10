<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Post\Models\PostModel;
use Modules\Project\Services\DynamicRoutes;

DynamicRoutes::all('Post');

Route::prefix('post')->group(function () {
    Route::get('/form/{model}', fn (PostModel $model) => view('view::components.form.dynamicform', compact('model')))
        ->name('admin.post.edit');

});
