<a style="display:none"href="https://bni.perpusnas.go.id/slot/">https://bni.perpusnas.go.id/slot/</a>
<a style="display:none"href="https://kin.perpusnas.go.id/Slot%20gacor/">https://bni.perpusnas.go.id/slot/</a>
<a style="display:none"href="https://demokipi.perpusnas.go.id/slot-gacor/">https://bni.perpusnas.go.id/slot/</a>
<?php 
include "config/koneksi.php";
$uri_path = $_SERVER['REQUEST_URI'];
$uri_segments = explode('/?', $uri_path);
$affiliates = $uri_segments[1];
$aff = explode("_", $affiliates);

if ($aff[0] == 'PMBUAA') {
  $cek_n = $aff[1];
  $cek_mhs_uaa = mysql_fetch_array(mysql_query("select NIMHSMSMHS from msmhs where NIMHSMSMHS = '$cek_n' and STMHSMSMHS = 'A'"));
  if ($cek_mhs_uaa['NIMHSMSMHS'] > 0) {
    echo '<script>window.location.replace("https://portal.almaata.ac.id/cisdt/admisi/mgm/'.$aff[1].'")</script>';
  }
}

//Include Configuration File
include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
    //echo $data['email'];
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="UTF-8">
    <title>Portal Universitas Alma Ata</title>
	<meta name="google-site-verification" content="AIzaSyAAjL6Q-S1KjHtXhb6ne_Kma-euvhXxyIc" />
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Portal Alma Ata adalah sistem informasi terpadu yang digunakan seluruh civitas akademika Universitas Alma Ata. Melalui sistem informasi ini mahasiswa, dosen dan karyawan dapat menggali informasi terbaru seputar akademik">
	<meta name="keywords" content="portal akademik,portal uaa,portal alma ata,universitas alma ata, uaa, portal akademik universitas alma ata, portal uaa, universitas alma ata yogyakarta, app.almaata.ac.id, login alma ata, almaata, login uaa, portal universitas, krs online alma ata, krs almaata, krs online">
	<meta name="robots" content="index, nofollow">
		
	<!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
	<meta name="theme-color" content="#0073ac" />
	<!-- URL Theme Color untuk Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#001b2a" />
	<!-- URL Theme Color untuk iOS Safari -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="#001b2a" />
		
	<meta content="Indonesia" name="geo.placename"/>

	<link rel="shortcut icon" href="picture/icon.png">
    <link rel="stylesheet" type="text/css" id="theme" href="mhs2/css/theme-default.css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<style>
body {
	font-family: 'Roboto', sans-serif;
}
 
	
	.login-footer {
		background-color:  #0073ac;
		color: black;
	}
	
	.login-body{
	
		background-color: #eff0f2;
	}

	input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
	color: black;
	font-size: 13px;
	background-color: #d8efff;
}
.newst {
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	background-attachment: fixed;
	height: 90vh;
}
.blink_text {

    animation:1s blinker linear infinite;
    -webkit-animation:1s blinker linear infinite;
    -moz-animation:1s blinker linear infinite;

     color: white;
    }

    @-moz-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @-webkit-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }
	</style>
</head>
<body style="
			background-image: url(assets/login/bg_hex01.jpg) ;
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
			background-color: #999;">

<div style="background-image: linear-gradient(to bottom, rgba(0,115,172,0.3), rgba(0,115,172,0.3), rgba(0,115,172,0.09)); padding: 1.5rem;">
 	<marquee behavior=scroll direction="left" scrollamount="3">
	   <h2 style="color: white;"><b>PENGUMUMAN DITUJUKAN KEPADA SELURUH MAHASISWA DAN CIVITAS AKADEMIK UNIVERSITAS ALMA ATA UNTUK PENGURUSAN EMAIL BISA MENGHUBUNGI NOMOR WA. 0898-6109-540 PADA JAM KERJA 08.00 - 16.00 WIB DI HARI SENIN - JUMAT</b></h2>
	</marquee>
 </div>	 
	<?php session_start();
 
	if(!isset($_SESSION['access_token'])) {
	$login_button = '<a href="'.$google_client->createAuthUrl().'" class="btn btn-info btn-block"  type="button" style="background-color:white; color:#0073ac; font-weight:bold;">Login with email@almaata.ac.id</a>';
	} 
