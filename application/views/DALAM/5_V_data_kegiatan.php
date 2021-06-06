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
											<?php if($levelAkses == 'ADMIN'):?>
											<th>Presentase</th>
											<th>Hapus</th>
											<?php endif?>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach($dataKegiatan as $dt):?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$dt->bulan_kegiatan?></td>
												<td><?=$dt->nama_kegiatan?></td>
												<td><?=$dt->tanggal_kumpul?></td>
												<?php if($levelAkses == 'ADMIN'):?>
												<td style="text-align:center;"><?=$presentase[$dt->kd_kegiatan]?> %</td>
												<td>
													<button	onclick="redirectWithData('tb_kegiatan', 'kd_kegiatan', '<?=$dt->kd_kegiatan?>', '<?=base_url('Admin/hapusData')?>', 'dataKegiatan')" class="btn text-white btn-danger btn-sm" href="#">Hapus</button>
												</td>
												<?php endif?>
												<td><a href="<?=base_url('Admin/laporanPerkegiatan/')?><?=$dt->kd_kegiatan?>" class="btn text-white btn-success btn-sm">Lihat Laporan</a></td>
											</tr>
										<?php endforeach;?>
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
