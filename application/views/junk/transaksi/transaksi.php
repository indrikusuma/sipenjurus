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
									<td style="width:200px">Tanggal</td>
									<td><input class="form-control" type="text" name="tanggal" value="<?php echo @$data['tanggal']?>"></td>
								</tr>
								<tr>
									<td colspan="2">
										<h4>Detail Ikan yang Tertangkap</h4>
										<table class="table table-bordered" style="width:100%;">
											<tr>
												<th>KETERANGAN</th>
												<th>REFERENSI</th>
												<th>AKUN</th>
												<th>BERAT (KG)</th>
											</tr>
											<?php for($i=0;$i<10;$i++){?>
											<tr>
												<td>
													<input class="form-control" type="text" name="keterangan">
												</td>
												<td>
													<select name="id_ref[]" class="form-control">
														<option value=""></option>
														<?php
														foreach($data_ref as $ref)
															echo "<option value='$ref[id_referensi]'>$ref[nama_referensi]</option>";
														?>
													</select>
												</td>
												<td>
													<select name="id_akun[]" class="form-control">
														<option value=""></option>
														<?php
														foreach($data_akun as $akun)
															echo "<option value='$akun[id_akun]'>$ref[nama_akun]</option>";
														?>
													</select>
												</td>
												<td>
													<input name="harga[]" readonly class="form-control" />
												</td>
												<td><input name="berat[]" class="form-control" /></td>
											</tr>
											<?php }?>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="btn btn-success" value="simpan data">
											<a href="<?php echo site_url ("Transaksi/index")?>">
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
<script type="text/javascript">
$(function(){
$('select[name="id_ikan[]"]').change(function(){
	$(this).parents('tr:eq(0)').find('input[name="harga[]"]').val($(this).find("option:selected").attr('data-harga'));
});
});
</script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>/resource/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/resource/js/app.js" type="text/javascript"></script>

