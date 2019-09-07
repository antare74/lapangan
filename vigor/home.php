

<div class="parallax cover overlay cover-image-full home">
        <!-- carousel -->
        <div id="myCarousel" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="item"><img class="parallax-layer" src="images/lapangan3.jpeg" alt="Learning Cover" width="100%" style="height: 30rem;"/></div>
        <div class="active item"><img class="parallax-layer" src="images/hom.jpg" alt="Learning Cover" width="100%" style="height: 30rem;"/></div>
        <div class="item"><img class="parallax-layer" src="images/lapangan2.jpeg" alt="Learning Cover" width="100%" style="height: 30rem;"/></div>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" id="carousel-nav" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" id="carousel-nav" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
        <!--  -->
        <div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-speed="8" data-opacity="true" style="height: 506px;">
            <div class="v-center">
                <div class="page-section overlay-bg-white-strong relative paper-shadow">
                    <h1 class="text-display-2 margin-v-0-15 display-inline-block">Trend Futsal Centre</h1>
                    <?php
                    if(isset($_SESSION['username'])){

                        echo' <p class="text-subhead">Selamat Datang Di VIGOR Futsal Pontianak</p>
                        <br>
                        <a class="btn btn-green-500 btn-lg paper-shadow" data-hover-z="3" data-animated data-toggle="modal" href="#modal-overlay-booking-member">
                            BOOKING SEKARANG</a>'
                        ;
                    }else{

                        echo'
                            <a class="btn btn-green-500 btn-lg paper-shadow" data-hover-z="2" data-animated data-toggle="modal" href="#modal-overlay-signup">
                            BOOKING SEKARANG</a>
                        ';

                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="home-deskripsi">
        <h3 id="c-white">Trend Futsal Centre</h3>    
        <p id="c-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class="modal grow modal-overlay modal-backdrop-body fade" id="modal-overlay-signup">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <div class="modal-dialog">
            <div class="v-cell">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="wizard-container wizard-1" id="wizard-demo-1">
                            <div data-scrollable-h>
                                <ul class="wiz-progress">
                                    <li class="active">Informasi</li>
                                    <li>Rincian</li>
                                    <li>Informasi Kontak</li>
                                </ul>
                            </div>
                            <form action="simpan-member.php" method="POST" data-toggle="wizard" class="max-width-500 h-center" enctype="multipart/form-data">
                                <fieldset class="step relative paper-shadow form-horizontal" data-z="2">
                                  <div class="page-section-heading">
                                        <h2 class="text-h3 margin-v-0">HANYA UNTUK MEMBER</h2>
                                        <h2 class="text-h3 margin-v-0">DAPATKAN DISKON HARGA</h3>
                                        <br>
                                        <button type="button" class="wiz-next btn btn-primary">Daftar Member</button>
                                        <h6 class="text-h4 margin-v-10 text-grey-400">Sudah jadi member?</h6><a href="login.php">Login disini.</a>
                                    </div>


                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary" data-hover-z="3" data-animated data-toggle="modal" href="#modal-overlay-booking">BOOKING</button>
                                    </div>
                                </fieldset>
                                <fieldset class="step relative paper-shadow" data-z="2">
                                    <div class="page-section-heading">
                                        <h2 class="text-h3 margin-v-0">LENGKAPI DATA AKUN ANDA</h2>
                                        <h3 class="text-h4 margin-v-10 text-grey-400">Klik Line Untuk Mengisi Data</h3>
                                    </div>
                                        <div class="form-group">
                                        <label for="wiz-lusername">Username</label>
                                        <input class="form-control" type="text" id="wiz-lusername" name="txtUsername" placeholder="Username" />

                                    </div>
                                       <div class="form-group">
                                         <label for="wiz-lpass">Password</label>
                                        <input class="form-control" type="password" id="wiz-lpass" name="txtPassMember" placeholder="Password" />
                                    </div>

                                    <div class="form-group">
                                      <label for="wiz-lname">Nama Lengkap</label>
                                        <input class="form-control" type="text" id="wiz-lname" name="txtNmLengkap" placeholder="Nama Lengkap" />

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <button type="button" class="wiz-prev btn btn-default">Previous</button>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <button type="button" class="wiz-next btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="step relative paper-shadow" data-z="2">
                                    <div class="page-section-heading">
                                        <h2 class="text-h3 margin-v-0">Informasi Kontak</h2>
                                        <h3 class="text-h4 margin-v-10 text-grey-400">Klik Line Untuk Mengisi Data</h3>
                                    </div>
                                       <div class="form-group">
                                        <label for="wiz-address">Alamat</label>
                                        <textarea name="txtAlamat" rows="5" class="form-control" id="wiz-address" placeholder="Alamat"></textarea>

                                    </div>
                                    <div class="form-group">
                                      <label for="wiz-email">Email</label>
                                        <input name="txtEmail" class="form-control" type="email" id="wiz-email" placeholder="Email" />

                                    </div>

                                    <div class="form-group">
                                      <label for="wiz-nohp1">Alamat</label>
                                        <input name="txtKontak" class="form-control" type="text" id="wiz-nohp1" placeholder="Nomor HP/ Telpon" />

                                    </div>


                                     <div class="form-group">

                                        <label for="wiz-photo">Upload Foto:</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" id="wiz-photo"  name="upPhoto" />

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <button type="button" class="wiz-prev btn btn-default">Previous</button>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <button type="submit" class="btn btn-primary">Daftar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal grow modal-overlay modal-backdrop-body fade" id="modal-overlay-booking">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <div class="modal-dialog">
            <div class="v-cell">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="wizard-container wizard-1" id="wizard-demo-1">
                            <div data-scrollable-h>
                                <ul class="wiz-progress">
                                    <li class="active">Booking</li>
                                    <li>Konfirmasi Pembayaran</li>
                                </ul>
                            </div>
                            <form method="POST" action="save_booking.php" data-toggle="wizard" class="max-width-500 h-center" enctype="multipart/form-data">
                                <fieldset class="step relative paper-shadow form-horizontal" data-z="3">
                                    <div class="page-section-heading">
                                        <h4 class="text-h3 margin-v-0">Booking</h4>
                                    </div>
                                    <?php
                                        $data_booking = mysql_query("SELECT noInvoice FROM tboking ORDER BY kdBoking DESC");

                                        $no_urut    = mysql_num_rows($data_booking);
                                        $book_no    = mysql_fetch_array($data_booking);

                                        $awal = substr($book_no['noInvoice'],0-6);
                                        $next = $awal + 1;
                                        $jno = strlen($next);

                                        if (!$book_no['noInvoice']){
                                            $no = "000001";
                                        }
                                        elseif($jno == 1){
                                            $no = "00000";
                                        }
                                        elseif($jno == 2){
                                            $no = "0000";
                                        }
                                        elseif($jno == 3){
                                            $no = "000";
                                        }
                                        elseif($jno == 4){
                                            $no = "00";
                                        }
                                        elseif($jno == 5){
                                            $no = "0";
                                        }
                                        elseif($jno == 6){
                                            $no = "";
                                        }

                                        $inv = "INV-";
                                        if ($no_urut == 0){
                                            $nom = $inv.$no;
                                        }
                                        else{
                                            $nom = $inv.$no.$next;
                                            // $nom = $awal;
                                        }

                                    ?>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Kode Booking</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" placeholder="Kode Booking" id="kd_booking" name="kd_booking" readonly value="<?php echo $nom; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Nama</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control input-sm" placeholder="Nama" id="txt_nama" name="txt_nama"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control input-sm" placeholder="Email" id="txt_email" name="txt_email"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">No. HP</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control input-sm" placeholder="No. HP" id="txt_no" name="txt_no"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Pilih Tanggal</label>
                                        <div class="col-md-5">
                                            <input type="date" class="form-control input-sm" data-date-format="yyyy-mm-dd"  name="txtTglBooking" id="txtTglBooking" >
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Pilih Lapangan</label>
                                        <div class="col-md-5">
                                        <select class="form-control" name="s_lap" id="s_lap" onchange="price()">
                                            <option value="0" selected="selected">Pilih Lapangan</option>
                                            <?php
                                                $SQL = "SELECT * FROM tlapangan ";
                                                $data_lapangan = mysql_query($SQL)or die(mysql_error());
                                                // $data = mysql_fetch_array($data_lapangan);
                                            ?>
                                            <?php while($row = mysql_fetch_array($data_lapangan)){
                                                echo"<option value=$row[noLapangan].$row[harga]>Lapangan $nbsp $row[noLapangan]</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Pilih Jam</label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="s_jam" id="s_jam">
                                                <!-- <option value="0" selected="selected">Pilih Jam</option> -->
                                                <?php
                                                    $SQL = "SELECT * FROM tjam ";
                                                    $data_jam = mysql_query($SQL)or die(mysql_error());
                                                    // $data = mysql_fetch_array($data_lapangan);
                                                ?>
                                                <?php while($row = mysql_fetch_array($data_jam)){
                                                    echo"<option value=$row[kdJam]>$row[jam]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Sewa Item</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="s_barang" id="s_barang" onchange="sewa()">
                                                <option value="0/0/0" selected="selected">Pilih Item</option>
                                                <?php
                                                    $SQL = "SELECT * FROM tbarang ";
                                                    $data_item = mysql_query($SQL)or die(mysql_error());
                                                    // $data = mysql_fetch_array($data_lapangan);
                                                ?>
                                                    <!-- <option class="hidden" id="hargaBrg" name="hargaBrg" value=$row[hargaBrg]>
                                                    <option class='hidden' id='sisaBrg' id='hargaBrg' value=$row[sisaBrg]> -->
                                                <?php while($row = mysql_fetch_array($data_item)){
                                                    echo"<option value=$row[id]/$row[hargaBrg]/$row[stockBrg]>$row[namaBrg]</option>
                                                    ";

                                                }
                                                ?>
                                            </select>
                                            <div class="form-group tight-bottom">
                                                <div class="col-md-8">
                                                <input type='text' class='form-control input-sm' id='hrgBrg' name='hrgBrg'  readonly/>
                                                <input type='text' class='hidden' id='kdBrg' name='kdBrg'  readonly/>
                                                <input type='text' class='hidden' id='sisaBrg' name='sisaBrg'  readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                <input type='text' class='form-control input-sm' id='QtyBrg' name='QtyBrg'  value="1"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Harga</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" id="txt_harga" name="txt_harga"  readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Diskon</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" placeholder="Diskon" id="txt_diskon" name="txt_diskon" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Total</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" placeholder="Total" id="txt_total" name="txt_total" readonly/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 text-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal grow modal-overlay modal-backdrop-body fade" id="modal-overlay-booking-member">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <div class="modal-dialog">
            <div class="v-cell">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="wizard-container wizard-1" id="wizard-demo-1">
                            <div data-scrollable-h>
                                <ul class="wiz-progress">
                                    <li class="active">Booking</li>
                                    <li>Konfirmasi Pembayaran</li>
                                </ul>
                            </div>
                            <form method="POST" action="save_booking.php" data-toggle="wizard" class="max-width-500 h-center" enctype="multipart/form-data">
                                <fieldset class="step relative paper-shadow form-horizontal" data-z="4">
                                    <div class="page-section-heading">
                                        <h4 class="text-h3 margin-v-0">Booking</h4>
                                    </div>
                                    <?php
                                        $data_booking = mysql_query("SELECT noInvoice FROM tboking ORDER BY kdBoking DESC");

                                        $no_urut    = mysql_num_rows($data_booking);
                                        $book_no    = mysql_fetch_array($data_booking);

                                        $awal = substr($book_no['noInvoice'],0-6);
                                        $next = $awal + 1;
                                        $jno = strlen($next);

                                        if (!$book_no['noInvoice']){
                                            $no = "000001";
                                        }
                                        elseif($jno == 1){
                                            $no = "00000";
                                        }
                                        elseif($jno == 2){
                                            $no = "0000";
                                        }
                                        elseif($jno == 3){
                                            $no = "000";
                                        }
                                        elseif($jno == 4){
                                            $no = "00";
                                        }
                                        elseif($jno == 5){
                                            $no = "0";
                                        }
                                        elseif($jno == 6){
                                            $no = "";
                                        }

                                        $inv = "INV-";
                                        if ($no_urut == 0){
                                            $nom = $inv.$no;
                                        }
                                        else{
                                            $nom = $inv.$no.$next;
                                            // $nom = $awal;
                                        }

                                        $data_diskon = mysql_query("SELECT * FROM tdiskon where status='1'");
                                        $diskon = mysql_fetch_array($data_diskon);

                                        $jum    = $diskon['jumlah'];


                                    ?>
                                    <input type="text" class="hidden" id="user" name="user" readonly value="<?php echo $_SESSION['username']; ?>"/>
                                    <input type="text" class="hidden" id="alamat" name="alamat" readonly value="<?php echo $_SESSION['alamat']; ?>"/>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Kode Booking</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" placeholder="Kode Booking" id="kd_booking" name="kd_booking" readonly value="<?php echo $nom; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Nama</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control input-sm" placeholder="Nama" id="txt_nama" name="txt_nama" value="<?php echo $_SESSION['nmLengkap'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control input-sm" placeholder="Email" id="txt_email" name="txt_email" value="<?php echo isset($_SESSION['email'])? $_SESSION['email'] : '';?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">No. HP</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control input-sm" placeholder="No. HP" id="txt_no" name="txt_no" value="<?php echo $_SESSION['kontak'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Pilih Tanggal</label>
                                        <div class="col-md-5">
                                            <input type="date" class="form-control input-sm" data-date-format="yyyy-mm-dd"  name="txtTglBooking" id="txtTglBooking" >
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Pilih Lapangan</label>
                                        <div class="col-md-5">
                                        <select class="form-control" name="s_lap" id="s_lap2" onchange="price2()">
                                            <option value="0" selected="selected">Pilih Lapangan</option>
                                            <?php
                                                $SQL = "SELECT * FROM tlapangan ";
                                                $data_lapangan = mysql_query($SQL)or die(mysql_error());
                                                // $data = mysql_fetch_array($data_lapangan);
                                            ?>
                                            <?php while($row = mysql_fetch_array($data_lapangan)){
                                                echo"<option value=$row[noLapangan].$row[harga]>Lapangan $nbsp $row[noLapangan]</option>";
                                            }
                                            ?>
                                        </select>

                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Pilih Jam</label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="s_jam" id="s_jam">
                                                <!-- <option value="0" selected="selected">Pilih Jam</option> -->
                                                <?php
                                                    $SQL = "SELECT * FROM tjam ";
                                                    $data_jam = mysql_query($SQL)or die(mysql_error());
                                                    // $data = mysql_fetch_array($data_lapangan);
                                                ?>
                                                <?php while($row = mysql_fetch_array($data_jam)){
                                                    echo"<option value=$row[kdJam]>$row[jam]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Sewa Item</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="s_barang" id="s_barang2" onchange="sewa2()">
                                                <option value="0/0/0" selected="selected">Pilih Item</option>
                                                <?php
                                                    $SQL = "SELECT * FROM tbarang ";
                                                    $data_item = mysql_query($SQL)or die(mysql_error());
                                                    // $data = mysql_fetch_array($data_lapangan);
                                                ?>
                                                    <!-- <option class="hidden" id="hargaBrg" name="hargaBrg" value=$row[hargaBrg]>
                                                    <option class='hidden' id='sisaBrg' id='hargaBrg' value=$row[sisaBrg]> -->
                                                <?php while($row = mysql_fetch_array($data_item)){
                                                    echo"<option value=$row[id]/$row[hargaBrg]/$row[stockBrg]>$row[namaBrg]</option>
                                                    ";

                                                }
                                                ?>
                                            </select>
                                            <div class="form-group tight-bottom">
                                                <div class="col-md-8">
                                                <input type='text' class='form-control input-sm' id='hrgBrg2' name='hrgBrg'  readonly/>
                                                <input type='text' class='hidden' id='kdBrg2' name='kdBrg' readonly/>
                                                <input type='text' class='hidden' id='sisaBrg2' name='sisaBrg'  readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                <input type='text' class='form-control input-sm' id='QtyBrg2' name='QtyBrg'  value="1"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Harga</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" id="txt_harga2" name="txt_harga"  readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Diskon</label>
                                        <div class="col-md-5">
                                            <input type='text' class='form-control input-sm' placeholder='Diskon' id='txt_diskon2' name='txt_diskon' value="<?php echo $jum ?>" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group tight-bottom">
                                        <label class="col-md-4 control-label">Total</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control input-sm" placeholder="Total" id="txt_total2" name="txt_total" readonly/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 text-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function(){
            // if(submit==1){
                // $("#modal-overlay-update").modal("show");
            // }
            // $('#modal-overlay-update').modal('show');

        function val_input(){
            var date = new Date();
            var tgl = document.getElementById("txtTglBooking").value;

            if(tgl < date){
                alert("Pilih Tanggal Yang lebih Besar!");
                return false;
            }
        }

        });

        function price(){
            var harga = document.getElementById("s_lap").value;
            var price = harga.substring(2);
            document.getElementById("txt_harga").value=price;
            document.getElementById("txt_total").value=price;
        }

        function price2(){
            var harga = document.getElementById("s_lap2").value;
            var diskon = document.getElementById("txt_diskon2").value;
            var price = harga.substring(2);
            document.getElementById("txt_harga2").value=price;
            var total = parseInt(price)-parseInt(diskon);
            document.getElementById("txt_total2").value=total;
        }

        function sewa(){
            var hargaLap = document.getElementById("s_lap").value;
            var price = hargaLap.substring(2);
            document.getElementById("txt_harga").value=price;
            var harga = document.getElementById("s_barang").value;
            var param = harga.split("/");

            var id 	= param[0];
            var brg = param[1];
            var sisa = param[2];

            var diskon = document.getElementById("txt_diskon").value;
            var brg2 = document.getElementById("hrgBrg").value=brg;
            var sisa2 = document.getElementById("sisaBrg").value=sisa;
            var qty = document.getElementById("QtyBrg").value;
            var kdBrg = document.getElementById("kdBrg").value=id;

            var total = parseInt(price-diskon)+(parseInt(brg2)*parseInt(qty));
            document.getElementById("txt_total").value=total;
        }

        function sewa2(){
            var hargaLap = document.getElementById("s_lap2").value;
            var price = hargaLap.substring(2);
            document.getElementById("txt_harga2").value=price;
            var harga = document.getElementById("s_barang2").value;
            var param = harga.split("/");

            var id 	= param[0];
            var brg = param[1];
            var sisa = param[2];

            var diskon = document.getElementById("txt_diskon2").value;
            var brg2 = document.getElementById("hrgBrg2").value=brg;
            var sisa2 = document.getElementById("sisaBrg2").value=sisa;
            var qty = document.getElementById("QtyBrg2").value;
            var kdBrg = document.getElementById("kdBrg2").value=id;

            var total = parseInt(price-diskon)+(parseInt(brg2)*parseInt(qty));
            document.getElementById("txt_total2").value=total;
        }

    </script>
