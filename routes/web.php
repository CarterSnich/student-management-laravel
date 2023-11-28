<?php

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// index page, also as login page
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('login');

    // login authentication
    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    });
});

Route::middleware('auth')->group(function () {

    // logout
    Route::post('/logout', function (Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    });

    // dashboard
    Route::get('/dashboard', function () {
        $apple = [
            'chart_title' => 'Apple',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Student',
            'where_raw' => 'section_id = 1',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'chart_type' => 'line',
            'conditions' => [
                ['name' => 'Food', 'condition' => 'section_id = 1', 'color' => 'red', 'fill' => false],
            ],
        ];
        $orange = [
            'chart_title' => 'Orange',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Student',
            'where_raw' => 'section_id = 2',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'chart_type' => 'line',
            'conditions' => [
                ['name' => 'Food', 'condition' => 'section_id = 2', 'color' => 'orange', 'fill' => false],
            ],
        ];
        $mango = [
            'chart_title' => 'Mango',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Student',
            'where_raw' => 'section_id = 3',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'chart_type' => 'line',
            'conditions' => [
                ['name' => 'Food', 'condition' => 'section_id = 3', 'color' => 'yellow', 'fill' => false],
            ],
        ];
        $chart = new LaravelChart($apple, $orange, $mango);

        $sections = Section::all();

        return view('dashboard', compact('chart'), [
            'sections' => $sections
        ]);
    });

    Route::prefix('section')->group(function () {

        // section page, lists all students of that section
        Route::get('{section}', function (Section $section) {
            $students = Student::where('section_id', $section->id)->get();
            return view('section', [
                'section' => $section,
                'students' => $students
            ]);
        });

        // add student page
        Route::get('/{section}/add', function (Section $section) {
            return view(
                'add-student',
                [
                    'section' => $section
                ]
            );
        });

        // add student submission
        Route::post('{section}/add/submit', function (Request $request, Section $section) {
            $validated = $request->validate([
                'student_id' => ['required', 'regex:/^\d{7}$/', 'unique:students'],
                'firstname' => 'required',
                'lastname' => 'required',
                'middlename' => 'nullable',
                'birthdate' => 'date',
            ]);

            $student = new Student($validated);
            $student->section_id = $section->id;
            $student->save();

            return redirect("section/$section->id");
        });

        Route::prefix('{section}/student')->group(function () {

            // edit student page
            Route::get('{student}/edit', function (Section $section, Student $student) {
                return view('edit-student', [
                    'section' => $section,
                    'student' => $student
                ]);
            });

            // submit student edit
            Route::post('/{student}/edit/submit', function (Request $request, Section $section, Student $student) {
                $validated = $request->validate([
                    'student_id' => [
                        'required',
                        'regex:/^\d{7}$/',
                        Rule::unique('students')->ignore($student->id),
                    ],
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'middlename' => 'nullable',
                    'birthdate' => 'date',
                ]);

                $student->update($validated);
                $student->save();

                return redirect("section/$section->id");
            });

            // delete student page
            Route::get('/{student}/delete', function (Section $section, Student $student) {
                return view('delete-student', [
                    'section' => $section,
                    'student' => $student
                ]);
            });

            Route::post('/{student}/delete/confirm', function (Section $section, Student $student) {
                $student->delete();

                return redirect("section/$section->id");
            });
        });
    });
});
