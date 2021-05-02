<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<style>
		.preloader {
		   position: fixed;
		   top: 0;
		   left: 0;
		   width: 100%;
		   height: 100%;
		   z-index: 9999;
		   background-color: #fff;
	   }
	   .loading {
		   position: absolute;
		   left: 50%;
		   top: 50%;
		   transform: translate(-50%,-50%);
		   font: 14px arial;
	   }
   </style>
   <div class="preloader">
	   <div class="loading">
	   <div class="spinner-grow text-success" style="width: 4rem; height:4rem;" role="status">
		   <span class="sr-only">Loading...</span>
	   </div>
	   <div class="row mt-3">
		 <strong>Harap Tunggu!</strong>
	   </div>
	   </div>
   </div>
	<center>
		<h5>Laporan Agenda BKAD</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Nama</th>
				<th>Agenda</th>
				<th>Lokasi</th>
				<th>Waktu</th>
				<th>Jam Selesai</th>
                <th>Jam Kembali</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($agendas as $agenda)
            <tr>
                <td>
                    <ul>
                        @foreach ($agenda->workers as $worker)
                            <li>{{ $worker->nama }}</li>
                        @endforeach
                    </ul>
                </td>        
                <td>{{ $agenda->agenda }}</td>
                <td>{{ $agenda->lokasi }}</td>
                <td>{{ date('d M Y', strtotime($agenda->waktu)) }}</td>
                <td>{{ $agenda->mulai }}</td>
                <td>{{ $agenda->selesai }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
	$(document).ready(function() {
                $(".preloader").fadeOut("slow");
            });
</script>
</body>
</html>