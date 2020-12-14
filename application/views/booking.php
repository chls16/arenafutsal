<!DOCTYPE html>
<html>
<head>
	<!-- Page Title -->
	<title>Booking</title>
	
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Travelo | Responsive HTML5 Travel Template">
	<meta name="author" content="SoapTheme">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Theme Styles -->
	<link rel="stylesheet" href="<?=base_url() ?>gudang/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url() ?>gudang/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url() ?>gudang/css/animate.min.css">
	
	<!-- Current Page Styles -->
	<link rel="stylesheet" type="text/css" href="<?=base_url() ?>gudang/components/revolution_slider/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=base_url() ?>gudang/components/revolution_slider/css/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=base_url() ?>gudang/components/jquery.bxslider/jquery.bxslider.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=base_url() ?>gudang/components/flexslider/flexslider.css" media="screen" />
	
	<!-- Main Style -->
	<link id="main-style" rel="stylesheet" href="<?=base_url() ?>gudang/css/style.css">
	<link id="main-style" rel="stylesheet" href="<?=base_url() ?>gudang/css/pretty-checkbox.min.css">
	
	<!-- Custom Styles -->
	<link rel="stylesheet" href="<?=base_url() ?>gudang/css/custom.css">

	<!-- Updated Styles -->
	<link rel="stylesheet" href="<?=base_url() ?>gudang/css/updates.css">
	
	<!-- Responsive Styles -->
	<link rel="stylesheet" href="<?=base_url() ?>gudang/css/responsive.css">
