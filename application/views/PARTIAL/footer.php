            <!-- END PAGE CONTAINER-->

            <div class="row">
            	<div class="col-md-12">
            		<div class="copyright">
            			<h5 class="text-primary">SALAM INSAN BERAKHLAK</h5>
            		</div>
            	</div>
            </div>
            </div>

            </div>


            <!-- Bootstrap JS-->
            <script src="<?=base_url('assets/')?>vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="<?=base_url('assets/')?>vendor/slick/slick.min.js">
            </script>
            <script src="<?=base_url('assets/')?>vendor/wow/wow.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/animsition/animsition.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="<?=base_url('assets/')?>vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="<?=base_url('assets/')?>vendor/circle-progress/circle-progress.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="<?=base_url('assets/')?>vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/select2/select2.min.js">
            </script>

            <!-- Main JS-->
            <script src="<?=base_url('assets/')?>js/main.js"></script>

            </body>

            </html>
            <!-- end document-->

            <script>
            	$(document).ready(function () {
            		$('#table_id').DataTable({
            			"language": {
            				"emptyTable": "Data Tidak Tersedia"
            			}
            		});

            	});

            </script>
            <script>
            	function redirectWithData(tabel, kolom, kode, alamatTujuan, alamatKembali) {
            		Swal.fire({
            			title: 'Yakin Ingin Melanjutkan?',
            			text: "Tekan Iya Jika Yakin",
            			icon: 'warning',
            			showCancelButton: false,
            			confirmButtonColor: '#3085d6',
            			cancelButtonColor: '#d33',
            			confirmButtonText: 'Iya',
            		}).then((result) => {
            			if (result.isConfirmed) {
            				window.location.href = alamatTujuan + "/" + tabel + "/" + kolom + "/" + kode + "/" +
            					alamatKembali;
            			}
            		})
            	}

            </script>
