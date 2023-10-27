<?php
include('includes/config.php');
error_reporting(0);
$title=$_POST['title'];
$brand=$_POST['brandname'];
$desc=$_POST['desc'];
$priceperhour=$_POST['priceperhour'];
$id=$_POST['id'];

$sql="UPDATE studio SET nama='$title',id_kategori='$brand',deskripsi='$desc',harga='$priceperhour' where id_studio='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'studio.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'studioedit.php?id=$id'; 
		</script>";
}
?>