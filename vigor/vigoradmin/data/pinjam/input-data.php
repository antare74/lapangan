<div id="content-header">
  <div id="breadcrumb"> <a href="?load=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?load=pinjam" class="tip-bottom">Module Pinjam</a> <a href="?load=pinjam&action=input" class="current">Input Data Barang</a> </div>
  <h1></h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Barang</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="data/pinjam/proses.php?load=diskon&action=simpanData" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nama Barang :</label>
              <div class="controls">
                <input type="text" class="span2" placeholder="Nama Barang" name="txtNama" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Harga Barang :</label>
              <div class="controls">
                <input type="text" class="span2" placeholder="Harga Barang" name="txtHarga" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Stock Barang :</label>
              <div class="controls">
                <input type="text" class="span2" placeholder="Stock Barang" name="txtStock" />
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
     