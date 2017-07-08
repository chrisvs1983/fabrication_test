@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('fabrication::product.name') !!} <small> {!! trans('app.manage') !!} {!! trans('fabrication::product.names') !!}</small>
@stop

@section('title')
{!! trans('fabrication::product.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('fabrication::product.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='fabrication-product-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="fabrication-product-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('fabrication::product.label.status')!!}</th>
                    <th>{!! trans('fabrication::product.label.created_at')!!}</th>
                    <th>{!! trans('fabrication::product.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('date[status]')->raw()!!}</th>
                    <th>{!! Form::text('date[created_at]')->raw()!!}</th>
                    <th>{!! Form::text('date[updated_at]')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#fabrication-product-entry', '{!!trans_url('admin/fabrication/product/0')!!}');
    oTable = $('#fabrication-product-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/fabrication/product') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#fabrication-product-list .search_bar input, #fabrication-product-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#fabrication-product-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#fabrication-product-list').DataTable().row( this ).data();

        $('#fabrication-product-entry').load('{!!trans_url('admin/fabrication/product')!!}' + '/' + d.id);
    });

    $("#fabrication-product-list .search_bar input, #fabrication-product-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>
@stop

@section('style')
@stop

