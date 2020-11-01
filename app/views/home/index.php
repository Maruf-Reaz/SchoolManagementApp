<?php /*require APPROOT . '/views/inc/header.php'; */ ?>
<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <p class="card-category">Student</p>
                            <h3 class="card-title">358</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                Total Student
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <p class="card-category">Attendance</p>
                            <h3 class="card-title">245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                Today
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-graduate "></i>
                            </div>
                            <p class="card-category">Teacher</p>
                            <h3 class="card-title">75</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                Today
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-book-open "></i>
                            </div>
                            <p class="card-category">Subject</p>
                            <h3 class="card-title">129+</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-12 mt-5">
                    <div class="card mt-0 p-4">
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $.notify({
                title: '<strong>Greetings!</strong>',
                icon: 'fas fa-user-graduate ',
                url: 'https://www.emanagementsys.com/',
                target: '_blank',
                message: "Welcome to Education Management System!"
            }, {
                type: 'success',
                animate: {
                    enter: 'animated lightSpeedIn',
                    exit: 'animated lightSpeedOut'
                },
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: {
                    x: 50,
                    y: 100
                },
                spacing: 10,
                z_index: 1031,
                delay: 5000,
            });
        });
    </script>

<?php require APPROOT . '/views/layouts/footer.php' ?>