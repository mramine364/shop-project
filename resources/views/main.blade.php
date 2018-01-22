
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
                            @if ($shops[$i]->like<>-1)
                            <a class="btn btn-danger btn-sm" href="{{ route('dislike', ['id'=> $shops[$i]->id]) }}" role="button">Dislike</a>
                            @endif
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

    {{--  Pagination  --}}
    <nav style="margin: 20px;" id="pages">
            <paginate
            :page-count="{{ $pages }}"
            :page-range="2"
            :initial-page="{{ $page-1 }}"
            :click-handler="selectPage"
            :container-class="'pagination justify-content-center'"
            :page-class="'page-item'"
            :page-link-class="'page-link'"
            :prev-text="'Prev'"
            :prev-class="'page-item'"
            :prev-link-class="'page-link'"
            :next-text="'Next'"
            :next-class="'page-item'"
            :next-link-class="'page-link'">
            </paginate>
    </nav>

@endsection

@section('js_lib')
    <script src="{{ asset('js/vuejs-paginate.js') }}"></script>
@endsection

@section('js')
    {{--  <script src="js/main.js"></script>  --}}
    <script>

        Vue.component('paginate', VuejsPaginate)

        let pages = new Vue({
            el: '#pages',
            data: {
                pageUrl: "{{ route('main') }}/"
            },
            methods:{        
                selectPage(pageNum) {
                    window.location = this.pageUrl+pageNum;
                }
            }
        })
    </script>
@endsection

