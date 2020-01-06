
    <!-- Content Header (Page header) -->
		
	<section class="content-header">
		<h1>
			Akun
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Akun</li>
		</ol>
	</section>

	<!-- Main content -->

<!-- Data Akun -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Akun</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
					<form class="form-inline" action="<?= site_url('Akun/index')?>" method="get">
					  <div class="form-group">
						<label>Pencarian Data</label>
						<input style="width: 200px;" type="text" class="form-control" placeholder="Nama Akun" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
					  </div>
					  <button type="submit" class="btn btn-primary">Cari Akun</button>
					</form>
						
						<hr>
						<table id="example1" class="table table-striped">
							<thead>
								<tr>
									<th width="50">NOMOR</th>
									<th width="50">KODE</th>
									<th width="50">LEVEL</th>
									<th width="200">NAMA AKUN</th>
									<th width="150">AKUN INDUK</th>
									<th width="150">SALDO NORMAL</th>
									<th width="150">SALDO</th>
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
														<td>".$i."</td>
														<td>".$value['kode_akun']."</td>
														<td>".$value['level']."</td>
														<td>".$value['nama_akun']."</td>
														<td>".$value['akun_induk']."</td>
														<td>".$value['saldo_normal']."</td>		
														<td> IDR ".number_format($value['saldo'], 2, ",", ".")."</td>
														<td>";?>
															<?php echo "<a href='".site_url('akun/ubah/'.$value['kode_akun'])."'>"; ?><button class="btn btn-success btn-sm refresh-btn" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i> Ubah</button></a>
								
													<?php echo"
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
				
				<a href="<?php echo site_url('akun/pdf')?>" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Export PDF </a>
				<a href="<?php echo site_url('akun/excel')?>" class="btn btn-success"><i class="fa fa-file-text"></i> Export Excel </a>
				
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
	

	  
	  
	  



