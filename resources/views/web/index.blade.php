@extends('web.master')
@section('content')
    @{{message}}

    <div v-for="post in posts">
        @{{post}}
    </div>

    @{{nombre}}
@endsection