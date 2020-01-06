
    <!-- Content Header (Page header) -->
		
	<section class="content-header">
		<h1>
			Referensi
			<small>Controller Referensi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Referensi</li>
		</ol>
	</section>

	<!-- Main content -->

<!-- Data Referensi -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Referensi</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
					<form class="form-inline" action="<?= site_url('referensi/index')?>" method="get">
					  <div class="form-group">
						<label>Pencarian Data</label>
						<input style="width: 200px;" type="text" class="form-control" placeholder="Nama Referensi" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
					  </div>
					  <button type="submit" class="btn btn-primary">Cari Referensi</button>
					</form>
						
						<hr>
						<table id="example1" class="table table-striped">
							<thead>
								<tr>
									<th width="50">NOMOR</th>
									<th width="200">NAMA REFERENSI</th>
									<th width="100">TANGGAL</th>
									<th width="150">BUKTI</th>
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
														<td>".$value['nama_referensi']."</td>
														<td>".$value['tanggal']."</td>
														<td>";if (is_file('images/' . $value['bukti']))
															echo '<img src="' . base_url (). 'images/' .$value['bukti'].'" width="140"><br/>';
														
														
														
											echo "		</td>
														<td>";?>
															<?php echo "<a href='".site_url('referensi/ubah/'.$value['id_referensi'])."'>"; ?><button class="btn btn-success btn-sm refresh-btn" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i> Ubah</button></a>
															<?php echo "<a href='".site_url('referensi/hapus/'.$value['id_referensi'])."' onclick='return confirm(\"hapus referensi ?\")'>"; ?><button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</button></a>
													<?php echo"
													</tr>";			
										}
									else	
										echo "  <tr>
													<td colspan='5'><center>data Referensi kosong</center></td>
												</tr>";
								
								?>
							</tbody>
						</table>
						
					</div><!-- /.box-body -->
				</div>
				
				<a href="<?php echo site_url('referensi/pdf')?>" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Export PDF </a>
				<a href="<?php echo site_url('referensi/excel')?>" class="btn btn-success"><i class="fa fa-file-text"></i> Export Excel </a>
				<!--a href="<?php echo site_url('Referensi/chart')?>" class="btn btn-primary"><i class="fa fa-bar-chart-o"></i> Grafik </a-->
				
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
	

	  
	  
	  



