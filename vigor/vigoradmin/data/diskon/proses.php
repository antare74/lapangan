<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	
	include"../../../appConfig/upFile.php";
	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="diskon" AND $action=="simpanData"){

		
		$SQL="INSERT INTO tdiskon (nama,jumlah,status) VALUES ('$_POST[txtNama]','$_POST[txtJumlah]','0')";
		mysql_query($SQL) or die (mysql_error());
		echo"
		<script language='javascript'>
		window.alert('Data Berhasil Disimpan');
		window.location=('../../frame.php?load=diskon')
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
		
		
		
	}elseif($loadPage=="diskon" AND $action=="ubahData"){
		 
	$SQL="UPDATE tdiskon SET nama='$_POST[txtNama]',
							jumlah='$_POST[txtJumlah]',
							status='$_POST[rbStatus]'
							    
		  WHERE id='$_POST[id]'";	
	mysql_query($SQL) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=diskon')
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