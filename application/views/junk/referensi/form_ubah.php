	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Referensi
			<small>Controller Referensi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Referensi</li><li class="active">Ubah Data</li>
		</ol>
	</section>



<!-- Data Referensi -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Ubah Data Referensi</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						
						<?php if ($error){?>
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $error; ?>
						</div>
						<?php }?>
						
							<form action="<?php echo site_url("referensi/ubah")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_referensi" value="<?php echo $data['id_referensi']?>"> 
							<table border="0" style="width:100%;">
								<tr>
									<td style="width:200px">Id Referensi</td>
									<td><input class="form-control" type="text" name="id_referensi" value="<?php echo @$data['id_referensi']?>" disabled></td>
								</tr>
								<tr>
									<td>Nama Referensi</td>
									<td><input class="form-control" type="text" name="nama_referensi" placeholder="Nama Referensi" value="<?php echo @$data['nama_referensi']?>"></td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td><input class="form-control" type="text" name="tanggal" placeholder="Nama Referensi" value="<?php echo @$data['tanggal']?>"></td>
								</tr>
								<tr>
									<td>Bukti</td>
									<td>
									<?php
									if (is_file('images/' . $data['bukti']))
										echo '<img src="' . base_url (). 'images/' .$data['bukti'].'" width="150"><br/>';
									?>
									<br />
									<input type="file" name="bukti">
									</td>
								</tr>
								
								<tr>
									<td colspan="2">
										<input type="submit" value="ubah data">
											<a href="<?php echo site_url ("referensi/index")?>">
											<input type="button" value="kembali">
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