<body>
    <div class="max-width-mobile">
        <div id="waveLoader" style="left: 0; top: 0; display: flex;"
            class="bg-light justify-content-center align-items-center vh-100 w-100 position-fixed">
            <div class="wavecontainer">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>
        <div id="sideNav">
            <div class="nav bg-warning">
                <div id="mySidenav" class="sidenav">
                    <ul class="nav flex-column">
                        <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
                        <li><a href="/">Home</a></li>
                        <li class="dropdown">
                            <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Tasks</a>
                            <ul class="dropdown-menu dropdown-menu-lg-end bg-warning text-dark">
                                <li><a href="{{ url('task-qr') }}">QR Code Scan</a></li>
                                <li><a href="{{ url('task-map') }}">Starting Point</a></li>
                                <li><a href="{{ url('task-image') }}">Creative Image</a></li>
                                <li><a href="{{ url('multiple-choice') }}">Multiple Choice</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Game
                                Info</a>
                            <ul class="dropdown-menu dropdown-menu-lg-end bg-warning text-dark">
                                <li><a href="{{ url('game-info') }}">Game Info</a></li>
                                <li><a href="{{ url('sign-in') }}">Sign In</a></li>
                                <li><a href="#">Task 1</a></li>
                                <li><a href="#">Task 1</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="nav-toggler bg-warning pt-0 pl-3 d-flex flex-row flex-wrap align-items-center justify-content-between">
                <a style="cursor: pointer; padding:20px;" onclick="openNav()">
                    <span class="custom_hemburger"></span>
                    <a>
                        <div class="middle d-flex align-items-center">
                            <h4 class="top_header text-uppercase">Instructions</h4>
                        </div>
                        <a style="cursor: pointer; padding:20px;" class="right" onclick="openNav()">
                            <span class="custom_hemburger"></a>
            </div>
        </div>
