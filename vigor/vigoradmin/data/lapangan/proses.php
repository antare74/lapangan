<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	
	include"../../../appConfig/upFile.php";
	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="lapangan" AND $action=="simpanData"){
		 $addres_file = $_FILES['upPhoto']['tmp_name'];
		  $tipe_file   = $_FILES['upPhoto']['type'];
		  $filename    = $_FILES['upPhoto']['name'];
		  $enkrip	   = md5($filename);
		  $filenameenkrip = $enkrip.$filename;
		
	if(empty($addres_file)){
		$SQL="INSERT INTO tlapangan (noLapangan,deskripsi,harga) VALUES ('$_POST[txtNoLapangan]','$_POST[txtDeskripsi]','$_POST[txtHarga]')";
	mysql_query($SQL) or die (mysql_error());
    echo"
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
	}else{
		 if($tipe_file !="image/jpg" AND $tipe_file != "image/jpeg"){
				  echo"
				  <script language='javascript'>
				  window.alert('Upload Gambar Gagal Pastikan File Bertipe JPEG');
				  window.location=('../../frame.php?load=lapangan')
				  </script>
				  ";
				  }else{
					  
		upLapangan($filenameenkrip);
		$SQL="INSERT INTO tlapangan (noLapangan,deskripsi,gambarLapangan,harga) VALUES ('$_POST[txtNoLapangan]','$_POST[txtDeskripsi]','$filenameenkrip','$_POST[txtHarga]')";
	mysql_query($SQL) or die (mysql_error());
    echo"
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
				  
				  }
		
		
		
		}
	
	
	}elseif($loadPage=="lapangan" AND $action=="hapusData"){
		
	$Query=mysql_query("SELECT gambarLapangan FROM tlapangan WHERE kdLapangan ='$_GET[id]'");
	$remove= mysql_fetch_array($Query);
	
	if($remove['gambarLapangan'] !=""){
		mysql_query("DELETE FROM tlapangan WHERE kdLapangan=$_GET[id]")or die (mysql_error());
		unlink("../../../gambar/lapangan_img/height/$_GET[fimage]");
		unlink("../../../gambar/lapangan_img/medium/medium_$_GET[fimage]");
		unlink("../../../gambar/lapangan_img/small/small_$_GET[fimage]");
		}else{
		mysql_query("DELETE FROM tlapangan WHERE kdLapangan=$_GET[id]")or die (mysql_error());
		}
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Dihapus');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
		
		
		
	}elseif($loadPage=="lapangan" AND $action=="ubahData"){
		  $addres_file = $_FILES['upPhoto']['tmp_name'];
		  $tipe_file   = $_FILES['upPhoto']['type'];
		  $filename    = $_FILES['upPhoto']['name'];
		  $enkrip	   = md5($filename);
		  $filenameenkrip = $enkrip.$filename;
			if(empty($addres_file)){
	$SQL="UPDATE tlapangan SET noLapangan='$_POST[txtNoLapangan]',
							   deskripsi='$_POST[txtDeskripsi]',
							   harga='$_POST[txtHarga]'
							    
		  WHERE kdLapangan='$_POST[id]'";	
	mysql_query($SQL) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
	}else{
		
				 if($tipe_file !="image/jpg" AND $tipe_file != "image/jpeg"){
				  echo"
				  <script language='javascript'>
				  window.alert('Upload Gambar Gagal Pastikan File Bertipe JPEG');
				  window.location=('../../frame.php?load=lapangan&action=edit&id=$_POST[id]')
				  </script>
				  ";
				  }else{
				upLapangan($filenameenkrip);
					$SQL="UPDATE tlapangan SET noLapangan='$_POST[txtNoLapangan]',
							   deskripsi='$_POST[txtDeskripsi]',
							   harga='$_POST[txtHarga]',
							   gambarLapangan='$filenameenkrip'
							    
		  WHERE kdLapangan='$_POST[id]'";	
	mysql_query($SQL) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
	
	}
	}
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