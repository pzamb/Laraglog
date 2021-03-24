@extends('dashboard.master')

@section('content')


@csrf
<div class="form-group">
    <label for="title">Título:</label>
    <input readonly class="form-control" type="text" value="{{$postComment->title}}">
    @error('title')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="url_clean">Usuario:</label>
    <input  readonly class="form-control" type="text" value="{{$postComment->user->name}}">
</div>

<div class="form-group">
    <label for="url_clean">Email:</label>
    <input  readonly class="form-control" type="text" value="{{$postComment->approved}}">
</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea  readonly class="form-control" type="text" rows="3" >{{$postComment->message}}</textarea>
</div>



@endsection