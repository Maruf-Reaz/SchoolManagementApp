<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="au-card x_panel">
                    <div class="au-card-title">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-edit"></i>Edit Class</h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo URLROOT; ?>/academic/classes/edit" method="post"
                              class="form-horizontal">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <!--Class Name-->
                            <div class="form-group">
                                <div class="input-group-addon2">Name</div>
                                <div class="input-group">

                                    <input type="text" id="name" name="name"
                                           value="<?php echo $data['name']; ?>"
                                           class="form-control">
                                </div>
                            </div>

                            <!--Numeric Value-->
                            <div class="form-group">
                                <div class="input-group-addon2">Numeric Value</div>
                                <div class="input-group">

                                    <input type="number" id="numeric_value" name="numeric_value"
                                           value="<?php echo $data['numeric_value']; ?>"
                                           class="form-control">
                                </div>
                            </div>
                            <!--Assign Class-->
                            <!--<div class="form-group">
                                   <div class="input-group-addon2">Assign Teacher</div>
                                    <div class="input-group">
                                        
                                        <select name="teacher_id" id="select" class="form-control <?php /*echo ! empty($data['teacher_id_error']) ? 'is-invalid' : '' */ ?>">
                                            <option value="">Please select</option>
                                            <option value="1">Maruf Reaz</option>
                                            <option value="2">Imran Khan</option>
                                            <option value="3">Nayeem</option>
                                        </select>
                                        <span class="invalid-feedback">
                                            <?php /*echo $data['teacher_id_error']; */ ?></span>
                                    </div>
                                </div>-->

                            <!--<div class="form-group">
                                    <div class="input-group-addon2">Note (Optional)</div>
                                    <div class="input-group">
                                        <input type="text" id="note" name="note" value="<?php /*echo $data['note'] */ ?>"
                                               class="form-control">
                                    </div>
                                </div>-->

                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-default rounded-pill ml-0 mt-4">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php' ?>