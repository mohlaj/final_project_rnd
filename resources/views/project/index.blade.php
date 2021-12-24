@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Project</h4>
            @if (auth()->user()->role == 'PM')
            <a href="{{ url('/project/create') }}" class="btn btn-success btn-sm" title="Add New Project">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            @endif

            <form method="GET" action="{{ url('/project') }}" accept-charset="UTF-8"
                class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group mt-4">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary btn-sm" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <br />
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Cost</th>
                            <th>Client</th>
                            <th>Project Status</th>
                            <th>Project Stage</th>
                            <th>Project Leader</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>{{ $item->cost }}</td>
                                <td>{{ $item->client }}</td>
                                <td>{{ $item->project_status }}</td>
                                <td>{{ $item->project_stage }}</td>
                                <td>{{ $item->projectLeader->name }}</td>
                                <td>
                                    <a href="{{ url('/project/' . $item->id) }}" title="View Project"><button
                                            class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                            View</button></a>
                                    <a href="{{ url('/project/' . $item->id . '/edit') }}" title="Edit Project"><button
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/project' . '/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Project"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $project->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
