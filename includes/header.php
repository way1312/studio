
<header>
            
   <?php   if(strlen($_SESSION['ulogin'])==0)
	{	
	?> 
	<?php }
	else{ 
	} ?>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['ulogin'];
$sql ="SELECT nama_user FROM users WHERE email='$email'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0)
{
while($results = mysqli_fetch_array($query))
	{
	 echo htmlentities($results['nama_user']); }}?>
	 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
           <?php if($_SESSION['ulogin']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="riwayatsewa.php">Riwayat Sewa</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Riwayat Sewa</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
        <?php if(!$_SESSION['ulogin']){?>
          <li><a href="index.php">Home</a></li>        	 
          <li><a href="page.php?type=aboutus">Tentang Kami</a></li>
          <li><a href="studio-listing.php">Daftar Studio dan Alat Musik</a>
          <li><a href="contact-us.php">Hubungi Kami</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Login</a></li>
            <?php } else { ?>
              <li><a href="index.php">Home</a></li>        	 
          <li><a href="page.php?type=aboutus">Tentang Kami</a></li>
          <li><a href="studio-listing.php">Daftar Studio dan Alat Musik</a>
          <li><a href="contact-us.php">Hubungi Kami</a></li>
          
            <?php } ?>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>