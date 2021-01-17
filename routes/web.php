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

Route::get('/', function () {
    return view('student.student_sign_in');
});

//student
Route::get('student/signup','StudentAuthController@sign_up_show');
Route::post('student/sign-up/process','StudentAuthController@sign_up_process');
Route::get('student/verify-email/{id}','StudentAuthController@verify_email');
Route::post('student/verify-email/process','StudentAuthController@confirm_email');
Route::get('student/forget-password','StudentAuthController@forget_password');
Route::post('student/forget-password/process','StudentAuthController@forget_password_process');
$link_number=Session::get('link_number');
Route::get('student/recover-password/{link_number}','StudentAuthController@recover_password');
Route::post('student/recover-password/process','StudentAuthController@recover_password_process');
Route::post('student/sign-in/process','StudentAuthController@sign_in_process');
Route::get('student/dashboard','StudentAuthController@dashboard');
Route::get('student/book-list/programming/','BookManageController@programming_book_student');
Route::get('student/book-list/networking/','BookManageController@networking_book_student');
Route::get('student/book-list/database/','BookManageController@database_book_student');
Route::get('student/book-list/electronics/','BookManageController@electronics_book_student');
Route::get('student/book-list/software-development/','BookManageController@software_book_student');
Route::get('student/shelf-list','BookManageController@shelf_list_student');
Route::get('student/shelf/details/{id}','BookManageController@shelf_details_student');
Route::get('student/log-out','StudentAuthController@log_out');
Route::get('student/my-collection','StudentManageController@my_collection');
Route::get('student/my-submission','StudentManageController@my_submission');
Route::get('student/change-password','StudentAuthController@change_password');
Route::get('student/edit-info','StudentAuthController@edit_info');
Route::post('student/change-auth-password/process','StudentAuthController@change_password_process');
Route::post('student/edit-info/process/{id}','StudentAuthController@edit_info_process');
Route::get('student/notification','BookManageController@student_notification');
Route::get('student/notify/count','BookManageController@student_notify_count');

//admin
Route::get('/admin','AdminAuthController@sign_in_show');
Route::get('/admin/forget-password','AdminAuthController@forget_password');
Route::post('/admin/forget-password/process','AdminAuthController@forget_password_process');
$link_number_admin=Session::get('link_number_admin');
Route::get('admin/recover-password/{link_number_admin}','AdminAuthController@recover_password');
Route::post('admin/recover-password/process','AdminAuthController@recover_password_process');
Route::post('admin/sign-in/process','AdminAuthController@sign_in_process');
Route::get('admin/dashboard','AdminAuthController@dashboard');
Route::get('admin/log-out','AdminAuthController@log_out');
Route::get('admin/student-request','AdminAuthController@student_request');
Route::get('student/approve/{id}','StudentManageController@student_approve');
Route::get('student/reject/{id}','StudentManageController@student_reject');
Route::get('admin/add-shelf','BookManageController@add_shelf');
Route::post('admin/add-shelf/process','BookManageController@add_shelf_process');
Route::get('admin/update-shelf','BookManageController@update_shelf');
Route::get('admin/shelf/edit/{id}','BookManageController@edit_shelf');
Route::post('admin/edit-shelf/process/{id}','BookManageController@edit_shelf_process');
Route::get('admin/remove-shelf','BookManageController@remove_shelf');
Route::get('admin/shelf/delete/{id}','BookManageController@remove_shelf_process');
Route::get('admin/add-book','BookManageController@add_book');
Route::post('admin/add-book/process','BookManageController@add_book_process');
Route::get('admin/update-book','BookManageController@update_book');
Route::get('admin/book/edit/{id}','BookManageController@edit_book');
Route::post('admin/edit-book/process/{id}','BookManageController@edit_book_process');
Route::get('admin/remove-book','BookManageController@remove_book');
Route::get('admin/book/delete/{id}','BookManageController@remove_book_process');
Route::get('admin/book-order','BookManageController@book_order');
Route::get('admin/add-order','BookManageController@add_order');
Route::post('admin/add-order/process','BookManageController@add_order_process');
Route::get('admin/book-received','BookManageController@book_received');
Route::get('admin/book-received/process/{id}','BookManageController@book_received_process');
Route::get('admin/remove-student','StudentManageController@remove_student');
Route::get('admin/student/delete/process/{id}','StudentManageController@remove_student_process');
Route::get('admin/student-info','StudentManageController@student_info');
Route::get('admin/change-password','AdminAuthController@change_password');
Route::post('admin/change-auth-password/process','AdminAuthController@change_password_process');
Route::get('admin/edit-info','AdminAuthController@edit_info');
Route::post('admin/update-info/process','AdminAuthController@update_info_process');
Route::get('admin/student/info/details/{id}','StudentManageController@student_details');
Route::get('admin/book-list/programming/','BookManageController@programming_book');
Route::get('admin/book-list/networking/','BookManageController@networking_book');
Route::get('admin/book-list/database/','BookManageController@database_book');
Route::get('admin/book-list/electronics/','BookManageController@electronics_book');
Route::get('admin/book-list/software-development/','BookManageController@software_book');
Route::get('admin/book/details/{id}','BookManageController@book_details');
Route::get('admin/shelf-list','BookManageController@shelf_list');
Route::get('admin/notification','StudentManageController@notification');
Route::get('admin/notify/count','StudentManageController@notify_count');
Route::get('admin/shelf/details/{id}','BookManageController@shelf_details');
