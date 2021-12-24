@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Project Leader</div>
        <div class="card-body">
            <a href="{{ url('/project-leader/create') }}" class="btn btn-success btn-sm" title="Add New project-leader">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>

            <br />
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_leaders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>


                                <td> 
                                    <a href="{{ url('/project-leader/' . $item->id . '/edit') }}" title="Edit project-leader"><button
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/project-leader' . '/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete project-leader"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $project_leaders->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
