@extends('layouts.app')

@section('content')
    <div class="container">
        <menu-container :items="{{json_encode($categories)}}" :resto-id="{{$restoId}}"></menu-container>
    </div>
@endsection
