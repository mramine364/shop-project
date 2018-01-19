
@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/box.css') }}" rel="stylesheet">
@endsection

@section('nearby')
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
                            <a class="btn btn-success btn-sm" href="{{ route('like', ['id'=> $shops[$i]->id]) }}" role="button">Like</a>
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

        {{--  Pagiination  --}}
        <nav style="margin: 20px;">
            <ul class="pagination justify-content-center">
                <li class="page-item @if ($page==1) disabled @endif">
                    <a class="page-link" href="@if ($page>1) {{ route('main', ['page' => $page-1]) }} @else # @endif" tabindex="-1">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </a>
                </li>
                
                @if ($page==1)
                    @for ($i = $page; $i <= $page+2; $i++)
                    <li class="page-item @if ($page==$i) active @endif">                
                        <a class="page-link" href="{{ route('main', ['page' => $i]) }}">{{ $i }}</a>
                    </li>
                    @endfor
                    <li class="page-item disabled">                
                        <a class="page-link" href="#">...</a>
                    </li>
                @elseif($page==$pages)
                    <li class="page-item disabled">                
                        <a class="page-link" href="#">...</a>
                    </li>
                    @for ($i = $page-2; $i <= $page; $i++)
                    <li class="page-item @if ($page==$i) active @endif">                
                        <a class="page-link" href="{{ route('main', ['page' => $i]) }}">{{ $i }}</a>
                    </li>
                    @endfor
                @else
                    @if ($page-1>1)
                    <li class="page-item disabled">                
                        <a class="page-link" href="#">...</a>
                    </li>
                    @endif                    
                    @for ($i = $page-1; $i <= $page+1; $i++)
                    <li class="page-item @if ($page==$i) active @endif">                
                        <a class="page-link" href="{{ route('main', ['page' => $i]) }}">{{ $i }}</a>
                    </li>
                    @endfor
                    @if ($page+1<$pages)
                    <li class="page-item disabled">                
                        <a class="page-link" href="#">...</a>
                    </li>
                    @endif
                @endif                
                 
                <li class="page-item @if ($page==$pages) disabled @endif">
                    <a class="page-link" href="@if ($page<$pages) {{ route('main', ['page' => $page+1]) }} @else # @endif">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </nav>

@endsection 





