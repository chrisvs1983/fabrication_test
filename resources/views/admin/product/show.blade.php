    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('fabrication::product.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('fabrication::admin.product.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#fabrication-product-entry' data-href='{{trans_url('admin/fabrication/product/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button>
                @if($product->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#fabrication-product-entry' data-href='{{ trans_url('/admin/fabrication/product') }}/{{$product->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#fabrication-product-entry' data-datatable='#fabrication-product-list' data-href='{{ trans_url('/admin/fabrication/product') }}/{{$product->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('fabrication-product-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/fabrication/product'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('fabrication::product.name') !!}  [{!! $product->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('fabrication::admin.product.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>