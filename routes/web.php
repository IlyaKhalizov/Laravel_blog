<?php

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'admin'], function (){

    Route::get('/admin', function() {
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
        'show'=>'admin.users.show',
    ]]);

    Route::get('/post/{id}', ['uses' => 'AdminPostsController@post', 'as' => 'home.post']);

    Route::resource('admin/posts', 'AdminPostsController', ['names'=>[
        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
        'show'=>'admin.posts.show',
    ]]);
    Route::resource('admin/categories', 'AdminCategoriesController', ['names'=>[
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        'show'=>'admin.categories.show',
    ]]);
    Route::resource('admin/media', 'AdminMediasController', ['names'=>[
        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit',
        'show'=>'admin.media.show',
    ]]);
    Route::resource('admin/comments', 'PostsCommentsController', ['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show',
    ]]);
    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names'=>[
        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit'=>'admin.replies.edit',
        'show'=>'admin.comment.replies.show',
    ]]);
});

Route::group(['middleware' => 'auth'], function (){
    Route::post('comments/reply', 'CommentRepliesController@createReply');
});