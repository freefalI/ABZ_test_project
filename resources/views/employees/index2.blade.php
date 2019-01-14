<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>