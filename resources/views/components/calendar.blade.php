<div>
  <table class="table caption-top">
    <caption class="text-center p-0">{{ $monthInWords }}</caption>
    <thead>
      <tr>
        <th scope="col" class="text-danger">S</th>
        <th scope="col">M</th>
        <th scope="col">T</th>
        <th scope="col">W</th>
        <th scope="col">T</th>
        <th scope="col">F</th>
        <th scope="col">S</th>
      </tr>
    </thead>
    <tbody>
      @foreach (createCalendar() as $calendar)
        <tr>
          @foreach ($calendar['days'] as $day)
            <td @class([
                'bg-secondary' => $day['day'] == 0 && "$day[date]" != date('d'),
                'bg-primary' => "$day[date]" == date('d'),
                'text-muted' => !$day['isDayOfMonth'] && "$day[date]" != date('d'),
                'text-light' => $day['day'] == 0 || "$day[date]" == date('d'),
            ])>{{ $day['date'] }}</td>
          @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
