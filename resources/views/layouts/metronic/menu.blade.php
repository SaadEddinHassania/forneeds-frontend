<li class="{!! Request::is('home*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Home</span>
    </a>
</li>

<li class="{!! Request::is('profile*') ? 'active' : '' !!}">
    <a href="{!! url('/profile') !!}" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Profile</span>
    </a>
</li>




