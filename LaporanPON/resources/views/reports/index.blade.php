<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            font-weight: bold;
            color: #343a40;
        }
        table {
            background-color: #ffffff;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        table thead th, table tbody td {
            padding: 15px;
            text-align: center;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Laporan Harian</h1>

        <!-- Form Pencarian -->
        <form action="" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="user" class="form-control" placeholder="Cari berdasarkan User" value="{{ request('user') }}">
                </div>
                <div class="col-md-4">
                    <input type="month" name="month" class="form-control" value="{{ request('month') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>

        <!-- Tampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Jika data kosong -->
        @if ($reports->isEmpty())
            <div class="alert alert-warning">Data tidak ditemukan.</div>
        @else
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
                        <th>User</th>
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
                            <td>{{ $report->user->name ?? 'Unknown' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Tombol kembali ke halaman form -->
        <a href="/home" class="btn btn-primary mt-3">Kembali ke Form Laporan</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
