<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;

Route::resource('/students', StudentController::class)->only([
    'index', 'create', 'store' //working on full crud operations
]);

Route::get('/',function(){
    return view('welcome',['students'=>Student::paginate(10)]);
});