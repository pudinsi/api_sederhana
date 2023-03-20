<?php defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Test Api</title>
  </head>
  <body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
				<div class="btn-group" role="group" aria-label="Basic example">
					<input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Cari" id="cari-nip">
					<button class="btn btn-outline-success my-2 my-sm-0" id="tombol-klik">Cari</button>
				</div>
			</div>
			</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="informasi" id="informasi"></div>
			</div>
		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		function searchNip()
		{
			$('#informasi').html('');
			var nip = $('#cari-nip').val();
			if (nip == ''){
				$('#informasi').html('<h1 class="text-center">Form Kosong</h1>');
			}else{
				$.ajax({
					url: 'http://localhost/ci_api/public/tesapi/periksanip',
					type: 'POST',
					dataType: 'json',
					data : {
						'apikey' : '',
						'nip': nip,
					},
					success: function(result){
						//console.log(result);
						if(result.status == 'success'){
							$('#informasi').html('<h1 class="text-center">Nip Terdaftar</h1>');
						}else{
							$('#informasi').html('<h1 class="text-center">Data tidak ada</h1>');
						}
					}
				});
			};
		}
		$('#tombol-klik').on('click', function (){
			searchNip();
		});
		// Enter langsung cari
		$('#cari-nip').on('keyup', function(event){
			if (event.keyCode === 13){
				searchNip();
			}
		});
	</script>
  </body>
</html>