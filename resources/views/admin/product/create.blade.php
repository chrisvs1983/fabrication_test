    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Product</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#fabrication-product-create'  data-load-to='#fabrication-product-entry' data-datatable='#fabrication-product-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#fabrication-product-entry' data-href='{{trans_url('admin/fabrication/product/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('fabrication-product-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/fabrication/product'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('fabrication::product.name') !!}] </div>
                @include('fabrication::admin.product.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>