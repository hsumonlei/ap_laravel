@extends('layout')

@section('content')
<!-- <style>
    .form-error{
        border: 1px solid red;
    }
    </style> -->
 <div class='container'>
    <div class="card">
    <div class="card-header" style='text-align:center'>
        New Post
    </div>
    <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/posts" method='post'>
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <!-- <input type="text" class="form-control" name="name"  placeholder="Enter name" required>  -->
                <!-- <input type="text" class="form-control {{($errors->first('name') ? "form-error" : "")}}" name="name"  placeholder="Enter name" >  -->
                <input type="text" class="form-control " name="name"  placeholder="Enter name" value="{{ old('name') }}"> 
            </div>
<!--             @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror -->
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <!-- <textarea  class="form-control" name="description" placeholder="Enter Descrition" required></textarea>  -->
                <textarea  class="form-control" name="description" placeholder="Enter Descrition" >{{ old('description') }}</textarea> 
            </div>
 <!--            @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror -->
            <div class="form-group">
                <select name="category_id" id="" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/posts" class="btn btn-success">Back</a>
        </form>
        </div>
    </div>
    
 </div>

@endsection