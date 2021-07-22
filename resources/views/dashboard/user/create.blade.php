
@extends('dashboard.master')
@section('content')
        
    @include('dashboard.partials.validation-error')

    <form action="{{route("user.store")}}" method="POST">
@csrf
        @include('dashboard.user._form', ['passw'=>true])

    </form>

@endsection