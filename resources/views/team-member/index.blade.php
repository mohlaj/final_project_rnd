@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Team member</h4>
            <a href="{{ url('/team-member/create') }}" class="btn btn-success btn-sm" title="Add New TeamMember">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
 

            <br />
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Leader</th>
                            <th>Staff</th>
                            <th>Project</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teammember as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->projectLeader->name }}</td>
                                <td>{{ $item->staff->name }}</td>
                                <td>{{ $item->project->name }}</td>
                                <td>
                                    <a href="{{ url('/team-member/' . $item->id . '/edit') }}"
                                        title="Edit TeamMember"><button class="btn btn-primary btn-sm"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/team-member' . '/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete TeamMember"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $teammember->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
