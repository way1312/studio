<?php
include('includes/config.php');
$id		= $_POST['id'];
$brand	= $_POST['brand'];
$sql 	= "UPDATE kategori SET nama_kategori='$brand' WHERE id_kategori='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'kategori.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'kategoriedit.php?id=$id'; 
		</script>";

}
?>