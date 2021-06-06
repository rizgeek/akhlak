<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">


			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Form <strong>Data Kegiatan</strong>
							<div class="card-body card-block">
								<form action="<?=base_url('Admin/cDataKegiatan')?>" method="post" class="">

									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="namaKegiatan" class=" form-control-label">Nama Kegiatan</label>
												<input type="text" id="namaKegiatan" name="namaKegiatan"
													placeholder="Masukan Nama Kegiatan" class="form-control" required
													autocomplete="off">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="bulanKegiatan" class=" form-control-label">Bulan Kegiatan</label>
												<input type="month" id="bulanKegiatan" name="bulanKegiatan"
													placeholder="Masukan Bulan Kegiatan" class="form-control" required
													autocomplete="off">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="jmlRkapLaporan" class=" form-control-label">Jumlah Laporan</label>
												<input type="number" min ="0"; max="100" id="jmlRkapLaporan" name="jmlRkapLaporan"
													placeholder="Masukan Jumlah RKAP" class="form-control" required
													autocomplete="off">
											</div>
										</div>


                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="tanggalKumpul" class=" form-control-label">Batas Pengumpulan Laporan</label>
												<input type="date" id="tanggalKumpul" name="tanggalKumpul"
													placeholder="Masukan Bulan Kegiatan" class="form-control" required
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



		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
