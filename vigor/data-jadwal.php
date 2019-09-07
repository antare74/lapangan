<div class="container">
        <div class="jumbotron text-center bg-transparent margin-none">
            <h1 id="c-white">Daftar Jadwal Lapangan Vigor Pontianak</h1>
            <p></p>
        </div>
        <div class="page-section">
				<div class="row">
				<?php
				$SQL="SELECT kdLapangan, COUNT(kdLapangan) AS total FROM tjadwal GROUP BY kdLapangan ORDER BY total DESC LIMIT 1 ";
				$ExecuteQuery=mysql_query($SQL)or die(mysql_error());
				$_data=mysql_fetch_array($ExecuteQuery);
				$lap_max = $_data['kdLapangan'];

				$jam="SELECT jam, COUNT(a.kdJam) AS total FROM tjadwal a
				INNER JOIN tjam b ON a.kdJam=b.kdJam GROUP BY a.kdJam ORDER BY total 
				LIMIT 1 ";
				$query=mysql_query($jam)or die(mysql_error());
				$data=mysql_fetch_array($query);
				$jam_max = $data['jam'];

				?>
				<div class="col-md-12 col-lg-12">
					<b id="c-white"><center style="font-size: 20px;">Lapangan Terlaris Lapangan <?php echo $lap_max; ?></b>
				</div>
				<br>
				<br>
				<div class="col-md-12 col-lg-12">
					<b id="c-white"><center style="font-size: 20px;">Jam Yang Sering Digunakan <?php echo $jam_max; ?></b>
				</div>
			</div>
			<br>
            <div class="row">
                <div class="col-md-12 col-lg-12">
					<h4 id="c-white" class="page-section-heading"> DAFTAR JADWAL FUTSAL VIGOR </h4>
                    <div class="panel panel-default"style="border-radius:3px;padding:0.5rem">
                        <!-- Data table -->
                        <table id="contact-detail" class="responsive table-striped display nowrap" cellspacing="0" width="100%">
                            <thead>
								<tr>
									<th id="th-data-jadwal">No</th>
									<th id="th-data-jadwal">Kode Booking</th>
									<th id="th-data-jadwal">Nama</th>
									<th id="th-data-jadwal">Tgl.Jadwal</th>
									<th id="th-data-jadwal">Nomor Lapangan </th>
									<th id="th-data-jadwal">Jam </th>
									<th id="th-data-jadwal">Harga</th>
									<th id="th-data-jadwal">Status</th>
								</tr>
							</thead>
                            <tbody>
								<?php
								$no=1;
								$tglSekarang = date("Y-m-d");
								$SQL="SELECT *, (SELECT c.jam FROM tjam c where c.kdJam=a.kdJam2) as jam2 FROM (SELECT a.*, b.jam FROM tboking a inner join tjam b on a.kdJam = b.kdJam) a ";
								$ExecuteQuery=mysql_query($SQL)or die(mysql_error());
								
								if($no%2==1){
									$class="odd gradeX";
																		
									}else{
										$class="even gradeC";
									}
									while($_data=mysql_fetch_array($ExecuteQuery)){
									$tglJadwal= region($_data['tglInvoice']);
									$harga=idr_f($_data['totalBayar']);
									
									echo"
									<tr class=$class>
										<td id='td-custom'>$no</td>
										<td id='td-custom'>$_data[noInvoice]</td>
										<td id='td-custom'>$_data[an]</td>
										<td id='td-custom'>$_data[tglInvoice]</td>
										<td id='td-custom'>";
										if($_data['action']=="update"){
											echo"Lapangan $_data[kdLapangan2]";                                
										}else{
											echo"Lapangan $_data[kdLapangan]";                                
											}
										echo"
										<td id='td-custom'>";
										if($_data['action']=="update"){
											echo"$_data[jam2]";                                
										}else{
											echo"$_data[jam]";                                
											}
										echo"										
										<td id='td-custom'>$harga</td>
										<td id='td-custom'>";
										if($_data['statusBayar']=="L"){
											echo"
											<h5 style='color:red'><b>Sudah Diboking </b><span class='badge badge-secondary bg-primary'>&#10004</span>
											</h5>
											";
																						
											}elseif($_data['statusBayar']=="B"){
												echo"
												<h5 style='color:green'><b>Menunggu Pembayaran </b><span class='badge badge-secondary bg-danger'>&#10069</span>
												</h5>
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