<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item @if($title == 'Dashboard') active @endif">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="list-group-item">
                <a href="user-wishlist.html">Wishlist</a>
            </li>
            <li class="list-group-item">
                <a href="user-payment.html">Messages</a>
            </li>
            <li class="list-group-item @if($title == 'Edit Profile') active @endif">
                <a href="{{ route('user.profile') }}">Edit Profile</a>
            </li>
            <li class="list-group-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="javascript:{}"
                       onclick="this.closest('form').submit();return false;">
                        <span >Log Out</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
