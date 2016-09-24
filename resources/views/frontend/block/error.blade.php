<style>
    div.alert{
        position: fixed;
        top: 0px;
        z-index: 99999;
        left: 0px;
        width: 100%;
        text-align: center;
    }
</style>
<div class="container">
    <br />
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li><b>{!! $error !!}</b></li>
            @endforeach
        </ul>
    </div>
@endif

<br />
@if(Session::has('flash_message'))
    <div class="alert alert-{!! Session::get('flash_level') !!}">
        {!! Session::get('flash_message') !!}
    </div>
@endif

</div>