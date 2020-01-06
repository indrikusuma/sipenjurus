	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaksi
			<small>Controller Transaksi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Transaksi</li><li class="active">Tambah Data</li>
		</ol>
	</section>



<!-- Data Transaksi -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Tambah Data Transaksi</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						<?php if ($error){?>
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $error; ?>
						</div>
						<?php }?>
						<form action="<?php echo site_url("transaksi/tambah")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Keterangan</td>
									<td>
										<textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<h4>Detail Transaksi</h4>
										<table class="table table-striped" style="width:100%;">
											<tr>
												<th>KETERANGAN</th>
												<th width="200">REFERENSI</th>
												<th width="200">AKUN</th>
												<th>NOMINAL</th>
											</tr>
											<?php for($i=0;$i<10;$i++){?>
											<tr>
												<td>
													<input class="form-control" type="text" name="keterangan_detail[]">
												</td>
												<td>
													<select name="id_ref[]" class="form-control">
														<option value="">-- data referensi --</option>
														<?php
														foreach($data_referensi as $ref)
															echo "<option value='$ref[id_referensi]'>$ref[nama_referensi]</option>";
														?>
													</select>
												</td>
												<td>
													<select name="id_akun[]" class="form-control">
														<option value="">-- data akun --</option>
														<?php
														foreach($data_akun as $akun)
															echo "<option value='$akun[id_akun]'>$akun[nama_akun]</option>";
														?>
													</select>
												</td>
												<td>
													<input name="nominal[]" class="form-control" />
												</td>
											</tr>
											<?php }?>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="btn btn-success" value="simpan data">
											<a href="<?php echo site_url ("transaksi/index")?>">
											<input type="button" class="btn btn-default" value="kembali">
											</a>
									</td>			
								</tr>
							</table>
						</form>
					</div><!-- /.box-body -->
				</div>
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
				
				


</div><!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url()?>/resource/js/jquery-1.11.3.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>/resource/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/resource/js/app.js" type="text/javascript"></script>

