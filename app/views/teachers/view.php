<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
    <style>
        .col-md-5 {
            margin: auto;
        }
    </style>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-8 col-xs-12">
                        <div class="x_panel au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4 class="header-title-new"><i class="fa fa-pencil-alt"></i>Teacher Profile</h4>

                                    <center>
                                        <img src="<?php echo URLROOT ?>/images/teachers/<?php echo $data['teacher']->photo ?>"
                                             alt="image" class="img-circle">
                                        <div>
                                            <h4>
                                                <?php echo $data['teacher']->name ?>
                                            </h4>
                                            <h6 style="font-weight: 400;">
                                                <?php echo $data['teacher']->registration_no ?>
                                            </h6>
                                        </div>
                                    </center>

                                    <div class="activate-table table-responsive table-style1">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td><strong>Name :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->name ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Registration No :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->registration_no ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date of birth :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->date_of_birth ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Blood Group :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->blood_group ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Address :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->current_address ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><strong>Current Address :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->current_address ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Permanent Address :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->permanent_address ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Religion :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->religion ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Educational Qualification :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->educational_qualification ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Speciality :</strong></td>
                                                <td>
                                                    <?php echo $data['teacher']->speciality ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/layouts/footer.php' ?>