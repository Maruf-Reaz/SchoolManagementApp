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

                <!--Table-1-->
				<?php if ( $data['payments'] != null ): ?>
                    <div class="col-lg-12" style="margin-bottom: 50px;">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="fa fa-pencil-alt"></i>Payment Details</h3>
                                    </div>
                                    <div class="filters">
                                        <a data-toggle="tooltip" onClick="window.print()" title="PDF"
                                           class="fa fa-file-pdf" href="#"
                                           style="float: right;padding-top:1px;padding-right: 15px;font-size: 27px; padding-bottom: 3px;"></a>
                                        <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                           class="fa fa-print" href="#"
                                           style="float: right;padding-top:1px;padding-right: 15px;font-size: 27px; padding-bottom: 3px;"></a>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">Receiver</th>
                                                    <th class="column-title">Amount</th>
                                                    <th class="column-title">Student</th>
                                                    <th class="column-title">Class</th>
                                                    <th class="column-title">Section</th>
                                                    <th class="column-title">Method</th>
                                                    <th class="column-title">Date</th>
                                                    <th class="column-title">Bank</th>
                                                </tr>
                                                </thead>
                                                <tbody>
												<?php foreach ( $data['payments'] as $key => $payment ): ?>
                                                    <tr class="even pointer">
                                                        <td>
															<?php echo $key += 1; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->accountant_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->paid_amount; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->student_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->class_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->section_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->payment_method_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $payment->date; ?>
                                                        </td>
                                                        <td>
															<?php if ( $payment->bank_name != null ): ?>
																<?php echo $payment->bank_name; ?>
															<?php endif; ?>
                                                        </td>
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>

                <!--Table-2-->
				<?php if ( $data['incomes'] != null ): ?>
                    <div class="col-lg-12">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="fa fa-pencil-alt"></i>Income Details</h3>
                                    </div>
                                    <div class="filters">
                                        <a data-toggle="tooltip" onClick="window.print()" title="PDF"
                                           class="fa fa-file-pdf"
                                           href="#"
                                           style="float: right;padding-top:1px;padding-right: 15px;font-size: 27px; padding-bottom: 3px;"></a>
                                        <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                           class="fa fa-print"
                                           href="#"
                                           style="float: right;padding-top:1px;padding-right: 15px;font-size: 27px; padding-bottom: 3px;"></a>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">Receiver</th>
                                                    <th class="column-title">Amount</th>
                                                    <th class="column-title">Income Type</th>
                                                    <th class="column-title">Note</th>
                                                    <th class="column-title">Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
												<?php foreach ( $data['incomes'] as $key => $income ): ?>
                                                    <tr class="even pointer">
                                                        <td>
															<?php echo $key += 1; ?>
                                                        </td>
                                                        <td>
															<?php echo $income->accountant_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $income->amount; ?>
                                                        </td>
                                                        <td>
															<?php echo $income->income_type_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $income->note; ?>
                                                        </td>
                                                        <td>
															<?php echo $income->date; ?>
                                                        </td>
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>

                <!-- Table-3 -->
				<?php if ( $data['expenses'] != null ): ?>
                    <div class="col-lg-12" style="margin-top: 50px">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="fa fa-pencil-alt"></i>Expense Details</h3>
                                    </div>
                                    <div class="filters">
                                        <a data-toggle="tooltip" onClick="window.print()" title="PDF"
                                           class="fa fa-file-pdf"
                                           href="#"
                                           style="float: right;padding-top:1px;padding-right: 15px;font-size: 27px; padding-bottom: 3px;"></a>
                                        <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                           class="fa fa-print"
                                           href="#"
                                           style="float: right;padding-top:1px;padding-right: 15px;font-size: 27px; padding-bottom: 3px;"></a>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">User</th>
                                                    <th class="column-title">Amount</th>
                                                    <th class="column-title">Expense Type</th>
                                                    <th class="column-title">Note</th>
                                                    <th class="column-title">Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
												<?php foreach ( $data['expenses'] as $key => $expense ): ?>
                                                    <tr class="even pointer">
                                                        <td>
															<?php echo $key += 1; ?>
                                                        </td>
                                                        <td>
															<?php echo $expense->accountant_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $expense->amount; ?>
                                                        </td>
                                                        <td>
															<?php echo $expense->expense_type_name; ?>
                                                        </td>
                                                        <td>
															<?php echo $expense->note; ?>
                                                        </td>
                                                        <td>
															<?php echo $expense->date; ?>
                                                        </td>
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>