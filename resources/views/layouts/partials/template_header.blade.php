<div>
    @if (auth()->id())
    <a href="/user/logout">
        LOGOUT
    </a>
    @else
    <a href="/user/login">
        LOGIN
    </a>
    @endif
</div>