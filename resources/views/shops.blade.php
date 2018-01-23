

{{--  Displaying shops  --}}
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
                        @if ($shops[$i]->like<>1)
                        <a class="btn btn-success btn-sm" href="{{ route('like', ['id'=> $shops[$i]->id]) }}" role="button">Like</a>
                        @endif
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
