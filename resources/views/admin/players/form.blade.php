<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
    <label for="firstname" class="col-md-4 control-label">{{ 'Firstname' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="firstname" type="text" id="firstname" value="{{ $player->firstname or ''}}" required>
        {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    <label for="lastname" class="col-md-4 control-label">{{ 'Lastname' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lastname" type="text" id="lastname" value="{{ $player->lastname or ''}}" required>
        {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="col-md-4 control-label">{{ 'Age' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="age" type="number" id="age" value="{{ $player->age or ''}}" >
        {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('team_id') ? 'has-error' : ''}}">
    <label for="team_id" class="col-md-4 control-label">{{ 'Team Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="team_id" type="number" id="team_id" value="{{ $player->team_id or ''}}" >
        {!! $errors->first('team_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
