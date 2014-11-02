@extends($layout)

@section('content')
<!-- .container -->
<div class="container">
    <!-- .row -->
    <div class="row">
        <!-- .col-lg-6 -->
        <div class="col-lg-6">
            <div class="page-header">
                <h1>Categories List</h1>
            </div>
            <a class="btn btn-success" href="{{ route('categories.create') }}">
                <i class="fa fa-plus"></i> Add New Category
            </a>
            <hr/>
            @include('flash::message')
            <table class="table">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if( ! count($categories))
                        <tr class="warning">
                            <td colspan="3">
                                Sorry, there are currently no categories to list.
                            </td>
                        </tr>
                    @endif
                    @foreach( $categories as $category )
                        <tr>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('categories.edit', $category->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td>
                                {{ $category->name }}
                                @if( $category->deleted_at )
                                    <span class="label label-danger">Deleted</span>
                                @endif
                            </td>
                            <td>
                                @if( ! $category->deleted_at )
                                    <a class="btn btn-xs btn-danger deleteRecord" href="{{ route('categories.delete', $category->id) }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
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