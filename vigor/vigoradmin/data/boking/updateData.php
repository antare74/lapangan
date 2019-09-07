<?php
include"appConfig/conn.php";
include"appConfig/upFile.php";

$lap 	= $_POST['s_lap'];
$no_lap = substr($lap,0,-7);
$now 	= date('Y-m-d H:i:s');
$today = date('Y-m-d');
// $nama 	= $_POST['txt_nama'];

// var_dump($nama);
// exit();

$data_jadwal =mysql_query("SELECT * FROM tjadwal WHERE tglJadwal='$_POST[txtTglBooking]' AND kdLapangan=$no_lap AND kdJam='$_POST[s_jam]' ");
$data=mysql_num_rows($data_jadwal);

	if($data > 0){
	echo"
	<script language='javascript'>
		window.alert('Data Booking Sudah Terisi, Pilih yang lain!');
		window.location=('index.php');
	</script>
	";
	
	
	}else{

		if($_POST['txtTglBooking'] < $today){
			echo"
			<script language='javascript'>
				window.alert('Pilih Tanggal Lain yang lebih besar!');
				window.location=('index.php');
			</script>
			";
		}
		else{


			$lap 	= $_POST['txt_harga'];
			$diskon = $_POST['txt_diskon'];
			$hrgBrg	= $_POST['hrgBrg'];
			$qtyBrg	= $_POST['QtyBrg'];
			$total	= $lap-$diskon + ($hrgBrg*$qtyBrg);

			// var_dump($total);
			// exit();
		
			if($_POST['kdBrg']!=="" || $_POST['hrgBrg']!==""){
		
				$today = date('Y-m-d');	
				$data_qty = mysql_query("SELECT sum(qty_sewa) as sewa FROM transaksi_brg where tgl_sewa = '$today' and id_brg='$_POST[kdBrg]' ")or die(mysql_error());
				$sisa = mysql_fetch_array($data_qty);

				$sisaQty = $_POST['sisaBrg']-$sisa['sewa'];

				if($sisaQty == 0){
					echo"
					<script language='javascript'>
						window.alert('Stock Item Sudah Habis!');
						window.location=('index.php');
					</script>
					";
				}if($sisaQty > 0){
					mysql_query("INSERT INTO transaksi_brg (id_brg,tgl_sewa,qty_sewa)
					VALUES ('$_POST[kdBrg]','$_POST[txtTglBooking]','$_POST[QtyBrg]')")or die(mysql_error());					
			
					mysql_query("INSERT INTO tboking (noInvoice,tglInvoice,usernameBoking,an,alamat,email,kontak,totalBayar,statusBayar,kdLapangan,kdJam,updatetime,kd_item,qty_item)
					VALUES ('$_POST[kd_booking]','$_POST[txtTglBooking]','$_POST[user]','$_POST[txt_nama]','$_POST[alamat]','$_POST[txt_email]','$_POST[txt_no]',$total,'B',$no_lap,'$_POST[s_jam]',NOW(),'$_POST[kdBrg]','$_POST[QtyBrg]')")or die(mysql_error());

					mysql_query("INSERT INTO tjadwal (tglJadwal,kdLapangan,kdJam,harga,statusBoking,noInvoice)
					VALUES ('$_POST[txtTglBooking]',$no_lap,'$_POST[s_jam]',$total,'B','$_POST[kd_booking]')")or die(mysql_error());
				}
			}if($_POST['hrgBrg']==""){			
				mysql_query("INSERT INTO tboking (noInvoice,tglInvoice,usernameBoking,an,alamat,email,kontak,totalBayar,statusBayar,kdLapangan,kdJam,updatetime,kd_item,qty_item)
									VALUES ('$_POST[kd_booking]','$_POST[txtTglBooking]','$_POST[user]','$_POST[txt_nama]','$_POST[alamat]','$_POST[txt_email]','$_POST[txt_no]',$total,'B',$no_lap,'$_POST[s_jam]','$now','$_POST[kdBrg]',0)")or die(mysql_error());
				
				mysql_query("INSERT INTO tjadwal (tglJadwal,kdLapangan,kdJam,harga,statusBoking,noInvoice)
				VALUES ('$_POST[txtTglBooking]',$no_lap,'$_POST[s_jam]',$total,'B','$_POST[kd_booking]')")or die(mysql_error());
			}
			echo"
			<script language='javascript'>
			window.alert('Data Berhasil Disimpan');
			window.location=('frame.php?p=bayar&invoice=$_POST[kd_booking]');		

			</script>
			";
		}
	}

?>