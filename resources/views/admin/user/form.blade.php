<div class="form-group">
    {{ Form::label(trans('admin.idenfier').':', null, ['class' => 'control-label']) }}
    {{ Form::text('extra_id', null, ['class' => 'form-control', 'placeholder' => trans('admin.identifier_ph')]) }}
</div>

<div class="form-group">
    {{ Form::label(trans('admin.avatar').':', null, ['class' => 'control-label']) }}
    {{ Form::file('extra_id', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.trans('admin.name').':', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.trans('admin.username').':', null, ['class' => 'control-label']) }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.trans('admin.email').':', null, ['class' => 'control-label']) }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.trans('admin.password').':', null, ['class' => 'control-label']) }}
    {{ Form::password('password', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.trans('admin.confirm_password').':', null, ['class' => 'control-label']) }}
    {{ Form::password('confirm_password', ['class' => 'form-control']) }}
</div>