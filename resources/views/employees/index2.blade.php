@extends('layouts.app')

@section('content')
  
        
    @foreach ($positions as $position )
        <p>
            {{str_repeat("____|",$position->depth)}} 
            <strong>{{ $position->name}}</strong>
        </p>
        @php
            $employees=$position->employees;
        @endphp
        @foreach ($employees as $employee )

        <p>{{str_repeat("____|",$position->depth)}}{{$employee->name." ".$employee->surname."  BOSS: ".@$employee->boss->name."  ".@$employee->boss->surname}}</p>
        @endforeach

    @endforeach


@endsection

@section('page_specific_styles')

@endsection

@section('page_specific_scripts')

@endsection