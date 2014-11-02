@extends($layout)

@section('content')
<!-- .container -->
<div class="container">
    <!-- .row -->
    <div class="row">
        <!-- .col-lg-6 -->
        <div class="col-lg-6 col-lg-offset-3">
            <div class="page-header">
                <h1>Create <small>New Story Record</small></h1>
            </div>

            @include('layouts.partials.errors')

            {{ Form::model($story, ['route' => 'stories.store', 'method' => 'POST']) }}
                @include('stories._fields')
                <!-- Submit Form Input -->
                <div class="form-group">
                    {{ Form::submit('Save Story', ['class' => 'btn btn-success']) }}
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@stop