@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $product['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ trans_url('/user/fabrication/product') }}" class="btn btn-default"> {{ trans('app.back')  }}</a>
                <a href="{{ trans_url('/user/fabrication/product') }}/{{ product->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('app.edit')  }}</a>
                <a href="{{ trans_url('/user/fabrication/product') }}/{{ product->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('app.copy')  }}</a>
                <a href="{{ trans_url('/user/fabrication/product') }}/{{ product->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('app.delete')  }}</a>
            </div>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr/>

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="Name">
                    {!! trans('fabrication::product.label.Name') !!}
                </label><br />
                    {!! $product['Name'] !!}
            </div>
        </div>
    </div>
</div>