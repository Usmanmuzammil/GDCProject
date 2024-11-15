<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DesginationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('webiste.home');
// });
// Route::get('/about',function() {
//     return view('webiste.about');
// });
// Route::get('/courses',function() {
//     return view('webiste.courses');
// });
// Route::get('/teachers',function() {
//     return view('webiste.teachers');
// });
Route::get('/blog',function() {
    return view('webiste.blog');
});
// Route::get('/contact',function() {
//     return view('webiste.contact');
// });

Route::controller(WebController::class)->group(function () {
    Route::get('/','home');
    Route::get('/teachers','getTeachers');
    Route::get('/about','getAbout');
    Route::get('/courses','getCourses');
    Route::get('/contact','getContact');
});

Route::controller(UserController::class)->group(function() {
    Route::post('/user/store','store');
});

// Route::controller(ContactController::class)->group(function () {
//     Route::post('/cantact/store','store');
// })

// admin Site

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::POST('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::prefix('/admin')->middleware('auth:admin')->group(function() {
    Route::POST('/logout',[LoginController::class,'Logout'])->name('logout');

    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard.page');
    Route::get('/profile_update/view', [LoginController::class, 'profile_update_view']);
    Route::post('/update_profile',[LoginController::class , 'update_profile'])->name('update_profile');

    // User
    Route::get('/user',[UserController::class, 'index'])->name('users.index');

    // Teacher
    Route::get('teacher', [TeacherController::class,'index'])->name('teachers.index');
    Route::post('/teacher/store',[TeacherController::class,'store']);
    Route::delete('/teacher/delete{id}',[TeacherController::class,'destroy'])->name('teacher.destroy');

    // Desgination
    Route::get('desgination',[DesginationController::class,'index']);

    // Banner
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner','index')->name('banner.index');
        Route::post('/banner/store','store');
        Route::delete('/banner/destroy/{id}','destroy')->name('banner.destroy');
    });

    // About Controller
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about','index')->name('about.index');
        Route::post('/about/store','store');
    });

      // Course Controller
      Route::controller(CourseController::class)->group(function () {
        Route::get('/course','index')->name('course.index');
        Route::post('/course/store','store');
        Route::delete('/course/destroy/{id}','destroy')->name('course.destroy');
    });

    // Blog Controller 
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog','index')->name('blog.index');
        Route::post('/blog/store','store');
        Route::delete('/blog/destroy/{id}','destroy')->name('blog.destroy');
    });

    // User Details
    Route::get('/teacher/details/{id}',[UserController::class,'teacherDetails']);

    // Setting Routes
    Route::get('/settings', [SettingController::class, 'settings']);
    Route::post('/update_setting', [SettingController::class, 'update_settings'])->name('update_setting');

});
