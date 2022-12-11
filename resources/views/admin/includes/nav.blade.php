<div id="sideNav">
    <div class="nav bg-warning">
        <div id="mySidenav" class="sidenav">
            <ul class="nav flex-column">
                <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
                <li><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">Users</a>
                    <ul class="dropdown-menu dropdown-menu-lg-end bg-warning text-dark">
                        <li><a href="task-qr">Create New</a></li>
                        <li><a href="task-map">Manage</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">Games</a>
                    <ul class="dropdown-menu dropdown-menu-lg-end bg-warning text-dark">
                        <li><a href="{{ route('game.add') }}">Create New</a></li>
                        <li><a href="{{ route('game.manage') }}">Manage</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">Games</a>
                    <ul class="dropdown-menu dropdown-menu-lg-end bg-warning text-dark">
                        <li><a href="task-qr">Create New</a></li>
                        <li><a href="task-map">Manage</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="nav-toggler bg-warning pt-0 pl-3 d-flex flex-row flex-wrap align-items-center justify-content-between">
        <a style="cursor: pointer; padding:20px;" onclick="openNav()">
            <span class="custom_hemburger"></span>
            <a>
                <div class="middle d-flex align-items-center">
                    <h4 class="top_header text-uppercase">Admin Dashboard</h4>
                </div>
                <a style="cursor: pointer; padding:20px;" class="right" onclick="openNav()">
                    <span class="custom_hemburger"></a>
    </div>
</div>
