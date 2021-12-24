{{-- project name --}}
<div class="form-group">
    <label for="project_name">Project Name</label>
    <input type="text" class="form-control" id="project_name"  name="name" placeholder="Project Name"  value="{{ isset($project->name) ? $project->name : ''}}">
</div>

<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    <label for="start_date" class="control-label">{{ 'Start Date' }}</label>
    <input class="form-control" name="start_date" type="date" id="start_date" value="{{ isset($project->start_date) ? $project->start_date : ''}}" >
    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    <label for="end_date" class="control-label">{{ 'End Date' }}</label>
    <input class="form-control" name="end_date" type="date" id="end_date" value="{{ isset($project->end_date) ? $project->end_date : ''}}" >
    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    <label for="duration" class="control-label">{{ 'Duration' }} <small>(month)</small></label>
    <input class="form-control" name="duration" type="text" id="duration" value="{{ isset($project->duration) ? $project->duration : ''}}" >
    {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
    <label for="cost" class="control-label">{{ 'Cost' }}</label>
    <input class="form-control" name="cost" type="number" id="cost" value="{{ isset($project->cost) ? $project->cost : ''}}" >
    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('requirments') ? 'has-error' : ''}}">
    <label for="requirments" class="control-label">{{ 'Requirments' }}</label>
    <textarea class="form-control" style="height: 250px" name="requirments" type="textarea" id="requirments" >{{ isset($project->requirments) ? $project->requirments : ''}}</textarea>
    {!! $errors->first('requirments', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('client') ? 'has-error' : ''}}">
    <label for="client" class="control-label">{{ 'Client' }}</label>
    <input class="form-control" name="client" type="text" id="client" value="{{ isset($project->client) ? $project->client : ''}}" >
    {!! $errors->first('client', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('project_status') ? 'has-error' : ''}}">
    <label for="project_status" class="control-label">{{ 'Project Status' }}</label>
    <select class="form-control" name="project_status" id="project_status">
        <option value="">--select--</option>
        <option value="On Track" {{ (isset($project->project_status) && $project->project_status == 'On Track') ? 'selected' : '' }}>On Track</option>
        <option value="Delayed" {{ (isset($project->project_status) && $project->project_status == 'Delayed') ? 'selected' : '' }}>Delayed</option>
        <option value="Extended" {{ (isset($project->project_status) && $project->project_status == 'Extended') ? 'selected' : '' }}>Extended</option>
        <option value="Completed" {{ (isset($project->project_status) && $project->project_status == 'Completed') ? 'selected' : '' }}>Completed</option>
    </select>
    {!! $errors->first('project_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('project_stage') ? 'has-error' : ''}}">
    <label for="project_stage" class="control-label">{{ 'Project Stage' }}</label>
    {{-- Inception, Milestone1, Milestone 2 and Final Report, Closing --}}
    <select class="form-control" name="project_stage" id="project_stage">
        <option value="">--select--</option>
        <option value="Inception" {{ (isset($project->project_stage) && $project->project_stage == 'Inception') ? 'selected' : '' }}>Inception</option>
        <option value="Milestone1" {{ (isset($project->project_stage) && $project->project_stage == 'Milestone1') ? 'selected' : '' }}>Milestone1</option>
        <option value="Milestone2" {{ (isset($project->project_stage) && $project->project_stage == 'Milestone2') ? 'selected' : '' }}>Milestone2</option>
        <option value="Final Report" {{ (isset($project->project_stage) && $project->project_stage == 'Final Report') ? 'selected' : '' }}>Final Report</option>
        <option value="Closing" {{ (isset($project->project_stage) && $project->project_stage == 'Closing') ? 'selected' : '' }}>Closing</option>
    </select>
    {!! $errors->first('project_stage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('project_category') ? 'has-error' : ''}}">
    <label for="project_category" class="control-label">{{ 'Project Category' }}</label>
    {{-- consultancy project or research grant project --}}
    <select class="form-control" name="project_category" id="project_category">
        <option value=""> --select--</option>
        <option value="consultancy project" {{ isset($project->project_category) ? $project->project_category=='consultancy project' ? 'selected' : '' : ''}}>Consultancy Project</option>
        <option value="research grant project" {{ isset($project->project_category) ? $project->project_category=='research grant project' ? 'selected' : '' : ''}}>Research Grant Project</option>
    </select>
    {!! $errors->first('project_category', '<p class="help-block">:message</p>') !!}
</div>
@if (auth()->user()->role == 'PM')
<div class="form-group {{ $errors->has('project_leader_id') ? 'has-error' : ''}}">
    <label for="project_leader_id" class="control-label">{{ 'Project Leader' }}</label>
    <select class="form-control" name="project_leader_id" id="project_leader_id" required>
        <option value="">--select--</option>
        @foreach($project_leaders as $project_leader)
            <option value="{{ $project_leader->id }}" {{ isset($project->project_leader_id) ? $project->project_leader_id==$project_leader->id ? 'selected' : '' : ''}}>{{ $project_leader->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('project_leader_id', '<p class="help-block">:message</p>') !!}
</div>
@endif


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
