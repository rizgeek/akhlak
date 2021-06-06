<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Informasi <strong>Data Pengguna</strong>
						</div>
						<div class="card-body card-block">
							<div class="table-responsive">
								<table id="table_id" class="display">
									<thead class="bg-dark text-white">
										<tr style=" text-align : center">
											<th>No</th>
											<th>Nama</th>
											<th>Unit</th>
											<th>Level</th>
											<th>username</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach($data as $dt):?>
										<tr>
											<td><?=$no++?></td>
											<td><?=$dt->nama?></td>
											<td><?=$dt->unit?></td>
											<td><?=$dt->level_akses?></td>
											<td><?=$dt->username?></td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-primary dropdown-toggle"
														data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false">
														<i class="fa fa-gears"></i>
													</button>
													<div class="dropdown-menu">
														<button
															onclick="redirectWithData('tb_pengguna', 'kd_pengguna', '<?=$dt->kd_pengguna?>', '<?=base_url('Admin/hapusData')?>', 'dataPengguna')"
															class="dropdown-item text-danger" href="#">Hapus</button>
													</div>
                                                </div>
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
