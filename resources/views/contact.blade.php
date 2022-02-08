@extends('layout')

@section('content')
    <h3>Contact Page</h3>
    <?php
        foreach($data as $key => $value){
            echo $key .' = '.$value . '<br>';
        }
    ?>
    @foreach($data as $key => $value)
    {{$key . ' = ' . $value .'<br>' }}
    @endforeach
@endsection