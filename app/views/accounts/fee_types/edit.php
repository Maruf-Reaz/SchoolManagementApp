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
            <div class="row">
                <div class="col-lg-6" style="margin: auto">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title"
                             style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="fa fa-pencil-alt"></i>Edit Type Of Fee</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/feetypes/edit" method="post"
                                  class="form-horizontal">
                                <div class="form-group">
                                   <div class="input-group-addon2">Name</div>
                                    <div class="input-group">
                                        
                                        <input type="hidden" id="id" name="id"
                                               value="<?php echo $data['fee_type']->id ?>">
                                        <input type="text" id="fee_type_name" name="fee_type_name"
                                               placeholder="Edit Type Of Fee..." value="<?php echo $data['fee_type']->fee_type_name ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <div class="input-group-addon2">Note</div>
                                    <div class="input-group">
                                        
                                        <input type="text" id="note" name="note" value="<?php echo $data['fee_type']->note ?>"
                                               placeholder="Edit Note..."
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Edit Fee Type</button>
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
