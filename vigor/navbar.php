<div class='container-fluid' id="navbar">
            <div class='navbar-header navbar-nav-margin-left fixed'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#main-nav'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <div class='navbar-brand navbar-brand-logo'>
                   <img src='images/logo-bola.png' style="height:75%">
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='main-nav'>
                <ul class='nav navbar-nav navbar-nav-margin-left'>
                    <li>
                        <a href='index.php'>Home</a>
                    </li>
                   
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Pusat Informasi  <span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a style="color:black !important;hover" href='?p=profil'>Profil </a></li>
                            <li><a style="color:black !important;hover" href='?p=info-lapangan'>Info lapangan </a></li>
                            <li><a style="color:black !important;hover" href='?p=cara-boking'>Cara Boking Online </a></li>
                          </ul>
                    </li>
                    <?php
                    session_start(); 
                    if(isset($_SESSION['username'])){
                        echo"
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'  id='navbar-transaksi'>Transaksi<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a style='color:black !important' href='?p=tampil-jadwal'>Data Jadwal</a></liid='transaksi'>
                            <li><a style='color:black !important' href='?p=tampil-history-boking'>History Boking </a></li>
                          </ul>
                    </li>

                        ";


                    }

                    ?>
                     <?php
                    session_start(); 
                    if(isset($_SESSION['username'])==""){
                        echo"
                    <li>
                        <a href='?p=tampil-jadwal'>Data Jadwal</a>
                    </li>";
                    }
                    ?>
                </ul>
                <div class='navbar-right'>
                    <ul class='nav navbar-nav navbar-nav-bordered navbar-nav-margin-right'>
                        <!-- user -->
                        <?php
                            if(isset($_SESSION['username'])){
                                echo"
                            <li class='dropdown user'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>";
                            if(isset($_SESSION['foto'])){
                                echo"
 <img src='gambar/member_img/small/small_$_SESSION[foto]' alt='' class='img-circle' /> $_SESSION[nmLengkap]<span class='caret'></span>
                            </a>
                                ";
                            }else{
                                echo"
<img src='gambar/user.png' alt='' class='img-circle' /> $_SESSION[nmLengkap]<span class='caret'></span>
                            </a>

                                ";

                            }
                            echo"
                               
                            <ul class='dropdown-menu' role='menu'>
                            
                                <li><a href='logout.php' style='color:black !important'><i class='fa fa-sign-out'></i> Logout</a></li>
                            </ul>
                           </li>
                         </ul>
                                ";

                            }else{

                            echo"  <a href='login.php' class='navbar-btn btn btn-primary'>Log In</a>
                            ";

                            }
                        ?>
                      
                            
                     
                        <!-- // END user -->
                 
                  
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>