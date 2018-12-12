@if($user->user_count > 0)
<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li>
                    <notification :user_id="2"></notification>
                    </li>

                    <li style="padding: 10px 0 0;">
                        <a href="#" @click="menu=0" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Publicaciones</span></a>
                    </li>
                    <li>
                        <a href="#" @click="menu=1" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Perfil</span></a>
                    </li>
                    <li>
                        <a href="#" @click="menu=2" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Eventos</span></a>
                    </li>
                    <li>
                        <a href="fontawesome.html" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Icons</span></a>
                    </li>
                    
                    <li>
                    <a href="{{ route('logout')}}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Salir</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </li>
                    </li>
                </ul>
            </div>
        </div>

@else
<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li>
                    <a href="{{ route('logout')}}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Salir</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
@endif


