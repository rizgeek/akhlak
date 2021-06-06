<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Form <strong>Data Unit</strong>
							<div class="card-body card-block">
								<form action="<?=base_url('Admin/cDataUnit')?>" method="post" class="">

									<div class="row">

										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-kode_unit">
												<label for="shift" class=" form-control-label">Kode Unit </label>
												<input type="text" id="kode_unit" name="kode_unit"
													placeholder="Masukan Kode Unit" class="form-control" required
													autocomplete="off" value="<?=$kd_unit?>" readonly>
											</div>
										</div>

										<div class="col-lg-8 col-md-8 col-sm-8">
											<div class="form-group">
												<label for="nama_unit" class=" form-control-label">Nama Unit </label>
												<input type="text" id="nama_unit" name="nama_unit"
													placeholder="Masukan Nama Unit" class="form-control" required
													autocomplete="off">
											</div>
										</div>

									</div>


							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-dot-circle-o"></i> Submit
								</button>
								<button type="reset" class="btn btn-danger btn-sm">
									<i class="fa fa-ban"></i> Reset
								</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Informasi <strong>Data Unit</strong>
						</div>
						<div class="card-body card-block">
							<div class="table-responsive">
								<table id="table_id" class="display">
									<thead class="bg-dark text-white">
										<tr style=" text-align : center">
											<th>No</th>
											<th>Kode Unit</th>
											<th>Unit</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach($data_unit as $dt):?>
										<tr>
											<td><?=$no++?></td>
											<td><?=$kd_unit = $dt->kd_unit?></td>
											<td><?=$unit = $dt->unit?></td>
											<td align="center">
												<div class="btn-group">
													<button type="button" class="btn btn-primary dropdown-toggle"
														data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false">
														<i class="fa fa-gears"></i>
													</button>
													<div class="dropdown-menu">
														<button onclick="editData('<?=$kd_unit?>', '<?=$unit?>' )" data-toggle="modal" data-target="#mediumModal"
															class="dropdown-item" href="#">Update</button>
														<div class="dropdown-divider"></div>
														<button onclick="redirectWithData('tb_unit', 'kd_unit', '<?=$kd_unit?>', '<?=base_url('Admin/hapusData')?>', 'dataUnit')" class="dropdown-item text-danger"
															href="#">Hapus</button>
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
	<!-- END MAIN CONTENT-->


	<!-- modal medium -->
	<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<form action="<?=base_url('Admin/UDataUnit')?>" method="POST">
				<div class="modal-content">
					<input type="hidden" name="kd_shift" id="kd_shift">
					<div class="modal-header">
						<h5 class="modal-title" id="mediumModalLabel">Update Data Shift</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-kode_unit">
									<label for="shift" class=" form-control-label">Kode Unit </label>
									<input type="text" id="kode_unit_edit" name="kode_unit" placeholder="Masukan Kode Unit"
										class="form-control" required readonly autocomplete="off">
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label for="nama_unit" class=" form-control-label">Nama Unit </label>
									<input type="text" id="nama_unit_edit" name="nama_unit" placeholder="Masukan Nama Unit"
										class="form-control" required autocomplete="off">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- end modal medium -->


<script>
	function editData(kdUnit, unit) {
		document.getElementById('nama_unit_edit').value = unit;
		document.getElementById('kode_unit_edit').value = kdUnit;
	}
</script>