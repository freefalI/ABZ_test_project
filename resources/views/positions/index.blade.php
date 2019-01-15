<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="js/app.js"></script>
    <script src="js/1.js"></script>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/1.css">
    <style>

    </style>
</head>
<body>
    
</div>





    @foreach ($positions as $key=>$position )
        <!-- <p>   -->
            <p class="{{$key!=0 ? 'collapsible' : 'root'}}" data-id={{$position->id}} data-depth={{$key==0 ? 0 : 1}}>

                  
            {{
                $position->name
            }}
           </p>
            @if($key==0)
                <div class='content' >
            @endif
            <div class='content' hidden>
                </div>
            <!-- </p> -->
    @endforeach
    </div>

</body>
</html> 