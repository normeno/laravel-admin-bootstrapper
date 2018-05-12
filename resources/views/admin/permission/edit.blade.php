@extends('adminlte::page')

@section('htmlheader_title')
    {{ trans_choice('admin.permissions', 10) }}
@endsection

@section('contentheader_title')
    {{ trans('admin.admin_of', ['name' => trans_choice('admin.permissions', 10)]) }}
@endsection

@section('breadcrumb')
    <li><i class="fa fa-users"></i> {{ trans_choice('admin.permissions', 10) }}</li>
    <li>{{ trans('admin.update') }}</li>
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('admin.update_of', ['name' => trans_choice('admin.permissions', 1)]) }}</h3>
                    </div>

                    <div class="box-body">
                        {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission->id], 'method' => 'PUT']) !!}
                            @include('admin.permission.form')
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
