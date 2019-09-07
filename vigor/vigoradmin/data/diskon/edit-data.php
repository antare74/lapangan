<?php
$SQL=mysql_query("SELECT * FROM tdiskon WHERE id='$_GET[id]'");
$_data=mysql_fetch_array($SQL);
echo"
<div id='content-header'>
  <div id='breadcrumb'> <a href='?load=dashboard' title='Go to Home' class='tip-bottom'><i class='icon-home'></i> Home</a> <a href='?load=diskon' class='tip-bottom'>Module Diskon</a> <a href='?load=diskon&action=edit&id=$_GET[id]' class='current'>Edit Data Diskon</a> </div>
  <h1></h1>
</div>
<div class='container-fluid'>
  <hr>
  <div class='row-fluid'>
    <div class='span12'>
      <div class='widget-box'>
        <div class='widget-title'> <span class='icon'> <i class='icon-align-justify'></i> </span>
          <h5>Edit Data Diskon</h5>
        </div>
        <div class='widget-content nopadding'>
          <form action='$loadModule?load=diskon&action=ubahData' method='POST' class='form-horizontal' enctype='multipart/form-data'>
		        <input type='hidden' name='id' value='$_data[id]'>
            <div class='control-group'>
              <label class='control-label'>Nama Diskon :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Nama Diskon' name='txtNama' value='$_data[nama]' />
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Jumlah Diskon :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Jumlah Diskon' name='txtJumlah' value='$_data[jumlah]' />
              </div>
            </div>
			      <div class='control-group'>
              <label class='control-label'>Status Diskon :</label>
              <div class='controls'>
                ";
                if($_data['status']=="1"){
                  echo"
                  <input type='radio' value='1' name='rbStatus' Checked> Aktif
                  <input type='radio' value='0' name='rbStatus'> Tidak Aktif
                  ";
                  
                  
                  }else{
                    echo"
                  <input type='radio' value='1' name='rbStatus'> Aktif
                  <input type='radio' value='0' name='rbStatus' checked> Tidak Aktif
                  ";
                    
                    }
                
                echo"
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