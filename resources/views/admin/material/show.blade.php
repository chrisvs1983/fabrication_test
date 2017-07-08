    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('fabrication::material.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('fabrication::admin.material.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#fabrication-material-entry' data-href='{{trans_url('admin/fabrication/material/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button>
                @if($material->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#fabrication-material-entry' data-href='{{ trans_url('/admin/fabrication/material') }}/{{$material->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#fabrication-material-entry' data-datatable='#fabrication-material-list' data-href='{{ trans_url('/admin/fabrication/material') }}/{{$material->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('fabrication-material-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/fabrication/material'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('fabrication::material.name') !!}  [{!! $material->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('fabrication::admin.material.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>