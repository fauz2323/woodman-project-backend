<div class="h-100" id="leftside-menu-container" data-simplebar>
    <!--- Sidemenu -->
    <ul class="side-nav">

        <li class="side-nav-title">Main</li>

        <li class="side-nav-item">
            <a href="{{route('home')}}" class="side-nav-link">
                <i class="ri-dashboard-3-line"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                <i class="ri-pages-line"></i>
                <span> Data </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPages">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{route('admin.account')}}">Account</a>
                    </li>
                    <li>
                        <a href="{{route('admin.product')}}">Product</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarPages2" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                <i class="ri-pages-line"></i>
                <span> Payment </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPages2">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="pages-contact-list.html">Pending Transaction</a>
                    </li>
                    <li>
                        <a href="pages-contact-list.html">Payment Report</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <!--- End Sidemenu -->

    <div class="clearfix"></div>
</div>
