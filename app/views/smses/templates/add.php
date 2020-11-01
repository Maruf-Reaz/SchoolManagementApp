<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" style="margin:auto ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title" style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>SMS Template</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php URLROOT ?>/Smses/addTemplate" enctype="multipart/form-data" method="post" id="register-form">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Title</div>
                                            <div class="input-group">
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Body</div>
                                            <div class="input-group">

                                                <textarea name="body" style="border-radius: 5px" class="form-control" id="exampleFormControlTextarea3" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Add Template</button>
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
</div>
<?php require APPROOT . '/views/layouts/footer.php' ?>