 <div id="content-header">
    <div id="breadcrumb"> <a href="?load=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?load=jadwal" class="current">Module Jadwal</a> </div>
    <h1>Daftar Jadwal</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       <!-- <a href="?load=jadwal&action=input"><button class="btn btn-success"><i class="icon-plus"></i> &nbsp; Tambah Data</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Semua Data Jadwal</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th width="10%">Tanggal</th>
                  <th width="25%">Lapangan</th>
                  <th>Jam</th>
                  <th>Harga</th>
                  <!-- <th width="20%">Aksi</th> -->
                </tr>
              </thead>
              <tbody>
               <?php
			   $SQL=mysql_query("SELECT * FROM tjadwal a INNER JOIN tjam b on a.kdJam = b.kdJam ORDER BY a.tglJadwal DESC");
			   $no=1;
			   while($_data=mysql_fetch_array($SQL)){
				   $harga=idr_f($_data['harga']);
				   $tgl=region($_data['tglJadwal']);
				   if($no % 2==1){
					   $class="gradeU";
					   
					   }else{
						 $class="gradeX";  
						   }
				   
				   echo"
				  <tr class='$class'>
              <td>$no</td>
				      <td>$tgl</td>
              <td>Lapangan $_data[kdLapangan]</td>
              <td>$_data[jam] </td>
				      <td>$harga</td>
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



<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>