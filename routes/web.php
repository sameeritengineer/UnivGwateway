<?php

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newhome', 'HomeController@newhome')->name('newhome');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group([
    'namespace'=>'Web',
    'as' => 'web.',
],function(){
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('student-signup', 'RegistrationController@signup')->name('student-signup');
   Route::post('student-signup','RegistrationController@store')->name('student-signup');
   Route::get('student-signin', 'RegistrationController@signin')->name('student-signin');
   Route::get('verifyotp', 'RegistrationController@verifyotp')->name('verifyotp');
   Route::post('verifyotp', 'RegistrationController@verifyotpcheck')->name('verifyotp');
   Route::get('resendotp', 'RegistrationController@resendotp')->name('resendotp');
   Route::get('student-profile', 'StudentController@index')->name('student-profile');
   Route::post('student-resume-headline', 'StudentController@resume_headline')->name('student-resume-headline');
   Route::post('student-profile-summary', 'StudentController@profile_summary')->name('student-profile-summary');
   Route::post('student-test-score', 'StudentController@test_score')->name('student-test-score');
   Route::post('student-skills', 'StudentController@skills')->name('student-skills');
   Route::post('student-aspiration', 'StudentController@aspiration')->name('student-aspiration');
   Route::post('student-personal', 'StudentController@personal')->name('student-personal');
   Route::post('student-education', 'StudentController@education')->name('student-education');
   Route::post('student-education-edit', 'StudentController@education_edit')->name('student-education-edit');
   Route::post('get-institute', 'StudentController@institute')->name('get-institute');
   Route::post('get-course', 'StudentController@course')->name('get-course');
   Route::post('upload-resume', 'StudentController@upload_resume')->name('upload-resume');
   // Route::post('student-employment', 'StudentController@student_employment')->name('student-employment');

   /* Mentor */
   Route::get('mentor-profile', 'MentorController@profile')->name('mentor-profile');
   Route::post('mentor-profile', 'MentorController@signup_profile');


});



Route::prefix('mentor_admin')->middleware(['auth','can:isAllowed,"mentor:"'])->group(function () {

//Route::get('/', function () { return view('web.mentor.test'); })->name('mentor-home');
Route::get('/', 'Web\MentorController@showcalender')->name('mentor-home');
Route::post('mentor-avl', 'Web\MentorController@avilable')->name('mentor-avl');
Route::get('requested-student', 'Web\MentorController@requested_student')->name('requested-student');


});

Route::prefix('student_admin')->middleware(['auth','can:isAllowedStudent,"student:"'])->group(function () {
//Route::get('/', function () { return view('web.student.dashboard.dashboard'); })->name('student-home');
Route::get('/student-dashboard', 'Web\StudentDashboardController@dashboard')->name('student-dashboard');
Route::get('/', 'Web\StudentDashboardController@index')->name('student-mentors');
Route::get('student-mentors/{id}', 'Web\StudentDashboardController@single_mentor')->name('student-mentor-single');
Route::post('/slots', 'Web\StudentDashboardController@slots')->name('slots');
Route::post('/student-mentor-session', 'Web\StudentDashboardController@student_mentor_session')->name('student-mentor-session');

// Route::get('/student', function () {
//     dd("student dashboard");
// });


});


Route::prefix('ug_admin')->group(function () {
  Route::get('/','Admin\DashboardController@dashboard')->name('dashboard');
  Route::resource('pages','Admin\PageController');
  Route::get('mentor_register','Admin\RegistrationController@create')->name('mentor_register');
  Route::post('mentor_register', 'Admin\RegistrationController@store')->name('mentor_store');
  Route::resource('mentor','Admin\MentorController');
  Route::resource('user_role','Admin\UserRoles');
  Route::post('delete-mentor-test-score', 'Admin\MentorController@delete_mentor_test_score')->name('delete-mentor-test-score');
  Route::post('delete-mentor-applied-university', 'Admin\MentorController@delete_mentor_applied_university')->name('delete-mentor-applied-university');
  Route::resource('services','Admin\ServicesController');
});

// Route::prefix('myadmin')->group(function() {
//     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//     Route::get('/home', 'AdminController@index')->name('admin.home');
//     Route::get('/sameer', 'AdminController@sameer')->name('admin.sameer');
// });