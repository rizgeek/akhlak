<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Form <strong>Data Update Password</strong>
							<div class="card-body card-block">
								<form action="<?=base_url('Setting/updatePassword')?>" method="post" class="">

									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="password" class=" form-control-label">Password Lama</label>
												<input type="password" id="password" name="passwordLama"
													placeholder="Password Lama" class="form-control"
													required autocomplete="off">
												<small class="help-block form-text">
												</small>
											</div>
										</div>


                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="password" class=" form-control-label">Password Baru</label>
												<input type="password" id="password" name="passwordBaru"
													placeholder="Password Baru" class="form-control"
													required autocomplete="off">
												<small class="help-block form-text">
												</small>
											</div>
										</div>


                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="password" class=" form-control-label">Ulangi Password Baru</label>
												<input type="password" id="password" name="passwordUlang"
													placeholder="Ulangi Password Baru" class="form-control"
													required autocomplete="off">
												<small class="help-block form-text">
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
