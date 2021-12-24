@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Create New Staff</h4>
            <a href="{{ url('/staff') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i> Back</button></a>
            <br />
            <br />

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ url('/staff') }}" accept-charset="UTF-8" class="form-horizontal"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('staff.form', ['formMode' => 'create'])

            </form>

        </div>
    </div>
@endsection
