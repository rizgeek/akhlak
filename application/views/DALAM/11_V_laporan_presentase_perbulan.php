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
											<th>Nama Kegiatan</th>
											<th>Presentase</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
                                        <?php $no=1; foreach($bulan as $dt):?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td style=" text-align : center"><?=substr($dt->bulan_kegiatan,0,-3)?></td>
                                                <td><?=$dt->nama_kegiatan?></td>
                                                <td style=" text-align : center"><?=$persen[$dt->bulan_kegiatan]?> %</td>
                                                <td style=" text-align : center">BUAT DOWNLOAD LAPORAN</td>
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
