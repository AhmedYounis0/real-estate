<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item @if($title == 'Dashboard') active @endif">
                <a href="{{ route('agent.dashboard') }}">Dashboard</a>
            </li>
            <li class="list-group-item @if($title == 'Payment') active @endif"">
                <a href="{{ route('agent.package.payment') }}">Make Payment</a>
            </li>
            <li class="list-group-item @if($title == 'Orders') active @endif">
                <a href="{{ route('agent.orders') }}">Orders</a>
            </li>
            <li class="list-group-item @if($title == 'Add Property') active @endif">
                <a href="{{ route('agent.properties.create') }}">Add Property</a>
            </li>
            <li class="list-group-item @if($title == 'All Properties') active @endif">
                <a href="{{ route('agent.properties.index') }}">All Properties</a>
            </li>
            <li class="list-group-item @if($title == 'Edit Profile') active @endif">
                <a href="{{ route('agent.profile') }}">Edit Profile</a>
            </li>
            <li class="list-group-item @if($title == 'Change Password') active @endif">
                <a href="{{ route('agent.password') }}">Change Password</a>
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
