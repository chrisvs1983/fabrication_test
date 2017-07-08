    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Material</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#fabrication-material-create'  data-load-to='#fabrication-material-entry' data-datatable='#fabrication-material-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#fabrication-material-entry' data-href='{{trans_url('admin/fabrication/material/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('fabrication-material-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/fabrication/material'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('fabrication::material.name') !!}] </div>
                @include('fabrication::admin.material.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>