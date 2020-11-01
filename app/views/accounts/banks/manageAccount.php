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
                                <i class="fa fa-pencil-alt"></i>Transaction</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/banks/manageaccount" method="post"
                                  class="form-horizontal">
                                <div class="form-group">
                                    <div class="input-group-addon2">Bank Name</div>
                                    <div class="input-group">
                                        <input type="text" id="bank_name" name="bank_name" readonly
                                               class="form-control" required
                                               value="<?php echo $data['bank']->bank_name; ?>">
                                        <input type="hidden" id="bank_id" name="bank_id"
                                               value="<?php echo $data['bank']->id; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Amounts</div>
                                    <div class="input-group">
                                        <input type="text" id="amount" name="amount"
                                               placeholder="Enter Amount..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Action</div>
                                    <div class="input-group">
                                        <select class="form-control" id="action" name="action">
                                            <option value="" selected="selected">-Select Action-</option>
                                            <option value="deposit">Deposit</option>
                                            <option value="withdraw">Withdraw</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Make Transaction</button>
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