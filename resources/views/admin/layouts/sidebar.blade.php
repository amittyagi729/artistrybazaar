 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
     <div class="app-sidebar__user">
         <!--<img style="width: 56px;" class="app-sidebar__user-avatar" src="#" alt="logo">-->
         <div>
             <img src="https://www.artistrybazaar.com/media/img/artistrybazaar-log.png" style="height:60px">


         </div>
     </div>

     <ul class="app-menu">
         <li><a class="app-menu__item {{ request()->path() === 'admin/dashboard' ? 'active' : '' }}"
                 href="{{ url('/admin/dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span
                     class="app-menu__label">Dashboard</span></a></li>

         {{-- <li class="treeview {{ request()->is('admin/blog*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa-rss"></i><span class="app-menu__label">Posts</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item {{ request()->path()==='admin/blog/list' ? 'active' : '' }}" href="{{url('/admin/blog/list')}}"><i class="icon fa fa-long-arrow-right"></i> All Posts</a></li>
              <li><a class="treeview-item {{ request()->path()==='admin/blog/list' ? 'active' : '' }}" href="{{url('/admin/blog/create')}}"><i class="icon fa fa-long-arrow-right"></i> Add New</a></li>
                <li><a class="treeview-item  {{ request()->path()==='admin/blog-cat/categories' ? 'active' : '' }}" href="{{url('/admin/blog-cat/categories')}}"><i class="icon fa fa-long-arrow-right"></i>Categories</a></li>
          </ul>
        </li> --}}



         <li class="treeview {{ request()->is('admin/page*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa-file-o"></i><span
                     class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/page/list' ? 'active' : '' }}"
                         href="{{ url('/admin/page/list') }}"><i class="icon fa fa-long-arrow-right"></i> All Pages</a>
                 </li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/page/list' ? 'active' : '' }}"
                         href="{{ url('/admin/page/create') }}"><i class="icon fa fa-long-arrow-right"></i> Add New</a>
                 </li>
             </ul>
         </li>

         <li
             class="treeview {{ request()->is('admin/category*') || request()->is('admin/product/*') || request()->is('admin/categories*') ? 'is-expanded' : '' }}">
             <a class="app-menu__item" href="#" data-toggle="treeview"><i class="fa fa-product-hunt"></i>
                 &nbsp;&nbsp;<span class="app-menu__label">Products</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/product/allproduct' ? 'active' : '' }}"
                         href="{{ url('/admin/product/allproduct') }}"><i class="icon fa fa-long-arrow-right"></i> All
                         Products </a></li>
                 <li><a class="treeview-item {{ request()->is('/admin/product/create') ? 'active' : '' }}"
                         href="{{ url('/admin/product/create') }}"><i class="icon fa fa-long-arrow-right"></i> Add New
                     </a></li>
                 <li><a class="treeview-item  {{ request()->path() === 'admin/categories' ? 'active' : '' }}"
                         href="{{ url('/admin/categories') }}"><i
                             class="icon fa fa-long-arrow-right"></i>Categories</a></li>
                 <li><a class="treeview-item  {{ request()->path() === 'admin/import/excel' ? 'active' : '' }}"
                         href="{{ url('/admin/import/excel') }}"><i class="icon fa fa-long-arrow-right"></i>Import
                         Products</a></li>
                 <li><a class="treeview-item  {{ request()->path() === 'admin/import/excel' ? 'active' : '' }}"
                         href="{{ url('/admin/import/instock') }}"><i class="icon fa fa-long-arrow-right"></i>Import
                         Instock</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/order*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa-file-o"></i><span
                     class="app-menu__label">Orders</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/order/index' ? 'active' : '' }}"
                         href="{{ url('/admin/order/index') }}"><i class="icon fa fa-long-arrow-right"></i> All
                         Orders</a></li>
             </ul>
         </li>
         <li class="treeview {{ request()->is('admin/user-activity*') ? 'is-expanded' : '' }}"><a
                 class="app-menu__item" href="javascript:void(0)" data-toggle="treeview"><i
                     class="app-menu__icon fa fa-file-o"></i><span class="app-menu__label">User Activity</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/user-activity' ? 'active' : '' }}"
                         href="{{ url('/admin/user-activity') }}"><i class="icon fa fa-long-arrow-right"></i> User
                         Activity</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/cart*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa-file-o"></i><span
                     class="app-menu__label">Cart</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/cart/index' ? 'active' : '' }}"
                         href="{{ url('/admin/cart/index') }}"><i class="icon fa fa-long-arrow-right"></i> Cart
                         Orders</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/wishlisr/index' ? 'active' : '' }}"
                         href="{{ url('/admin/wishlist/index') }}"><i class="icon fa fa-long-arrow-right"></i> Wishlist
                         Orders</a></li>
             </ul>
         </li>


         <li class="treeview {{ request()->is('admin/user*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa-user fa-lg"></i><span
                     class="app-menu__label">Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/user/list' ? 'active' : '' }}"
                         href="{{ url('/admin/user/list') }}"><i class="icon fa fa-long-arrow-right"></i> List</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/homepage*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i
                     class="app-menu__icon fa fa-user fa-lg"></i><span class="app-menu__label">Homepage</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/homepage/hero' ? 'active' : '' }}"
                         href="{{ url('/admin/homepage/hero') }}"><i class="icon fa fa-long-arrow-right"></i>
                         Hero</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/homepage/sections' ? 'active' : '' }}"
                         href="{{ url('/admin/homepage/sections') }}"><i class="icon fa fa-long-arrow-right"></i>
                         Sections</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/locations*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Locations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/locations/countires' ? 'active' : '' }}"
                         href="{{ url('/admin/locations/countires') }}"><i class="icon fa fa-globe"></i>
                         Countries</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/locations/states' ? 'active' : '' }}"
                         href="{{ url('/admin/locations/states') }}"><i class="icon fa-map-marker"></i>
                         States/Provinces</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/locations/cities' ? 'active' : '' }}"
                         href="{{ url('/admin/locations/cities') }}"><i class="icon fa fa-location-arrow"></i>
                         Cities</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/addresses*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Addresses</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/addresses/alladdresses' ? 'active' : '' }}"
                         href="{{ url('/admin/addresses/addresslist') }}"><i class="icon fa fa-globe"></i> Address
                         List</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/addresses/alladdresses' ? 'active' : '' }}"
                         href="{{ url('/admin/addresses/defaultaddress') }}"><i class="icon fa fa-globe"></i> Default
                         Address</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/addresses/alladdresses' ? 'active' : '' }}"
                         href="{{ url('/admin/addresses/alladdresses') }}"><i class="icon fa fa-globe"></i>Address
                         History</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/addresses/addaddress' ? 'active' : '' }}"
                         href="{{ url('/admin/addresses/addaddress') }}"><i class="icon fa-map-marker"></i> Add
                         Address</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/addresses/addresstypes' ? 'active' : '' }}"
                         href="{{ url('/admin/addresses/addresstypes') }}"><i class="icon fa fa-location-arrow"></i>
                         Address Types</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/addresses/addresstypes' ? 'active' : '' }}"
                         href="{{ url('/admin/addresses/addresstypes') }}"><i class="icon fa fa-location-arrow"></i>
                         Address Notifications</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/pricing*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Pricing</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/pricing/currencies' ? 'active' : '' }}"
                         href="{{ url('/admin/pricing/currencies/index') }}"><i class="icon fa fa-globe"></i>
                         Currencies</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/pricing/alladdresses' ? 'active' : '' }}"
                         href="{{ url('/admin/pricing/defaultaddress') }}"><i class="icon fa fa-globe"></i>Exchange
                         Rates</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/pricing/alladdresses' ? 'active' : '' }}"
                         href="{{ url('/admin/pricing/payment-percent') }}"><i class="icon fa fa-globe"></i>Payment
                         Percentage</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/email*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Email Settings</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/email/templates/index' ? 'active' : '' }}"
                         href="{{ url('/admin/email/templates/index') }}"><i class="icon fa fa-globe"></i> Email
                         Templates</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/email/templates/create' ? 'active' : '' }}"
                         href="{{ url('/admin/email/templates/create') }}"><i class="icon fa fa-globe"></i>Create
                         Email Template</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/buyer*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Buyer Management</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/buyer/manage/title/index' ? 'active' : '' }}"
                         href="{{ url('/admin/buyer/manage/title/index') }}"><i class="icon fa fa-globe"></i> Manage
                         Titles</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/buyer/manage/type/index' ? 'active' : '' }}"
                         href="{{ url('/admin/buyer/manage/type/index') }}"><i class="icon fa fa-globe"></i>Manage
                         Types</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/buyer/manage/annual_revenue/index' ? 'active' : '' }}"
                         href="{{ url('/admin/buyer/manage/annual_revenue/index') }}"><i
                             class="icon fa fa-globe"></i>Annual Revenue</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/manufacturer*') ? 'is-expanded' : '' }}"><a
                 class="app-menu__item" href="javascript:void(0)" data-toggle="treeview"><i
                     class="app-menu__icon fa fa fa-map"></i><span class="app-menu__label">Manufacturer Mgmt</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/manufacturer/manage/details/index' ? 'active' : '' }}"
                         href="{{ url('/admin/manufacturer/manage/details/index') }}"><i
                             class="icon fa fa-globe"></i> Manage Details</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/manufacturer/manage/address/index' ? 'active' : '' }}"
                         href="{{ url('/admin/manufacturer/manage/address/index') }}"><i
                             class="icon fa fa-globe"></i>Manage Address</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/products/attributes*') ? 'is-expanded' : '' }}"><a
                 class="app-menu__item" href="javascript:void(0)" data-toggle="treeview"><i
                     class="app-menu__icon fa fa fa-map"></i><span class="app-menu__label">Products
                     Attributes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/products/attributes/material/type/index' ? 'active' : '' }}"
                         href="{{ url('/admin/products/attributes/material/type/index') }}"><i
                             class="icon fa fa-globe"></i> Material Type</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/products/attributes/color/type/index' ? 'active' : '' }}"
                         href="{{ url('/admin/products/attributes/color/type/index') }}"><i
                             class="icon fa fa-globe"></i>Color Type</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/products/attributes/dimensions/index' ? 'active' : '' }}"
                         href="{{ url('/admin/products/attributes/dimensions/index') }}"><i
                             class="icon fa fa-globe"></i>Dimensions</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/shipping*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Shipping Mgmt</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/shipping/method/index' ? 'active' : '' }}"
                         href="{{ url('/admin/shipping/method/index') }}"><i class="icon fa fa-globe"></i> Shipping
                         Methods</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/shipping/method/index' ? 'active' : '' }}"
                         href="{{ url('/admin/shipping/modes/index') }}"><i class="icon fa fa-globe"></i> Mode Of
                         Shipments</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/shipping/price/index' ? 'active' : '' }}"
                         href="{{ url('/admin/shipping/price/index') }}"><i class="icon fa fa-globe"></i> Shipping
                         Price</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/shipping/trackin/index' ? 'active' : '' }}"
                         href="{{ url('/admin/shipping/trackin/index') }}"><i class="icon fa fa-globe"></i>Shipment
                         Tracking</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/feedback*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="javascript:void(0)" data-toggle="treeview"><i class="app-menu__icon fa fa fa-map"></i><span
                     class="app-menu__label">Feedback</span><i class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/feedback/testimonials/index' ? 'active' : '' }}"
                         href="{{ url('/admin/feedback/testimonials/index') }}"><i class="icon fa fa-globe"></i>
                         Testimonials</a></li>
                 <li><a class="treeview-item {{ request()->path() === 'admin/feedback/reviews/index' ? 'active' : '' }}"
                         href="{{ url('/admin/feedback/reviews/index') }}"><i
                             class="icon fa fa-globe"></i>Reviews</a></li>
             </ul>
         </li>

         <li class="treeview {{ request()->is('admin/setting*') ? 'is-expanded' : '' }}"><a class="app-menu__item"
                 href="#" data-toggle="treeview"><i class="fa fa-cog"></i> &nbsp;&nbsp;<span
                     class="app-menu__label">General Setting</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item {{ request()->path() === 'admin/setting/email' ? 'active' : '' }}"
                         href="{{ url('/admin/setting/email') }}"><i class="icon fa fa-long-arrow-right"></i> Email
                         Setting</a></li>

                 <li><a class="treeview-item {{ request()->path() === 'admin/setting/system-info' ? 'active' : '' }}"
                         href="{{ url('/admin/setting/system-info') }}"><i class="icon fa fa-long-arrow-right"></i>
                         System</a></li>

                 <li><a class="treeview-item {{ request()->path() === 'admin/setting/companyinfo' ? 'active' : '' }}"
                         href="{{ url('/admin/setting/companyinfo') }}"><i class="icon fa fa-long-arrow-right"></i>
                         Company Information</a></li>

                 <li><a class="treeview-item {{ request()->path() === 'admin/setting/scripts' ? 'active' : '' }}"
                         href="{{ url('/admin/setting/scripts') }}"><i class="icon fa fa-long-arrow-right"></i>
                         Script </a></li>


             </ul>
         </li>

         <li><a class="app-menu__item" href="{{ url('logout') }}"><i class="fa fa-sign-out"
                     aria-hidden="true"></i> &nbsp;&nbsp; <span class="app-menu__label">Logout</span></a></li>


     </ul>
 </aside>
