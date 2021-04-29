<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
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

</body>
</html>