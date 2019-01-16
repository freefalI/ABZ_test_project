<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/1.css">
    <script src="js/app.js"></script>

    <script src="js/2.js"></script>
</head>
<body>

<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
  <thead>
    <tr>
      <!-- add ['parameter' => \Request::get('page')] as 3rd parameter to save page state -->
      <th>@sortablelink('id')</th>
      <th>@sortablelink('name')</th>
      <th>@sortablelink('surname')</th>
      <th>@sortablelink('patronymic')</th>
      <th>@sortablelink('hire_date')</th>
      <th>@sortablelink('salary')</th>
      <th>@sortablelink('position.name','position')</th>
      <th>@sortablelink('boss.name','supervisor')</th>
    </tr>
  </thead>

  <!-- <tfoot>
    <tr>
      <th><abbr title="Id">Id</abbr></th>
      <th>Name</th>
      <th><abbr title="Played">Surname</abbr></th>
      <th><abbr title="Won">Patronymic</abbr></th>
      <th><abbr title="Drawn">Hire date</abbr></th>
      <th><abbr title="Lost">Salary</abbr></th>
      <th><abbr title="Goals for">Position</abbr></th>
      <th><abbr title="Goals against">Supervisor</abbr></th>
    </tr>
  </tfoot> -->

  <tbody>
        @foreach ($employees as $key=> $employee )
    <tr>
        <th>{{$employee->id}}</th>
        <td>{{$employee->name}}</td>
        <td>{{$employee->surname}}</td>
        <td>{{$employee->patronymic}}</td>
        <td>{{$employee->hire_date}}</td>
        <td>{{$employee->salary}}</td>
        <td>{{$employee->position->name}}</td>
        <td>{{@$employee->boss->name. ' '. @$employee->boss->surname}}</td>
    </tr>
        @endforeach
  </tbody>
</table>

        {{ $employees->appends(\Request::except('page'))->links('vendor.pagination.bulma') }}.


</body>
</html>