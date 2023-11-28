@extends('layouts.app')

@section('title', 'Dashboard | Student Management')

@section('header-title', ucfirst($section->name))

@section('content')
  <main class="flex-grow-1 d-flex justify-content-center align-items-center">
    <form action="{{ url(request()->path() . '/confirm') }}" class="bg-secondary-subtle p-5 rounded shadow position-relative" style="width: 600px" method="POST">
      @csrf
      @method('POST')

      <h3 class="text-center mb-4">DELETE STUDENT INFORMATION</h3>
      <a href="{{ url("section/$section->id") }}" class="btn btn-link text-decoration-none fw-bold fs-2 text-dark position-absolute top-0 end-0 m-3 mt-2">&times;</a>
      <div class="row">
        <div class="col-12 fs-5">Confirm deleting student?</div>
        <div class="col-12 fs-5">{{ $student->formattedStudentId }} - {{ $student->fullName }}</div>
        <div class="col-12 d-flex justify-content-end">
          <button type="submit" class="btn btn-danger">Confirm</button>
        </div>
      </div>
    </form>
  </main>
@endsection
