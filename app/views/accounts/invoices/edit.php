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
                                <i class="zmdi zmdi-edit"></i>Edit Invoice</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/invoices/edit/<?php echo $data['invoice']->invoice_number ?>"
                                  method="post"
                                  class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="class" class="form-control-label">Class</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="invoice_id" name="invoice_id"
                                               value="<?php echo $data['invoice']->id ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="class_id" name="class_id"
                                               value="<?php echo $data['invoice']->class_id ?>"
                                               class="form-control" required>
                                        <input type="text" id="class" name="class"
                                               value="<?php echo $data['invoice']->class_name ?>"
                                               readonly class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="section" class="form-control-label">Section</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="section_id" name="section_id"
                                               value="<?php echo $data['invoice']->section_id ?>"
                                               class="form-control" required>
                                        <input type="text" id="section" name="section"
                                               value="<?php echo $data['invoice']->section_name ?>"
                                               readonly class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="student" class="form-control-label">Student</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="student_id" name="student_id"
                                               value="<?php echo $data['invoice']->student_id ?>"
                                               class="form-control" required>
                                        <input type="text" id="student" name="student"
                                               value="<?php echo $data['invoice']->student_name ?>"
                                               readonly class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="fee_type" class="form-control-label">Fee Type</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" id="fee_type_id" name="fee_type_id"
                                               value="<?php echo $data['invoice']->fee_type_id ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="invoice_number" name="invoice_number"
                                               value="<?php echo $data['invoice']->invoice_number ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="payment_status" name="payment_status"
                                               value="<?php echo $data['invoice']->payment_status ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="paid_amount" name="paid_amount"
                                               value="<?php echo $data['invoice']->paid_amount ?>"
                                               class="form-control" required>
                                        <input type="text" id="fee_type" name="fee_type"
                                               value="<?php echo $data['invoice']->fee_type_name ?>"
                                               readonly class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="amount" class="form-control-label">Amount*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" step="any" id="amount" name="amount"
                                               value="<?php echo $data['invoice']->amount ?>"
                                               placeholder="Edit Amount..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="discount" class="form-control-label">Discount*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" step="any" id="discount" name="discount"
                                               value="<?php echo $data['invoice']->discount_in_percentage ?>"
                                               placeholder="Edit Percentage of Discount..." class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="date" class="form-control-label">Date*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date" name="date"
                                               value="<?php echo $data['invoice']->date ?>"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"> Edit Invoice</button>
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