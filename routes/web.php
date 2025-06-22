<?php

use Illuminate\Support\Facades\Route;
// Impor setiap kelas Livewire secara spesifik dan berikan alias
use App\Livewire\Dashboard\Index as DashboardIndex;

use App\Livewire\Instructor\Index as InstructorIndex;
use App\Livewire\Instructor\Create as InstructorCreate;
use App\Livewire\Instructor\Edit as InstructorEdit;

use App\Livewire\Course\Index as CourseIndex;
use App\Livewire\Course\Create as CourseCreate;
use App\Livewire\Course\Edit as CourseEdit;
use App\Livewire\Course\ManageMaterials as CourseManageMaterials;
use App\Livewire\Course\ParticipantCount as CourseParticipantCount;

use App\Livewire\Registration\Index as RegistrationIndex;
use App\Livewire\Registration\Create as RegistrationCreate;
use App\Livewire\Registration\Edit as RegistrationEdit;

use App\Livewire\Participant\Index as ParticipantIndex;
use App\Livewire\Participant\Create as ParticipantCreate;
use App\Livewire\Participant\Edit as ParticipantEdit;

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

// Provided by BAL Kit for authentication
require __DIR__.'/auth.php'; // PASTI TIDAK DIKOMENTARI

// Default welcome page from BAL Kit
Route::view('/', 'welcome')->name('welcome');

// Protected routes for authenticated users
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', DashboardIndex::class) // Gunakan alias
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // Instructor Management
    Route::get('/instructors', InstructorIndex::class)->name('instructors.index'); // Gunakan alias
    Route::get('/instructors/create', InstructorCreate::class)->name('instructors.create'); // Gunakan alias
    Route::get('/instructors/{instructor}/edit', InstructorEdit::class)->name('instructors.edit'); // Gunakan alias

    // Course Management
    Route::get('/courses', CourseIndex::class)->name('courses.index'); // Gunakan alias
    Route::get('/courses/create', CourseCreate::class)->name('courses.create'); // Gunakan alias
    Route::get('/courses/{course}/edit', CourseEdit::class)->name('courses.edit'); // Gunakan alias
    Route::get('/courses/{course}/materials', CourseManageMaterials::class)->name('courses.materials'); // Gunakan alias

    // Registration Management
    Route::get('/registrations', RegistrationIndex::class)->name('registrations.index'); // Gunakan alias
    Route::get('/registrations/create', RegistrationCreate::class)->name('registrations.create'); // Gunakan alias
    Route::get('/registrations/{registration}/edit', RegistrationEdit::class)->name('registrations.edit'); // Gunakan alias

    // Reports
    Route::get('/reports/participant-count', CourseParticipantCount::class)->name('reports.participant_count'); // Gunakan alias

    // Participant Management (Tambahkan ini)
    Route::get('/participants', ParticipantIndex::class)->name('participants.index');
    Route::get('/participants/create', ParticipantCreate::class)->name('participants.create');
    Route::get('/participants/{participant}/edit', ParticipantEdit::class)->name('participants.edit');


});