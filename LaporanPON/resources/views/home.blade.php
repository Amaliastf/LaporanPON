<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan PON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #ADD8E6;
        position: relative;
      }

      h1 {
        color: white;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
      }

      .form-group label {
        color: white;
      }

      .form-container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .btn-primary {
        background-color: #007bff;
        border: none;
      }

      .btn-primary:hover {
        background-color: #0056b3;
      }

      .alert {
        margin-top: 20px;
      }

      /* Styling untuk link logout */
      .logout-link {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        text-decoration: none; /* Hilangkan underline */
        font-weight: bold;
      }

      .logout-link:hover {
        color: darkred;
      }

      /* Media query untuk layar lebih kecil */
      @media (max-width: 576px) {
        .logout-link {
          top: 10px;
          right: 10px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Link Logout di Pojok Kanan Atas -->
    <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

    <div class="container">
      <h1>Laporan Harian</h1>

      <!-- Pop-up Success Message -->
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="form-container">
            <form action="/save-report" method="POST">
              @csrf

              <!-- Tanggal Field (Autoset) -->
              <div class="mb-3 row">
                <label for="tanggal" class="col-md-3 col-form-label">Date</label>
                <div class="col-md-9">
                  <input id="tanggal" type="date" class="form-control" name="tanggal" required>
                </div>
              </div>

              <!-- Time Start and Time Finish -->
              <div class="mb-3 row">
                <div class="col-md-6">
                  <label for="time_start" class="col-form-label">Time Start</label>
                  <input id="time_start" type="time" class="form-control" name="time_start" required>
                </div>
                <div class="col-md-6">
                  <label for="time_finish" class="col-form-label">Time Finish</label>
                  <input id="time_finish" type="time" class="form-control" name="time_finish" required>
                </div>
              </div>

              <!-- KM Start and KM Finish -->
              <div class="mb-3 row">
                <div class="col-md-6">
                  <label for="km_start" class="col-form-label">KM Start</label>
                  <input id="km_start" type="number" class="form-control" name="km_start" required>
                </div>
                <div class="col-md-6">
                  <label for="km_finish" class="col-form-label">KM Finish</label>
                  <input id="km_finish" type="number" class="form-control" name="km_finish" required>
                </div>
              </div>

              <!-- Description Field -->
              <div class="mb-3 row">
                <label for="description" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-9">
                  <textarea id="description" class="form-control" name="description" rows="4"></textarea>
                </div>
              </div>

              <!-- Submit Button and View Report Button in One Row -->
               <div class="row mb-0">
                <div class="col-md-12">
                  <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('reports.index') }}" class="btn btn-primary">Lihat Laporan Harian</a>
                  </div>
                </div>
              </div>

              <!-- Submit Button
              <div class="row mb-0">
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div> -->
            </form>

            <!-- Tambahkan tombol untuk melihat laporan -->
            <!-- <div class="text-center mt-4">
              <a href="{{ route('reports.index') }}" class="btn btn-info">
                Lihat Laporan Harian
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Script to Autoset the Date -->
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var today = new Date().toISOString().split('T')[0];  // Get today's date in YYYY-MM-DD format
        document.getElementById('tanggal').value = today;     // Set it to the date input
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
