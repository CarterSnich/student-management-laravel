<tr>
  <td>{{ $studentId }}</td>
  <td>{{ $firstname }}</td>
  <td>{{ $lastname }}</td>
  <td>{{ $middlename }}</td>
  <td>{{ $birthdate }}</td>
  <td>
    <a href="{{ url(request()->path() . "/student/$id/edit") }}" class="btn btn-primary">Edit</a>
    <a href="{{ url(request()->path() . "/student/$id/delete") }}" class="btn btn-danger">Delete</a>
  </td>
</tr>
