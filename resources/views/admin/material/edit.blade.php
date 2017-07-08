    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#material" data-toggle="tab">{!! trans('fabrication::material.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#fabrication-material-edit'  data-load-to='#fabrication-material-entry' data-datatable='#fabrication-material-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#fabrication-material-entry' data-href='{{trans_url('admin/fabrication/material')}}/{{$material->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('fabrication-material-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/fabrication/material/'. $material->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="material">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('fabrication::material.name') !!} [{!!$material->name!!}] </div>
                @include('fabrication::admin.material.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>