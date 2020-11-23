<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rute</title>
	<?php $this->load->view('admin/common/scatas'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php $this->load->view('admin/common/header'); ?>
		<?php $this->load->view('admin/common/menu'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Manage Data</h1>
				<div class="row">
					<div class="col-sm-2 col-md-2">
				 </div>
			 </div>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Rute</h3>
								<div class="box-tools">
									<div class="input-group input-group-sm" style="width: 150px;">
										<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
								<tbody>
									<tr>
										<th>No</th>
										<th>Pergi</th>
										<th>Tiba</th>
										<th>Dari</th>
										<th>Tujuan</th>
										<th>Maskapai</th>
										<th>Harga</th>
										<th>Dibuat</th>
										<th>Action</th>
										<?php $no = 1; ?>
									</tr><?php foreach ($rute as $data){?>
									<tr>
										<td><?php  echo $no++; ?></td>
										<td><?php echo date_format(date_create($data['depart_at']), 'd M Y H:i');  ?></td>
										<td><?php echo date_format(date_create($data['arrival']), 'd M Y H:i');  ?></td>
										<td><?php echo $data['mangkat_from'] ?> <br><?php echo $data['rute_from'] ?> (<?php echo $data['iso_from']?>)</td>
										<td><?=$data['mangkat_to']?> <br><?=$data['rute_to']?> (<?=$data['iso_to']?>)</td>
										<td><?php echo $data['maskapai'] ?></td>
										<td>Rp. <?php echo $data['price'] ?></td>
										<td><?php echo date_format(date_create($data['creat_date']), 'd M Y H:i');  ?></td>
										<td>
											<a href="<?php echo base_url('admin/rute/edit/'.$data['id']) ?>" class="btn btn-default btn-sm"><span class="fa fa-pencil"> Edit</span></a>
											<a href="<?php echo base_url('admin/rute/del/'.$data['id']) ?>" onclick="return confirm('Delete ?')" class="btn btn-default btn-sm"><span class="fa fa-trash"> Delete</span></a>
										</td>
									</tr><?php } ?>
								</tbody>
								</table>
							</div>  
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('admin/common/scbawah'); ?>
</body>
</html>