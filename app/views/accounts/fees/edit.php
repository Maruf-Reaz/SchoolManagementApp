<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row justify-content-lg-center">
                <div class="col-lg-6">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="fa fa-pencil-alt"></i>Edit Fee</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/fees/edit" method="post"
                                  class="form-horizontal">
                                <div class="form-group">
                                   <div class="input-group-addon2">Class</div>
                                    <div class="input-group">
                                        
                                        <input type="text" id="class_name" name="class_name"
                                               readonly class="form-control"
                                               value="<?php echo $data['fee']->class_name; ?>">
                                        <input type="hidden" id="class_id" name="class_id"
                                               value="<?php echo $data['fee']->class_id; ?>">
                                        <input type="hidden" id="fee_id" name="fee_id"
                                               value="<?php echo $data['fee']->id; ?>">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <div class="input-group-addon2">Fee Type</div>
                                    <div class="input-group">
                                        <input type="text" id="fee_type" name="fee_type"
                                               readonly class="form-control"
                                               value="<?php echo $data['fee']->fee_type_name; ?>">
                                        <input type="hidden" id="fee_type_id" name="fee_type_id"
                                               value="<?php echo $data['fee']->fee_type_id; ?>">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <div class="input-group-addon2">Amount</div>
                                    <div class="input-group">
                                        
                                        <input type="number" step="any" id="fee_amount" name="fee_amount"
                                               placeholder="Edit Amount..."
                                               class="form-control" required
                                               value="<?php echo $data['fee']->fee_amount; ?>">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Edit Fee</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>