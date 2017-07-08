    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#product" data-toggle="tab">{!! trans('fabrication::product.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#fabrication-product-edit'  data-load-to='#fabrication-product-entry' data-datatable='#fabrication-product-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#fabrication-product-entry' data-href='{{trans_url('admin/fabrication/product')}}/{{$product->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('fabrication-product-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/fabrication/product/'. $product->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="product">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('fabrication::product.name') !!} [{!!$product->name!!}] </div>
                @include('fabrication::admin.product.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>