<h1 style="color:red;">Laporan Referensi</h1>
<br />
<table border="1">
	<thead>
		<tr>
			<th width="50">NOMOR</th>
			<th width="200">NAMA REFERENSI</th>
			<th width="100">TANGGAL</th>
			<th width="150">BUKTI</th>
		</tr>	
	</thead>
	<tbody>
		<?php
								
			$i = 0;
			if (count($data))
				foreach ($data as $key => $value) {
					$i++;
					echo "  <tr>
								<td height=300>".$i."</td>
								<td>".$value['nama_referensi']."</td>
								<td>".$value['tanggal']."</td>
								<td>";if (is_file('images/' . $value['bukti']))
									echo '<img src="' . base_url (). 'images/' .$value['bukti'].'" width="140"><br/>';
					echo		"</td>
							</tr>";
								
				}
			else	
				echo "  <tr>
							<td colspan='5'><center>data Referensi kosong</center></td>
						</tr>";
		
		?>
	</tbody>
</table>