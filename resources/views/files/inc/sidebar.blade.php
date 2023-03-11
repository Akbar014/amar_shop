<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Lotus Int</a></div>
<div class="sl-sideleft">
    <div class="sl-sideleft-menu">
        <a href="{{ route('dashboard') }}" class="sl-menu-link @yield('dashboard')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>

        <a href="#" class="sl-menu-link @yield('pos')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">POS</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
           <li class="nav-item"><a href="{{ route('brand') }}" class="nav-link @yield('brand')">Product Brands</a></li>

           <li class="nav-item"><a href="{{ url('/products') }}" class="nav-link @yield('product-list')">Product list</a></li>
           <li class="nav-item"><a href="{{ url('/products/create') }}" class="nav-link @yield('product-create')">Add product</a></li>

           <li class="nav-item"><a href="{{ url('/stocks') }}" class="nav-link @yield('stock-list')">Stock list</a></li>
           <li class="nav-item"><a href="{{ url('/stocks/create') }}" class="nav-link @yield('stock-create')">Add stock</a></li>

           <li class="nav-item"><a href="{{ url('/customers') }}" class="nav-link @yield('customer-list')">Customer List</a></li>
           <li class="nav-item"><a href="{{ url('/customers/create') }}" class="nav-link @yield('customer-create')">Add Customer</a></li>
           
           <li class="nav-item"><a href="{{ url('/managers/create') }}" class="nav-link @yield('manager-create')">Add Manager</a></li>
           <li class="nav-item"><a href="{{ url('/managers') }}" class="nav-link @yield('manager-list')">Manager List</a></li>

            <li class="nav-item"><a href="{{ route('show.sale') }}" class="nav-link @yield('sale-list')">Sale list</a></li>
            <li class="nav-item"><a href="{{ route('create.sale') }}" class="nav-link @yield('sale-create')">Create sale</a></li>
            <li class="nav-item"><a href="{{ route('create.sale.date') }}" class="nav-link @yield('sale-create-date')">Create sale with date</a></li>

            <li class="nav-item"><a href="{{ route('show.challan') }}" class="nav-link @yield('challan-list')">Challan list</a></li>
            <li class="nav-item"><a href="{{ route('create.challan') }}" class="nav-link @yield('challan-create')">Create challan</a></li>
            <li class="nav-item"><a href="{{ route('create.challan.date') }}" class="nav-link @yield('challan-create-date')">Create challan with date</a></li>
        </ul>
    </div>
    <br>
</div>

