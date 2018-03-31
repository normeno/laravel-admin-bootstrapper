@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label(__('admin.idenfier').':', null, ['class' => 'control-label']) }}
    {{ Form::text('extra_id', null, ['class' => 'form-control', 'placeholder' => __('admin.identifier_ph')]) }}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label(__('admin.avatar').':', null, ['class' => 'control-label']) }}
            {{ Form::file('avatar', ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <img id="avatar-preview" src="{{ asset('/img/avatar.png') }}" alt="{{ __('admin.avatar') }}" width="150" />
    </div>
</div>

<div class="form-group">
    {{ Form::label('* '.__('admin.name').':', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.__('admin.username').':', null, ['class' => 'control-label']) }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.__('admin.email').':', null, ['class' => 'control-label']) }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.__('admin.password').':', null, ['class' => 'control-label']) }}
    {{ Form::password('password', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('* '.__('admin.confirm_password').':', null, ['class' => 'control-label']) }}
    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    @if (ends_with(Route::currentRouteName(), 'create'))
        {{ Form::submit(__('admin.create'), ['class' => 'btn btn-flat btn-primary btn-block']) }}
    @else
        {{ Form::submit(__('admin.update'), ['class' => 'btn btn-flat btn-primary btn-block']) }}
    @endif
</div>