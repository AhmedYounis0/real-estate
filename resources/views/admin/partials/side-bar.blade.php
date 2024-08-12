<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard.index') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard.index') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="@if($title == 'Home') active @endif">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="@if($title == 'Settings') active @endif">
                <a class="nav-link" href="{{ route('dashboard.settings.index') }}">
                    <i class="fas fa-hand-point-right">
                    </i> <span>Website Settings</span>
                </a>
            </li>

            <li class="nav-item dropdown @if ($title == 'Locations') active @elseif($title == 'Types') active @elseif($title == 'Amenities') active @endif">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Property Section</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="@if ($title == 'Locations') active @endif">
                        <a class="nav-link" href="{{ route('dashboard.locations.index') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Locations</span>
                        </a>
                    </li>
                    <li class="@if ($title == 'Types') active @endif">
                        <a class="nav-link" href="{{ route('dashboard.types.index') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Types</span>
                        </a>
                    </li>
                    <li class="@if ($title == 'Amenities') active @endif">
                        <a class="nav-link" href="{{ route('dashboard.amenities.index') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Amenities</span>
                        </a>
                    </li>
                    <li class="@if ($title == 'Properties') active @endif">
                        <a class="nav-link" href="{{ route('dashboard.properties.index') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Properties</span>
                        </a>
                    </li>
{{--                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>--}}
{{--                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>--}}
                </ul>
            </li>

            <li class="@if ($title == 'Packages') active @endif">
                <a class="nav-link" href="{{ route('dashboard.packages.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Packages</span>
                </a>
            </li>

            <li class="@if ($title == 'Orders') active @endif">
                <a class="nav-link" href="{{ route('dashboard.orders.index') }}">
                    <i class="fas fa-hand-point-right">
                    </i> <span>Orders</span>
                </a>
            </li>

            <li class="@if ($title == 'Messages') active @endif">
                <a class="nav-link" href="{{ route('dashboard.contacts.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Messages</span>
                </a>
            </li>

            <li class="@if ($title == 'Customers') active @endif">
                <a class="nav-link" href="{{ route('dashboard.customers.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Customers</span>
                </a>
            </li>

            <li class="@if ($title == 'Agents') active @endif">
                <a class="nav-link" href="{{ route('dashboard.agents.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Agents</span>
                </a>
            </li>

            <li class="@if ($title == 'Why Choose Us') active @endif">
                <a class="nav-link" href="{{ route('dashboard.chooses.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Why Choose Us</span>
                </a>
            </li>

            <li class="@if ($title == 'Testimonials') active @endif">
                <a class="nav-link" href="{{ route('dashboard.testimonials.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Testimonials</span>
                </a>
            </li>

            <li class="@if ($title == 'Blog') active @endif">
                <a class="nav-link" href="{{ route('dashboard.blogs.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Blog</span>
                </a>
            </li>

            <li class="@if ($title == 'FAQ') active @endif">
                <a class="nav-link" href="{{ route('dashboard.faqs.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>FAQ</span>
                </a>
            </li>

            <li class="@if ($title == 'Subscribers') active @endif">
                <a class="nav-link" href="{{ route('dashboard.subscribers.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Subscribers</span>
                </a>
            </li>

            <li class="@if ($title == 'Terms') active @endif">
                <a class="nav-link" href="{{ route('dashboard.terms.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Terms</span>
                </a>
            </li>

            <li class="@if ($title == 'Privacy') active @endif">
                <a class="nav-link" href="{{ route('dashboard.privacies.index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Privacy</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
