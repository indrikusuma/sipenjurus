	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Kas
			<small>Controller Kas</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Kas</li><li class="active">Tambah Data</li>
		</ol>
	</section>



<!-- Data Kas -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Tambah Data Kas</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
						<?php// if ($error){?>
							<!--div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> Alert!</h4>
								<?php// echo $error; ?>
							</div-->
						<?php// }?>
						
						<form action="<?php echo site_url("kas_masuk/tambah")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Nama</td>
									<td><input type="text" name="nama" value="<?php echo @$data['nama']?>"></td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td><textarea class="form-control" name="deskripsi"><?php echo @$data['deskripsi']?></textarea></td>
								</tr>
								<tr>
									<td>Pemilik</td>
									<td><input type="text" name="pemilik" value="<?php echo @$data['pemilik']?>"></td>
								</tr>
								<tr>
									<td>Foto</td>
									<td><input type="file" name="foto"></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="btn btn-success" value="simpan data">
											<a href="<?php echo site_url ("kas_masuk/index")?>">
											<input type="button" class="btn btn-default" value="kembali">
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
