<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Form <strong>Upload Laporan</strong>
						</div>
						<div class="card-body card-block">
							<form action="<?=base_url('Agen/CUploadLaporan')?>" method="post"  enctype="multipart/form-data">

                                <input type="hidden" name="kdKegiatan" value="<?=$kegiatan->kd_kegiatan?>">

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="namaKegiatan" class=" form-control-label">Kegiatan</label>
											<input type="text" id="namaKegiatan" name="namaKegiatan"
												placeholder="Nama Kegiatan" class="form-control" required
												autocomplete="off" readonly value="<?=$kegiatan->nama_kegiatan?>">
										</div>
									</div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="tanggalUpload" class=" form-control-label">Tanggal Upload</label>
											<input type="text" id="tanggalUpload" name="tanggalUpload"
												placeholder="Tanggal Upload" class="form-control" required
												autocomplete="off" readonly value="<?=date('d - m - Y')?>">
										</div>
									</div>


									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="file-multiple-input" class=" form-control-label">Pilih File
												Laporan (pdf|xls|xlsx|csv|doc|docx)</label>
                                                <input type="file" id="fileInput" name="fileInput" class="form-control-file" required>

												<small class="help-block form-text">Maksimum File <b
														class="text-danger">5 MB</b>
														
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
<!-- END MAIN CONTENT-->
