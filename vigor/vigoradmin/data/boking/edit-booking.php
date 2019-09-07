<?php
$SQL=mysql_query("SELECT * FROM tboking a inner join tlapangan b on a.kdLapangan = b.noLapangan 
inner join tjam c on a.kdJam = c.kdJam inner join tbarang d on d.id = a.kd_item WHERE a.kdBoking='$_GET[kdBoking]'");
$_data=mysql_fetch_array($SQL);

echo"
<div id='content-header'>
  <div id='breadcrumb'> <a href='?load=dashboard' title='Go to Home' class='tip-bottom'><i class='icon-home'></i> Home</a> <a href='?load=boking' class='tip-bottom'>Module Boking</a> <a href='?load=boking&action=edit-boking&kdBoking=$_data[kdBoking]' class='current'>Edit Data Boking</a> </div>
  <h1></h1>
</div>
<div class='container-fluid'>
  <hr>
  <div class='row-fluid'>
    <div class='span12'>
      <div class='widget-box'>
        <div class='widget-title'> <span class='icon'> <i class='icon-align-justify'></i> </span>
          <h5>Edit Data Boking</h5>
        </div>
        <div class='widget-content nopadding'>
          <form action='$loadModule?load=boking&action=updateData' method='POST' class='form-horizontal' enctype='multipart/form-data'>
		        <input type='hidden' name='id' value='$_data[kdBoking]'>
            <div class='control-group'>
                <label class='control-label'>Kode Booking</label>
                <div class='controls'>
                    <input type='text' class='span2' placeholder='Kode Booking' id='kd_boking' name='kd_boking' value='$_data[noInvoice]'/>
                </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Nama :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Nama' name='txt_nama' value='$_data[an]' />
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Email :</label>
              <div class='controls'>
                <input type='text' class='span4' placeholder='Email' name='txt_email' value='$_data[email]' />
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>No. HP :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='No. HP' name='txt_no' value='$_data[kontak]' />
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Tanggal Boking :</label>
              <div class='controls'>
                <input type='date' class='span3' data-date-format='yyyy-mm-dd'  name='txtTglBooking' value='$_data[tglInvoice]'>
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Pilh Lapangan :</label>
              <div class='controls'>
                <select class='form-control' name='s_lap' id='s_lap' onchange='price()'>
                <option value=$_data[noLapangan].$_data[harga] selected='selected'>Lapangan $nbsp $_data[noLapangan]</option>"; 
                  ?>
                  <?php
                    $SQL = 'SELECT * FROM tlapangan';
                    $data_lapangan = mysql_query($SQL)or die(mysql_error());
                    while($row = mysql_fetch_array($data_lapangan)){               
                                    echo"
                                    <option value=$row[noLapangan].$row[harga]>Lapangan $nbsp $row[noLapangan]</option>";                  
                  }
                  ?>
                  <?php                        
                echo" </select>
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Sewa Item :</label>
              <div class='controls'>
                <select class='form-control' name='s_barang' id='s_barang' onchange='sewa()'>
                  <option value=$_data[id]/$_data[hargaBrg]/$_data[stockBrg] selected='selected'>$_data[namaBrg]</option>
                  <option value='0/0/0'>-Pilih Item-</option>"; 
                  ?>
                  <?php
                    $SQL = 'SELECT * FROM tbarang';
                    $data_barang = mysql_query($SQL)or die(mysql_error());
                    while($row = mysql_fetch_array($data_barang)){               
                                    echo"
                                    <option value=$row[id]/$row[hargaBrg]/$row[stockBrg]>$row[namaBrg]</option>";                  
                  }
                  ?>
                  <?php                        
                echo" </select>
              </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Harga :</label>
              <div class='controls'>
                <input type='text' class='span2' id='hrgBrg' name='hrgBrg'  value='$_data[hargaBrg]' readonly/>
                <input type='text' class='span1' id='QtyBrg' name='QtyBrg'  value='$_data[qty_item]'/>
                </div>
            </div>
            <div class='control-group'>
              <label class='control-label'>Pilh Jam :</label>
              <div class='controls'>
                <select class='form-control' name='s_jam' id='s_jam'>
                <option value=$_data[kdJam] selected='selected'>$_data[jam]</option>"; 
                  ?>
                  <?php
                    $SQL = 'SELECT * FROM tjam';
                    $data_lapangan = mysql_query($SQL)or die(mysql_error());
                    while($row = mysql_fetch_array($data_lapangan)){               
                                    echo"
                                    <option value=$row[kdJam]>$row[jam]</option>";                  
                  }
                  ?>
                  <?php                             
          echo" </select>
              </div>
            </div> 
            <div class='control-group'>
              <label class='control-label'>Harga :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Harga' name='txt_harga' id='txt_harga' value='$_data[harga]' readonly/>
              </div>
            </div>";
                $data_diskon = mysql_query("SELECT * FROM tdiskon where status='1'");
                $diskon = mysql_fetch_array($data_diskon);
            if($_data['usernameBoking']==""){
              echo"<div class='control-group'>
                  <label class='control-label'>Diskon :</label>
                  <div class='controls'>
                    <input type='text' class='span2' placeholder='Harga' name='txt_diskon' id='txt_diskon' value=0 readonly/>
                  </div>
                </div>";
            }else{
              echo"<div class='control-group'>
                  <label class='control-label'>Diskon :</label>
                  <div class='controls'>
                    <input type='text' class='span2' placeholder='Harga' name='txt_diskon' id='txt_diskon' value='$diskon[jumlah]' readonly/>
                  </div>
                </div>";
            }
            
            echo"<div class='control-group'>
              <label class='control-label'>Total :</label>
              <div class='controls'>
                <input type='text' class='span2' placeholder='Total' name='txt_total' id='txt_total' value='$_data[totalBayar]' />
              </div>
            </div> 
            <div class='form-actions'>
              <button type='submit' class='btn btn-success'>Ubah Data</button>
            </div>
            <input type='text' class='hidden' id='kdBrg' name='kdBrg' value='$_data[id]'  readonly/>
            <input type='text' class='hidden' id='sisaBrg' name='sisaBrg' value='$_data[stockBrg]' readonly/>
          </form>
        </div>
      </div>
     </div>
     </div>
     </div>
     


";
?>
<script type="text/javascript">
    // $(function(){

    function price(){
        var harga = $("#s_lap").val();
        var price = harga.substring(2);
        console.log(harga);
        $("#txt_harga").val(price);
        var brg2 = $("#hrgBrg").val();
        var diskon = $("#txt_diskon").val();
        $("#txt_total").val(parseInt(price)+parseInt(brg2)-parseInt(diskon));
    }
    function sewa(){
      var hrgBrg  = $("#s_barang").val();
      var param = hrgBrg.split("/");

      var id 	= param[0];
      var brg = param[1];
      var sisa = param[2];

      // var diskon = $("#txt_diskon").value;
      var brg2 = $("#hrgBrg").val(brg);
      var sisa2 = $("#sisaBrg").val(sisa);
      var qty = $("#QtyBrg").val();
      var kdBrg = $("#kdBrg").val(id);
      var price = $("#txt_harga").val();
      var diskon = $("#txt_diskon").val();

      $("#txt_total").val(parseInt(price)+parseInt(brg)-parseInt(diskon));


    }
    // });
</script>