@extends('adminlte::page')

@section('htmlheader_title')
    {{ trans_choice('admin.users', 10) }}
@endsection

@section('contentheader_title')
    {{ trans('admin.admin_of', ['name' => trans_choice('admin.users', 10)]) }}
@endsection

@section('breadcrumb')
    <li><i class="fa fa-users"></i> {{ trans_choice('admin.users', 10) }}</li>
    <li>{{ trans('admin.list') }}</li>
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('admin.list_of', ['name' => trans_choice('admin.users', 10)]) }}</h3>
                    </div>

                    <div class="box-body">

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
      $.getJSON('/admin/dashboard/registered_user', function (dataTableJson) {
        lava.loadData('Chart1', dataTableJson, function (chart) {
          console.log("ACA");
          console.log(chart);
        });
      });
    </script>
@endpush