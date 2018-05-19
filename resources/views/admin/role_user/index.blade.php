@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans_choice('admin.role_users', 10) }}
@endsection

@section('contentheader_title')
    {{ trans('admin.admin_of', ['name' => trans_choice('admin.role_users', 10)]) }}
@endsection

@section('breadcrumb')
    <li><i class="fa fa-users"></i> {{ trans_choice('admin.role_users', 10) }}</li>
    <li>{{ trans('admin.list') }}</li>
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('admin.list_of', ['name' => trans_choice('admin.role_users', 10)]) }}</h3>
                    </div>

                    <div class="box-body">
                        {!! Form::open(['route' => 'admin.role_users.store']) !!}
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    <select multiple="multiple" id="role-user-select" name="role-user-select[]">
                                        @foreach($roles as $role)
                                            <option value='{{ $role['role_name'] }}' {{ $role['selected'] }}>{{ $role['role_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" id="user_id" name="user_id" readonly value="{{ $userId }}" hidden>
                                    {{ Form::submit(__('admin.save'), ['class' => 'btn btn-flat btn-primary btn-block']) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                </div>

			</div>
		</div>
	</div>
@endsection

@push('css')
    <link href="{!! asset('/plugins/lou-multi-select/css/multi-select.dist.css') !!}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{!! asset('/plugins/lou-multi-select/js/jquery.multi-select.js') !!}"></script>
    <script>
      $('#role-user-select').multiSelect()
    </script>
@endpush