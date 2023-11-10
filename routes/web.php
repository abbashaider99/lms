<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


    //--- LOGIN AND REGISTER
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/register-Post', 'registerPost')->name('register.user');
    Route::post('/login-auth', 'loginAuth')->name('login.auth');
});

    //--- AUTH MIDDLEWARE ---
Route::group(['middleware' => ['auth']], function(){

    //Home
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/list-users', [UsersController::class, 'userList'])->name('users.view');

    //--- STUDENTS CONTROLLER ---
Route::controller(StudentsController::class)->group(function(){

    Route::get('/list-students', 'studentList')->name('students.view');
    Route::get('/delete-student/{id}', 'deleteStudent');
    Route::get('/edit-student/{id}', 'editStudent')->name('edit.student');
    Route::get('/add-student', 'addStudentView')->name('add.student');
    Route::post('/add-studentPost', 'addStudentPost');
    Route::post('/edit-studentPost/{id}', 'editStudentPost')->name('edit.studentPost');

    //Email Notifications
    Route::get('/email-notify', 'emailNotify')->name('email-notify');
});

    //--- BOOKS CONTROLLER ---
Route::controller(BooksController::class)->group(function(){

    //Category
    Route::get('/add-category', 'addCategoryView')->name('add.category');
    Route::post('/add.categorytPost', 'addCategoryPost')->name('add.categoryPost');
    Route::get('/list-categories', 'categoryList')->name('category.view');
    Route::get('/edit-category/{id}', 'editCategory')->name('edit.category');
    Route::post('/edit.categorytPost/{id}', 'editCategoryPost')->name('edit.categoryPost');
    Route::get('/delete-category/{id}', 'deleteCategory')->name('delete.category');

    //Books
    Route::get('/list-book', 'booksList')->name('books.view');
    Route::get('/add-book', 'addBookView')->name('add.book');
    Route::post('/add-bookPost', 'addBookPost')->name('add.bookPost');
    Route::get('/delete-book/{id}', 'deleteBook')->name('delete.book');

    //Checkout
    Route::get('/checkout-book', 'checkoutBookForm')->name('checkout.bookForm');
    Route::post('/checkout-bookSearch', 'checkoutBookSearch');
    Route::get('/get-books', 'getBook');
    Route::post('/issue-bookPost', 'issuebookPost');
    Route::get('/return-book/{id}', 'returnBook');

});


    //--- USER CONTROLLER
Route::controller(UsersController::class)->group(function(){

        Route::get('/profile', 'showProfile')->name('profile');
        Route::post('/update-password', 'updatePassword')->name('update.password');
        Route::post('/update-info', 'updateInfo')->name('update.info');
        Route::get('/list-user', 'listUser')->name('list.user');
        Route::get('/edit-user/{id}', 'editUser')->name('edit.user');
        Route::get('/delete-user/{id}', 'deleteUser')->name('delete.user');
        Route::get('/add-user', 'addUser')->name('add.user');
        // Route::post('/store-user', 'storeUser')->name('store.user');

            //Settings
        Route::get('/settings', 'settings')->name('settings');
        Route::post('/save-settings', 'updateSettings');

});

Route::post('/storeuser', [UsersController::class, 'storeUser'])->name('storeuser');
Route::get('/update-userTable', [UsersController::class, 'updateUserTable'])->name('update.userTable');
Route::get('user-destroy/{id}', [UsersController::class, 'userDestroy']);


    //- EMAIL NOTIFICATIONS



});



