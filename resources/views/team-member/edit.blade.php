@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-body">
            <h4 class="mb-4">Edit Team Member #{{ $teammember->id }}</h4>
                <a href="{{ url('/team-member') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ url('/team-member/' . $teammember->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    @include ('team-member.form', ['formMode' => 'edit'])

                </form>

            </div>
        </div>
@endsection
