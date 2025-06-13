<!-- Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <aside class="sidebar sidebar-user">
                    <div class="card ctm-border-radius shadow-sm">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-12 mr-auto text-left">
                                    <div class="custom-search input-group">
                                        <div class="custom-breadcrumb">
                                            <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                <li class="breadcrumb-item d-inline-block"><a href="<?php echo site_url('trainee/dashboard'); ?>" class="text-dark">Home</a></li>
                                                <li class="breadcrumb-item d-inline-block active">Dashboard</li>
                                            </ol>
                                            <h4 class="text-dark">Trainee Dashboard</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-card card shadow-sm bg-white text-center ctm-border-radius">
                        <div class="user-info card-body">
                            <div class="user-avatar mb-4">
                                <img src="<?php echo base_url('assets/profile-pic/' . $user->Profile_pic); ?>" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                            </div>
                            <?php date_default_timezone_set('Asia/Manila'); ?>
                            <div class="user-details">
                                <h4><b>Welcome <?php echo $user->FirstName; ?></b></h4>
                                <p><?= date('D, d M Y h:i A'); ?></p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <div class="card shadow-sm ctm-border-radius">
                            <div class="card-body d-flex justify-content-between align-items-center px-4">
                                <h6 class="text-muted mb-0">Current Status:</h6>
                                <?php if ($clockedIn): ?>
                                    <h6 class="text-success mb-0">Clocked In</h6>
                                <?php else: ?>
                                    <h6 class="text-danger mb-0">Not Clocked In</h6>
                                <?php endif; ?>
                            </div>


                            <!-- Digital Clock Display -->
                            <div class="text-center py-4" style="background-color: #f8f9fa;">
                                <div id="clock" style="font-size: 4rem; font-weight: bold; letter-spacing: 2px;">--:--:-- --</div>
                                <div id="date" class="text-muted fw-medium mt-2" style="font-size: 1.25rem;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 mb-3 mx-auto">
                        <!-- Last Time In/Out -->
                        <div class="px-2 py-2">
                            <?php
                            date_default_timezone_set('Asia/Manila');
                            $today = date('Y-m-d');
                            $lastIn = null;
                            $lastOut = null;

                            foreach ($logsforday as $t) {
                                if ($t->LogInTime && strpos($t->LogInTime, $today) === 0) {
                                    if (!$lastIn || strtotime($t->LogInTime) > strtotime($lastIn)) {
                                        $lastIn = $t->LogInTime;
                                    }
                                }

                                if ($t->LogOutTime && strpos($t->LogOutTime, $today) === 0) {
                                    if (!$lastOut || strtotime($t->LogOutTime) > strtotime($lastOut)) {
                                        $lastOut = $t->LogOutTime;
                                    }
                                }
                            }

                            $formattedToday = date('l, F d, Y');
                            ?>

                            <div class="d-flex align-items-center justify-content-between bg-white border rounded p-2 mb-2">
                                <div class="text-success">
                                    <i class="bi bi-arrow-up-circle-fill me-2"></i>
                                    <strong id="lastTimeIn"><?= $lastIn ? date('h:i:s A', strtotime($lastIn)) : '—' ?></strong>
                                </div>
                                <small class="text-muted"><?= $formattedToday ?></small>
                            </div>
                            <div class="d-flex align-items-center justify-content-between bg-white border rounded p-2">
                                <div class="text-danger">
                                    <i class="bi bi-arrow-down-circle-fill me-2"></i>
                                    <strong id="lastTimeOut"><?= $lastOut ? date('h:i:s A', strtotime($lastOut)) : '—' ?></strong>
                                </div>
                                <small class="text-muted"><?= $formattedToday ?></small>
                            </div>
                        </div>
                    </div>
                </div>


                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

                <!-- Button Group -->
                <div class="row">
                    <div class="col-md-9 mb-2 mx-auto">
                        <div class="d-flex justify-content-center flex-wrap gap-3 px-4 pb-4">
                            <!-- Clock In Button -->
                            <button id="btnClockIn" class="btn btn-warning text-dark fw-semibold px-4" <?= $clockedIn ? 'disabled' : '' ?>>
                                <i class="bi bi-clock-fill me-2"></i>Clock In
                            </button>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                            <script>
                                $('#btnClockIn').click(function() {
                                    Swal.fire({
                                        title: 'Are you sure you want to Clock In?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, Clock In',
                                        cancelButtonText: 'Cancel'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                url: '<?= site_url("trainee/clock-in") ?>',
                                                method: 'POST',
                                                dataType: 'json',
                                                data: {},
                                                success: function(response) {
                                                    if (response.status === 'success') {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Clocked In',
                                                            text: 'Clock In successfully!',
                                                            confirmButtonColor: '#3085d6'
                                                        });
                                                        $('#btnClockIn').prop('disabled', true);
                                                        $('#btnClockOut').prop('disabled', false);

                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 2000);
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Clock In Failed',
                                                            text: response.message
                                                        });
                                                    }
                                                },
                                                error: function() {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: 'An error occurred while clocking out.'
                                                    });
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>



                            <!-- <button class="btn btn-warning text-dark fw-semibold px-4">
                                <i class="bi bi-camera-video-fill me-2"></i>Start Break
                            </button>
                            <button class="btn btn-light text-dark fw-semibold px-4 border">
                                <i class="bi bi-stop-fill me-2"></i>End Break
                            </button> -->
                            <!-- Clock Out Button -->
                            <button id="btnClockOut" class="btn btn-light text-dark fw-semibold px-4 border" <?= $clockedIn ? '' : 'disabled' ?>>
                                <i class="bi bi-door-closed-fill me-2"></i>Clock Out
                            </button>

                            <script>
                                $('#btnClockOut').click(function() {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Do you want to clock out now?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#6c757d',
                                        confirmButtonText: 'Yes, clock out'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                url: '<?= site_url("trainee/clock-out") ?>',
                                                method: 'POST',
                                                dataType: 'json',
                                                data: {},
                                                success: function(response) {
                                                    if (response.status === 'success') {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Clocked Out',
                                                            text: 'Clock Out successfully!'
                                                        });
                                                        $('#btnClockOut').prop('disabled', true);
                                                        $('#btnClockIn').prop('disabled', false);

                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 2000);
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Failed',
                                                            text: response.message
                                                        });
                                                    }
                                                },
                                                error: function() {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: 'An error occurred while clocking out.'
                                                    });
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <style>
                    .d-flex>button:not(:last-child) {
                        margin-right: 12px;
                    }
                </style>

                <!-- Clock Script -->
                <script>
                    function updateClock() {
                        const now = new Date();
                        let hours = now.getHours();
                        const minutes = String(now.getMinutes()).padStart(2, '0');
                        const seconds = String(now.getSeconds()).padStart(2, '0');
                        const ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12 || 12;
                        const timeStr = `${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;
                        const dateStr = now.toLocaleDateString('en-US', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        document.getElementById('clock').textContent = timeStr;
                        document.getElementById('date').textContent = dateStr;
                    }

                    updateClock();
                    setInterval(updateClock, 1000);
                </script>
            </div>
        </div>
    </div>
</div>
<!--/Content-->