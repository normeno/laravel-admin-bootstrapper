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
                        <h3 class="box-title">{{ trans('admin.creation_of', ['name' => trans_choice('admin.users', 1)]) }}</h3>
                    </div>

                    <div class="box-body">
                        {!! Form::open(['route' => 'admin.users.store', 'files' => true]) !!}
                            @include('admin.user.form')
                        {!! Form::close() !!}
                    </div>

                </div>

			</div>
		</div>
	</div>
@endsection