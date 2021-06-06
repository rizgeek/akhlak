<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							Form <strong>Laporan</strong>
							<div class="card-body card-block">
								<form action="<?=base_url('Admin/downloadLaporanExcel')?>" method="post" class="">

									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-kode_unit">
												<label for="shift" class=" form-control-label">Kegiatan Berdasarkan bulan </label>
                                                <select name="kegiatan" id="kegiatan" class="form-control">
                                                    <option value="semua"> Hanya Pilih salah satu jika ingin melakukan filter</option>
                                                    <?php foreach($data as $dt):?>
                                                        <option value="<?=$dt->kd_kegiatan?>"><?=substr($dt->bulan_kegiatan,0,7)?> - <?=$dt->nama_kegiatan?></option>
                                                    <?php endforeach;?>
                                                </select>
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
