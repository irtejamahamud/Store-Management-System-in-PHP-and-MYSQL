<div class="row align-items-center pb-2">
    <div class="col-sm-1">
        <img src="image/Logo.png" alt="logo" class="img-fluid" style="width:100px;">
    </div>
    <div class="col-sm-7">
        <h1 class="mb-0"><a href="index.php" class="text-info text-decoration-none">Store Management System</a></h1>
    </div>
    <div class="col-sm-4 text-end">
        <p class="mb-0 fs-3 text-success fw-bold">
            <?php echo $user_first_name ?>
            <a href="logout.php" class="text-dark text-decoration-none">Logout</a>
        </p>
        <div class="header-date">
            <strong id="current-date-time"></strong>
        </div>
        <script>
            function updateDateTime() {
                var currentDateTime = new Date();
                var options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                    hour12: true
                };

                var dateTimeString = currentDateTime.toLocaleDateString('en-US', options);

                document.getElementById('current-date-time').innerHTML = dateTimeString;

                // Update date and time every 1 minute (60000 milliseconds)
                setTimeout(updateDateTime, 60000);
            }

            // Initial call to display the date and time
            updateDateTime();
        </script>
    </div>
</div>
