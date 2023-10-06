<?= $this->extend('layouts') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-lg-4">
		<div class="card mb-4">
			<div class="card-body mt-0">
				<div class="form-group mt-0 mb-3">
					<label for="select_dataset" class="form-control-label">Pilih Dataset</label>
					<select name="select_dataset" id="select_dataset" class="form-control shadow-sm">
						<option value=""> Pilih</option>
						<?php
						$i = 1;
						foreach ($list_dataset as $d) : ?>
							<option value="<?= $d['id'] ?>"><?= $i++ ?>. <?= $d['file_name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-area-predict"></div>
				<div class="col-lg-8">
					<div id="result-area" class="card mb-1">
						<table class="table mt-3">
							<tbody>
								<tr>
									<td>
										Balita
									</td>
									<td>
										0-5 Tahun
									</td>
								</tr>
								<tr>
									<td>
										Anak - Anak
									</td>
									<td>
										6-10 Tahun
									</td>
								</tr>
								<tr>
									<td>
										Remaja
									</td>
									<td>
										11-18 Tahun
									</td>
								</tr>
								<tr>
									<td>
										Dewasa
									</td>
									<td>
										19-44 Tahun
									</td>
								</tr>
								<tr>
									<td>
										Pra Lansia
									</td>
									<td>
										45-59 Tahun
									</td>
								</tr>
								<tr>
									<td>
										Lansia
									</td>
									<td>
										60 Tahun 
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div id="result-area" class="card mb-4">
			<div class="card-header mt-0 mb-0">
				<div class="alert bg-light">Hasil Klasifikasi :</div>
				<div id="hasil_prediksi"></div>
			</div>
			<div class="card-body">
				<div id="table_sample">

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#select_dataset').change(function(e) {
		e.preventDefault();
		// alert('okk')
		// $('.form-area-predict').html(``);
		if ($(this).val() !== "") {
			$.ajax({
				url: '<?= base_url('apps/PredictiontForm') ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					file_id: $(this).val()
				},
				beforeSend: function() {
					$('.form-area-predict').html(`<div class="text-center mt-2">
			 		<h3><i class="fa fa-spin fa-spinner text-warning"></i></h3></div>`);
				},
				success: function(response) {
					if (response) {
						if (response.err) {
							$('.form-area-predict').html(response.err);
						}

						if (response.ok) {
							$('.form-area-predict').html(response.ok);
						}

						// if (response.sample) {
						// $('#table_sample').html(response.sample);
						// }

					}
				}
			});

		} else {
			alert()
		}

	});

	function alert() {
		$('.form-area-predict');
		$('#table_sample').html('');
	}

	$(function() {
		alert()
	});
</script>

<?= $this->endSection() ?>