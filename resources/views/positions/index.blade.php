@extends('layouts.app')

@section('content')
<div>

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

@endsection

@section('page_specific_styles')

    <link rel="stylesheet" href="{{asset('css/my_styles.css')}}">

@endsection

@section('page_specific_scripts')
    <script src="{{asset('js/1.js')}}"></script>

@endsection