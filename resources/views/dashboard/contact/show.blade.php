@extends('dashboard.master')

@section('content')


@csrf
<div class="form-group">
    <label for="title">Nombre:</label>
    <input readonly class="form-control" type="text" value="{{$contact->name}}">
    @error('title')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="url_clean">Surname:</label>
    <input  readonly class="form-control" type="text" value="{{$contact->surname}}">
</div>

<div class="form-group">
    <label for="url_clean">Email:</label>
    <input  readonly class="form-control" type="text" value="{{$contact->email}}">
</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea  readonly class="form-control" type="text" rows="3" >{{$contact->message}}</textarea>
</div>



@endsection