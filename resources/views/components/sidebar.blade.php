<nav id="sidebar" class="d-flex flex-column text-white ">
  <h1 class="fs-4 m-0 py-5 text-center text-nowrap">🌟 KINDERGARTEN</h1>
  <ul>
    <li>
      <a href="{{ url('/dashboard') }}" @if (Str::contains(request()->url(), '/dashboard')) class="active" aria-current="page" @endif>
        <span></span>DASHBOARD
      </a>
    </li>
    @foreach (App\Models\Section::get() as $section)
      <li>
        <a href="{{ url("section/$section->id") }}" @if (Str::contains(request()->url(), "section/$section->id")) class="active" aria-current="page" @endif>
          <span></span>{{ Str::upper($section->name) }}
        </a>
      </li>
    @endforeach
  </ul>

  <form action="{{ url('/logout') }}" method="POST" class="flex-grow-1 d-flex flex-column justify-content-center align-items-center p-3">
    @csrf
    @method('POST')
    <hr class="w-100 border-2">
    <button type="submit" class="btn btn-link text-white text-decoration-none">LOGOUT</button>
  </form>
</nav>
