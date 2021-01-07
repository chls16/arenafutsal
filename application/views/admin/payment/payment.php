<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Payment</title>
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
								<h2 class="box-title">Payment</h2>

							</div>
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="15px">No</th>
											<th>Tanggal</th>
											<th>Nama</th>
											<th>Lapangan</th>
											<th>Jam Booking</th>
											<th>Durasi</th>
											<th>Bukti Booking</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($payment as $data){?>
										<tr>
											<td><?php  echo $no++; ?></td>
											<td><?php echo $data->tgl_transaksi ?></td>
											<td><?php echo $data->nama ?></td>
											<td><?php echo $data->lapangan ?></td>
											<td><?php echo $data->jam_main.'.00' ?></td>
											<td><?php echo $data->durasi.' jam' ?></td>
											<td></td>
											<td>
												<a type="button" href="<?php echo base_url('admin/payment/edit/'.$data->id) ?>" class="btn btn-default btn-sm"><span class="fa fa-pencil"> Edit</span></a>
												<a type="button" href="<?php echo base_url('admin/payment/del/'.$data->id) ?>"  onclick="return confirm('Delete <?=$data->lapangan ?> ?');" class="btn btn-default btn-sm"><span class="fa fa-trash"> Delete</span></a>
											</td>
											<td></td>
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