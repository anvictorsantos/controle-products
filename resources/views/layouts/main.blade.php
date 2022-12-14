<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Laravel 5.6 CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // When click show user
            $('body').on('click', '#show-product', function () {
                var productURL = $(this).data('url');
		
				Swal.fire({
					title: 'Carregando informações, por favor aguarde...',
					timer: 10000,
					timerProgressBar: true,
					showConfirmButton: false,
					allowOutsideClick: false,
					didOpen: () => {
						Swal.showLoading()
					}
				});

                return $.get(productURL, function (data) {
                    $('#productShowModal').modal('show');
                    $('#product-id').text(data.id);
                    $('#product-name').text(data.name);
                    $('#product-detail').text(data.detail);
                })
				.then((response) => {
					Swal.close();
					return response.data;
				})
				.catch((exception) => {
					alert(exception);
				});
            });
        });
    </script>
</body>
</html>