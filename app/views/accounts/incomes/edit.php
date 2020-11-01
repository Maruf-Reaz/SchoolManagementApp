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
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Edit Income</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php URLROOT; ?>/accounts/incomes/edit"
                                          method="post" id="register-form">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Income Type</div>
                                            <div class="input-group">
                                                <select id="income_type_id" name="income_type_id"
                                                        class="form-control">
													<?php foreach ( $data['income_types'] as $income_type ): ?>
														<?php if ( $income_type->id == $data['income']->income_type_id ): ?>
                                                            <option value="<?php echo $income_type->id; ?>"
                                                                    selected> <?php echo $income_type->income_type_name; ?></option>
														<?php else: ?>
                                                            <option value="<?php echo $income_type->id; ?>"> <?php echo $income_type->income_type_name; ?></option>
														<?php endif; ?>
													<?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Amount</div>
                                            <div class="input-group">
                                                <input type="hidden" id="id" name="id"
                                                       value="<?php echo $data['income']->id; ?>">
                                                <input type="hidden" id="receiver_id" name="receiver_id"
                                                       value="<?php echo $data['income']->receiver_id; ?>">
                                                <input type="number" step="any" id="amount" name="amount"
                                                       class="form-control" required placeholder="Edit amount"
                                                       value="<?php echo $data['income']->amount ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Note</div>
                                            <div class="input-group">
                                                <input type="text" id="note" name="note"
                                                       class="form-control" required placeholder="Edit note"
                                                       value="<?php echo $data['income']->note ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Date</div>
                                            <div class="input-group">
                                                <input placeholder="Insert Date" type="text" id="date" name="date"
                                                       class="form-control datepicker" required readonly
                                                       value="<?php echo $data['income']->date ?>">
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Edit Income</button>
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

<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    });
</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
