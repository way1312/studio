<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');

if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
	$tglnow   = date('Y-m-d');
	$tglmulai = strtotime($tglnow);
	$jmlhari  = 86400*1;
	$tglplus  = $tglmulai+$jmlhari;
	$now = date("Y-m-d",$tglplus);

if(isset($_POST['submit'])){
	$tanggal=$_POST['tanggal'];
	$waktu=$_POST['waktu'];
	$durasi=$_POST['durasi'];
	$vid=$_POST['vid'];
//cek
$sql 	= "SELECT kode_booking FROM booking WHERE tgl='$tanggal' AND waktu='$waktu' AND id_studio='$vid' AND status!='Cancel'";
$query 	= mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0){
		echo " <script> alert ('Studio/Alat Musik tidak tersedia di tanggal dan waktu yang anda pilih, silahkan pilih tanggal dan waktu lain!'); 
		</script> ";
	}else{
		echo "<script type='text/javascript'> document.location = 'booking_ready.php?vid=$vid&tanggal=$tanggal&waktu=$waktu&durasi=$durasi'; </script>";
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

<?php 
$vid=$_GET['vid'];
$useremail=$_SESSION['login'];
$sql1 = "SELECT studio.*,kategori.* FROM studio,kategori WHERE kategori.id_kategori=studio.id_kategori and studio.id_studio='$vid'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
?>
<script type="text/javascript">
function valid()
{
	if(document.sewa.todate.value < document.sewa.fromdate.value){
		alert("Tanggal selesai harus lebih besar dari tanggal mulai sewa!");
		return false;
	}
	if(document.sewa.fromdate.value < document.sewa.now.value){
		alert("Tanggal sewa minimal H-1!");
		return false;
	}

return true;
}
</script>

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
        <form method="post" name="sewa" onSubmit=""> 
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
			<label>Tanggal</label>
				<input type="date" class="form-control" name="tanggal" placeholder="(dd/mm/yyyy)" required>
				<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>">
            </div>
            <div class="form-group">
			<label>Waktu</label>
				<select class="form-control" name="waktu" required>
					<option value="">== Pilih Waktu ==</option>
					<option value="08.00">08.00</option>
					<option value="09.00">09.00</option>
					<option value="10.00">10.00</option>
					<option value="11.00">11.00</option>
					<option value="12.00">12.00</option>
					<option value="13.00">13.00</option>
					<option value="14.00">14.00</option>
					<option value="15.00">15.00</option>
					<option value="16.00">16.00</option>
					<option value="17.00">17.00</option>
					<option value="18.00">18.00</option>
					<option value="19.00">19.00</option>
					<option value="20.00">20.00</option>
				</select>
            </div>
			<div class="form-group">
			<label>Lama Penyewaan (Per Jam)</label><br/>
				<input type="number" min="1" name="durasi" class="form-control" required>
            </div>
			<br/>			
			<div class="form-group">
                <input type="submit" name="submit" value="Cek Ketersediaan" class="btn btn-block">
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