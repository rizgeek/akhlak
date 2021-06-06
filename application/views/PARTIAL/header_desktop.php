<!-- HEADER DESKTOP-->
<header class="header-desktop">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 d-flex justify-content-end">
					<div class="header-wrap">
						<div class="header-button">
							<div class="account-wrap">
								<div class="account-item clearfix js-item-menu">
									<div class="content">
										<a class="js-acc-btn" href="#"> <?=$this->session->userdata('nama');?> </a>
									</div>
									<div class="account-dropdown js-dropdown">
										<div class="account-dropdown__body">
											<div class="account-dropdown__item">
												<a href="<?=base_url('Setting')?>">
													<i class="zmdi zmdi-settings"></i>Setting</a>
											</div>
										</div>
										<div class="account-dropdown__footer">
											<a onclick="logout()">
												<i class="zmdi zmdi-power"></i>Logout</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- HEADER DESKTOP-->


<script>
	function logout() {
		Swal.fire({
			title: 'Yakin Ingin Keluar ?',
			text: "Tekan Iya jika yakin",
			icon: 'question',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?=base_url('Login/Logout')?>";
			}
		})
	}

</script>
