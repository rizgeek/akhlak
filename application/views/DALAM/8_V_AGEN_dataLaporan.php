<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="alert alert-primary" role="alert">
				PRESENTASE LAPORAN  SEBESAR : <strong><?=$presentase?> %</strong>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Informasi <strong>Data Laporan</strong>
						</div>
						<div class="card-body card-block">
							<div class="table-responsive">
								<table id="table_id" class="display">
									<thead class="bg-dark text-white">
										<tr style=" text-align : center">
											<th>No</th>
											<th>Kode Laporan</th>
											<th>Tanggal Upload</th>
											<th>Download</th>
											<?php if($levelAkses == 'ADMIN'):?>
											<th>Hapus</th>
											<?php endif;?>
										</tr>
									</thead>
									<tbody>
                                        <?php $no = 1; foreach($data as $dt):?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$kdLaporan = $dt->kd_laporan?></td>
                                                <td><?=$dt->tanggal_upload?></td>
												<?php if($levelAkses == 'ADMIN'):?>
												<td><a href="<?=base_url("Admin/Download/$kdLaporan")?>" class="btn text-white btn-success btn-sm">download</a></td>
												<td><a onclick="redirectWithData('tb_laporan', 'kd_laporan', '<?=$kdLaporan?>', '<?=base_url('Admin/hapusData')?>', 'index')" class="btn text-white btn-danger btn-sm">HAPUS</a></td>
												<?php else:?>
													<td><a href="<?=base_url("Agen/Download/$kdLaporan")?>" class="btn text-white btn-success btn-sm">download</a></td>
												<?php endif;?>
                                            </tr>
                                        <?php endforeach; ?>
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
