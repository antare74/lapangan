  <div class="container">
        <div class="jumbotron text-center bg-transparent margin-none">
            <h1>HISTORY BOKING LAPANGAN ANDA</h1>
            <p></p>
        </div>
        <div class="page-section">
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
                                            <th>Nomor Lapangan</th>
                                            <th>Jam</th>
                                            <th>Sewa Item</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no=1;
									$tglSekarang =date("Ymd");
									$SQL="SELECT * FROM tboking a inner join tjam b on a.kdJam = b.kdJam 
                                    inner join tbarang c on a.kd_item = c.id WHERE a.usernameBoking='$_SESSION[username]'";
									$ExecuteQuery=mysql_query($SQL)or die(mysql_error());
									
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
                                            <td>Lapangan $_data[kdLapangan]</td>
                                            <td>$_data[jam]</td>
                                            <td>";
											if($_data['namaBarang']!==""){
												echo "<label>$_data[namaBrg] </label>";
																							
												}elseif($_data['namaBarang']==""){
                                                    echo "<label>Tidak Sewa </label>";
																										
													}
											
											
											echo"
											</td>
											<td>Rp. $total</td>
											
                                            <td>";
											if($_data['statusBayar']=="B"){
												echo"<label class='label label-danger'>Belum Lunas</label>";
																							
												}elseif($_data['statusBayar']=="L"){
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
        