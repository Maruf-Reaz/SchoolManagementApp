<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    table.dataTable thead > .headings ~ .headings th:nth-child(1) .bottom-search {
        display: none;
    }

    table.dataTable thead > .headings ~ .headings th:nth-child(8) .bottom-search {
        display: none;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Invoices</h3>
                                </div>
                                <div class="filters">
                                    <a class="btn btn-primary" href="<?php URLROOT; ?>/accounts/invoices/add-invoices"
                                       style="float: right; margin-top: 3px;">Add Multiple Invoice</a>
                                    <a class="btn btn-primary" href="<?php URLROOT; ?>/accounts/invoices/add"
                                       style="float: right; margin-right: 5px;margin-top: 3px; ">Add Single Invoice</a>
                                    <input id="fromDate" placeholder="From Date" style="width: 110px"
                                           class="au-input datepicker" type="text" readonly>
                                    <input id="toDate" placeholder="To Date" style="width: 110px"
                                           class="au-input datepicker" type="text" readonly>
                                    <input style="padding-top: 6px;padding-bottom: 6px;border-bottom-width: 0px;padding-right: 20px;margin-left: 0px;padding-left: 20px;"
                                           type="button" id="filterButton" class="btn btn-primary btn-sm"
                                           name="filterButton" value="Filter">
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="example">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Student</th>
                                                <th class="column-title">Class</th>
                                                <th class="column-title">Section</th>
                                                <th class="column-title">Fee Type</th>
                                                <th class="column-title">Final Amount</th>
                                                <th class="column-title">Date</th>
                                            </tr>
                                            </thead>
											<?php if ( $data['invoices'] != null ): ?>
                                                <tbody id="data_table_body">
												<?php foreach ( $data['invoices'] as $key => $invoice ): ?>
                                                    <tr>
                                                        <td>
															<?php echo $key += 1; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php URLROOT; ?>/accounts/invoices/show-full-invoice-info/<?php echo $invoice->invoice_number ?>">
																<?php echo $invoice->student_name ?>
                                                            </a>
                                                        </td>
                                                        <td>
															<?php echo $invoice->class_name ?>
                                                        </td>
                                                        <td>
															<?php echo $invoice->section_name ?>
                                                        </td>
                                                        <td>
															<?php echo $invoice->fee_type_name ?>
                                                        </td>
                                                        <td>
															<?php echo $invoice->amount_after_fine_and_discount ?>
                                                        </td>
                                                        <td>
															<?php echo $invoice->date ?>
                                                        </td>
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">Student</th>
                                                    <th class="column-title">Class</th>
                                                    <th class="column-title">Section</th>
                                                    <th class="column-title">Fee Type</th>
                                                    <th class="column-title">Final Amount</th>
                                                    <th class="column-title">Date</th>
                                                </tr>
                                                </tfoot>
											<?php endif; ?>
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
        $("#filterButton").click(function () {
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var dataString = {fromDate: fromDate, toDate: toDate};
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/accounts/invoices/getInvoicesByDateInterval",
                data: dataString,
                cache: false,
                success: function (objects) {
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="8" class="text-center"> No Invoices Found In This Interval.</td></tr>');
                    } else {
                        $("#data_table_body").empty();
                        $.each(objects, function (key, value) {
                            var details = "<a href='/accounts/invoices/show-full-invoice-info/" + value.invoice_number + "'>" + value.student_name + "</a>";
                            //var edit = "<a href= 'http://localhost/accounts/invoices/edit/" + value.id + "'><i class='fa fa-edit fa-lg'></i> Edit</a>";
                            //var del = "<a href= 'http://localhost/accounts/invoices/delete/" + value.id + "' class='delete-confirm' data-title='Delete Confirmation!'><i class='fa fa-trash fa-lg'></i> Delete</a>";
                            $("#data_table_body").append(
                                '<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + details + '</td>' +
                                '<td>' + value.class_name + '</td>' +
                                '<td>' + value.section_name + '</td>' +
                                '<td>' + value.fee_type_name + '</td>' +
                                '<td>' + value.amount_after_fine_and_discount + '</td>' +
                                '<td>' + value.date + '</td>' +
                                '</tr>'
                            );
                        })
                    }
                }
            });
        });

    });
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>