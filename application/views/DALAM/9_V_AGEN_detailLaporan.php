<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9">
					<div class="card">
						<div class="card-header">
							Informasi <strong>Laporan Kegiatan</strong>
						</div>
						<div class="card-body card-block">
							<div class="table-responsive">
								<table id="table_id" class="display">
									<thead class="bg-dark text-white">
										<tr style=" text-align : center">
											<th>No</th>
											<th>Unit</th>
											<th>Jumlah Laporan</th>
											<th>Presentase</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php  $sumPresentase = 0;  $no = 1; foreach($unit as $dt):?>
                                        <?php
                                            $presentase = 100 / $kegiatan->jumlah_rkap_laporan * $jml[$dt->kd_unit];
                                            $sumPresentase = $sumPresentase + $presentase;
                                        ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$dt->unit?></td>
												<td><?=$jml[$dt->kd_unit]?></td>
												<td><?=$presentase?> % </td>
												<td><a href="<?=base_url('Admin/dataLaporan/')?><?=$kegiatan->kd_kegiatan?>/<?=$dt->kd_unit?>" class="btn text-white btn-success btn-sm">Lihat Laporan</a></td>
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
                <div class="col-lg-3 col md-3 col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            Presentase Total:
                            <h1><?=$sumPresentase / count($unit)?> %</h1>
                            <?=$kegiatan->nama_kegiatan?> Bulan <?=$kegiatan->bulan_kegiatan?>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->