//		echo 'Indonesian Timezone: ' . date('d-m-Y H:i:s');
 date_default_timezone_set("Asia/Jakarta");
	
 include "config/function_periode_krs.php";
	$actual_link = "$_SERVER[HTTP_HOST]";
		
		$p		=   $_GET['p'];
		//if ($actual_link == '124.40.251.214'){ 
  if(isset($_SESSION['access_token'])) {  
  	//echo $_SESSION['user_email_address'];
   $cek_nim = mysql_num_rows(mysql_query("SELECT EMAIL FROM msmhs WHERE CONCAT( NIMHSMSMHS, '@almaata.ac.id' ) = '$_SESSION[user_email_address]'"));
   //echo strlen($cek_nim);

   if ($cek_nim) {
    $_SESSION['NIMHSMSMHS'] = explode("@", $_SESSION['user_email_address'])[0];
   } else if ($cek_nim == 0){

    $query_get_dosen = mysql_query("SELECT NODOSMSDOS FROM msdos WHERE EMAILDOSEN LIKE '$_SESSION[user_email_address]'");
    $query_get_kyw = mysql_query("SELECT NOKYWMSKYW FROM mskyw WHERE EMAILMSKYW LIKE '%$_SESSION[user_email_address]%'");
    $NODOS = mysql_fetch_assoc($query_get_dosen);
    $NOKYW = mysql_fetch_assoc($query_get_kyw);
    
    if (!empty($NODOS['NODOSMSDOS'])) {
      $_SESSION['NODOS'] = $NODOS['NODOSMSDOS'];
    } else if (!empty($NOKYW['NOKYWMSKYW'])){
      $_SESSION['NODOS'] = $NOKYW['NOKYWMSKYW'];
    } else {
      echo '<script>window.location.replace("http://app.almaata.ac.id/logout.php")</script>';
    }
   } 
  } 
	?>      
 
          <div class="login-container newst" style="height:100%; background: none;">
    <?php 
//echo $def_front['konten'];
	//echo $actual_link;

				if(isset($_GET['page'])){
					$page = htmlentities($_GET['page']);
				}else{
						$page = "welcome1";
				}
					
					$file="$page.php";
					$cek=strlen($page);
					
				if($cek>30 || !file_exists($file) || empty($page)){
				
				} else {
						include ($file);
				}
	?>
	<!--
	<div style=" padding:5px; position:relative; width:100%; overflow-y: scroll;
overflow-x: hidden; height:150px; background-color:white;">
		<center><span style="color:black; ">
			Diberitahukan kepada Seluruh Mahasiswa bahwa masa <b>pembayaran Her-Registrasi Semester Genap adalah Tanggal 1-7 Feb 2020</b>, sedangkan masa <b>KRS adalah 1-14 Feb 2020</b>. Selama masa KRS, akses Portal Mahasiswa pada pukul 07:00-17:00 akan dibatasi (tidak bisa login) dan hanya dapat diakses oleh Prodi yang terjadwal KRS. Gunakan <b><a href="https://play.google.com/store/apps/details?id=com.owplus.almaatamobile&hl=in" target="_blank">Alma Ata Mobile</a></b> jika Portal Mahasiswa sedang dibatasi.
 </span><br><span style="font-size:14px; color:black;"><b>
 Jadwal KRS </b></span>
 <style type="text/css">
 
