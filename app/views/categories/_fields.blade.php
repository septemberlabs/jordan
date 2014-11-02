<!-- Name Form Input -->
<div class="form-group {{ hasError('name', $errors) }}">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => '']) }}
</div>

@if( Route::currentRouteName() !== 'categories.create')
    <!-- Delete Form Input -->
    <div class="form-group {{ hasError('deleted', $errors) }}">
        {{ Form::checkbox('deleted', 'value', (bool) $category->deleted_at) }}
        {{ Form::label('deleted', 'Deleted') }}
    </div>
@endif