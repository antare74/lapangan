<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	
	include"../../../appConfig/upFile.php";
	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="pinjam" AND $action=="simpanData"){

				
		$SQL="INSERT INTO tbarang (namaBrg,hargaBrg,stockBrg) VALUES ('$_POST[txtNama]','$_POST[txtHarga]','$_POST[txtStock]' ";
		mysql_query($SQL) or die (mysql_error());
		echo"
		<script language='javascript'>
		window.alert('Data Berhasil Disimpan');
		window.location=('../../frame.php?load=pinjam')
		</script>
		";
	
	
	}elseif($loadPage=="diskon" AND $action=="hapusData"){
		
		mysql_query("DELETE FROM tdiskon WHERE id=$_GET[id]")or die (mysql_error());

	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Dihapus');
	window.location=('../../frame.php?load=diskon')
	</script>
	";
		
		
		
	}elseif($loadPage=="pinjam" AND $action=="ubahData"){

	$today = date('Y-m-d');	
	$data_qty = mysql_query("SELECT sum(qty_sewa) as sewa FROM transaksi_brg where tgl_sewa = '$today' and id_brg='$_POST[id]' ")or die(mysql_error());
			$sisa = mysql_fetch_array($data_qty);

	$qty = $_POST['txtStock']-$sisa['sewa'];
		 
	$SQL="UPDATE tbarang SET namaBrg='$_POST[txtNama]',
							hargaBrg='$_POST[txtHarga]',
							stockBrg='$_POST[txtStock]'
							WHERE id='$_POST[id]'";	
	mysql_query($SQL) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=pinjam')
	</script>
	";

	}	
	}else{
		
		echo"
		<script language='javascript'>
		window.alert('Maaf Anda Tidak Dapat Melakukan Operasi CRUD');
		window.location=('../../frame.php?load=lapangan')
		</script>
		
		";
		}
?>