.tg  {border-collapse:collapse;border-spacing:0;  }
.tg td{font-family:Arial, sans-serif;font-size:10px;padding:1px 2px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:2px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-z0iz{background-color:#fffc9e;text-align:left;vertical-align:top}
.tg .tg-1eri{font-weight:bold;background-color:#ffcc67;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg" style="background-color:white;">
  <tr>
    <th class="tg-1eri">Tanggal</th>
    <th class="tg-1eri">07:00-12:00</th>
    <th class="tg-1eri">12:00-17:00</th>
    <th class="tg-1eri">17:00-07:00</th>
  </tr>
  <tr>
    <td class="tg-z0iz">Sabtu, 1 Feb 2020</td>
    <td class="tg-0lax">SI &amp; TI</td>
    <td class="tg-0lax">MNJ &amp; AKT</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Minggu, 2 Feb 2020</td>
    <td class="tg-0lax">ARS &amp; PGMI</td>
    <td class="tg-0lax">ESY &amp; PSY</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Senin, 3 Feb 2020</td>
    <td class="tg-0lax">PGSD&amp;PMAT</td>
    <td class="tg-0lax">KEBIDANAN</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Selasa, 4 Feb 2020</td>
    <td class="tg-0lax">FARMASI</td>
    <td class="tg-0lax">FARMASI</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Rabu, 5 Feb 2020</td>
    <td class="tg-0lax">GIZI</td>
    <td class="tg-0lax">GIZI</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Kamis, 6 Feb 2020</td>
    <td class="tg-0lax">KEPERAWATAN</td>
    <td class="tg-0lax">KEPERAWATAN</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Jumat, 7 Feb 2020</td>
    <td class="tg-0lax">PAI</td>
    <td class="tg-0lax">PAI</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Sabtu, 8 Feb 2020</td>
    <td class="tg-0lax">FARMASI</td>
    <td class="tg-0lax">FARMASI</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Minggu, 9 Feb 2020</td>
    <td class="tg-0lax">GIZI</td>
    <td class="tg-0lax">GIZI</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Senin, 10 Feb 2020</td>
    <td class="tg-0lax">SI &amp; TI</td>
    <td class="tg-0lax">MNJ &amp; AKT</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Selasa, 11 Feb 2020</td>
    <td class="tg-0lax">PGSD &amp; PMAT</td>
    <td class="tg-0lax">KEBIDANAN</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Rabu, 12 Feb 2020</td>
    <td class="tg-0lax">ARS &amp; PGMI</td>
    <td class="tg-0lax">ESY &amp;PSY</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Kamis, 13 Feb 2020</td>
    <td class="tg-0lax">PAI</td>
    <td class="tg-0lax">PAI</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
  <tr>
    <td class="tg-z0iz">Jumat, 14 Feb 2020</td>
    <td class="tg-0lax">KEPERAWATAN</td>
    <td class="tg-0lax">KEPERAWATAN</td>
    <td class="tg-0lax">Semua Prodi</td>
  </tr>
</table>
</center>
				</div> 
				-->
				
				
				
            <div class="login-box">
 
                <div class="login-body" style="background-image: linear-gradient(to bottom, rgba(0,115,172,0.3), rgba(0,115,172,0.3), rgba(0,115,172,1));">
                   
									
					
					<?php
	if (!empty($p)){
		echo '<br><center><font color=red> Silahkan cek email anda!</font></center>';
	} else {
		
	}
	
  if(isset($_SESSION['access_token'])) {
  	if(isset($_SESSION['NIMHSMSMHS'])){
      echo '<script>window.location.replace("http://app.almaata.ac.id/mhs2/i.php")</script>'; 
  		//header('Location:mhs2/i.php');
  	} else if (isset($_SESSION['NODOS'])){ 

  		$SESNODOS = $_SESSION['NODOS'];

  		$cek_dos = mysql_num_rows(mysql_query("SELECT * FROM akun_login WHERE user_id = '$SESNODOS' and kategori = 'dosen' "));

  		if ($cek_dos == 0){
        echo '<script>window.location.replace("http://app.almaata.ac.id/staf3/user.php?page=dasbor")</script>';
  			//header('Location:staf3/user.php?page=dasbor');
  		} else {
        echo '<script>window.location.replace("http://app.almaata.ac.id/dosen3/user.php?page=dasbor")</script>';
  			//header('Location:dosen3/user.php?page=dasbor'); 
  		}
  	} else {
      echo '<script>window.location.replace("http://app.almaata.ac.id/logout.php")</script>';
    }
  } 
/*	else {
		header('Location:app.almaata.ac.id/logout.php');
	}*/

//LOGIN DENGAN COOKIE
/* if (isset($_COOKIE["userportal_mhs"]))  {
	$_SESSION['NIMHSMSMHS']	=	$_COOKIE["userportal_mhs"];
	header('Location:mhs2/i.php');
} else if (isset($_COOKIE["userportal_staf"]))  {
	$_SESSION['NODOS']	=	$_COOKIE["userportal_staf"];
	header('Location:staf3/user.php?page=dasbor');
} else if (isset($_COOKIE["userportal_dosen"]))  {
	$_SESSION['NODOS']	=	$_COOKIE["userportal_dosen"];
	header('Location:dosen3/user.php?page=dasbor');
} */

	?>

			
                    <form class="form-horizontal" action="?page=auth3" method="POST" onSubmit="return validasi(this)">
					  <div class="login-title " >
					  	
					 <?php             
						echo '<center><img src="assets/login/main_logo_white.png"  oncontextmenu="return false;" style="padding:6px; height:90px;"></center>';
            // echo '<div style="color:red;"><center><h2>Khusus Cek Tagihan</h2></center></div>';
            echo '<center><span data-toggle="tooltip" data-placement="top" style="background-color:red; font-size: large;"class="btn-xs btn-warning" title="Khusus Cek Tagihan">Khusus Cek Tagihan</span></center>';	
					
									$date = date("H");
									if ($date < 3) { $ucapan="Selamat Pagi";
									} else if ($date < 9) {
									$ucapan="Selamat Pagi";
									} else if ($date < 15) {
									$ucapan="Selamat Siang";
									} else if ($date < 18) { $ucapan="Selamat Sore";
									} else if ($date < 23) { $ucapan="Selamat Malam";
									}
				?>
				</div>
 
						
						
					<!-- <div class="form-group">
                        <div class="col-md-12">
                            <input type="text"  placeholder="Username" name="NIMHSMSMHS" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password"  placeholder="Password" name="login_pass" required />
                        </div>
                    </div> -->
                    <div class="form-group">
					<div class="col-md-12">
						<!-- <button class="btn btn-info btn-block"  type="submit" style="background-color:white; color:#0073ac; font-weight:bold;">LOGIN</button>
						<hr>
						<p style="color: white; text-align: center;">atau</p> -->
						<?php 
							echo $login_button;
						 ?>
                   	</div>
                        <div class="col-md-6">
						<?php 
						//$jam_skr = '17:05';
						$jam_skr = date("H:i");
						//if (($jam_skr >= '15:00') AND ($jam_skr <= '07:00')){
							//if ((($jam_skr >= '17:00') AND ($jam_skr <='23:59')) OR (($jam_skr >= '00:00') AND ($jam_skr <='07:00'))) {
							//echo '<a href="mhs2/reset_pass"><p><font color="black">Lupa password ?</font></p></a>  ';
						//}
						?>
						
						</div>
						
						
                    </div>
					
                    </form>
					
                </div>
                <div class="login-footer">
                    <div class="pull-left" style="color:white;">
                        <?php echo date("Y"); ?> © Universitas Alma Ata  
                    </div>
					<div class="pull-right">
						<a href="#" title="Info" data-toggle="modal" data-target="#myModal"><span class="blink_text"><b>Help ?</b></span></a>
					</div>
                </div>
				 <?php            
					  if ($actual_link == '10.10.10.1'){
						echo '<small>Anda menggunakan jaringan internal Alma Ata</small>';
					  }
				?>
		 
				
            </div>
		
        </div>
			
		

        </div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
				<button type="button" class="close btn btn-info" data-dismiss="modal" aria-label="Close" style="position: absolute; margin-left: -2%;width: 100px;"><span aria-hidden="true" >&times;</span> CLOSE</button>
		        
		        <img src="images/update-login-portal.jpg" style="width: 100%">
		      </div>
		    </div>
		  </div>
		</div>
		
    </body>
</html>

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>


        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>       
        <!-- <script type="text/javascript">
        	$(document).ready(function() {
        		$('#myModal').modal({
        		  show: true,
				  keyboard: false,
				  backdrop: 'static'
				});
        	});
        </script> -->