</head>
<body>
		<div class="page-title-container style4">
			<div class="container">
				<div class="page-title">
                    <i class="soap-icon-card"></i>
                    <h2 class="entry-title">Pemesanan</h2>
                </div>
				<ul class="breadcrumbs pull-right">
					<li class="active">Informasi Kontak</li>
					<li><a>Pembayaran</a></li>
					<li><a>Selesai</a></li>
				</ul>
			</div>
		</div>
		<section id="content" class="gray-area">
			<div class="container">
				<div class="row">
					<div id="main" class="col-sms-6 col-sm-8 col-md-9">
						<div class="booking-section travelo-box">

							<form action="<?=base_url(); ?>pesawat/payment" class="booking-form" method="POST">
								<div class="person-information">
									<h2>Informasi Kontak</h2>
									<?php
									$wkwk = $user;

									if ($wkwk = $wkwk) {
										
									} else {
										// echo "Login atau register";
										echo "<a href=\"http://localhost/ukk/akun/login\">Login</a> atau <a href=\"http://localhost/ukk/akun/register\">Register</a>";
									}
									?>
									<?php foreach ($user as $key) {?>
									<div class="form-group row">
										<div class="col-sm-12">
											<label>Nama Lengkap</label>
											<input type="text" class="input-text full-width" value="<?=$key->nama ?>" placeholder="" disabled/>
										</div>
										<div class="col-sm-12">
											<label>Email</label>
											<input type="email" class="input-text full-width" value="<?=$key->email ?>" placeholder="" disabled/>
										</div>
										<div class="col-sm-12">
											<label>Nomor Telepon</label>
											<input type="text" class="input-text full-width" value="<?=$key->telepon ?>" placeholder="" disabled/>
										</div>
										<input type="hidden" name="id_users" value="<?=$key->id ?>">
										<input type="hidden" name="telepon" value="<?=$key->telepon ?>">
									
										<div class="col-sm-12">
											<label>Tanggal</label>
											<div class="form-group row">
												<div class="col-xs-6">
													<div class="datepicker-wrap">
														<input name="tanggal_booking" type="text" class="input-text full-width" placeholder="Tanggal" >
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12">
											<label>Jam</label>
											<div class="form-group row">
												<div class="col-xs-6">
													<div class="">
														<input name="jam_mulai"  type="time" class="input-text full-width" placeholder="Jam">
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12">
											<label>Durasi</label>
											<div class="form-group row">
												<div class="col-xs-6">
													<input type="number" name="durasi" class="input-text" placeholder="Durasi">
												</div>
											</div>
										</div>

										<div class="col-sm-12">
											<label>Lapangan</label>
											<div class="selector">
												<select class="full-width" name="lapangan" required>
													<option value="">Pilih Lapangan</option>
													<?php
                                    				foreach($lapangan as $row){
                                        			echo "<option style='text-transform:capitalize;' value='$row->id'>$row->lapangan</option>";
				                                    }
				                                    ?>		
												</select>
											</div>
										</div>
									
									</div>
								<div class="form-group row">
										<div class="col-sm-6 col-md-5">
											<button type="submit" class="full-width btn-large">BOOKING</button>
										</div>
									</div>
									<?php } ?>
								</div>
								<hr />
							</form>
						</div>
					</div>
					<div class="sidebar col-sms-6 col-sm-4 col-md-3">
						<div class="booking-details travelo-box">
							<h4>Booking Details</h4>
							<?php foreach ($rute as $data) {?>
							<article class="flight-booking-details">
								<figure class="clearfix">
									<a title="" href="" class="middle-block"><img class="middle-item" alt="" src="<?=base_url(); ?>gudang/images/logo/<?=$data->img ?>"></a>
									<div class="travel-title">
										<h5 class="box-title"><?php echo $data->bandarafrom; ?>(<?php echo $data->isofrom; ?>) - <?php echo $data->bandarato; ?> (<?php echo $data->isoto; ?>)<small><?php echo $data->maskapai; ?></small></h5>
										<a href="" class="button">EDIT</a>
									</div>
								</figure>
								<div class="details">
									<div class="constant-column-3 timing clearfix">
										<div class="check-in">
											<label>Pergi</label>
											<span><?php echo date_format(date_create($data->depart_at), 'd M Y');  ?><br /><?php echo date_format(date_create($data->depart_at), 'H:i');  ?></span>
										</div>
										<?php 
										$date1 = new DateTime($data->depart_at);
										$date2 = new DateTime($data->arrival);
										$diff = $date1->diff($date2);
										?>
										<div class="duration text-center">
											<i class="soap-icon-clock"></i>
											<span><?php echo $diff->h.' J '.$diff->i.' menit ' ?></span>
										</div>
										<div class="check-out">
											<label>Tiba</label>
											<span><?php echo date_format(date_create($data->arrival), 'd M Y');  ?><br /><?php echo date_format(date_create($data->arrival), 'H:i');  ?></span>
										</div>
									</div>
								</div>
							</article>
							<?php } ?>

							<h4>Other Details</h4>
							<dl class="other-details">
								<dt class="feature">Maskapai :</dt><dd class="value"><?php echo $data->maskapai; ?></dd>
								<dt class="feature">Harga :</dt><dd class="value"><?php echo $data->price; ?></dd>
								<dt class="feature">Quantity :</dt><dd class="value"><?=$seat_qty ?></dd>
								<dt class="total-price">Total Price</dt><dd class="total-price-value"><?php echo $seat_qty * $data->price; ?></dd>
							</dl>
						</div>

						<div class="travelo-box contact-box">
							<h4>Need Travelo Help?</h4>
							<p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
							<address class="contact-details">
								<span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
								<br>
								<a class="contact-email" href="#">help@travelo.com</a>
							</address>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer id="footer">
			<?php $this->load->view('common/footer'); ?>
		</footer>
	</div>

	<!-- Javascript -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/jquery-1.11.1.min.js"></script>
	<script >
		$(document).on('ready',function(){
			var limit = <?php echo $_GET['seat_qty']?>-1;
			tjq("input[name='seat_code[]']").on('change',function(){
				if(tjq("input[name='seat_code[]']:checked").length >= limit ){
					tjq("input[name='seat_code[]']").not(':checked').attr('disabled',true);
					if( tjq("input[name='seat_code[]']:checked").length <= limit ){
						tjq("input[name='seat_code[]']").not(':checked').attr('disabled',false);
					}
				}
			})
		})
	</script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/jquery.noconflict.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/modernizr.2.7.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/jquery-ui.1.10.4.min.js"></script>

	<!-- Twitter Bootstrap -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/bootstrap.js"></script>

	<!-- load revolution slider scripts -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/components/revolution_slider/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>

	<!-- load BXSlider scripts -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/components/jquery.bxslider/jquery.bxslider.min.js"></script>

	<!-- load FlexSlider scripts -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/components/flexslider/jquery.flexslider-min.js"></script>

	<!-- Google Map Api -->
	<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

	<!-- parallax -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/jquery.stellar.min.js"></script>

	<!-- waypoint -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/waypoints.min.js"></script>

	<!-- load page Javascript -->
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/theme-scripts.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>gudang/js/scripts.js"></script>

</body>
</html