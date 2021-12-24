@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Staff {{ $staff->id }}</div>
        <div class="card-body">

            <a href="{{ url('/staff') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/staff/' . $staff->id . '/edit') }}" title="Edit Staff"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

            <form method="POST" action="{{ url('staff' . '/' . $staff->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Staff"
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
                            <td>{{ $staff->id }}</td>
                        </tr>
                        <tr>
                            <th> Name </th>
                            <td> {{ $staff->name }} </td>
                        </tr>
                        <tr>
                            <th> Designation </th>
                            <td> {{ $staff->designation }} </td>
                        </tr>
                        <tr>
                            <th> Address </th>
                            <td> {{ $staff->address }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
