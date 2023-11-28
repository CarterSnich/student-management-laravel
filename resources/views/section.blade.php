@extends('layouts.app')


@section('title', 'Dashboard | Student Management')

@section('header-title', $section->name)

@section('content')
  <main class="flex-grow-1 d-flex flex-column overflow-hidden">
    <a href="{{ url(request()->path() . '/add') }}" class="btn btn-primary align-self-start">Add student</a>
    <hr>
    <x-students-table>
      @foreach ($students as $student)
        <x-students-table-row :id="$student->id"
                              :student-id="$student->formattedStudentId"
                              :firstname="$student->firstname"
                              :lastname="$student->lastname"
                              :middlename="$student->middlename"
                              :birthdate="$student->birthdate" />
      @endforeach
    </x-students-table>
  </main>
@endsection
