<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
   <li class="nav-item">
      <a class="nav-link {{ Request::path() == 'admin/user/list' ? 'active' : 'deactive' }}"  href="{{ url('admin/user/list')}}">All</a>
   </li>
   <li class="nav-item">
      <a class="nav-link {{ Request::path() == 'admin/user/lists/admin' ? 'active' : 'deactive' }}"  href="{{ url('admin/user/lists/admin')}}">Admin</a>
   </li>
       <li class="nav-item">
      <a class="nav-link {{ Request::path() == 'admin/user/lists/user' ? 'active' : 'deactive' }}" href="{{ url('admin/user/lists/user')}}">Users</a>
      </li>
       
</ul>

