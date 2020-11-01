<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>

    .table thead th {
        position: relative;
    }

    .table thead th:after {
        content: '';
        height: 75%;
        width: 1px;
        position: absolute;
        right: 0;
        top: 5px;
        background-color: #7C7C7C;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Receive Cash</h3>
                                </div>
                                <div class="filters">
                                    <center>
                                        <input style="width: 120px; height: 40px;padding-top: 2px" id="fromDate"
                                               name="fromDate" class="au-input datepicker" readonly type="text"
                                               placeholder="From date" value="<?php echo date( 'Y-m-d' ); ?>">
                                        <input style="width: 120px; height: 40px;padding-top: 2px" id="toDate"
                                               name="toDate" class="au-input datepicker" readonly type="text"
                                               placeholder="To date" value="<?php echo date( 'Y-m-d' ); ?>">
                                        <input style="padding-top: 6px;padding-bottom: 6px;border-bottom-width: 0px;padding-right: 20px;margin-left: 0px;padding-left: 20px;"
                                               type="button" id="filterButton" class="btn btn-primary"
                                               name="filterButton" value="Filter">
                                    </center>
                                </div>
                                <div class="x_content" style="padding-bottom: 45px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title" style="width: 38.25px;">#</th>
                                                <th class="column-title">Accountant</th>
                                                <th class="column-title">Payment Method</th>
                                                <th class="column-title">Date</th>
                                                <th class="column-title">Payments Received</th>
                                                <th class="column-title">Discount</th>
                                                <th class="column-title">Incomes Received</th>
                                                <th class="column-title">Expenses Done</th>
                                                <th class="column-title">Outstanding</th>
                                                <th class="column-title">Paid</th>
                                                <th class="column-title">Balance</th>
                                                <th class="text-center column-title" style="width: 90.4px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
											<?php if ( $data['accountant_and_type_wise_received_cashes'] != null ): ?>
												<?php foreach ( $data['accountant_and_type_wise_received_cashes'] as $key => $accountant_and_type_wise_received_cash ): ?>
                                                    <tr>
                                                        <td>
															<?php echo $key += 1; ?>
                                                        </td>
                                                        <td>
                                                            <a style="cursor: pointer; width: 100px;margin: auto"
                                                               onclick="getFullTransactionDetails(<?php echo $accountant_and_type_wise_received_cash->receiver_id; ?>,<?php echo $accountant_and_type_wise_received_cash->payment_method_id; ?>,formatDate('<?php echo $accountant_and_type_wise_received_cash->date; ?>'))">
																<?php echo $accountant_and_type_wise_received_cash->receiver_name; ?>
                                                            </a>
                                                            <input type="hidden" class="receiver_id"
                                                                   name="receiver_id[]"
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->receiver_id; ?>">
                                                        </td>
                                                        <td>
                                                            <input style="width: 72px;margin: auto" type="text"
                                                                   class="form-control" readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->payment_method_name; ?>">
                                                            <input type="hidden" class="payment_method_id"
                                                                   name="payment_method_id[]"
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->payment_method_id; ?>">
                                                        </td>
                                                        <td><input style="width: 110px;margin: auto" type="text"
                                                                   class="form-control received_date"
                                                                   name="received_date[]" readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->date; ?>">
                                                        </td>
                                                        <td><input style="width: 70px;margin: auto" type="text"
                                                                   class="form-control" name="total_payments_received"
                                                                   readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->total_payments_received; ?>">
                                                        </td>
                                                        <td><input style="width: 70px;margin: auto" type="text"
                                                                   class="form-control total_discount"
                                                                   name="total_discount[]" readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->total_discount; ?>">
                                                        </td>
                                                        <td><input style="width: 70px;margin: auto" type="text"
                                                                   class="form-control" name="total_income_received"
                                                                   readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->total_income_received; ?>">
                                                        </td>
                                                        <td><input style="width: 70px;margin: auto" type="text"
                                                                   class="form-control" name="total_expense_done"
                                                                   readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->total_expense_done; ?>">
                                                        </td>
                                                        <td><input style="width: 70px;margin: auto" type="text"
                                                                   class="form-control total_received_amount"
                                                                   name="total_received_amount[]" readonly
                                                                   value="<?php echo $accountant_and_type_wise_received_cash->total_received_amount; ?>">
                                                        </td>
														<?php if ( $accountant_and_type_wise_received_cash->flag == false ): ?>
                                                            <td><input style="width: 70px;margin: auto" type="text"
                                                                       class="form-control" readonly
                                                                       value="<?php echo " 0"; ?>">
                                                            </td>
                                                            <td><input style="width: 70px;margin: auto" type="text"
                                                                       class="form-control" readonly
                                                                       value="<?php echo $accountant_and_type_wise_received_cash->total_received_amount; ?>">
                                                            </td>
                                                            <td>
                                                                <input type="button"
                                                                       class="btn btn-primary btn-sm receive_payment_button"
                                                                       name="receive_payment_button[]" value="Receive">
                                                            </td>
														<?php else: ?>
                                                            <td><input style="width: 70px;margin: auto" type="text"
                                                                       class="form-control" readonly
                                                                       value="<?php echo $accountant_and_type_wise_received_cash->total_received_amount; ?>">
                                                            </td>
                                                            <td><input style="width: 70px;margin: auto" type="text"
                                                                       class="form-control" readonly
                                                                       value="<?php echo " 0"; ?>">
                                                            </td>
                                                            <td>
                                                                <input type="button" class="btn btn-primary btn-sm"
                                                                       disabled value="Received">
                                                            </td>
														<?php endif; ?>
                                                    </tr>
												<?php endforeach; ?>
											<?php endif; ?>
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
        $('.datepicker').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $(".receive_payment_button").click(function () {
            var payment_method_id = $(this).closest("tr").find(".payment_method_id").val();
            var total_received_amount = $(this).closest("tr").find(".total_received_amount").val();
            var total_discount = $(this).closest("tr").find(".total_discount").val();
            var receiver_id = $(this).closest("tr").find(".receiver_id").val();
            var received_date = $(this).closest("tr").find(".received_date").val();
            var dataString = {
                payment_method_id: payment_method_id,
                total_received_amount: total_received_amount,
                total_discount: total_discount,
                receiver_id: receiver_id,
                received_date: received_date,
                received_date: received_date
            };
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/accounts/ReceivedCashes/receivePayment",
                data: dataString,
                cache: false,
                success: function (data) {
                    if (data == true) {
                        $.alert({
                            title: 'Confirmation!',
                            content: 'Payments received successfull',
                            typeAnimated: true,
                        });
                    } else {
                        $.alert({
                            title: 'Confirmation!',
                            content: 'Payments not received',
                            type: 'blue',
                            typeAnimated: true,
                        });
                    }
                }
            });
            $(this).prop("disabled", true);
            $(this).attr('value', 'Received');
        });

        $("#filterButton").click(function () {
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var dataString = {
                fromDate: fromDate,
                toDate: toDate
            };
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/accounts/ReceivedCashes/getReceivedPaymentsByDateInterval",
                data: dataString,
                cache: false,
                success: function (objects) {
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="12" class="text-center"> No Payments Found In This Interval.</td></tr>');
                    } else {
                        $("#data_table_body").empty();
                        $.each(objects, function (key, value) {
                            var paid = '';
                            var balance = '';
                            var receiveButton = '';
                            if (value.flag == false) {
                                paid = '<input style="width: 70px;margin: auto" type="text"class="form-control" readonly value="0">';
                                balance = '<input style="width: 70px;margin: auto" type="text"class="form-control" readonly value="' + value.total_received_amount + '">';
                                receiveButton = '<input type="button" class="btn btn-primary btn-sm receive_payment_button" name="receive_payment_button[]" value="Receive">'
                            } else {
                                paid = '<input style="width: 70px;margin: auto" type="text"class="form-control" readonly value="' + value.total_received_amount + '">';
                                balance = '<input style="width: 70px;margin: auto" type="text"class="form-control" readonly value="0">';
                                receiveButton = '<input type="button" class="btn btn-primary btn-sm" disabled value="Received">'
                            }
                            $("#data_table_body").append(
                                '<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td><a style="cursor: pointer; width: 100px;margin: auto" onclick="getFullTransactionDetails(' + value.receiver_id + ',' + value.payment_method_id + ',\'' + value.date + '\')"> ' + value.receiver_name + ' </a><input type="hidden" class="receiver_id" name="receiver_id[]" value="' + value.receiver_id + '"></td>' +
                                '<td><input style="width: 72px;margin: auto" type="text" class="form-control" readonly value="' + value.payment_method_name + '"><input type="hidden" class="payment_method_id" name="payment_method_id[]" value="' + value.payment_method_id + '"></td>' +
                                '<td><input style="width: 110px;margin: auto" type="text" class="form-control received_date" name="received_date[]" readonly value="' + value.date + '"></td>' +
                                '<td><input style="width: 70px;margin: auto" type="text" class="form-control" name="total_payments_received" readonly value="' + value.total_payments_received + '"></td>' +
                                '<td><input style="width: 70px;margin: auto" type="text" class="form-control total_discount" name="total_discount[]" readonly value="' + value.total_discount + '"></td>' +
                                '<td><input style="width: 70px;margin: auto" type="text" class="form-control" name="total_income_received" readonly value="' + value.total_income_received + '"></td>' +
                                '<td><input style="width: 70px;margin: auto" type="text" class="form-control" name="total_expense_done" readonly value="' + value.total_expense_done + '"></td>' +
                                '<td><input style="width: 70px;margin: auto" type="text" class="form-control total_received_amount" name="total_received_amount[]" readonly value="' + value.total_received_amount + '"></td>' +
                                '<td>' + paid + '</td>' +
                                '<td>' + balance + '</td>' +
                                '<td>' + receiveButton + '</td>' +
                                '</tr>'
                            );
                        })
                        $(".receive_payment_button").click(function () {
                            var payment_method_id = $(this).closest("tr").find(".payment_method_id").val();
                            var total_received_amount = $(this).closest("tr").find(".total_received_amount").val();
                            var total_discount = $(this).closest("tr").find(".total_discount").val();
                            var receiver_id = $(this).closest("tr").find(".receiver_id").val();
                            var received_date = $(this).closest("tr").find(".received_date").val();
                            var dataString = {
                                payment_method_id: payment_method_id,
                                total_received_amount: total_received_amount,
                                total_discount: total_discount,
                                receiver_id: receiver_id,
                                received_date: received_date,
                                received_date: received_date
                            };
                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                url: "http://localhost/accounts/ReceivedCashes/receivePayment",
                                data: dataString,
                                cache: false,
                                success: function (data) {
                                    if (data == true) {
                                        $.alert({
                                            title: 'Confirmation!',
                                            content: 'Payments received successfully',
                                            typeAnimated: true,
                                        });
                                    } else {
                                        $.alert({
                                            title: 'Confirmation!',
                                            content: 'Payments not received',
                                            type: 'blue',
                                            typeAnimated: true,
                                        });
                                    }
                                }
                            });
                            $(this).prop("disabled", true);
                            $(this).attr('value', 'Received');
                        });
                    }
                }
            });
        });
    });

    function getFullTransactionDetails(accountant_id, payment_method_id, payment_date) {
        var accountant_id = accountant_id;
        var payment_method_id = payment_method_id;
        var date = payment_date;
        var url = 'getTransactionDetailsByDate?accountant_id=' + accountant_id + '&payment_method_id=' + payment_method_id + '&date=' + date;
        window.open(url, '_blank');
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>