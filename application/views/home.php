<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('common/scatas'); ?>
</head>
<body>
	<?php $this->load->view('common/header'); ?>
	<section id="content" class="slideshow-bg">
		<div id="slideshow">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<div class="slidebg" style="background-image:url(gudang/images/slider/banner3.jpg)"></div>
					</li>
				</ul>
			</div>
		</div>


		<div class="container">
			<div id="main">
				<h1 class="page-title">Rasakan Pengalaman Bermain Futsal Yang Berbeda</h1>
				<h2 class="page-description col-md-6 no-float no-padding">Dengan fasilitas yang memuaskan.</h2>
				<div class="search-box-wrapper style2">
					<div class="search-box">
						<ul class="search-tabs clearfix">
							<li class="active"><a  data-toggle="tab"><i class="soap-icon-calendar-check"></i><span>DAFTAR LAPANGAN</span></a></li>
						</ul>
						<div class="visible-mobile">
							<ul id="mobile-search-tabs" class="search-tabs clearfix">
								<li class="active"><a>JADWAL LAPANGAN</a></li>
							</ul>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="15px">No</th>
										<th >Nama Lapangan</th>
										<th>Tarif</th>
										<th>Waktu</th>										
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($lapangan as $data){?>
										<tr>
											<td><?php  echo $no++; ?></td>
											<td><?php echo $data->lapangan ?></td>
											<td><?php echo $data->harga ?></td>
											<td><?php echo $data->keterangan ?></td>							
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						
										</div>
									</div>
								</form>
							</div>
							<!-- TIKET PESAWAT -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
		<?php $this->load->view('common/footer'); ?>
	</footer>
</div>
<?php $this->load->view('common/scbawah'); ?>
</body>
</html>