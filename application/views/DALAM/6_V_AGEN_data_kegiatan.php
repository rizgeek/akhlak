<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Informasi <strong>Data Kegiatan</strong>
						</div>
						<div class="card-body card-block">
							<div class="table-responsive">
								<table id="table_id" class="display">
									<thead class="bg-dark text-white">
										<tr style=" text-align : center">
											<th>No</th>
											<th>Bulan Kegiatan</th>
											<th>Kegiatan</th>
											<th>Batas Pengumpulan</th>
											<th>RKAP</th>
											<?php if($levelAkses != 'MANAGER'):?>
											<th>Upload</th>
											<?php endif;?>
											<th>Lihat</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach($data as $dt):?>
										<tr>
											<td><?=$no++?></td>
											<td><?= date("F Y", strtotime($dt->bulan_kegiatan)) ?></td>
											<td><?=$dt->nama_kegiatan?></td>
											<td><?= $tanggalKumpul = $dt->tanggal_kumpul?></td>
											<td><?=$dt->jumlah_rkap_laporan?></td>

											<?php if($levelAkses != 'MANAGER'):?>
											<td align="center">
												<?= $tanggalKumpul >= date('Y-m-d') ? '<button onclick="uploadLaporan(`'.$dt->kd_kegiatan.'`)" type="button " class="btn btn-primary btn-sm">Upload</button>':"Berakhir"?>
											</td>
											<?php endif?>
											<td align="center">
												<button onclick="lihatLaporan('<?=$dt->kd_kegiatan?>')" type="button" class="btn btn-success btn-sm">Lihat</button>
											</td>
										</tr>
										<?php endforeach?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer">
							update terakhir : <?=date('s : i : H / d - m - Y')?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->

<!-- REDIRECT FILE -->
<script>
	function uploadLaporan(kdKegiatan) {
		Swal.fire({
			title: 'Yakin Ingin Upload Laporan?',
			text: "Tekan Iya jika yakin",
			icon: 'question',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?=base_url("Agen/uploadLaporan/")?>"+kdKegiatan;
			}
		})
	}

	function lihatLaporan(kdKegiatan) {
		window.location.href = "<?=base_url("Agen/dataLaporan/")?>"+kdKegiatan;
	}
</script>
