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
    {{ Form::label(__('admin.name').':', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('admin.name')]) }}
</div>

<div class="form-group">
    @if (ends_with(Route::currentRouteName(), 'create'))
        {{ Form::submit(__('admin.create'), ['class' => 'btn btn-flat btn-primary btn-block']) }}
    @else
        {{ Form::submit(__('admin.update'), ['class' => 'btn btn-flat btn-primary btn-block']) }}
    @endif
</div>