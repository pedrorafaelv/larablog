
@extends('dashboard.master')
@section('content')
        
    @include('dashboard.partials.validation-error')

    <form action="{{route("category.store")}}" method="POST">
@csrf
        @include('dashboard.category._form')

    </form>

@endsection