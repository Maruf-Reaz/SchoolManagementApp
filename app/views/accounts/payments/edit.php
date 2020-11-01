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
                            <strong>Edit Payment</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/payments/edit/<?php echo $data['payment']->id ?>"
                                  method="post"
                                  class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="amount" class="form-control-label">Amount*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" step="any" id="amount" name="amount" min="0"
                                               value="<?php echo $data['payment']->paid_amount ?>"
                                               max="<?php echo $data['maximum_amount'] ?>"
                                               class="form-control" required>
                                        <input type="hidden" id="id" name="id"
                                               value="<?php echo $data['payment']->id ?>">
                                        <input type="hidden" id="invoice_number" name="invoice_number"
                                               value="<?php echo $data['payment']->invoice_number ?>">
                                        <input type="hidden" id="previous_paid_amount" name="previous_paid_amount"
                                               value="<?php echo $data['payment']->paid_amount ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="class" class="form-control-label">Payment Method*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="payment_method_id" id="payment_method_id">
                                            <option value="0" selected="selected">----Select Payment Method----</option>
											<?php foreach ( $data['payment_methods'] as $payment_method ): ?>
                                                <option value="<?php echo $payment_method->id; ?>"> <?php echo $payment_method->payment_method_name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"> Edit Payment</button>
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