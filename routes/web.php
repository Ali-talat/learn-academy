<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

Route::namespace('front')->group(function () {
    Route::get('home', 'homeController@index')->name('home.page');
    Route::get('contact', 'contactController@index')->name('contact');
    Route::get('courses/cat/{id}', 'CoursesController@showCat')->name('cats.page');
    Route::get('courses/cat/{id}/show_course/{c_id}', 'CoursesController@showCourse')->name('course.page');
    Route::post('message/newsletter', 'messageController@newsletter')->name('front.message.newsletter');
    Route::post('message/contact', 'messageController@contact')->name('front.message.contact');
    Route::post('message/enroll', 'messageController@enroll')->name('front.message.enroll');
});

Route::namespace('admin')->prefix('admin')->group(function(){
    Route::get('/login', 'loginController@login')->name('admin.login');
    Route::post('/doLogin', 'loginController@doLogin')->name('admin.doLogin');


    Route::middleware('adminAuth:admin')->group(function () {
        Route::get('/logout', 'loginController@logout')->name('admin.logout');
        Route::get('/home', 'homeController@index')->name('admin.home');
        Route::get('/all-cats', 'catsController@index')->name('admin.all.cats');
        Route::get('/cats/create', 'catsController@create')->name('admin.cats.create');
        Route::post('/cats/store', 'catsController@store')->name('admin.cats.store');
        Route::get('/cats/edit/{id}', 'catsController@edit')->name('admin.cats.edit');
        Route::post('/cats/update/{id}', 'catsController@update')->name('admin.cats.update');
        Route::get('/cats/delete/{id}', 'catsController@delete')->name('admin.cats.delete');


        // trainer routes
        Route::get('/all-trainer', 'trainerController@index')->name('admin.all.trainer');
        Route::get('/trainer/create', 'trainerController@create')->name('admin.trainer.create');
        Route::post('/trainer/store', 'trainerController@store')->name('admin.trainer.store');
        Route::get('/trainer/edit/{id}', 'trainerController@edit')->name('admin.trainer.edit');
        Route::post('/trainer/update/{id}', 'trainerController@update')->name('admin.trainer.update');
        Route::get('/trainer/delete/{id}', 'trainerController@delete')->name('admin.trainer.delete');


        // course routes
        
        Route::get('/all-course', 'courseController@index')->name('admin.all.course');
        Route::get('/course/create', 'courseController@create')->name('admin.course.create');
        Route::post('/course/store', 'courseController@store')->name('admin.course.store');
        Route::get('/course/edit/{id}', 'courseController@edit')->name('admin.course.edit');
        Route::post('/course/update/{id}', 'courseController@update')->name('admin.course.update');
        Route::get('/course/delete/{id}', 'courseController@delete')->name('admin.course.delete');



         // student routes
        
         Route::get('/all-student', 'studentController@index')->name('admin.all.student');
         Route::get('/student/create', 'studentController@create')->name('admin.student.create');
         Route::post('/student/store', 'studentController@store')->name('admin.student.store');
         Route::get('/student/edit/{id}', 'studentController@edit')->name('admin.student.edit');
         Route::post('/student/update/{id}', 'studentController@update')->name('admin.student.update');
         Route::get('/student/delete/{id}', 'studentController@delete')->name('admin.student.delete');
         Route::get('/student/show/{id}', 'studentController@show')->name('admin.student.show');
         Route::get('/student/{id}/course/{c_id}/approve', 'studentController@approve')->name('admin.student.approve');
         Route::get('/student/{id}/course/{c_id}/reject', 'studentController@reject')->name('admin.student.reject');
         Route::get('/student/{id}/addCourse', 'studentController@addCourse')->name('admin.student.addCourse');
         Route::post('/student/{id}/storeCourse', 'studentController@storeCourse')->name('admin.student.storeCourse');

    });
        
    
    
});
    