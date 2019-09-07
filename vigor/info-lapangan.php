 <div class='container-fluid'>
        <div class='page-section'>
            <div class='row'>
                <div class='col-md-12 col-lg-9'>
                        <h1 id="c-white" class="text-display-1 margin-top-none">Info Lapangan Trend Futsal Centre</h1>
                        <?php
                        $SQL=mysql_query("SELECT * FROM tlapangan ORDER BY noLapangan ASC");
                        while($_data=mysql_fetch_array($SQL)){
                            echo"
                        <div class='row' id='info-lapangan'>
                            <h2 id='c-white'>Lapangan Nomor: $_data[noLapangan]</h2><br>
                            <div class='col-md-5 col-sm-12 text-center'>
                                <img src='gambar/lapangan_img/height/$_data[gambarLapangan]'>
                            </div>
                            <div class='col-md-7 col-sm-12'>
                                <p id='c-white'>
                                $_data[deskripsi]
                                </p>
                            </div>
                        </div>
                    ";    
                    }
                        ?>
                    
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>