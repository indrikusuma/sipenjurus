
    <!-- Content Header (Page header) -->
		
	<section class="content-header">
		<h1>
			Pegawai
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">pegawai</li>
		</ol>
	</section>

	<!-- Main content -->

<!-- Data pegawai -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data pegawai</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
					<!-- <form class="form-inline" action="<?= site_url('pegawai/index')?>" method="get">
					  <div class="form-group">
						<label>Pencarian Data</label>
						<input style="width: 200px;" type="text" class="form-control" placeholder="Nama pegawai" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
					  </div>
					  <button type="submit" class="btn btn-primary">Cari pegawai</button>
					</form> -->
						
						<hr>
						<table id="example1" class="table table-striped">
							<thead>
								<tr>
									<th width="10">NOMOR</th>
									<th width="150">KODE PEGAWAI</th>
									<th width="150">JABATAN</th>
									<th width="200">NAMA</th>
									<th width="150">ALAMAT</th>									
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
														<td>".$value['kode_pegawai']."</td>
														<td>".$value['jabatan']."</td>
														<td>".$value['nama']."</td>
														<td>".$value['alamat']."</td>
														<td>";?>
															<?php echo "<a href='".site_url('/pegawai/edit/'.$value['kode_pegawai'])."'>"; ?><button class="btn btn-success btn-sm refresh-btn" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i> Ubah</button></a>
															<?php echo "<a href='".site_url('/pegawai/hapus/'.$value['kode_pegawai'])."' onclick='return confirm(\"Hapus Data Pegawai ?\")'>"; ?><button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</button></a
													<?php echo"
													</tr>";	
                        							
										}
									else	
										echo "  <tr>
													<td colspan='15'><center>data pegawai kosong</center></td>
												</tr>";
												
												
										
								?>
							</tbody>
						</table>
						
					</div><!-- /.box-body -->
				</div>				
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
	

	  
	  
	  



