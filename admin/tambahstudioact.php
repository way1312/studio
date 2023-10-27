<?php
include('includes/config.php');
error_reporting(0);
$title=$_POST['title'];
$brand=$_POST['brandname'];
$desc=$_POST['desc'];
$priceperhour=$_POST['priceperhour'];
$vimage1=$_FILES["img1"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/studioimages/".$_FILES["img1"]["name"]);
$sql 	= "INSERT INTO studio (nama,id_kategori,deskripsi,harga,image1)
			VALUES ('$title','$brand','$desc','$priceperhour','$vimage1')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'studio.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahstudio.php'; 
		</script>";
}
?>