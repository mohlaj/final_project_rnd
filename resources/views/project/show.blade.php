@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Project {{ $project->id }}</h4>

            <a href="{{ url('/project') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/project/' . $project->id . '/edit') }}" title="Edit Project"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

            <form method="POST" action="{{ url('project' . '/' . $project->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Project"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    Delete</button>
            </form>
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $project->id }}</td>
                        </tr>
                        <tr>
                            <th> Start Date </th>
                            <td> {{ $project->start_date }} </td>
                        </tr>
                        <tr>
                            <th> End Date </th>
                            <td> {{ $project->end_date }} </td>
                        </tr>
                        <tr>
                            <th> Duration </th>
                            <td> {{ $project->duration }} </td>
                        </tr>
                        <tr>
                            <th> Cost </th>
                            <td> {{ $project->cost }} </td>
                        </tr>
                        <tr>
                            <th> Requirments </th>
                            <td> {{ $project->requirments }} </td>
                        </tr>
                        <tr>
                            <th> Client </th>
                            <td> {{ $project->client }} </td>
                        </tr>
                        <tr>
                            <th> Project Status </th>
                            <td> {{ $project->project_status }} </td>
                        </tr>
                        <tr>
                            <th> Project Stage </th>
                            <td> {{ $project->project_stage }} </td>
                        </tr>
                        <tr>
                            <th> Project Category </th>
                            <td> {{ $project->project_category }} </td>
                        </tr>
                        <tr>
                            <th> Project Leader </th>
                            <td> {{ $project->projectLeader->name }} </td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="mt-5 mb-3">Team Member</h4>
                @if (isset($project->teamMembers) && count($project->teamMembers) > 0)
                @foreach ($project->teamMembers as $item)
                    <p class="col-md-2 p-2 border rounded fw-bold text-center">{{$loop->iteration}}. {{ $item->staff->name }}</p>
                @endforeach
                @else
                    <p class="col-md-2 p-2 border rounded fw-bold text-center text-danger">No Team Member</p>

                @endif
            </div>

        </div>
    </div>
@endsection
