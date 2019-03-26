<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#distrutionModal{{$row->id}}">
    Distribute Activity
</button>

<!-- Modal -->
<div class="modal fade" id="distrutionModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="distrutionModalLabel{{$row->id}}">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="distrutionModalLabel{{$row->id}}">Distribute Activity</h4>
    </div>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.distribution.add']]) !!}
    {!! Form::hidden('student_id', $row->id) !!}
    <div class="modal-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('event_id', 'Activity Type', ['class' => 'control-label']) !!}
                {!! Form::select('event_id', $activitys, old('event_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('event_id'))
                    <p class="help-block">
                        {{ $errors->first('event_id') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}

    </div>
    {!! Form::close() !!}
    </div>
</div>
</div>
