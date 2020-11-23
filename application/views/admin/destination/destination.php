<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Destination</title>
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
				</div>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Destination</h3>
							</div>
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="15%">No</th>
											<th>Kota</th>
											<th>Kode</th>
											<th width="15%">Jumlah Bandara</th>
											<th width="15%">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($destination as $data){?>
										<tr>
											<td><?php  echo $no++; ?></td>
											<td><?php echo $data->destination ?></td>
											<td><?php echo $data->iso ?></td>
											<td>Contoh</td>
											<td>
												<a type="button" href="<?php echo base_url('admin/destinations/edit/'.$data->id) ?>" class="btn btn-default btn-sm"><span class="fa fa-pencil"> Edit</span></a>
												<a type="button" href="<?php echo base_url('admin/destinations/del/'.$data->id) ?>"  onclick="return confirm('Delete <?=$data->destination ?> ?');" class="btn btn-default btn-sm"><span class="fa fa-trash"> Delete</span></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>
</div>
<div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('admin/common/scbawah'); ?>
</body>
</html>