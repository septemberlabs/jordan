<!-- Title Form Input -->
<div class="form-group {{ hasError('title', $errors) }}">
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<!-- Introduction Form Input -->
<div class="form-group {{ hasError('introduction', $errors) }}">
    {{ Form::label('introduction', 'Introduction:') }}
    {{ Form::textarea('introduction', null, ['class' => 'form-control', 'placeholder' => '', 'rows' => 3]) }}
</div>
<!-- Primary image url Form Input -->
<div class="form-group {{ hasError('primary_image_url', $errors) }}">
    {{ Form::label('primary_image_url', 'Primary image url:') }}
    {{ Form::text('primary_image_url', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<!-- Latitude Form Input -->
<div class="form-group {{ hasError('latitude', $errors) }}">
    {{ Form::label('latitude', 'Latitude:') }}
    {{ Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<!-- Longitude Form Input -->
<div class="form-group {{ hasError('longitude', $errors) }}">
    {{ Form::label('longitude', 'Longitude:') }}
    {{ Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<!-- Address Form Input -->
<div class="form-group {{ hasError('address', $errors) }}">
    {{ Form::label('address', 'Address:') }}
    {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<!-- Source url Form Input -->
<div class="form-group {{ hasError('source_url', $errors) }}">
    {{ Form::label('source_url', 'Source url:') }}
    {{ Form::text('source_url', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<h5><strong>Categories:</strong></h5>

@if( count($assigned_categories))
    @foreach( $story->available_categories as $key => $value )
        <div style="margin-top:10px">
            @if( in_array($value, $assigned_categories))
            {{ Form::checkbox('categories['.$value.']', $value, true) }} {{ ucwords($key) }}
            @else
            {{ Form::checkbox('categories['.$value.']', $value) }} {{ ucwords($key) }}
            @endif
        </div>
    @endforeach
@else
    @foreach( $story->available_categories as $key => $value )
        <div style="margin-top:10px">
            {{ Form::checkbox('categories['.$value.']', $value) }} {{ ucwords($key) }}
        </div>
    @endforeach
@endif
<hr/>


