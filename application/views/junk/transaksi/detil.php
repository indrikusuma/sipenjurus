	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaksi
			<small>Controller Transaksi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Transaksi</li><li class="active">Detail Transaksi</li>
		</ol>
	</section>



<!-- Data Transaksi -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<!--h3 class="box-title">Tambah Data Transaksi</h3-->			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">

							<table border="0" style="width:100%;">										
							
								<tr>
									<td style="width:100px">Tanggal</td>
									<td><?php echo @$data['tanggal'] ?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>
										<?php echo @$data['keterangan'] ?>
									</td>
								</tr>
								<tr>
									<td>Pegawai</td>
									<td>
										<?php echo @$data['id_user'] ?>
									</td>
								</tr>
								<tr>
									<td></td>
									
									
								</tr>
								
								<tr>
									<td colspan="2">
										<h4>Detail Transaksi</h4>
										<table class="table table-bordered" style="width:100%;">
											<tr>
												<th>NOMOR</th>
												<th>ID</th>
												<th>KETERANGAN</th>
												<th>REFERENSI</th>
												<th>AKUN</th>
												<th>NOMINAL</th>
											</tr>
											
											<?php
								
									$i = 0;
									if (count($data))
										foreach ($data['detail'] as $key => $value) {
											$i++;
											echo "  <tr>
														<td>".$i."</td>
														<td>".$value['id_detail']."</td>
														<td>".$value['keterangan_detail']."</td>
														<td>".$value['referensi']."</td>
														<td>".$value['akun']."</td>
														<td>".$value['nominal']."</td>
													</tr>";			
										}
									else	
										echo "  <tr>
													<td colspan='3'>data Transaksi kosong</td>
												</tr>";
								
								?>
											
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="2">
											<a href="<?php echo site_url ("transaksi/index")?>">
											<input type="button" class="btn btn-warning" value="kembali">
											</a>
									</td>			
								</tr>
							</table>
						
					</div><!-- /.box-body -->
				</div>
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
				
				


</div><!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url()?>/resource/js/jquery-1.11.3.min.js"></script>
<!--script type="text/javascript">
$(function(){
$('select[name="id_ikan[]"]').change(function(){
	$(this).parents('tr:eq(0)').find('input[name="harga[]"]').val($(this).find("option:selected").attr('data-harga'));
});
});
</script-->
<!-- Bootstrap -->
<script src="<?php echo base_url()?>/resource/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/resource/js/app.js" type="text/javascript"></script>

