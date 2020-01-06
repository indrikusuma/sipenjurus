	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Jurnal
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Jurnal</li><li class="active">Tambah Data</li>
		</ol>
	</section>



<!-- Data Jurnal -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Tambah Data Jurnal</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
						<?php if ($error){?>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> Alert!</h4>
								<?php echo $error; ?>
							</div>
						<?php }?>
						
						<div class="form-group has-feedback">
						<form action="<?php echo site_url("jurnal/tambah")?>" method="post" enctype="multipart/form-data" id="form_tambah_akun">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Kode Jurnal </td>
									<td><input class="form-control" type="text" name="kode_jurnal" value="<?php echo $id?>" disabled></td>
								</tr>
								<tr>
									<td style="width:200px">Keterangan</td>
									<td><textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea></td>
								</tr>
								<tr>
									<td style="width:200px">Jenis Bayar</td>
									<td>
										<select name="kode_jenisbayar" class="form-control">
											<option selected disabled>Jenis Bayar</option>
											<option value="cash">cash</option>
											<option value="transfer">transfer</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:200px">Referensi</td>
									<td><input class="form-control" type="text" name="referensi" placeholder="Referensi"></td>
								</tr>
								<tr>
									<td style="width:200px">Pos Transaksi</td>
									<td>
										<select name="id_postransaksi" class="form-control">
											<option selected disabled>Pos Transaksi</option>
											<option value="rawat inap">rawat inap</option>
											<option value="rawat jalan">rawat jalan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:200px">Status</td>
									<td class="form-control">
										<input type="radio" name="status" value="post">post
									</td>
								</tr>
								<tr>
									<td>Cek</td>
										<td class="form-control">
										<input type="radio" name="cek" value="1">cek
										<input type="radio" name="cek" value="0">tidak cek
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<h4>Detail Jurnal</h4>
										<table class="table table-bordered" style="width:100%;">
											<tr>
												<th>AKUN</th>
												<th>DEBET</th>
												<th>KREDIT</th>
											</tr>
											<tbody id="tbody">
											<tr>
												<td>
													<select name="id_akun[]" class="form-control select_akun">
														<option selected disabled>
														<?php
														foreach($dataakun as $akun)
															echo "<option value='$akun[kode_akun]'>$akun[kode_akun] - $akun[nama_akun]</option>";
														?>
														
														</option>
													</select>
												</td>
												<td>
													<input name="debet[]" id="debet" class="debet form-control" type="text"/>
												</td>
												<td>
													<input name="kredit[]" id="kredit" class="kredit form-control" type="text"/>
												</td>
												
											</tr>
											</tbody>
											<tr>
												<td><a class="btn btn-success" id="tambah"><i class="fa fa-plus"></i>Tambah Akun</a></td>
												<td class="form-group"><input type="text" name="totalDebet" class="form-control" readonly ></td>
												<td class="form-group"><input type="text" name="totalKredit" class="form-control" readonly></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>	
						</div>
					<input type="submit" class="btn btn-success pull-right" value="simpan data" id="submit">
					<a href="<?php echo site_url ("jurnal/index")?>">
					<input type="button" class="btn btn-default pull-right" value="kembali">
					</a>
					</div><!-- /.box-body -->					
				</div>
						</form>
						
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->





	<script type="text/javascript">
			$(function(){
					$('#tambah').on('click', function(){
						var data = '';
						$('.select_akun').each(function(){
							var debet = $(this).val();
							data += 'contains[] = '+debet+' & ';							
						})

						$.ajax({
							dataType : 'JSON',
							url : '<?=base_url()."index.php/jurnal/drop"?>?'+data,							
							success : function (respond){
								var select = '';
								for(var i=0; i < respond.length; i++){
									select += '<option value="'+respond[i].kode_akun+'">'+respond[i].kode_akun+' - '+respond[i].nama_akun+'</option>';
								};
								
								var isi = '<tr><td><select name="id_akun[]" class="form-control select_akun">'+select+'<option selected disabled></option></select></td><td><input name="debet[]" id="debet" class="debet form-control" type="text"/></td><td><input name="kredit[]" id="kredit" class="kredit form-control" type="text"/></td></tr>'
								$(isi).appendTo($('#tbody'));
								refresh();
							}
							
						}
						
						)
					})
					
				
				var refresh = function(){
				$('.kredit').on('keyup', function(){
	            	var input = $(this).val();
	            	if(input.length > 0){
		            	var debet = $(this).closest('tr').find($('.debet'));
		            	$(debet).attr('readonly', 'readonly').val(0);
						//$('input[name="debet[]"]').val(0);
	            	}else{
	            		var debet = $(this).closest('tr').find($('.debet'));
	            		console.log('aaaa');
		            	$(debet).removeAttr('readonly');
	            	}

	            	var total = 0;
					$('.kredit').each(function(){
	            		var debet = $(this).val();

	            		if (debet !== ""){
	            			total += parseInt(debet);
	            		}
	            	})
					
	            	$('input[name=totalKredit]').val(total);
					var totalKredit = $('input[name=totalKredit]').val();
					var totalDebet = $('input[name=totalDebet]').val();
					
					if((totalDebet != totalKredit) || (totalDebet == totalKredit == 0)){
						$('input[name=totalKredit]').closest('td').removeClass('has-success');
						$('input[name=totalDebet]').closest('td').removeClass('has-success');
						$('input[name=totalKredit]').closest('td').addClass('has-error');
						$('input[name=totalDebet]').closest('td').addClass('has-error');
						$('#submit').attr('disabled', 'disabled')
						console.log('true');
					}else{
						$('input[name=totalKredit]').closest('td').removeClass('has-error');
						$('input[name=totalDebet]').closest('td').removeClass('has-error');
						$('input[name=totalKredit]').closest('td').addClass('has-success');
						$('input[name=totalDebet]').closest('td').addClass('has-success');
						$('#submit').removeAttr('disabled', 'disabled')
						console.log('false');
					}

	            });

	            $('.debet').on('keyup', function(){
	            	var input = $(this).val();
	            	if(input.length > 0){
		            	var debet = $(this).closest('tr').find($('.kredit'));
		            	$(debet).attr('readonly', 'readonly').val(0);
						//$('input[name="kredit[]"]').val(0);
	            	}else{
	            		var debet = $(this).closest('tr').find($('.kredit'));
	            		console.log('aaaa');
		            	$(debet).removeAttr('readonly');
	            	}

	            	var total = 0;
					//var kredit = 0;
	            	$('.debet').each(function(){
	            		var debet = $(this).val();

	            		if (debet !== ""){
	            			total += parseInt(debet);
	            		}
	            	})

	            	$('input[name=totalDebet]').val(total);
					
					var totalKredit = $('input[name=totalKredit]').val();
					var totalDebet = $('input[name=totalDebet]').val();
					if((totalDebet != totalKredit) || (totalDebet == totalKredit == 0)){
						$('input[name=totalKredit]').closest('td').removeClass('has-success');
						$('input[name=totalDebet]').closest('td').removeClass('has-success');
						$('input[name=totalKredit]').closest('td').addClass('has-error');
						$('input[name=totalDebet]').closest('td').addClass('has-error');
						$('#submit').attr('disabled', 'disabled')
						console.log('true');
					}else{
						$('input[name=totalKredit]').closest('td').removeClass('has-error');
						$('input[name=totalDebet]').closest('td').removeClass('has-error');
						$('input[name=totalKredit]').closest('td').addClass('has-success');
						$('input[name=totalDebet]').closest('td').addClass('has-success');
						$('#submit').removeAttr('disabled', 'disabled')
						console.log('false');
					}
	            });
				
				}
				
				refresh();
				
			})
        		
        	//}
		
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	