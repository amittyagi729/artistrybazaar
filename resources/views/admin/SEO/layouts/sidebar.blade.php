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
        <li><a class="app-menu__item {{ request()->path()==='seo/redirection*' ? 'active' : '' }}" href="{{url('/seo/redirection/index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Redirection</span></a></li>
      </ul>
    </aside>
