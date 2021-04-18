@extends('dashboard.master')

@section('content')


<div class="form-group">
    <label for="name">Nombre:</label>
    <input readonly class="form-control" type="text" name="name" id="title" value="{{$user->name}}">
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="surname">Apellido:</label>
    <input readonly class="form-control" type="text" name="surname" id="surname" value="{{$user->surname}}">
    @error('surname')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input readonly class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="rol">Rol:</label>
    <input readonly class="form-control" type="text" name="rol" id="rol" value="{{$user->rol->key}}">
</div>



@endsection