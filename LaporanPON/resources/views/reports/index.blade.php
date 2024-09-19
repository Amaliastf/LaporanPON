<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Laporan Harian</h1>

        <!-- Tampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Time Start</th>
                    <th>Time Finish</th>
                    <th>KM Start</th>
                    <th>KM Finish</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $index => $report)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $report->tanggal }}</td>
                        <td>{{ $report->time_start }}</td>
                        <td>{{ $report->time_finish }}</td>
                        <td>{{ $report->km_start }}</td>
                        <td>{{ $report->km_finish }}</td>
                        <td>{{ $report->description ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol kembali ke halaman form -->
        <a href="/home" class="btn btn-primary mt-3">Kembali ke Form Laporan</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
