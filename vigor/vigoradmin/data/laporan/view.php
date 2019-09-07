 <div id="content-header">
    <div id="breadcrumb"> <a href="?load=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?load=laporan" class="current">Module Laporan</a> </div>
    <h1>Data Laporan</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="tabbable-line">
      <ul class="nav nav-tabs ">
        <li class="active">
          <a aria-expanded="true" href="#listlunas" data-toggle="tab">
            List Boking Lunas </a>
        </li>
        <li>
          <a aria-expanded="true" href="#listmove" data-toggle="tab">
            List Pindah Lapangan </a>
        </li>
      </ul>
      <div class="tabbable-line">
        <div class="tab-content">
          <div class="tab-pane active" id="listlunas">
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Laporan Boking</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th>No Invoice</th>
                          <th>Username</th>
                          <th>Tanggal Invoice</th>
                          <th>sewa</th>
                          <th>Total Harga</th>
                          <th>Nomer Lapangan</th>
                          <th>Rekening</th>
                          <th>Nama Pemilik Rekening</th>
                          <th>Waktu Transfer</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $SQL=mysql_query("SELECT * FROM (SELECT a.*, b.type_rek,b.an_rek,b.updatetime as upload, (case when kd_item2!='' then kd_item2
when kd_item2='' then kd_item else kd_item end) as kd_brg FROM
tboking a inner join tpayment b on a.noInvoice=b.noInvoice where statusBayar='L' ORDER BY updatetime DESC ) A
inner join tbarang B on A.kd_brg = B.id");
                          $no=1;
                          while($_data=mysql_fetch_array($SQL)){

                            if($no % 2==1){
                              $class="gradeU";

                              }else{
                              $class="gradeX";
                                }

                            echo"
                            <tr class='$class'>
                                <td>$no</td>
                                <td>$_data[noInvoice]</td>
                                <td>$_data[an]</td>
                                <td>$_data[tglInvoice]</td>
                                <td>$_data[namaBrg]</td>
                                <td>";
                                  if($_data['action']=="update"){
                                    echo"$_data[totalBayar2]";
                                  }else{
                                    echo"$_data[totalBayar]";
                                    }
                                  echo"
                                <td>";
                                  if($_data['action']=="update"){
                                    echo"Lapangan $_data[kdLapangan2]";
                                  }else{
                                    echo"Lapangan $_data[kdLapangan]";
                                    }
                                  echo"
                                <td>$_data[type_rek]</td>
                                <td>$_data[an_rek]</td>
                                <td>$_data[upload]</td>
                            </tr>
                            ";
                            $no++; }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="listmove">
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Laporan Pindah Lapangan</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th>No Invoice</th>
                          <th>Username</th>
                          <th>Tanggal Invoice</th>
                          <th>Lapangan Awal</th>
                          <th>Lapangan Final</th>
                          <th>Jam Awal</th>
                          <th>Jam Final</th>
                          <th>Harga Awal</th>
                          <th>Harga Final</th>
                          <th>Sewa awal</th>
                          <th>Sewa Akhir</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $SQL=mysql_query("SELECT a.*, (SELECT namaBrg FROM tbarang WHERE id=a.kd_item2) AS namaBrg2, (SELECT jam FROM tjam WHERE kdJam=a.kdJam2) AS jam2
                          FROM (SELECT a.*, jam, namaBrg FROM tboking a INNER JOIN tjam b ON a.kdJam=b.kdJam
                          INNER JOIN tbarang c ON a.kd_item=c.id WHERE ACTION='update' ORDER BY updatetime DESC) a");
                          $no=1;
                          while($_data=mysql_fetch_array($SQL)){

                            if($no % 2==1){
                              $class="gradeU";

                              }else{
                              $class="gradeX";
                                }

                            echo"
                            <tr class='$class'>
                                <td>$no</td>
                                <td>$_data[noInvoice]</td>
                                <td>$_data[an]</td>
                                <td>$_data[tglInvoice]</td>
                                <td>Lapangan $_data[kdLapangan]</td>
                                <td>Lapangan $_data[kdLapangan2]</td>
                                <td>$_data[jam]</td>
                                <td>$_data[jam2]</td>
                                <td>$_data[totalBayar]</td>
                                <td>$_data[totalBayar2]</td>
                                <td>$_data[namaBrg]</td>
                                <td>$_data[namaBrg2]</td>
                            </tr>
                            ";
                            $no++; }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<!--end-Footer-part-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
