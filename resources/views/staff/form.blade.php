<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($staff->name) ? $staff->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="control-label">{{ 'Designation' }}</label>
    <input class="form-control" name="designation" type="text" id="designation" value="{{ isset($staff->designation) ? $staff->designation : ''}}" >
    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control"  cols="30" rows="10" style="height: 249px;" name="address" type="textarea" id="address" >{{ isset($staff->address) ? $staff->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
