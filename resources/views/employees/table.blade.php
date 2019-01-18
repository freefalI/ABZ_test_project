@extends('layouts.app')

@section('content')
  


<!-- search panel -->
<nav class="level">
      <!-- Left side -->
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle is-5" id='tasks-count'>
            <strong></strong> tasks
          </p>
        </div>
        <div class="level-item">
          <div class="field has-addons">
            <p class="control">
              <input class="input" id='search-tasks-input' type="text" placeholder="Find a task">
            </p>
            <!-- <p class="control">
              <button class="button">
                Search
              </button>
            </p> -->
          </div>
        </div>
      </div>
    
      <!-- Right side -->
    <div id='search-tabs' class="level-right tabs is-toggle">
        <ul>
            <li class="is-active" data-id='2'><a>All</a></li>
            <li data-id='1'><a>Completed</a></li>
            <li data-id='0'><a>Uncompleted</a></li>
        </ul>
       
    </div>


    </nav>


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


@endsection

@section('page_specific_styles')
<link rel="stylesheet" href="{{asset('css/my_styles.css')}}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@endsection

@section('page_specific_scripts')

@endsection

