<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Form <strong>Data Pengguna</strong>
							<div class="card-body card-block">
								<form action="<?=base_url('Admin/cDataPengguna')?>" method="post" class="">

									<div class="row">


										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="nama_pengguna" class=" form-control-label">Nama</label>
												<input type="text" id="nama_pengguna" name="nama_pengguna"
													placeholder="Masukan Nama" class="form-control" required
													autocomplete="off">
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="kdUnit" class=" form-control-label">Unit</label>
												<select name="kdUnit" id="kdUnit" class="form-control"
													required>
													<option value="" disabled selected>Pilih Salah Satu</option>
													<?php foreach($unit as $dt):?>
                                                        <option value="<?=$dt->kd_unit?>"><?=$dt->unit?></option>
													<?php endforeach?>
												</select>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="levelAkses" class=" form-control-label">Level
													Akses</label>
												<select name="levelAkses" id="levelAkses" class="form-control"
													required>
													<option value="" disabled selected>Pilih Salah Satu</option>
													<!-- <option value="ADMIN">Admin</option> -->
													<option value="MANAGER">Manager/Kabag</option>
													<option value="AGEN">Agen</option>
												</select>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="username" class=" form-control-label">Username</label>
												<input type="text" id="username" name="username" placeholder="Username"
													class="form-control" value="<?=$username?>" readonly required
													autocomplete="off">
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="password" class=" form-control-label">Password</label>
												<input type="password" id="password" name="password"
													placeholder="Password" class="form-control" value="NUSANTARA1"
													 required autocomplete="off">
												<small class="help-block form-text">Password Default <b
														class="text-danger">NUSANTARA1</b>
													<p>Password Minimal 6 Karakter</p>
												</small>
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

			</div>

		</div>
	</div>
	<!-- END MAIN CONTENT-->
