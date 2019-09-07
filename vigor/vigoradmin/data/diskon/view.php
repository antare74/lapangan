 <div id="content-header">
    <div id="breadcrumb"> <a href="?load=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?load=diskon" class="current">Module Diskon</a> </div>
    <h1>Diskon Member</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       <a href="?load=diskon&action=input"><button class="btn btn-success"><i class="icon-plus"></i> &nbsp; Tambah Data</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Semua Data Diskon</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th width="10%">Nama Promo</th>
                  <th width="5%">Jumlah Diskon</th>
                  <th width="5%">Status</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <!-- <a href='$loadModule?load=diskon&action=hapusData&id=$_data[id]'><button class='btn btn-danger'><i class='icon-trash'></i> &nbsp; Delete</button></a> -->

               <?php
			   $SQL=mysql_query("SELECT * FROM tdiskon ORDER BY id DESC");
			   $no=1;
			   while($_data=mysql_fetch_array($SQL)){
				   echo"
				  <tr class='$class'>
                  <td>$no</td>
                  <td>$_data[nama]</td>
                  <td>$_data[jumlah]</td>
                  <td>";
                  if($_data['status']=="1"){
                  echo"Aktif";
                    }else{
                  echo"Tidak Aktif";	  
                  }
                  
                  echo"</td>
                  <td class='center'>  
           <a href='?load=diskon&action=edit&id=$_data[id]'><button class='btn btn-primary'> <i class='icon-pencil'></i> &nbsp; Edit</button></a>
             ";
			
			 echo"
            
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