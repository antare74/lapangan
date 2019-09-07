 <div id="content-header">
    <div id="breadcrumb"> <a href="?load=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?load=pinjam" class="current">Module Pinjam</a> </div>
    <h1>Peminjaman Barang</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       <a href="?load=pinjam&action=input"><button class="btn btn-success"><i class="icon-plus"></i> &nbsp; Tambah Data</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Semua Data Barang</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th width="20%">Nama Barang</th>
                  <th width="5%">Harga Barang</th>
                  <th width="5%">Stock</th>
                  <th width="5%">Sisa</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $today = date('Y-m-d');
              $SQL=mysql_query("SELECT id,namaBrg,hargaBrg,stockBrg,stockBrg-
              (SELECT SUM(qty_sewa) FROM transaksi_brg WHERE tgl_sewa='$today' AND id_brg=id) AS qty
                FROM tbarang");
			   $no=1;
			   while($_data=mysql_fetch_array($SQL)){
           $qty = "";
           if($_data['qty']==""){
             $qty = $_data['stockBrg'];
           }else{
             $qty = $_data['qty'];
           }
				   echo"
				      <tr class='$class'>
                  <td>$no</td>
                  <td>$_data[namaBrg]</td>
                  <td>$_data[hargaBrg]</td>
                  <td>$_data[stockBrg]</td>
                  <td>$qty</td>
                  <td class='center'>
                    <a href='?load=pinjam&action=edit&id=$_data[id]'><button class='btn btn-primary'> <i class='icon-pencil'></i> &nbsp; Edit</button></a>
                    <a href='?load=pinjam&action=hapusData&id=$_data[id]'><button class='btn btn-danger'><i class='icon-trash'></i> &nbsp; Delete</button></a>
                  </td>
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
