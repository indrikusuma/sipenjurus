
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
					
						<?php
							foreach ($data as $key => $value)
							{
								echo "<div>
									  Kode Akun : ".$value['kode_akun']."<br>
									  Nama Akun : ".$value['nama_akun'];
								
								echo "
								
								<table id=example1 class='table table-striped table-bordered'>	 
									<thead>
										<tr>
											<th width=10>NOMOR</th>
											<th width=100>TANGGAL</th>
											<th width=50>DEBET</th>
											<th width=50>KREDIT</th>
											<th width=50>SALDO</th>
										</tr>	
									</thead>";
									
								$i=0;	
								$saldo = 0;
								foreach ($value['buku'] as $row)
								{
									$i++;
									$saldo += $row['debet'] - $row['kredit'];
									echo "  <tr>
												<td><center>".$i."</center></td>
												<td>".date('d F Y', strtotime($row['tanggal_insert']))."</td>
												<td><p align=right>Rp. ".number_format($row['debet'], 2, ",", ".")."</p></td>
												<td><p align=right>Rp. ".number_format($row['kredit'], 2, ",", ".")."</p></td>	
												<td><p align=right>Rp. ".number_format($saldo, 2, ",", ".")."</p></td>
											</tr>";		
								}
								
								echo "  <tr style='background: #222d32 !important; color: #fff'>
											<td colspan=4><center>Saldo Akhir Akun</center></td>
											<td><p align=right>Rp. ".number_format($saldo, 2, ",", ".")."</p></td>
										</tr>";	
								
							echo "</table></div>";	
								
							}
						
						?>
						
					</div><!-- /.box-body -->
				</div>
				
				<a href="<?php echo site_url('general/pdf')?>" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Export PDF </a>
				<a href="<?php echo site_url('general/excel')?>" class="btn btn-success"><i class="fa fa-file-text"></i> Export Excel </a>
				
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
	

	  
	  
	  



