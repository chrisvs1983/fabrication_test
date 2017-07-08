@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $material['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ trans_url('/user/fabrication/material') }}" class="btn btn-default"> {{ trans('app.back')  }}</a>
                <a href="{{ trans_url('/user/fabrication/material') }}/{{ material->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('app.edit')  }}</a>
                <a href="{{ trans_url('/user/fabrication/material') }}/{{ material->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('app.copy')  }}</a>
                <a href="{{ trans_url('/user/fabrication/material') }}/{{ material->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('app.delete')  }}</a>
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