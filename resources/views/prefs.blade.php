
@extends('layouts.app')

@section('title')
Preferred shops
@endsection

@section('stylesheet')
<link href="{{ asset('css/box.css') }}" rel="stylesheet">
@endsection

@section('prefs')
active
@endsection 

@section('content')

    @include('shops')

@endsection 





