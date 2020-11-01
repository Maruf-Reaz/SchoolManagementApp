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
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Trial Balance</h3>
                                </div>
                                <div class="filters">
                                    <div style="width: 150px"
                                         class="rs-select2--dark rs-select2--sm rs-select2--border">
                                        <select class="form-control" name="month" id="month">
											<?php
											for ( $i = 1; $i <= 12; ++ $i ) {
												$month_name = date( 'F', mktime( 0, 0, 0, $i, 1 ) );
												if ( date( 'F' ) == $month_name ) {
													echo "<option value='$month_name' selected>$month_name</option>";
												} else {
													echo "<option value='$month_name'>$month_name</option>";
												}
											}
											?>
                                        </select>
                                    </div>
                                    <div style="width: 150px"
                                         class="rs-select2--dark rs-select2--sm rs-select2--border">
                                        <select class="form-control" name="year" id="year">
                                            <!--<option value="0" selected="selected">-Select Year-</option>-->
											<?php
											for ( $i = date( 'Y' ); $i >= 1950; $i -- ) {
												/*echo "<option value='$i'>$i</option>";*/
												if ( date( 'Y' ) == $i ) {
													echo "<option value='$i' selected>$i</option>";
												} else {
													echo "<option value='$i'>$i</option>";
												}
											}
											?>
                                        </select>
                                    </div>
                                    <a data-toggle="tooltip" title="PDF" class="fa fa-file-pdf" href="#"
                                       style="float: right;padding-top: 3px;font-size: 27px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print"
                                       href="#"
                                       style="float: right;padding-top: 3px;padding-right: 15px;font-size: 27px "></a>
                                </div>
                                <style>
                                    .table thead th {
                                        border-right: 0.5px solid #dee2e6;
                                    }

                                    table.jambo_table tbody tr td {
                                        border-right: 0.5px solid #dee2e6;
                                    }
                                </style>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <th colspan="4" class="column-title"
                                                style="vertical-align: middle; border-right-width: 1px;border-right-style: solid; width: 120px;">
                                                <h1 id="title_of_trial_balance" style="color: #bce8f1"></h1>
                                            </th>
                                            <tr class="headings">
                                                <th class="column-title">S/N</th>
                                                <th class="column-title">Particulars/List of Ledger Accounts</th>
                                                <th class="column-title">Debit(BDT)</th>
                                                <th class="column-title">Credit(BDT)</th>
                                            </tr>
                                            </thead>
                                            <tbody id=" data_table_body">
                                            <tr>
                                                <td>#</td>
                                                <td>Accounts Receivable</td>
                                                <td class="debit"><?php echo $data['accounts_receivable']; ?></td>
                                                <td class="credit"><?php echo 0; ?></td>
                                            </tr>
                                            <tr>
                                                <td>#</td>
                                                <td>Payments</td>
                                                <td class="debit"><?php echo 0; ?></td>
                                                <td class="credit"><?php echo $data['payments']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>#</td>
                                                <td>Incomes</td>
                                                <td class="debit"><?php echo 0; ?></td>
                                                <td class="credit"><?php echo $data['incomes']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>#</td>
                                                <td>Expenses</td>
                                                <td class="debit"><?php echo $data['expenses']; ?></td>
                                                <td class="credit"><?php echo 0; ?></td>
                                            </tr>
                                            <tr>
                                                <td>#</td>
                                                <td>Cash In Hand</td>
                                                <td class="debit"><?php echo 0; ?></td>
                                                <td class="credit"><?php echo $data['cash_in_hand']; ?></td>
                                            </tr>
											<?php foreach ( $data['bank_details'] as $bank_detail ): ?>
                                                <tr>
                                                    <td>#</td>
                                                    <td><?php echo 'Cash In' . ' ' . $bank_detail->bank_name; ?></td>
                                                    <td class="debit"><?php echo 0; ?></td>
                                                    <td class="credit"><?php echo $bank_detail->balance; ?></td>
                                                </tr>
											<?php endforeach; ?>
                                            <tr>
                                                <td>#</td>
                                                <td>Total</td>
                                                <td id="totalDebit">--</td>
                                                <td id="totalCredit">--</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
        var month = $('#month').val();
        var year = $('#year').val();
        document.getElementById("title_of_trial_balance").innerHTML = "Trial Balance of" + " " + month + " " + year;
        /*$('#year').attr('disabled', true);
        document.getElementById("title_of_trial_balance").innerHTML = "Trial Balance";
        $("#month").change(function () {
            document.getElementById("title_of_trial_balance").innerHTML = "Trial Balance";
            var month = $(this).val();
            if (month == "0") {
                $('#year').attr('disabled', true);
            } else {
                $('#year').attr('disabled', false);
            }
            $('#year option[selected]').prop('selected', true);
        });*/
        $("#year").change(function () {
            var month = $('#month').val();
            var year = $('#year').val();
            document.getElementById("title_of_trial_balance").innerHTML = "Trial Balance of" + " " + month + " " + year;
        });

        var debit_sum = 0;
        $(".debit").each(function () {
            var value = $(this).text();
            // add only if the value is number
            if (!isNaN(value) && value.length != 0) {
                debit_sum += parseFloat(value);
            }
        });
        document.getElementById('totalDebit').innerHTML = debit_sum;

        var credit_sum = 0;
        $(".credit").each(function () {
            var value = $(this).text();
            // add only if the value is number
            if (!isNaN(value) && value.length != 0) {
                credit_sum += parseFloat(value);
            }
        });
        document.getElementById('totalCredit').innerHTML = credit_sum;
    });
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>