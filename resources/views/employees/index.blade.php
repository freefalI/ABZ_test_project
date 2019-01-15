<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/1.css">
    <script src="js/app.js"></script>

    <script src="js/2.js"></script>

</head>
<body>
   
        
        @foreach ($employees as $key=> $employee )

        
        <p class="{{$key!=0 ? 'collapsible' : 'root'}}" data-id={{$employee->id}} data-depth={{$key==0 ? 0 : 1}}>

                  
            {!!
                $employee->name ." ".$employee->surname ."&nbsp&nbsp&nbsp&nbsp&nbsp  ".$employee->position->name
           !!}
           </p>
            @if($key==0)
           
                <div class='children' >
            @endif
            <div class='children' hidden>
                </div>
            <!-- </p> -->
    @endforeach
    </div>
</body>
</html>