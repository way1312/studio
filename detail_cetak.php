<?php
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
$kode=$_GET['kode'];
$sql1 	= "SELECT booking.*,studio.*, kategori.*, users.* FROM booking,studio,kategori,users WHERE booking.id_studio=studio.id_studio 
			AND kategori.id_kategori=studio.id_kategori and booking.email=users.email and booking.kode_booking='$kode'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$durasi = $result['durasi'];
$totalstudio = $durasi*$harga;
$totalsewa = $totalstudio;
$tglmulai = strtotime($result['tgl']);
$jmlhari  = 86400*1;
$tgl	  = $tglmulai-$jmlhari;
$tglhasil = date("Y-m-d",$tgl);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="rental studio">
	<meta name="author" content="universitas pamulang">

	<title>Cetak Detail Sewa</title>

	<link href="assets/images/cat-profile.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="assets/new/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/new/offline-font.css" rel="stylesheet">
	<link href="assets/new/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="assets/new/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="assets/images/nada.png" alt="logo-dkm" width="80" />
						</td>
						<td class="text-center"><h3>NADA MUSIK STUDIO BINJAI</h3></td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center"><h2>Rental Studio dan Alat Musik</h2></td>
					</tr>
					<tr>
						<td class="text-center">Gg. Amal Bhakti No.8, Binjai Estate, Kec. Binjai Sel., Kota Binjai, Sumatera Utara 20736</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">Detail Sewa</h4>
			<br />
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td width="23%">No. Sewa</td>
						<td width="2%">:</td>
						<td><?php echo $result['kode_booking'];?></td>
					</tr>
					<tr>
						<td>Penyewa</td>
						<td>:</td>
						<td><?php echo $result['nama_user'] ?></td>
					</tr>
					<tr>
						<td>studio</td>
						<td>:</td>
						<td><?php echo $result['nama_kategori'];echo  ", "; echo $result['nama']; ?></td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td><?php echo IndonesiaTgl($result['tgl']);?></td>
					</tr>
					<tr>
						<td>Waktu</td>
						<td>:</td>
						<td><?php echo ($result['waktu']);?></td>
					</tr>
					<tr>
						<td>Durasi</td>
						<td>:</td>
						<td><?php echo $result['durasi'];?> Jam</td>
					</tr>
					<tr>
						<td>Total Biaya Sewa (<?php echo $result['durasi'];?>) Jam</td>
						<td>:</td>
						<td><?php echo format_rupiah($totalsewa);?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php echo $result['status'];?></td>
					</tr>
					<?php
						if($result['status']=="Menunggu Pembayaran"){
							$sqlrek 	= "SELECT * FROM tblpages WHERE id='5'";
							$queryrek = mysqli_query($koneksidb,$sqlrek);
							$resultrek = mysqli_fetch_array($queryrek);

							echo "
						<tr>
							<td colspan='3'>
								<b>*Silahkan transfer total biaya sewa ke ".$resultrek['detail']."maksimal tanggal "?> <?php echo IndonesiaTgl($tglhasil);?> <?php echo ".
							</td>
						</tr>
							";
						}else{
							
						}?>
				</tbody>
			</table>
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#jumlah').terbilang({
				'style'			: 3, 
				'output_div' 	: "jumlah2",
				'akhiran'		: "Rupiah",
			});

			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="assets/new/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="assets/new/jTerbilang.js"></script>

</body>
</html>