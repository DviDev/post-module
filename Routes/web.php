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
use Modules\Post\Models\PostCommentModel;
use Modules\Post\Models\PostModel;

Route::prefix('post')->group(function () {
    Route::view('/list', 'post::components.page.postlistpage')->name('admin.posts');
    Route::get('/{post}/comments',
        fn(PostModel $post) => view('post::components.page.postcommentpage', compact('post')))
            ->name('admin.post.comments');
    Route::get('/comment/{comment}/votes',
        fn(PostCommentModel $comment) => view('post::components.page.comment_votes_page', compact('comment')))
            ->name('admin.post.comment.votes');
    Route::get('/{post}/tags', fn(PostModel $post) => view('post::components.page.tags_page', compact('post')))
        ->name('admin.post.tags');
    Route::get('/{post}/votes', fn(PostModel $post) => view('post::components.page.votes_page', compact('post')))
        ->name('admin.post.votes');

    Route::get('/form/{post}', fn(PostModel $post) => view('post::components.page.postform', compact($post)))
        ->name('admin.post.form');
});
