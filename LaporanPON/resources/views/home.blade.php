<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan PON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      /* Background Gradient */
      body {
        background: linear-gradient(135deg, #6dd5fa, #2980b9);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Arial', sans-serif;
      }

      h1 {
        color: #fff;
        text-align: center;
        font-size: 2rem;
        margin-bottom: 30px;
      }

      .form-container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
      }

      .form-container h1 {
        font-size: 1.8rem;
        margin-bottom: 15px;
        color: #333;
      }

      label {
        font-size: 0.9rem;
        font-weight: bold;
        color: #444;
      }

      .form-control {
        border-radius: 8px;
        padding: 8px;
        font-size: 0.9rem;
        border: 1px solid #ddd;
      }

      .btn-primary {
        background-color: #2980b9;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 10px;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 6px rgba(41, 128, 185, 0.3);
      }

      .btn-primary:hover {
        background-color: #1f618d;
      }

      .logout-link {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        font-size: 1rem;
      }

      .logout-link:hover {
        color: #ff6347;
      }

      .input-group-text {
        background-color: #2980b9;
        color: white;
        border: none;
        border-radius: 8px 0 0 8px;
        padding: 8px 12px;
      }

      /* Adjust form layout on smaller screens */
      @media (max-width: 576px) {
        .logout-link {
          top: 10px;
          right: 10px;
        }

        .form-container {
          padding: 15px;
        }

        h1 {
          font-size: 1.6rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Link Logout di Pojok Kanan Atas -->
    <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Logout <i class="fas fa-sign-out-alt"></i>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

    <div class="form-container">
      <h1>Laporan Harian</h1>

      <!-- Pop-up Success Message -->
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/save-report" method="POST">
        @csrf

        <!-- Tanggal Field (Autoset) -->
        <div class="mb-2">
          <label for="tanggal" class="form-label">Date</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
            <input id="tanggal" type="date" class="form-control" name="tanggal" required>
          </div>
        </div>

        <!-- Time Start and Time Finish -->
        <div class="mb-2 row">
          <div class="col-md-6">
            <label for="time_start" class="form-label">Time Start</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-clock"></i></span>
              <input id="time_start" type="time" class="form-control" name="time_start" required>
            </div>
          </div>
          <div class="col-md-6">
            <label for="time_finish" class="form-label">Time Finish</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-clock"></i></span>
              <input id="time_finish" type="time" class="form-control" name="time_finish" required>
            </div>
          </div>
        </div>

        <!-- KM Start and KM Finish -->
        <div class="mb-2 row">
          <div class="col-md-6">
            <label for="km_start" class="form-label">KM Start</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-road"></i></span>
              <input id="km_start" type="number" class="form-control" name="km_start" required>
            </div>
          </div>
          <div class="col-md-6">
            <label for="km_finish" class="form-label">KM Finish</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-road"></i></span>
              <input id="km_finish" type="number" class="form-control" name="km_finish" required>
            </div>
          </div>
        </div>

        <!-- Description Field -->
        <div class="mb-2">
          <label for="description" class="form-label">Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-edit"></i></span>
            <textarea id="description" class="form-control" name="description" rows="3"></textarea>
          </div>
        </div>

        <!-- Submit Button and View Report Button in One Row -->
        <div class="d-flex justify-content-center gap-2">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('reports.index') }}" class="btn btn-primary">Lihat Laporan</a>
        </div>
      </form>
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
