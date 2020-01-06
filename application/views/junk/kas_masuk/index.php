	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Kas
			<small>Controller Kas</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Kas</li>
		</ol>
	</section>



<!-- Data Kas -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Kas</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
					<form class="form-inline" action="<?= site_url('Kas/index')?>" method="get">
					  <div class="form-group">
						<label>Pencarian Data</label>
						<input style="width: 200px;" type="text" class="form-control" placeholder="Nama Kas" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
					  </div>
					  <button type="submit" class="btn btn-primary">Cari Kas</button>
					</form>
						
						<hr><a href="<?php echo site_url('kas_masuk/tambah')?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </a>
						<br />
						<br />
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="50">NOMOR</th>
									<th width="200">TANGGAL</th>
									<th width="200">JENIS KAS</th>
									<th width="100">NOMINAL</th>
									<th width="100">KETERANGAN</th>
									<th width="100">AKSI</th>
								</tr>	
							</thead>
							<tbody>
								<?php
								
									$i = 0;
									if (count($data))
										foreach ($data as $key => $value) {
											$i++;
											echo "  <tr>
														<td>".$i."</td>
														<td>".$value['tanggal']."</td>
														<td>".$value['jenis_kas']."</td>
														<td>".$value['nominal']."</td>
														<td>".$value['keterangan']."</td>
														<td>
															<a href='".site_url('kas_masuk/ubah/'.$value['id_kas_masuk'])."'>ubah</a> | <a href='".site_url('kas_masuk/hapus/'.$value['id_kas_masuk'])."' onclick='return confirm(\"apakah yakin ?\")'>hapus</a> </td>
													</tr>";			
										}
									else	
										echo "  <tr>
													<td colspan='5'><center>data Kas kosong</center></td>
												</tr>";
								
								?>
							</tbody>
						</table>
						
					</div><!-- /.box-body -->
				</div>
				
				<a href="<?php echo site_url('Kas/pdf')?>" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Export PDF </a>
				<a href="<?php echo site_url('Kas/excel')?>" class="btn btn-success"><i class="fa fa-file-text"></i> Export Excel </a>
				<!--a href="<?php echo site_url('Kas/chart')?>" class="btn btn-primary"><i class="fa fa-bar-chart-o"></i> Grafik </a-->
				
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->