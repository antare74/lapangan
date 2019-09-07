<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";

	$loadPage= $_GET['load'];
	$action =$_GET['action'];

	if($loadPage=="boking" AND $action=="tambahItem"){

			$item=mysql_query("SELECT * FROM tjadwal,tlapangan,tjam WHERE tjadwal.kdLapangan=tlapangan.kdLapangan
								AND tjadwal.kdJam=tjam.kdJam AND tjadwal.kdJadwal='$_GET[id]'");
			$_data=mysql_fetch_array($item);

			$SQL=mysql_query("SELECT * FROM tboking_temp WHERE jamBokingTemp='$_data[jam]'");
			$ketemu=mysql_num_rows($SQL);
		if($ketemu > 0){
			echo"
			<script language='javascript'>
				window.alert('Jam Sudah Diboking');
				window.location=('../../frame.php?load=boking&action=input')
			</script>
				";
		}else{
			$subtotal = $_data['harga'] *1;

				$SQL="INSERT INTO tboking_temp (kdJadwal,nomorLapangan,tglBokingTemp,jamBokingTemp,hargaTemp,subTotalTemp,idSession)
				VALUES ('$_data[kdJadwal]','$_data[noLapangan]','$_data[tglJadwal]','$_data[jam]','$_data[harga]','$subtotal','$_SESSION[username]')";
				mysql_query($SQL) or die (mysql_error());
			echo"
			<script language='javascript'>
				window.alert('Jam Boking Berhasil Ditambah');
				window.location=('../../frame.php?load=boking&action=input')
			</script>
				";
		}
	}elseif($loadPage=="boking" AND $action=="hapusData"){

		mysql_query("DELETE FROM tboking WHERE kdBoking=$_GET[id]")or die (mysql_error());

		echo"
		<script language='javascript'>
		window.alert('Data Berhasil Dihapus');
		window.location=('../../frame.php?load=boking')
		</script>
		";

	}elseif($loadPage=="boking" AND $action=="ubahStatus"){
		mysql_query("UPDATE tboking SET statusBayar='$_POST[rbStatus]' WHERE kdBoking='$_POST[id]'");
		echo"
		<script language='javascript'>
		window.alert('Status Transaksi Berhasil Dirubah');
		window.location=('../../frame.php?load=boking')
		</script>
		";


	}elseif($loadPage=="boking" AND $action=="selesai-boking"){
		$cekkeranjang = mysql_num_rows(mysql_query("SELECT * FROM tboking_temp WHERE idSession='$_SESSION[username]'"));
		if ($cekkeranjang == 0){
			echo "<script>window.alert('Maaf Transaksi Tidak Dapat Di Proses !!!');
				window.location=('../../frame.php?load=boking&action=input')</script>";
		}else{
			function isi_keranjang(){
				$isikeranjang = array();
				$sid = $_SESSION["username"];
				$sql = mysql_query("SELECT * FROM tboking_temp WHERE idSession='$sid'");

				while ($r=mysql_fetch_array($sql)) {
					$isikeranjang[] = $r;
				}
				return $isikeranjang;
			}
			$tahun=date("Y");
			$tgl_skrg = date("Ymd");

			$query=mysql_query("SELECT MAX(noInvoice) As nomorOrder FROM tboking");
				$kode=mysql_fetch_array($query);
				$kodeJadi=$kode["nomorOrder"];
				$noOrder=(int)substr($kodeJadi,3,3);
				$noOrder++;
				$char = "INV";
				$newID = $char . sprintf("%03s", $noOrder);
			$lunas="B";
			$tot=mysql_query("SELECT SUM(subTotalTemp) AS totalBayar FROM tboking_temp WHERE idSession='$_SESSION[username]'");
			$r=mysql_fetch_array($tot);


			mysql_query("INSERT INTO tboking (noInvoice,tglInvoice,usernameBoking,an,alamat,email,kontak,totalBayar,statusBayar)
			 VALUES('$newID','$tgl_skrg','$_SESSION[username]',
			'$_POST[txtNmLengkap]','$_POST[txtAlamat]','$_POST[txtEmail]',
			 		'$_POST[txtKontak]','$r[totalBayar]','$lunas')") or die(mysql_error());


			$id_orders=mysql_insert_id();
			$isikeranjang = isi_keranjang();
			$jml          = count($isikeranjang);

			for ($i = 0; $i < $jml; $i++){
			mysql_query("INSERT INTO trincian_boking(kdBoking,noLapangan,kdJadwal,hargaBoking,jamBoking,tglBoking,subTotal)
						VALUES('$id_orders','{$isikeranjang[$i]['nomorLapangan']}','{$isikeranjang[$i]['kdJadwal']}', '{$isikeranjang[$i]['hargaTemp']}','{$isikeranjang[$i]['jamBokingTemp']}','{$isikeranjang[$i]['tglBokingTemp']}',
			'{$isikeranjang[$i]['subTotalTemp']}')") or die(mysql_error());
			mysql_query("UPDATE tjadwal SET statusBoking='B' WHERE kdJadwal='{$isikeranjang[$i]['kdJadwal']}'");

			}

			mysql_query("DELETE FROM tboking_temp
						WHERE idSession = '$_SESSION[username]'");

			echo"
			<script language='javascript'>
			window.alert('Transaksi Berhasil Disimpan');
			window.location=('../../frame.php?load=boking')
			</script>

			";

		}
	}elseif($loadPage=="boking" AND $action=="updateData"){

		$lap 	= $_POST['s_lap'];
		$no_lap = substr($lap,0,-7);
		$today = date('Y-m-d');
		$id	= $_POST['id'];

		$data_jadwal =mysql_query("SELECT * FROM tjadwal WHERE tglJadwal='$_POST[txtTglBooking]' AND kdLapangan=$no_lap AND kdJam='$_POST[s_jam]' AND noInvoice!='$_POST[kd_boking]' ");
		$data=mysql_num_rows($data_jadwal);

		if($data > 0){
			echo"
			<script language='javascript'>
				window.alert('Data Booking Sudah Terisi, Pilih yang lain!');
				window.location=('../../frame.php?load=boking&action=updateData')</script>";



		}else{

				if($_POST['txtTglBooking'] < $today){
					echo"
					<script language='javascript'>
						window.alert('Pilih Tanggal Lain yang lebih besar!');
						window.location=('../../frame.php?load=boking&action=updateData')</script>";

				}
				else{


					$lap 	= $_POST['txt_harga'];
					$diskon = $_POST['txt_diskon'];
					$hrgBrg	= $_POST['hrgBrg'];
					$qtyBrg	= $_POST['QtyBrg'];
					$total	= $lap-$diskon + ($hrgBrg*$qtyBrg);

					if($_POST['kdBrg']!=="" || $_POST['hrgBrg']!==""){

						$today = date('Y-m-d');
						$data_qty = mysql_query("SELECT sum(qty_sewa) as sewa FROM transaksi_brg where tgl_sewa = '$today' and id_brg='$_POST[kdBrg]' ")or die(mysql_error());
						$sisa = mysql_fetch_array($data_qty);

						$sisaQty = $_POST['sisaBrg']-$sisa['sewa'];

						if($hrgBrg == 0){
							mysql_query("UPDATE tboking SET tglInvoice='$_POST[txtTglBooking]', kdLapangan2=$no_lap, kdJam2='$_POST[s_jam]', kd_item2='$_POST[kdBrg]',
							qty_item2='$_POST[QtyBrg]', totalBayar2='$total', action='update', updatetime=NOW() where kdBoking=$id ")or die(mysql_error());

							mysql_query("UPDATE tjadwal SET tglJadwal='$_POST[txtTglBooking]',kdLapangan=$no_lap ,kdJam='$_POST[s_jam]',harga='$total',
							statusBoking='B' where noInvoice='$_POST[kd_boking]' ")or die(mysql_error());
						}
						if($sisaQty == 0){
							echo"
							<script language='javascript'>
								window.alert('Stock Item Sudah Habis!');
								window.location=('../../frame.php?load=boking&action=updateData')</script>";

						}if($sisaQty > 0){
							mysql_query("INSERT INTO transaksi_brg (id_brg,tgl_sewa,qty_sewa)
							VALUES ('$_POST[kdBrg]','$_POST[txtTglBooking]','$_POST[QtyBrg]')")or die(mysql_error());

							mysql_query("UPDATE tboking SET tglInvoice='$_POST[txtTglBooking]', kdLapangan2=$no_lap, kdJam2='$_POST[s_jam]', kd_item2='$_POST[kdBrg]',
							qty_item2='$_POST[QtyBrg]', totalBayar2='$total', action='update', updatetime=NOW() where kdBoking=$id ")or die(mysql_error());

							mysql_query("UPDATE tjadwal SET tglJadwal='$_POST[txtTglBooking]',kdLapangan=$no_lap ,kdJam='$_POST[s_jam]',harga='$total',
							statusBoking='B' where noInvoice='$_POST[kd_boking]' ")or die(mysql_error());

						}
						echo"
						<script language='javascript'>
						window.alert('Data Berhasil Disimpan');
						window.location=('../../frame.php?load=boking&action=updateData')</script>";

					}
				}

		}
	}else{

		echo"
		<script language='javascript'>
		window.alert('Maaf Anda Tidak Dapat Melakukan Operasi CRUD');
		window.location=('../../frame.php?load=boking')
		</script>

		";
		}
}
?>
