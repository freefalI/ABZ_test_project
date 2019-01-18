@extends('layouts.app')

@section('content')
  
        
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



@endsection

@section('page_specific_styles')

    <link rel="stylesheet" href="{{asset('css/my_styles.css')}}">

@endsection

@section('page_specific_scripts')
    <script src="{{asset('js/2.js')}}"></script>

@endsection