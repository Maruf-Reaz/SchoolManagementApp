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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Issue </strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/libraries/issuebooks/edit-issue" method="post" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="library_id" class=" form-control-label">Library ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="id" name="id"
                                               value="<?php echo $data['book_and_member']->id ?>">
                                        <input type="text" id="library_id" readonly name="library_id"
                                               value="<?php echo $data['book_and_member']->library_id ?>"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="book_name" class=" form-control-label">Book</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="book_id" name="book_id"
                                               value="<?php echo $data['book_and_member']->book_id ?>">
                                        <input type="text" id="book_name" readonly name="book_name"
                                               value="<?php echo $data['book_and_member']->book_name ?>"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="author" class=" form-control-label">Author</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="author" readonly name="author"
                                               value="<?php echo $data['book_and_member']->author ?>"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="subject_code" class=" form-control-label">Subject Code</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="subject_code" readonly name="subject_code"
                                               value="<?php echo $data['book_and_member']->author ?>"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="serial_number" class=" form-control-label">Serial Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="serial_number" readonly name="serial_number"
                                               value="<?php echo $data['book_and_member']->serial_number ?>"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="due_date" class=" form-control-label">Due Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="due_date" name="due_date"
                                               placeholder="Enter Due Date ..."
                                               value="<?php echo $data['book_and_member']->return_date ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="issue_date" name="issue_date"
                                               value="<?php echo $data['book_and_member']->issue_date ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="note" class=" form-control-label">Note</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="note" name="note"
                                               placeholder="Enter Note ..."
                                               value="<?php echo $data['book_and_member']->note ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="status" name="status"
                                               value="<?php echo $data['book_and_member']->status ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"> Edit Issue</button>
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