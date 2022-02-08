@extends('layout')

@section('content')
<div class='container'>
    <div class="card">
    <h5 class="card-header" style='text-align:center'>Contents</h5>
    <div class="card-body">
        @foreach ($data as $post)
        <div>
        <h5 class="card-title">{{ $post->name }}</h5>
        <p class="card-text">{{ $post->description }}</p>
        <a href="#" class="btn btn-primary">View</a>   
        </div><hr/>
        @endforeach

    </div>
    </div>
</div>


<!-- <div class='container'>
    <div class="card">
    <h5 class="card-header" style='text-align:center'>Contents</h5>
    <div class="card-body">
        {{$data}}
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">View</a>
    </div>
    </div>
</div> -->

    <!-- <h3>Home Page</h3>
    <?php
        foreach($data as $key => $value){
            echo $key .' = '.$value . '<br>';
        }
    ?>
    @foreach($data as $key => $value)
    {{$key . ' = ' . $value .'<br>' }}
    @endforeach -->
@endsection