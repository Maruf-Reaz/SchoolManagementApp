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
                        <div class="card-header">Full Issue Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Photo</label>
                                        <label id="cc-payment" name="photo" class="form-control">
											<?php echo $data['book_and_member']->photo ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Student Name</label>
                                        <label id="cc-payment" name="student_name" class="form-control">
											<?php echo $data['book_and_member']->student_name ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Email</label>
                                        <label id="cc-payment" name="email" class="form-control">
											<?php echo $data['book_and_member']->email ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Roll</label>
                                        <label id="cc-payment" name="roll" class="form-control">
											<?php echo $data['book_and_member']->roll ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Class</label>
                                        <label id="cc-payment" name="class_numeric_value" class="form-control">
											<?php echo $data['book_and_member']->class_numeric_value ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Section</label>
                                        <label id="cc-payment" name="section_name" class="form-control">
											<?php echo $data['book_and_member']->section_name ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Issue Date</label>
                                        <label id="cc-payment" name="issue_date" class="form-control">
											<?php echo $data['book_and_member']->issue_date ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Return Date</label>
                                        <label id="cc-payment" name="return_date" class="form-control">
											<?php echo $data['book_and_member']->return_date ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Serial Number</label>
                                        <label id="cc-payment" name="serial_number" class="form-control">
											<?php echo $data['book_and_member']->serial_number ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Note</label>
                                        <label id="cc-payment" name="note" class="form-control">
											<?php echo $data['book_and_member']->note ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Status</label>
                                        <label id="cc-payment" name="status" class="form-control">
											<?php echo $data['book_and_member']->status ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Book Name</label>
                                        <label id="cc-payment" name="book_name" class="form-control">
											<?php echo $data['book_and_member']->book_name ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Author</label>
                                        <label id="cc-payment" name="author" class="form-control">
											<?php echo $data['book_and_member']->author ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Library ID</label>
                                        <label id="cc-payment" name="library_id" class="form-control">
											<?php echo $data['book_and_member']->library_id ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Join Date</label>
                                        <label id="cc-payment" name="join_date" class="form-control">
											<?php echo $data['book_and_member']->join_date ?>
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