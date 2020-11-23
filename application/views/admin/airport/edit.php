<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Rute</title>
	<?php $this->load->view('admin/common/scatas'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php $this->load->view('admin/common/header'); ?>
		<?php $this->load->view('admin/common/menu'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Create Data</h1>
				<?php foreach ($airport as $d) {?>
				<form action="<?php echo base_url(). 'admin/airport/update/'.$d->id;; ?>" method="post">
				</section>
				<section class="content">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Airport</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<div class="form-group">
									<label>Kota : </label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" disabled>
											<option value=""><?=$d->destination ?></option>
										</select>
									</div>
									<label>Nama : </label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building-o"></i>
										</div>
										<input name="name" type="text" class="form-control" value="<?=$d->name ?>" required/>
									</div>
									<div class="form-group">
										<label>Kode : </label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-qrcode"></i>
											</div>
											<input name="iso" type="text" class="form-control" value="<?=$d->iso ?>" required/>
										</div>
										<?php } ?>
									</div>
									<input type="submit" class="btn btn-primary" />
								</div>
							</div>
						</section>
					</form> 
				</div>
				<div class="control-sidebar-bg"></div>
			</div>
			<?php $this->load->view('admin/common/scbawah'); ?>
		</body>
		</html>