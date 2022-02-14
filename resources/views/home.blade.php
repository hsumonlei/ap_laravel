@extends('layout')

@section('content')
<div class='container'>
    <div>
        <a href="posts/create" class="btn btn-success">New Post</a>
    </div><br>
    <div class="card">
    <h5 class="card-header" style='text-align:center'>Contents</h5>
    <div class="card-body">
        @foreach ($data as $post)
        <div>
        <h5 class="card-title">{{ $post->name }}</h5>
        <p class="card-text">{{ $post->description }}</p>
        <div class="form-row">
            <a style=" height: 40px;    margin-right: 10px;" href="/posts/{{ $post->id}}" class="btn btn-primary">View</a>
            <a style=" height: 40px;    margin-right: 10px;" href="/posts/{{ $post->id}}/edit" class="btn btn-warning">Edit</a> 
            <form action="/posts/{{$post->id}}" method='post'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> Delete</button>
             </form> 
        </div>

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