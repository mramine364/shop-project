
@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/box.css') }}" rel="stylesheet">
@endsection

@section('prefs')
active
@endsection 

@section('content')

    <div>
        @for ($i = 0; $i < $count; $i++)
            @if ($i % 4 == 0)
            <div class="row">
            @endif
            <div class="col-6 col-sm-3">
                <div class="card box">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $shops[$i]->name }}</h5>
                        <img class="card-img" src="{{ $shops[$i]->picture }}" alt="Shop image">
                        <div class="box-footer">
                            <a class="btn btn-danger btn-sm" href="{{ route('dislike', ['id'=> $shops[$i]->id]) }}" role="button">Dislike</a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($i % 4 == 1)
            <!-- Add the extra clearfix for only the required viewport -->
            <div class="clearfix hidden-sm-up"></div>
            @endif
            @if ($i % 4 == 3)
            </div>
            @endif
        @endfor
    </div>

@endsection 





