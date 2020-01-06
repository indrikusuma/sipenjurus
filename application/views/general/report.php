
    <!-- Content Header (Page header) -->
		
	<section class="content-header">
		<h1>
			Buku Besar
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Buku Besar</li>
		</ol>
	</section>

	<!-- Main content -->

<!-- Data Buku Besar -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Buku Besar</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
					<form class="form-inline" action="<?= site_url('general/index')?>" method="get">
					  <div class="form-group">
						<label>Pencarian Data</label>
						<input style="width: 200px;" type="text" class="form-control" placeholder="Nama Buku Besar" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
					  </div>
					  <button type="submit" class="btn btn-primary">Cari Buku Besar</button>
					</form>
						
						<hr>
					
						<table id="example1" class="table table-striped">
							<thead>
								<tr>
									<th width="20">NOMOR</th>
									<th width="50">TANGGAL</th>
									<th width="50">KODE AKUN</th>
									<th width="100">DEBET</th>
									<th width="100">KREDIT</th>
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
														<td>".$value['tanggal_insert']."</td>
														<td>".$value['kode_akun']."</td>
														<td> IDR ".number_format($value['debet'], 2, ",", ".")."</td>
														<td> IDR ".number_format($value['kredit'], 2, ",", ".")."</td>
													</tr>";			
										}
									else	
										echo "  <tr>
													<td colspan='15'><center>data Akun kosong</center></td>
												</tr>";
								
								?>
							</tbody>
						</table>
						
					</div><!-- /.box-body -->
				</div>
				
				<a href="<?php echo site_url('general/pdf')?>" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Export PDF </a>
				<a href="<?php echo site_url('general/excel')?>" class="btn btn-success"><i class="fa fa-file-text"></i> Export Excel </a>
				
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
	

	  
	  
	  



