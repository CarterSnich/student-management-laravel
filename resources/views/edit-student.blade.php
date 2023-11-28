@extends('layouts.app')

@section('title', 'Dashboard | Student Management')

@section('header-title', ucfirst($section->name))

@section('content')
  <main class="flex-grow-1 d-flex justify-content-center align-items-center">

    <form action="{{ url(request()->path() . '/submit') }}" class="bg-secondary-subtle p-5 rounded shadow position-relative" style="width: 600px" method="POST">
      @csrf
      @method('POST')

      <h3 class="text-center mb-4">EDIT STUDENT INFORMATION</h3>

      <a href="{{ url("section/$section->id") }}" class="btn btn-link text-decoration-none fw-bold fs-2 text-dark position-absolute top-0 end-0 m-3 mt-2">&times;</a>

      <div class="row g-3">
        <div class="col-md-6">
          <label for="firstname" class="form-label">First name:</label>
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has('firstname')]) id="firstname" name="firstname" value="{{ $student->firstname }}">
        </div>
        <div class="col-md-6">
          <label for="student_id" class="form-label">Student ID:</label>
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has('student_id')]) id="student_id" name="student_id" value="{{ $student->student_id }}">
        </div>
        <div class="col-md-6">
          <label for="lastname" class="form-label">Last name:</label>
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has('lastname')]) id="lastname" name="lastname" value="{{ $student->lastname }}">
        </div>
        <div class="col-md-6">
          <label for="birthdate" class="form-label">Birthdate:</label>
          <input type="date" @class(['form-control', 'is-invalid' => $errors->has('birthdate')]) id="birthdate" name="birthdate" value="{{ $student->birthdate }}">
        </div>
        <div class="col-md-6">
          <label for="middlename" class="form-label">Middle name:</label>
          <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $student->middlename }}">
        </div>
        <div class="col-12 d-flex justify-content-between align-items-center">
          <div class="text-danger">
            @if ($errors->any())
              Please provide valid inputs.
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Save Student</button>
        </div>

      </div>


    </form>

  </main>
@endsection
