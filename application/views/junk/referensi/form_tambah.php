	<!--link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
	$(function() {
	$( "#datepicker" ).datepicker();
	});
	</script-->



	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Referensi
			<small>Controller Referensi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Referensi</li><li class="active">Tambah Data</li>
		</ol>
	</section>



<!-- Data Referensi -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Tambah Data Referensi</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
						<?php if ($error){?>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> Alert!</h4>
								<?php echo $error; ?>
							</div>
						<?php }?>
						
						<form action="<?php echo site_url("referensi/tambah")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Nama Referensi</td>
									<td><input type="text" name="nama_referensi"  placeholder="Nama Referensi"></td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td><input type="text" name="tanggal"  placeholder="Tanggal" class="datepicker"></td>
								</tr>
								<tr>
									<td>Bukti</td>
									<td><input type="file" name="bukti"></td>
								</tr>
							</table>						
					</div><!-- /.box-body -->					
				</div>
					<input type="submit" class="btn btn-success" value="simpan data">
					<a href="<?php echo site_url ("referensi/index")?>">
					<input type="button" class="btn btn-default" value="kembali">
					</a>
						</form>
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
