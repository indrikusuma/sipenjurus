    <!-- Content Header (Page header) -->
		
	<section class="content-header">
		<h1>
			Jurnal
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Jurnal</li>
		</ol>
	</section>

	<!-- Main content -->

<!-- Data Jurnal -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Jurnal</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
					<form class="form-inline" action="<?= site_url('jurnal/index')?>" method="get">
					  <div class="form-group">
						<label>Pencarian Data</label>
						<input style="width: 200px;" type="text" class="form-control" placeholder="Nama Jurnal" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
					  </div>
					  <button type="submit" class="btn btn-primary">Cari Jurnal</button>
					</form>
						
						<hr>
						<table id="example1" class="table table-striped">
							<thead>
								<tr>
									<th width="30">NOMOR</th>
									<th width="20">KODE</th>
									<th width="150">TANGGAL</th>
									<th width="200">PEGAWAI</th>
									<th width="150">POS TRANSAKSI</th>
									<th>AKSI</th>
								</tr>	
							</thead>
							<tbody>
								<?php
								
									$i = 0;
									if (count($data))
										foreach ($data as $key => $value) {
											$i++;
											echo "  <tr>
														<td><center>".$i."</center></td>
														<td>".$value['kode_jurnal']."</td>
														<td>".date('d F Y', strtotime($value['tanggal_jurnal']))."</td>
														<td>".$value['pegawai']."</td>
														<td>".$value['kode_postransaksi']."</td>
														<td>";?>
															<?php echo "<a href='".site_url('jurnal/detail/'.$value['kode_jurnal'])."'>"; ?><button class="btn btn-success btn-sm refresh-btn" data-toggle="tooltip" title="Detail"><i class="fa fa-file-zip-o"></i> Detail</button></a>
															<?php echo "<a href='".site_url('jurnal/hapus/'.$value['kode_jurnal'])."' onclick='return confirm(\"hapus jurnal ?\")'>"; ?><button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</button></a>
													<?php echo"
													</tr>";			
										}
									else	
										echo "  <tr>
													<td colspan='15'><center>data jurnal kosong</center></td>
												</tr>";
								
								?>
							</tbody>
						</table>
						
					</div><!-- /.box-body -->
				</div>
				
				<a href="<?php echo site_url('jurnal/tambah')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jurnal </a>
				<a href="<?php echo site_url('jurnal/pdf')?>" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Export PDF </a>
				<a href="<?php echo site_url('jurnal/excel')?>" class="btn btn-success"><i class="fa fa-file-text"></i> Export Excel </a>
								
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
	

	  
	  
	  



