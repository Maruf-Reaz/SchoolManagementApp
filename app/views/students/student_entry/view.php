<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Sole CSS link-->
    <link href="<?php echo URLROOT; ?>/css/neon/custom.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/neon/neon-forms.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/neon/css/neon-theme.css" rel="stylesheet" media="all">
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
                                    <h4 class="header-title-new"><i class="fa fa-pencil-alt"></i>Student Profile</h4>

                                    <center>
                                        <img src="<?php echo URLROOT ?>/images/students/<?php echo $data['student']->photo?>"
                                             alt="image" class="img-circle">
                                        <div>
                                            <h4>
                                                <?php echo $data['student']->name ?>
                                            </h4>
                                            <h6 style="font-weight: 400;">
                                                <?php echo $data['student']->registration_no ?>
                                            </h6>
                                        </div>
                                    </center>

                                    <div class="activate-table table-responsive table-style1">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td><strong>Name</strong></td>
                                                <td>
                                                    <?php echo $data['student']->name ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Current Addresse</strong></td>
                                                <td>
                                                    <?php echo $data['student']->current_address ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Permanent Address</strong></td>
                                                <td>
                                                    <?php echo $data['student']->permanent_address ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Religion</strong></td>
                                                <td>
                                                    <?php echo $data['student']->religion ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Remarks</strong></td>
                                                <td>
                                                    <?php echo $data['student']->remarks ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><strong>Extra Curricular Activities</strong></td>
                                                <td>
                                                    <?php echo $data['student']->extra_curricular_activities ?>
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