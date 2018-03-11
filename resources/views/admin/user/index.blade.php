@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans_choice('admin.users', 10) }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('admin.list_of', ['name' => trans_choice('admin.users', 10)]) }}</h3>
                    </div>

                    <div class="box-body">

                        <div class="actions">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">{{ trans('admin.create') }}</a>
                            <a href="" class="btn btn-success btn-sm">{{ trans('admin.massive_creation') }}</a>
                        </div>

                        <table id="datatable_users" class="table">
                            <thead>
                            <tr>
                                <th>{{ trans('admin.avatar') }}</th>
                                <th>{{ trans('admin.name') }}</th>
                                <th>{{ trans('admin.email') }}</th>
                                <th>{{ trans_choice('admin.actions', 10) }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>

			</div>
		</div>
	</div>
@endsection