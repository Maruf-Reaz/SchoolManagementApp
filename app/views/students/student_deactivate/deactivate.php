<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-xs-12">
                    <div class="x_panel au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4 class="header-title-new"><i class="fa fa-pencil-alt"></i>Profile</h4>
                                <center>
                                    <img src="<?php echo URLROOT ?>/images/students/<?php echo $data['student']->photo ?>"
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
                                            <td><strong>Registration No</strong></td>
                                            <td>
                                                <?php echo $data['student']->registration_no ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of birth :</strong></td>
                                            <td><?php echo $data['student']->date_of_birth ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Blood Group :</strong></td>
                                            <td><?php echo $data['student']->blood_group ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address :</strong></td>
                                            <td><?php echo $data['student']->current_address ?></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Deactivate Student</h3>
                                </div>
                                <div class="card-body">

                                    <form action="<?php URLROOT ?>/Students/deactivateStudent/<?php echo $data['student']->id ?>"
                                          method="post">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Deactivation Date</div>
                                            <div class="input-group">
                                                <input placeholder="<?php echo date("m") ?>/<?php echo date("d") ?>/<?php echo date("Y") ?>"
                                                       type="text" name="deactivation_date" value=""
                                                       class="form-control datepicker" readonly>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-danger rounded-pill ml-0 mt-4">Deactivate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            /*date picker code*/
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            /*date picker code ends*/
        });

    </script>
    <?php require APPROOT . '/views/layouts/footer.php' ?>
