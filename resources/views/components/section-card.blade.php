<div class="col-4">
  <div class="card shadow">
    <div class="card-body">
      <h5 class="card-title">
        Section <a href="{{ url("section/$id") }}" class="text-decoration-none" @style(["color: $color"])>{{ Str::ucfirst($section) }}</a>
      </h5>
      <div class="d-flex justify-content-between">
        <div class="mt-auto">
          <span class="fw-bold">Goal</span><br>
          {{ $goal }} Students
        </div>

        <div class="progress-circle" @style(["--color: $color", "--progress: $progress%"])>
          <span>
            <span>{{ Illuminate\Support\Number::percentage($progress) }}</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
