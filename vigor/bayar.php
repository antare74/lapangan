<?php
    $invoice = $_GET['invoice'];
    $data_waktu = mysql_query("SELECT TIMEDIFF (TIMEONLY,nows) as TIMEONLY FROM ( SELECT ADDTIME(TIMEONLY, '03:00:00') AS TIMEONLY, nows FROM
    (SELECT DATE_FORMAT(now(),'%H:%i:%s') TIMEONLY, DATE_FORMAT(NOW(),'%H:%i:%s') nows
    FROM tboking WHERE noInvoice='$invoice' ) a ) b " )or die(mysql_error());
    $waktu = mysql_fetch_array($data_waktu);

    $time = $waktu['TIMEONLY'];
?>

<div class="container">
    <div class="jumbotron text-center bg-transparent margin-none">
        <h1>PEMBAYARAN BOOKING VIGOR FUTSAL</h1>
        <p></p>
    </div>
    <div class="page-section">
        <div class="col-md-12 col-lg-12">
            <b><center style="font-size: 30px;">Batas Pembayaran <br><br><div id="ttime"> <?php echo $time ?> </div><div id="tdone"> <p>Booking Ulang <p></div></b>
            <b style="font-size: 13px;">Lewat dari jam diatas, booking expired</b><br>
            <b style="font-size: 13px;">Jangan Tutup Laman ini sebelum upload!!!</b>
        </div>
        <br>
        <br>
        <div class="col-md-12 col-lg-12">
            <b><center style="font-size: 20px;"><p id="demo"></p></b>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h4 class="page-section-heading"> DAFTAR INVOICE </h4>
                <div class="panel panel-default">
                    <!-- Data table -->
                    <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Tgl.Invoice</th>
                                    <th>No.Invoice</th>
                                    <th>Atas Nama</th>
                                    <th>Tgl.Boking </th>
                                    <th>Nomor Lapangan</th>
                                    <th>Jam</th>
                                    <th>Total Bayar</th>
                                    <th>Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                $tglSekarang =date("Ymd");
                                $invoice = $_GET['invoice'];
                                //var_dump($invoice);
                                $SQL="SELECT * FROM tboking a inner join tjam b on a.kdJam = b.kdJam WHERE a.noInvoice='$invoice' ";
                                $ExecuteQuery=mysql_query($SQL) or die(mysql_error());

                                if($no%2==1){
                                    $class="odd gradeX";

                                }else{
                                    $class="even gradeC";
                                }
                                    while($_data=mysql_fetch_array($ExecuteQuery)){
                                        $tglInvoice= region($_data['tglInvoice']);
                                        $tglBoking= region($_data['tglBoking']);
                                        $harga=idr_f($_data['hargaBoking']);
                                        $total=idr_f($_data['totalBayar']);

                                    echo"
                                    <tr class=$class>
                                        <td>$tglInvoice</td>
                                        <td>$_data[noInvoice]</td>
                                        <td>$_data[an]</td>
                                        <td>$tglInvoice</td>
                                        <td>Lapangan $_data[kdLapangan]</td>
                                        <td>$_data[jam]</td>
                                        <td>Rp. $total</td>

                                        <td>";
                                        if($_data['transfer']==""){
                                            echo"<a><button class='btn btn-primary' onclick='return show()' id='bayar'> <i class='icon-pencil'></i> &nbsp; Upload</button></a>
                                            ";

                                        }elseif($_data['transfer']!==""){
                                            echo"
                                            <label class='label label-success'>Lunas</label>
                                            ";

                                            }


                                        echo"
                                        </td>



                                </tr>


                                    ";
                                    $no++;
                                    }

                                ?>
                            </tbody>
                    </table>
                    <!-- // Data table -->
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal" id="modal-overlay-update">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="update_booking.php" method="POST" data-toggle="wizard" class="max-width-500 h-center" enctype="multipart/form-data">
                        <fieldset class="step relative paper-shadow" data-z="3">
                            <div class="page-section-heading">
                                <h2 class="text-h3 margin-v-0">Upload Bukti Transfer</h2>
                                <h3 class="text-h4 margin-v-10">No Rekening : </h3>
                                <h3 class="text-h4 margin-v-10">BCA (78889991) - Mandiri (788928292)-BRI (082928938) a/n Fhani Kurniawan</h3>
                            </div>
                            <?php
                                $invoice = $_GET['invoice'];
                                $SQL="SELECT * FROM tboking a inner join tjam b on a.kdJam = b.kdJam WHERE a.noInvoice='$invoice' ";
                                $ExecuteQuery=mysql_query($SQL) or die(mysql_error());
                                $_data=mysql_fetch_array($ExecuteQuery);

                            ?>
                            <div class="form-group">
                                <input class="form-control" type="text" id="noInvoice" name="noInvoice" value="<?php echo $invoice?>" readonly/>
                            </div>

                            <div class="form-group">
                                <input  class="form-control" type="text" id="total_invoice" name="total_invoice" value="<?php echo $_data['totalBayar'] ?>" readonly />
                            </div>

                            <div class="form-group">
                              <label for="no_rek">Transfer</label>
                                <input  class="form-control" type="text" id="no_rek" name="no_rek" placeholder="Transfer Ke Rekening : BCA/MANDIRI/BRI" style="text-transform:UPPERCASE;" />
                            </div>
                            <div class="form-group">
                              <label for="nama_rek">Rekening</label>
                                <input  class="form-control" type="text" id="nama_rek" name="nama_rek" placeholder="Rekening Atas Nama" />
                            </div>
                            <div class="form-group">

                                <label for="wiz-photo">Upload Bukti Transfer:</label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" id="upPhoto"  name="upPhoto" />

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                </div>
                                <div class="col-xs-6 text-right">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    var ready= false;
    var timer;
    $(function(){
        console.log("document is ready");

        name();

    });

        function show(){
            $('#modal-overlay-update').modal('show');
        }

        function name() {
            //clear the timer
            clearTimeout(timer);
            timer = setTimeout("name()", 1000);
            var time    = $("#ttime").html();
            var times   = time.split(":");

            var total_db = (parseInt(times[0])*60*60) + (parseInt(times[1]*60)) + parseInt(times[2]);
            total_db -= 1;

            var hours = parseInt(total_db / 3600);
            total_db %= 3600;
            var minutes = parseInt(total_db / 60);
            var seconds = parseInt(total_db % 60);
            console.log(hours);
            var new_time = (hours < 10 ? "0" : "") + hours + (minutes < 10 ? ":0" : ":" ) + minutes + (seconds < 10 ? ":0" : ":" ) + seconds;

            if (hours == -0 || hours == 0){
                $("#bayar").hide();
                $("#tdone").show();
                $("#ttime").hide();
            }else{

                $("#ttime").show();
                $("#tdone").hide();
                $("#ttime").html(new_time);

            }

        }
</script>
