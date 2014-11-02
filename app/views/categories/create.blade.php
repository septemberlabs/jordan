@extends($layout)

@section('content')
<!-- .container -->
<div class="container">
    <!-- .row -->
    <div class="row">
        <!-- .col-lg-6 -->
        <div class="col-lg-6 col-lg-offset-3">
            <div class="page-header">
                <h1>Create <small>New Category Record</small></h1>
            </div>

            @include('layouts.partials.errors')

            {{ Form::model($category, ['route' => 'categories.store', 'method' => 'POST']) }}
                @include('categories._fields')
                <!-- Submit Form Input -->
                <div class="form-group">
                    {{ Form::submit('Save Category', ['class' => 'btn btn-success']) }}
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@stop