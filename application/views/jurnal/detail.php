	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Jurnal
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Jurnal</li><li class="active">Detail Jurnal</li>
		</ol>
	</section>



<!-- Data Jurnal -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Jurnal</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">

							<table border="0" style="width:100%;">										
							<form action="<?php echo site_url("jurnal/detil_Jurnal")?>" method="post" enctype="multipart/form-data">
								<tr>
									<td style="width:200px" class="table table-striped">Kode Jurnal</td>
									<td><?php echo @$data['kode_jurnal'] ?></td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td>
										<?php echo @$data['tanggal_jurnal'] ?>
									</td>
								</tr>
								<tr>
									<td>Pegawai</td>
									<td>
										<?php echo @$data['kode_pegawai'] ?>
									</td>
								</tr>
								<tr>
									<td>Pos Transaksi</td>
									<td>
										<?php echo @$data['kode_postransaksi'] ?>
									</td>
								</tr>
								<tr>
									<td>Jenis Bayar</td>
									<td>
										<?php echo @$data['kode_jenisbayar'] ?>
									</td>
								</tr>
								<tr>
									<td>Referensi</td>
									<td>
										<?php echo @$data['referensi'] ?>
									</td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>
										<?php echo @$data['keterangan'] ?>
									</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										<?php echo @$data['status'] ?>
									</td>
								</tr>
								<tr>
									<td></td>
									
									
								</tr>
								</form>
								<tr>
									<td colspan="2">
										<h4>Detail Jurnal</h4>
										<table class="table table-striped" style="width:100%;">
											<tr>
												<th><center>Nomor</th>
												<th><center>Kode Akun</th>
												<th><center>Nama Akun</th>
												<th><center>Debet</th>
												<th><center>Kredit</th>
												<th><center>Status</th>
											</tr>
											
											<?php
								
									$i = 0;
									if (count($data))
										foreach ($data['detail'] as $key => $value) {
											$i++;
											echo "  <tr>
														<td><center>".$i."</td>
														<td><center>".$value['kode_akun']."</td>
														<td><center>".$value['akun']."</td>
														<td><p align=right>".number_format($value['debet'], 2, ",", ".")."</p></td>
														<td><p align=right>".number_format($value['kredit'], 2, ",", ".")."</p></td>	
														<td>"?>
														
														<?php
															if ($value['status'] == 'unpost')
																echo "<center><a href='".site_url('jurnal/post/'.$data['kode_jurnal'].'/'.$value['kode_akun'].'/post/')."' onclick='return confirm(\"post akun ?\")'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Post\"><i class=\"fa fa-crosshairs\"></i></button></a>";
															else
																echo "<center><button class=\"btn btn-info btn-sm\" data-toggle=\"tooltip\" title=\"posted\"><i class=\"fa fa-check\"></i></button></a>";
														?>
														<?php echo
														"</td>	
													</tr>";			
										}
									else	
										echo "  <tr>
													<td colspan='3'>data Ikan kosong</td>
												</tr>";
								
								?>
											
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="2">
											<a href="<?php echo site_url ("Jurnal/index")?>">
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

