
@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/box.css') }}" rel="stylesheet">
@endsection

@section('prefs')
active
@endsection 

@section('content')

    @include('shops')

@endsection 





