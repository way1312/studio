<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{

if(isset($_POST['submit'])){
$tanggal=$_POST['tanggal'];
$waktu=$_POST['waktu'];
$durasi=$_POST['durasi'];
$vid=$_POST['vid'];
$email=$_POST['email'];
$kode = buatKode("booking", "TRX");
$status = "Menunggu Pembayaran";
$bukti = "";
$cek=0;
$tgl=date('Y-m-d');
//insert
$sql 	= "INSERT INTO booking (kode_booking,id_studio,tgl,waktu,durasi,status,email,tgl_booking)
			VALUES('$kode','$vid','$tanggal','$waktu','$durasi','$status','$email','$tgl')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	for($cek;$cek<$durasi;$cek++){
		$tglmulai = strtotime($fromdate);
		$jmlhari  = 86400*$cek;
		$tgl	  = $tglmulai+$jmlhari;
		$tglhasil = date("Y-m-d",$tgl);
		$sql1	="INSERT INTO cek_booking (kode_booking,id_studio,tgl_booking,status)VALUES('$kode','$vid','$tanggal','$status')";
		$query1 = mysqli_query($koneksidb,$sql1);
	}
	echo " <script> alert ('Studio/Alat Musik berhasil disewa.'); </script> ";
	echo "<script type='text/javascript'> document.location = 'booking_detail.php?kode=$kode'; </script>";
	}else{
		echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
	}
}
?>

  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>NADA MUSIK STUDIO BINJAI</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 
<div>
	<br/>
	<center><h3>Studio/Alat Musik tersedia untuk disewa.</h3></center>
	<hr>
</div>
<?php
$email=$_SESSION['ulogin']; 
$vid=$_GET['vid'];
$tanggal=$_GET['tanggal'];
$waktu=$_GET['waktu'];
$durasi = $_GET['durasi'];
$sql1 	= "SELECT studio.*,kategori.* FROM studio,kategori WHERE kategori.id_kategori=studio.id_kategori and studio.id_studio='$vid'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$totalstudio = $durasi*$harga;
$totalsewa = $totalstudio;
?>
	<section class="user_profile inner_pages">
	<div class="container">
	<div class="col-md-6 col-sm-8">
	      <div class="product-listing-img"><img src="admin/img/studioimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" /> </a> </div>
          <div class="product-listing-content">
            <h5><?php echo htmlentities($result['nama_kategori']);?> , <?php echo htmlentities($result['nama']);?></a></h5>
            <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?>/Jam</p>
          </div>	
	</div>
	
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" name="sewa" onSubmit="return valid();"> 
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
 			<input type="hidden" class="form-control" name="email"  value="<?php echo $email;?>"required>
            <div class="form-group">
			<label>Tanggal</label>
				<input type="date" class="form-control" name="tanggal" placeholder="(dd/mm/yyyy)" value="<?php echo $tanggal;?>"readonly>
            </div>
            <div class="form-group">
			<label>Waktu</label>
				<input type="text" class="form-control" name="waktu" value="<?php echo $waktu;?>"readonly>
            </div>
            <div class="form-group">
			<label>Durasi</label>
				<input type="text" class="form-control" name="durasi" value="<?php echo $durasi;?> Jam"readonly>
            </div>
            <div class="form-group">
			<label>Biaya Sewa (<?php echo $durasi;?> Jam)</label><br/>
				<input type="text" class="form-control" name="biayastudio" value="<?php echo format_rupiah($totalstudio);?>"readonly>
            </div>
            <div class="form-group">
			<label>Total Biaya Sewa</label><br/>
				<input type="text" class="form-control" name="total" value="<?php echo format_rupiah($totalsewa);?>"readonly>
            </div>
			<br/>			
			<div class="form-group">
                <input type="submit" name="submit" value="Sewa" class="btn btn-block">
            </div>
        </form>
		</div>
		</div>
      </div>
</section>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>