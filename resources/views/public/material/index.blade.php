<div class="container">
    <h1> Materials</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($materials as $material)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $material['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('fabrication') }}/{!! $material->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('fabrication::material.label.name') !!}
                </label><br />
                    {!! $material['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="cost">
                    {!! trans('fabrication::material.label.cost') !!}
                </label><br />
                    {!! $material['cost'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="url">
                    {!! trans('fabrication::material.label.url') !!}
                </label><br />
                    {!! $material['url'] !!}
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
            @include('fabrication::public.material.aside')
        </div>
    </div>
</div>