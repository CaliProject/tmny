<div class="col-md-12">
    <ol class="breadcrumb">
        <h4>@yield('title')
            <small class="pull-right">
                @yield('actions')
            </small>
        </h4>
        <li><a href="{{ url('admin') }}">后台管理</a></li>
        @yield('breadcrumb')
    </ol>
</div>