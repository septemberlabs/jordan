@extends($layout)

@section('content')
<!-- .container -->
<div class="container">
    <!-- .row -->
    <div class="row">
        <!-- .col-lg-6 -->
        <div class="col-lg-6">
            <div class="page-header">
                <h1>Stories List</h1>
            </div>
            <a class="btn btn-success" href="{{ route('stories.create') }}">
                <i class="fa fa-plus"></i> Add New Story
            </a>
            <hr/>
            @include('flash::message')
            <table class="table">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Title</th>
                        <th>Categories</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if( ! count($stories))
                        <tr class="warning">
                            <td colspan="4">
                                Sorry, there are currently no stories to list.
                            </td>
                        </tr>
                    @endif
                    @foreach( $stories as $story )
                        <tr>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('stories.edit', $story->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('stories.show', $story->id) }}">
                                    {{ $story->title }}
                                </a>
                            </td>
                            <td>
                                <ul>
                                    @foreach( $story->categories as $category )
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-danger deleteRecord" href="{{ route('stories.delete', $story->id) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $stories->links() }}
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@stop

@section('footer_embedded_js')

$('.deleteRecord').on('click', function(event)
{
    return confirm("Are you sure you want to delete this record?");
});

@stop