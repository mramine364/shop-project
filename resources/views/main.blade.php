
@extends('layouts.app')

@section('title')
Nearby shops
@endsection

@section('stylesheet')
<link href="{{ asset('css/box.css') }}" rel="stylesheet">
@endsection

@section('nearby')
active
@endsection 

@section('content')

    @include('shops')

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

