<div class="flex-grow-1 flex-shrink-1 overflow-auto">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Student ID</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Middle name</th>
        <th scope="col">Birthdate</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      {{ $slot }}
    </tbody>
  </table>
</div>
