<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Mata Kuliah</title>
</head>
<body>

<h2>Jadwal Mata Kuliah</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Mata Kuliah</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Ruangan</th>
    </tr>

    @foreach ($schedules as $schedule)
    <tr>
        <td>{{ $schedule->subject->name }}</td>
        <td>{{ $schedule->day }}</td>
        <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
        <td>{{ $schedule->room }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>