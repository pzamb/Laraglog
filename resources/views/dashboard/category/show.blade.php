@extends('dashboard.master')

@section('content')


@csrf
<div class="form-group">
    <label for="title">Title:</label>
    <input readonly class="form-control" type="text" name="title" id="title" value="{{$category->title}}">
    @error('title')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="url_clean">URL Limpia:</label>
    <input  readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{$category->url_clean}}">
</div>



@endsection