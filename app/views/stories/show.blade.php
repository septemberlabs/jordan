@extends($layout)

@section('content')
<!-- .container -->
<div class="container">
    <!-- .row -->
    <div class="row">
        <!-- .col-lg-12 -->
        <div class="col-lg-12">
            <h1>{{ $story->title }}</h1>
            <div>
                <small><strong>Story Location:</strong> {{ $story->address }} ({{ $story->latitude }}, {{ $story->longitude }})</small>
            </div>
            <div>
                <small><strong>Source:</strong> <a href="{{ $story->source_url }}">{{ $story->source_url }}</a></small>
            </div>
            <hr/>
            <div>
                @if( $story->primary_image_url )
                    <img src="{{ $story->primary_image_url }}" />
                @endif
                {{ $story->introduction }}
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@stop