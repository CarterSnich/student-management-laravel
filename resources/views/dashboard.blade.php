@extends('layouts.app')


@section('title', 'Dashboard | Student Management')

@section('header-title', 'Dashboard')


@section('styles')
  <style>
    .progress-circle {
      --color: white;
      --progress: 0%;
    }

    .progress-circle>span {
      display: grid;
      place-content: center;
      border-radius: 50%;
      background: conic-gradient(var(--color) 0%, var(--color) var(--progress), white var(--progress));
      border: 1px solid var(--color);
      height: 72px;
      width: 72px;
      transform: scaleX(-1);
    }


    .progress-circle>span>span {
      display: grid;
      place-content: center;
      border-radius: 50%;
      background-color: white;
      border: 1px solid var(--color);
      height: calc(72px - 22px);
      width: calc(72px - 22px);
      transform: scaleX(-1);
    }
  </style>
@endsection

@section('content')

  <main class="flex-grow-1 d-flex flex-column">

    {{-- first row --}}
    <div class="row g-4 mb-4">
      @foreach ($sections as $section)
        <x-section-card :id="$section->id"
                        :section="$section['name']"
                        :goal="$section['goal']"
                        :progress="$section->goal_percentage"
                        :color="$section['color']" />
      @endforeach
    </div>

    {{-- second row --}}
    <div class="row g-4 flex-grow-1 flex-shrink-1">
      <div class="col-8">
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title">School Progress</h5>
            <div class="flex-grow-1" style="height: 280px">
              {!! $chart->renderHtml() !!}
            </div>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title">Calendar</h5>
            <x-calendar :month-in-words="date('F')"
                        :month="date('m')"
                        :year="date('Y')" />
          </div>
        </div>
      </div>
    </div>

  </main>

@endsection


@section('scripts')
  {!! $chart->renderChartJsLibrary() !!}
  {!! $chart->renderJs() !!}
@endsection
