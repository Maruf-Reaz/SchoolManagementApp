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
                                    <h3><i class="fa fa-pencil-alt"></i>Payments</h3>
                                </div>
                                <div class="filters">
                                    <input style="width: 120px;height: 40px;padding-top: 2px;" id="fromDate"
                                           name="fromDate"
                                           class="au-input datepicker" readonly
                                           type="text" placeholder="From date" value="<?php echo date( 'Y-m-d' ); ?>">
                                    <input style="width: 120px;height: 40px;padding-top: 2px;" id="toDate" name="toDate"
                                           class="au-input datepicker" readonly type="text"
                                           placeholder="To date" value="<?php echo date( 'Y-m-d' ); ?>">
                                    <input style="padding-top: 6px;padding-bottom: 6px;border-bottom-width: 0px;padding-right: 20px;margin-left: 0px;padding-left: 20px;"
                                           type="button" id="filterButton" class="btn btn-primary btn-sm"
                                           name="filterButton" value="Filter">
                                    <a data-toggle="tooltip" onClick="window.print()" title="Excel"
                                       class="fa fa-file-excel" href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="PDF" class="fa fa-file-pdf"
                                       href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print"
                                       href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table id="example2" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Student</th>
                                                <th class="column-title">Class</th>
                                                <th class="column-title">Section</th>
                                                <th class="column-title" style="width: 150px;">Registration Number</th>
                                                <th class="column-title" style="width: 150px;">Total Amount</th>
                                                <th class="column-title" style="width: 200px;">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
											<?php if ( $data['payments'] != null ): ?>
												<?php foreach ( $data['payments'] as $key => $payment ): ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $key += 1; ?></td>
                                                        <td>
                                                            <a style="cursor: pointer"
                                                               onclick="getPaymentDetailsByDateInterval(<?php echo $payment->student_id ?>)">
																<?php echo $payment->student_name ?>
                                                            </a></td>
                                                        <td><?php echo $payment->class_name ?></td>
                                                        <td><?php echo $payment->section_name ?></td>
                                                        <td><?php echo $payment->registration_no ?></td>
                                                        <td><?php echo $payment->total_paid_amount ?></td>
                                                        <td><?php echo date( 'Y-m-d' ); ?></td>
                                                    </tr>
												<?php endforeach; ?>
											<?php endif; ?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Student</th>
                                                <th class="column-title">Class</th>
                                                <th class="column-title">Section</th>
                                                <th class="column-title" style="width: 150px;">Registration Number</th>
                                                <th class="column-title" style="width: 150px;">Total Amount</th>
                                                <th class="column-title" style="width: 200px;">Date</th>
                                            </tr>
                                            </tfoot>
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
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/accounts/payments/getPaymentsByDateInterval",
                data: dataString,
                cache: false,
                success: function (objects) {
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan=7" class="text-center"> No Payments Found In This Interval.</td></tr>');
                    } else {
                        $("#data_table_body").empty();
                        $.each(objects, function (key, value) {
                            var details = "<a style='cursor: pointer' onclick='getPaymentDetailsByDateInterval(" + value.student_id + ")'> " + value.student_name + "</a>";
                            $("#data_table_body").append(
                                '<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + details + '</td>' +
                                '<td>' + value.class_name + '</td>' +
                                '<td>' + value.section_name + '</td>' +
                                '<td>' + value.registration_no + '</td>' +
                                '<td>' + value.total_paid_amount + '</td>' +
                                '<td>' + fromDate + ' - ' + toDate + '</td>' +
                                '</tr>'
                            );
                            
                        })
                    }
                }
                
            });
        });
    });

    function getPaymentDetailsByDateInterval(student_id) {
        var student_id = student_id;
        var from_date = $('#fromDate').val();
        var to_date = $('#toDate').val();
        var url = 'getFullPaymentDetails?student_id=' + student_id + '&from_date=' + from_date + '&to_date=' + to_date;
        window.open(url, '_blank');
    }
</script>

<script>
    $(document).ajaxComplete(function() {

        $('#example2').DataTable({

            "pagingType": "full_numbers",

            "dom": 'tB<"right"rpl>',

            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
            ],

        });

        $('#example2 tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search" class="form-control bottom-search"/>');
        });

        // DataTable
        var table = $('#example2').DataTable();

        // Apply the search
        table.columns().every(function() {
            var that = this;

            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#example2 tfoot tr').insertAfter($('#example2 thead tr'));
    });
</script>


<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>