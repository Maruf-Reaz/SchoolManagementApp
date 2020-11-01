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
                            <strong>Edit Book</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/libraries/books/edit" method="post" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="id" name="id" value="<?php echo $data['book']->id?>">
                                        <input type="text" id="name" name="name" value="<?php echo $data['book']->name?>"
                                               placeholder="Edit Name..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="author" class=" form-control-label">Author</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="author" name="author" value="<?php echo $data['book']->author?>"
                                               placeholder="Edit Author Name..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="subject_code" class=" form-control-label">Subject Code</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="subject_code" name="subject_code" value="<?php echo $data['book']->subject_code?>"
                                               placeholder="Edit Subject Code..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="price" class=" form-control-label">Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="price" name="price" value="<?php echo $data['book']->price?>"
                                               placeholder="Edit Price..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="quantity" class=" form-control-label">Quantity</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="quantity" name="quantity" value="<?php echo $data['book']->quantity?>"
                                               placeholder="Edit Quantity..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="rack_number" class=" form-control-label">Rack Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="rack_number" name="rack_number" value="<?php echo $data['book']->rack_number?>"
                                               placeholder="Edit Rack Number..." class="form-control" required>
                                        <input type="hidden" id="status" name="status" value="<?php echo $data['book']->status?>">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"> Edit </button>
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