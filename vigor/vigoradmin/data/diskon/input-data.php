<div id="content-header">
  <div id="breadcrumb"> <a href="?load=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?load=diskon" class="tip-bottom">Module Diskon</a> <a href="?load=diskon&action=input" class="current">Input Data Diskon</a> </div>
  <h1></h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Diskon</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="data/diskon/proses.php?load=diskon&action=simpanData" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nomor Diskon :</label>
              <div class="controls">
                <input type="text" class="span2" placeholder="Nama Diskon" name="txtNama" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jumlah Diskon :</label>
              <div class="controls">
                <input type="text" class="span2" placeholder="Jumlah Diskon" name="txtJumlah" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
     </div>
     </div>
     </div>
     