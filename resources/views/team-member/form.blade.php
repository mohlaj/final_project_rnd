

{{-- project_id  select with option --}}

<div class="form-group {{ $errors->has('project_id') ? 'has-error' : ''}}">
    <label for="project_id" class="control-label">{{ 'Project' }}</label>
    <select class="form-control" name="project_id" id="project_id">
        <option value="">Select project</option>
        @foreach($projects as $project)
        <option value="{{$project->id}}" {{isset($teammember->project_id) && $teammember->project_id == $project->id ? 'selected' : ''}}>{{$project->name}}</option>
        @endforeach
    </select>
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff' }}</label>
    <select class="form-control" name="staff_id" id="staff_id">
        <option value="">Select Staff</option>
        @foreach($staffs as $staff)
        <option value="{{$staff->id}}" {{isset($teammember->staff_id) && $teammember->staff_id == $staff->id ? 'selected' : ''}}>{{$staff->name}}</option>
        @endforeach
    </select>
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
