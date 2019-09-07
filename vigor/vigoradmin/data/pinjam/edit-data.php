<?php
$SQL=mysql_query("SELECT * FROM tbarang WHERE id='$_GET[id]'");
$_data=mysql_fetch_array($SQL);
echo"
<div id='content-header'>
  <div id='breadcrumb'> <a href='?load=dashboard' title='Go to Home' class='tip-bottom'><i class='icon-home'></i> Home</a> <a href='?load=pinjam' class='tip-bottom'>Module Pinjam</a> <a href='?load=pinjam&action=edit&id=$_GET[id]' class='current'>Edit Data Barang</a> </div>
  <h1></h1>
</div>
<div class='container-fluid'>
  <hr>
  <div class='row-fluid'>
    <div class='span12'>
      <div class='widget-box'>
        <div class='widget-title'> <span class='icon'> <i class='icon-align-justify'></i> </span>
          <h5>Edit Data Barang</h5>
        </div>
        <div class='widget-content nopadding'>
          <form action='$loadModule?load=pinjam&action=ubahData' method='POST' class='form-horizontal' enctype='multipart/form-data'>
		        <input type='hidden' name='id' value='$_data[id]'>
            <div class='control-group'>
              <label class='control-label'>Nama Barang :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Nama Barang' name='txtNama' value='$_data[namaBrg]' />
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Harga Barang :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Harga Barang' name='txtHarga' value='$_data[hargaBrg]' />
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Stock Barang :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Stock Barang' name='txtStock' value='$_data[stockBrg]' />
              </div>
            </div>
            <div class='form-actions'>
              <button type='submit' class='btn btn-success'>Ubah Data</button>
            </div>
          </form>
        </div>
      </div>
     </div>
     </div>
     </div>
     


";
?>