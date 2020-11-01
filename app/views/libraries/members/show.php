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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Member Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Photo</label>
                                        <label id="cc-payment" name="photo" class="form-control">
											<?php echo $data['member']->photo ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <label id="cc-payment" name="name" class="form-control">
											<?php echo $data['member']->name ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Roll</label>
                                        <label id="cc-payment" name="roll" class="form-control">
											<?php echo $data['member']->roll ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Class</label>
                                        <label id="cc-payment" name="class_numeric_value" class="form-control">
											<?php echo $data['member']->class_numeric_value ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Section</label>
                                        <label id="cc-payment" name="section" class="form-control">
											<?php echo $data['member']->section_name ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Email</label>
                                        <label id="cc-payment" name="email" class="form-control">
											<?php echo $data['member']->email ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Status</label>
                                        <label id="cc-payment" name="stats" class="form-control">
											<?php if ( $data['member']->status == 1 ) {
												echo "active";
											} else {
												echo "inactive";
											} ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Library ID</label>
                                        <label id="cc-payment" name="library_id" class="form-control">
											<?php echo $data['member']->library_id ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Join Date</label>
                                        <label id="cc-payment" name="join_date" class="form-control">
											<?php echo $data['member']->join_date ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Library Fee</label>
                                        <label id="cc-payment" name="library_fee" class="form-control">
											<?php echo $data['member']->library_fee ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Date Of Birth</label>
                                        <label id="cc-payment" name="date_of_birth" class="form-control">
											<?php echo "N/A" ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Gender</label>
                                        <label id="cc-payment" name="gender" class="form-control">
											<?php echo "N/A" ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Blood Group</label>
                                        <label id="cc-payment" name="blood_group" class="form-control">
											<?php echo "N/A" ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Address</label>
                                        <label id="cc-payment" name="address" class="form-control">
											<?php echo "N/A" ?>
                                        </label>
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