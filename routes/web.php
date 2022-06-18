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
    return view('auth.login');
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang/{locale}', 'HomeController@lang');


//Patients
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/create', 'PatientController@store')->name('patient.store');
Route::get('/patient/all', 'PatientController@all')->name('patient.all');
Route::get('/patient/view/{id}', 'PatientController@view')->where('id', '[0-9]+')->name('patient.view');
Route::get('/patient/edit/{id}', 'PatientController@edit')->where('id', '[0-9]+')->name('patient.edit');
Route::post('/patient/edit', 'PatientController@store_edit')->name('patient.store_edit');

//Doctor
Route::get('/doctor/edit/{id}', 'DoctorController@create')->where('id', '[0-9]+')->name('doctor.create');
Route::post('/doctor/create', 'DoctorController@store')->name('doctor.store');

//Appointments
Route::get('/appointment/create/{patient_id?}', 'AppointmentController@create')->name('appointment.create');
Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('/appointment/create', 'AppointmentController@store')->name('appointment.store');
Route::get('/appointment/all', 'AppointmentController@all')->name('appointment.all');
Route::get('/appointment/checkslots/{id}', 'AppointmentController@checkslots');
Route::get('/appointment/delete/{id}', 'AppointmentController@destroy')->where('id', '[0-9]+');
Route::post('/appointment/edit', 'AppointmentController@store_edit')->name('appointment.store_edit');

//Medicines
Route::get('/medicine/create', 'MedicineController@create')->name('medicine.create');
Route::post('/medicine/create', 'MedicineController@store')->name('medicine.store');
Route::get('/medicine/edit/{id}', 'MedicineController@edit')->where('id', '[0-9]+')->name('medicine.edit');
Route::post('/medicine/edit', 'MedicineController@store_edit')->name('medicine.store_edit');
Route::get('/medicine/all', 'MedicineController@all')->name('medicine.all');
Route::get('/medicine/delete/{id}', 'MedicineController@destroy');


//Treatments
Route::get('/treatment/create', 'TreatmentController@create')->name('treatment.create');
Route::post('/treatment/create', 'TreatmentController@store')->name('treatment.store');
Route::get('/treatment/edit/{id}', 'TreatmentController@edit')->name('treatment.edit');
Route::post('/treatment/edit', 'TreatmentController@store_edit')->name('treatment.store_edit');
Route::get('/treatment/all', 'TreatmentController@all')->name('treatment.all');
Route::get('/treatment/delete/{id}', 'TreatmentController@destroy')->where('id', '[0-9]+');

//Prescriptions
Route::get('/prescription/create/{patient_id?}', 'PrescriptionController@create')->name('prescription.create');

Route::get('/prescription/create', 'PrescriptionController@create')->name('prescription.create');
Route::post('/prescription/create', 'PrescriptionController@store')->name('prescription.store');
Route::get('/prescription/all', 'PrescriptionController@all')->name('prescription.all');
Route::get('/prescription/view/{id}', 'PrescriptionController@view')->where('id', '[0-9]+')->name('prescription.view');
Route::get('/prescription/pdf/{id}', 'PrescriptionController@pdf')->where('id', '[0-9]+');
Route::get('/prescription/delete/{id}', 'PrescriptionController@destroy');

//Billing
Route::get('/billing/create/{patient_id?}', 'BillingController@create')->name('billing.create');
Route::post('/billing/create', 'BillingController@store')->name('billing.store');
Route::get('/billing/all', 'BillingController@all')->name('billing.all');
Route::get('/billing/view/{id}', 'BillingController@view')->where('id', '[0-9]+')->name('billing.view');
Route::get('/billing/pdf/{id}', 'BillingController@pdf')->where('id', '[0-9]+');
Route::get('/billing/delete/{id}', 'BillingController@destroy');
Route::get('/billing/edit/{id}', 'BillingController@edit')->where('id', '[0-9]+')->name('billing.edit');
Route::post('/billing/edit', 'BillingController@store_edit')->name('billing.store_edit');

//Settings
/* Doctorino Settings */
Route::get('/settings/doctorino_settings', 'SettingController@doctorino_settings')->name('doctorino_settings.edit');
Route::post('/settings/doctorino_settings', 'SettingController@doctorino_settings_store')->name('doctorino_settings.store');
/* Prescription Settings */
Route::get('/settings/prescription_settings', 'SettingController@prescription_settings')->name('prescription_settings.edit');
Route::post('/settings/prescription_settings', 'SettingController@prescription_settings_store')->name('prescription_settings.store');
