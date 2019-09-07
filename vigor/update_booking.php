<?php
include"appConfig/conn.php";
include"appConfig/upFile.php";

	
	$noInvoice 		= $_POST['noInvoice'];
	$total_invoice 	= $_POST['total_invoice'];
	$no_rek 		= strtoupper($_POST['no_rek']);
	$nama_rek 		= $_POST['nama_rek'];

	$now=date("Y-m-d H:i:s");
	// $addres_file 		= $_FILES['upPhoto']['tmp_name'];
	// $tipe_file   		= $_FILES['upPhoto']['type'];
	// $temp				= explode(".",$_FILES['upPhoto']['name']);
	// $filename 			= date('YmdHis');
	// $fix_filename		= $filename.".".end($temp);

	$addres_file 		= $_FILES['upPhoto']['tmp_name'];
	$tipe_file   		= $_FILES['upPhoto']['type'];
	$temp				= explode(".",$_FILES['upPhoto']['name']);
	$filename 			= date('YmdHis');
	$fix_filename		= $filename.".".end($temp);
	// $fix_filename 		= $_FILES['upPhoto']['name'];
			

	// var_dump($temp);
	// exit();

		if(empty($no_rek) || empty($nama_rek) || empty($addres_file)){
			echo"
			<script language='javascript'>
				window.alert('Lengkapi Form Pembayaran');
				window.location=('frame.php?p=bayar&invoice=$noInvoice')
			</script>
		";
		}
		else{
				

			if($tipe_file !="image/jpg" AND $tipe_file != "image/jpeg"){
				echo"
				<script language='javascript'>
				window.alert('Upload Gambar Gagal Pastikan File Bertipe JPEG');
				window.location=('frame.php?p=bayar&invoice=$noInvoice')
				</script>
				";
			}else{
					
					upTransfer($fix_filename);

					mysql_query("UPDATE tboking SET transfer='$fix_filename', statusBayar='L' where noInvoice='$_POST[noInvoice]' ")or die(mysql_error());
					mysql_query("INSERT INTO tpayment (id, noInvoice, totalBayar, type_rek, an_rek, updatetime) VALUES 
					(DEFAULT,'$noInvoice','$total_invoice','$no_rek','$nama_rek', NOW()) ")or die(mysql_error());
					mysql_query("UPDATE tjadwal SET statusBoking='L' where noInvoice='$_POST[noInvoice]' ")or die(mysql_error());
					echo"
						<script language='javascript'>
						window.alert('Data Berhasil Disimpan');
						window.location=('index.php')
						</script>
						";
				
			
			}
		  
		  
		  
	}

?>