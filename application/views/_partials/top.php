        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <div class="dropdown">
                        <?php  
                                    $user = explode(";", str_replace('"', '', $_COOKIE['user']));
                                //    echo print_r(($user[3]));
                                 if ( $user[3] == '2' ) : 
                        ?>

                        <input type="button" class="btn btn-red text-center" onclick="play()" value="Help"><audio id="audio" src="<?= base_url('assets/audio/') ?>b.mpeg"></audio> 

                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>&nbsp;
                                <?php  
                                    $user = explode(";", str_replace('"', '', $_COOKIE['user']));
                                    print_r(strtoupper($user[1]));
                                ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= base_url('auth/change_password') ?>"><i class="fas fa-cog"></i> Change Password</a>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>

                        <?php else : ?>

                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>&nbsp;
                                <?php  
                                    $user = explode(";", str_replace('"', '', $_COOKIE['user']));
                                    print_r(strtoupper($user[1]));
                                ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= base_url('auth/change_password') ?>"><i class="fas fa-cog"></i> Change Password</a>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="topbar-divider d-none d-sm-block"></div>
                    </ul>
                </nav>

<link href="<?= base_url('assets/css/') ?>login.css" rel="stylesheet">

<script>
 function play() {
        var audio = document.getElementById("audio");
        audio.play();
      }
</script>