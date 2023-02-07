<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\AdminController;
use App\Models\Student;
use App\Http\Controllers\SuperUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\Course_unitController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\FinanceController;


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



Route::get('/profile', function () {
    return view('students.profile');
})->name('profile');

Route::get('/', function () {
    return view('baselayout');
})->name('home')->middleware('user_role');

//Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    Route::get('getstudentID', [PaymentsController::class, 'getstudentID'])->name('getstudentID');
    Route::get('findstud', [PaymentsController::class, 'getstudentID']);
    Route::get('/payment_details', [PaymentController::class, 'findPaymentDetails'])->name('payment_details');
    Route::resource('student', StudentController::class);
    Route::resource('lectural', LecturerController::class);
    Route::resource('lecturer', LecturerController::class);

    Route::resource('marks', MarksController::class);
    Route::get('/getStudentsByCourse', [MarksController::class, 'findStudentsByCourseUnit']);
    Route::resource('accountant', AccountantController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('course', CourseController::class);
    Route::get('/show/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');

    Route::get('/student-marks', [StudentController::class, 'Stud_marks'])->name('Stud_marks');
    Route::get('/student_details', [StudentController::class, 'findStudentDetails'])->name('student_details');
    Route::get('/test-marks', [MarksController::class, 'createTest'])->name('createTest');
    Route::post('marksing.update', [MarksController::class, 'marksing_update'])->name('marksing.update');
    Route::get('student-marks/{id}', [MarksController::class, 'marksing_u'])->name('marks.edits');
    Route::get('', [MarksController::class, 'destroy'])->name('mark_destroy');
    // Route::resource('Course_unit',Course_unitController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('payments', PaymentsController::class);
    Route::resource('registration', RegistrationController::class);
    Route::resource('announcement', AnnouncementController::class);
    Route::get('/student/{student}/pay', function (Student $student) {
        return view('payment.create', compact('student'));
    })->name('pay');
    Route::get('/payment/{user}/payments', [PaymentController::class, 'studentPayment'])->name('payments');

    Route::get('/semesterFees', [PaymentController::class, 'findSemesterFees']);

    Route::post('/courseUnits', [RegistrationController::class, 'courseUnits']);

    Route::get('/showRegistrations', [RegistrationController::class, 'show'])->name('registration.show');


    Route::post('/register_courseunits', [RegistrationController::class, 'registerCourseUnits']);

    Route::get('/delete', [RegistrationController::class, 'destroy'])->name('registration.destroy');
});

Route::group(['middleware' => ['auth'], 'prefix'  =>   'Course-Unit'], function () {

    Route::get('/', [Course_unitController::class, 'index'])->name('course_unit.index');
    Route::get('/create', [Course_unitController::class, 'create'])->name('course_unit.create');
    Route::post('/store', [Course_unitController::class, 'store'])->name('course_unit.store');
    Route::get('/edit/{id}', [Course_unitController::class, 'edit'])->name('course_unit.edit');
    Route::post('/update', [Course_unitController::class, 'update'])->name('course_unit.update');
    Route::get('/delete', [Course_unitController::class, 'destroy'])->name('course_unit.destroy');
});

Route::group(['middleware' => ['auth'], 'prefix'  =>   'Lecturer'], function () {

    Route::get('/', [LecturerController::class, 'index'])->name('lecturers.index');
    Route::get('/create', [LecturerController::class, 'create'])->name('lecturers.create');
    Route::post('/store', [LecturerController::class, 'store'])->name('lecturers.store');
    Route::get('/edit/{id}', [LecturerController::class, 'edit'])->name('lecturers.edit');
    Route::post('/lecturers/update', [LecturerController::class, 'update'])->name('lecturers.update');
    Route::get('/delete', [LecturerController::class, 'delete()'])->name('lecturers.destroy');
    Route::get('/lecturer_details', [LecturerController::class, 'findLecturerDetails']);
});


Route::get('/admin/register/student', function () {
    return view('admin.register_student');
})->name('register_student');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/superUser', [SuperUserController::class, 'index'])->name('superUser');
    Route::get('/my-courses', [LecturerController::class, 'my_courses'])->name('my_courses');
    Route::get('assign-course-unit', [SuperUserController::class, 'lecturer_cu'])->name('lecturer-cu');
    Route::post('storelecturer_cu', [SuperUserController::class, 'storelecturer_cu'])->name('storelecturer_cu');
    Route::get('prod', [SuperUserController::class, 'created']);
    Route::get('/findProductName', [SuperUserController::class, 'findProductName']);
    Route::get('/findPrice', [SuperUserController::class, 'findPrice']);
    Route::get('/profile', [SuperUserController::class, 'show'])->name('superUser.show');
    Route::post('/update', [SuperUserController::class, 'updates'])->name('superUser.upadte');
    Route::get('/change-password', [SuperUserController::class, 'password'])->name('superUser.password');
    Route::get('/change-pasword', [AccountantController::class, 'password'])->name('accountant.password');
    Route::post('/change', [SuperUserController::class, 'password_change'])->name('change.password');
    Route::post('/profile-picture', [SuperUserController::class, 'image_change'])->name('superUser.image_change');
    Route::get('/registered-employees', [SuperUserController::class, 'users'])->name('userss');
    Route::post('employees-destroy', [SuperUserController::class, 'destroy'])->name('employees.destroy');
    Route::get('/register-employees', [SuperUserController::class, 'emp'])->name('userss-admins');
    Route::post('/register-dmin', [SuperUserController::class, 'AdminStore'])->name('AdminStore');
    Route::get('/registe-admin/{id}', [SuperUserController::class, 'editadmins'])->name('edit-admins');
    Route::put('/admin123-update', [SuperUserController::class, 'admin123_update'])->name('admin123.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');

Route::get('/loggedout', function () {
    return view('welcome');
})->name('loggedout');

Route::get('/contact-us', [ContactController::class, 'contact']);

Route::post('/send-message', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

//Route for Financial academic year
Route::group(['middleware' => ['auth'], 'prefix'  =>   'Finance'], function () {
    Route::get('/', [FinanceController::class, 'index'])->name('finances.index');
    Route::get('/create', [FinanceController::class, 'create'])->name('finances.create');
    Route::post('/store', [FinanceController::class, 'store'])->name('finances.store');
    Route::get('/edit/{id}', [FinanceController::class, 'edit'])->name('finances.edit');
    Route::post('/update', [FinanceController::class, 'update'])->name('finances.update');
    Route::post('/delete', [FinanceController::class, 'destroy'])->name('finances.destroy');
});

Route::get('/edit/{id}', [AccountantController::class, 'edit'])->name('accounts.edit');
Route::post('/update', [AccountantController::class, 'update'])->name('accounts.update');
Route::put('/update', [AdminController::class, 'update'])->name('admin.update');
