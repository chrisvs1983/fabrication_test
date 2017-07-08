<div class="container">
    <h1> Products</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($products as $product)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $product['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('fabrication') }}/{!! $product->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
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
            @empty
            <div class="card-box">
                <p class="text-muted m-b-25 font-13">
                    Your search for <b>'{{Request::get('search')}}'</b> returned empty result.
                </p>
            </div>
            @endif
            {{$fabrications->render()}}
        </div>
        <div class="col-md-4">
            @include('fabrication::public.product.aside')
        </div>
    </div>
</div>