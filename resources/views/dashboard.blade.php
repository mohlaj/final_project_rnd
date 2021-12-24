@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-body">
            <p class="statistics-title">Total Staffs</p>
            <h3 class="rate-percentage">{{$total_staff}}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body">
            <p class="statistics-title">Project Leaders</p>
            <h3 class="rate-percentage">{{$project_leader}}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body">
            <p class="statistics-title">Total Projects</p>
            <h3 class="rate-percentage">{{$total_projects}}</h3>
        </div>
    </div>

</div>
@endsection
