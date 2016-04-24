<ul class="nav nav-sidebar">
    <li{{ request()->is('admin/about*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/about') }}">
            关于天美
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/services*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/services') }}">
            产业链条
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/portfolio*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/portfolio') }}">
            时令产品
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/basement*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/basement') }}">
            时令基地
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/blog*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/blog') }}">
            新鲜生活
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/contact*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/contact') }}">
            联系天美
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/password*') ? ' class=active' : '' }}>
        <a href="{{ url('admin/password') }}">
            修改密码
            <i class="fa fa-user"></i>
        </a>
    </li>
</ul>