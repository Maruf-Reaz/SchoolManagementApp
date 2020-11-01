<!--//written by
//Maruf
//29-9-2018
-->
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
                <div class="col-lg-6" style="margin:auto ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Holiday</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php URLROOT ?>/announcement/Holidays/add" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Title</div>
                                                <input type="text" id="username3" name="title" class="form-control"
                                                       required aria-required="true" aria-invalid="false">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-font"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">From Date</div>
                                                <input type="text" id="username3" name="from_date"
                                                       class="form-control docs-date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">To Date</div>
                                                <input type="text" id="username3" name="to_date"
                                                       class="form-control docs-date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Details</div>
                                                <textarea name="details" id="textarea-input" rows="6"
                                                          placeholder="Write details Here..."
                                                          class="form-control"></textarea>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-font"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
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

<?php require APPROOT . '/views/layouts/footer.php' ?>
