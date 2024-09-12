<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="background-color:#ADD8E6;">
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
        <div class="form-group row">
            <label for="tanggal" class="col-md-4 col-form-label text-md-right" style="color:white;">Date</label>
            <div class="col-md-6">
                <input id="tanggal" type="date" class="form-control" name="tanggal" required>
            </div>
        </div>

        <!-- Time Start Field -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="time_start" class="col-md-4 col-form-label text-md-right" style="color:white;">Time Start</label>
                <input id="time_start" type="time" class="form-control" name="time_start" required>
            </div>

            <div class="col-md-6">
                <label for="time_finish" class="col-md-4 col-form-label text-md-right" style="color:white;">Time Finish</label>
                <input id="time_finish" type="time" class="form-control" name="time_finish" required>
            </div>
        </div>

        <!-- KM Start and KM Finish Fields -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="km_start" class="col-md-4 col-form-label text-md-right" style="color:white;">KM Start</label>
                <input id="km_start" type="number" class="form-control" name="km_start" required>
            </div>

            <div class="col-md-6">
                <label for="km_finish" class="col-md-4 col-form-label text-md-right" style="color:white;">KM Finish</label>
                <input id="km_finish" type="number" class="form-control" name="km_finish" required>
            </div>
        </div>

        <!-- Description Field -->
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right" style="color:white;">Description</label>
            <div class="col-md-6">
                <textarea id="description" class="form-control" name="description"></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>

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
