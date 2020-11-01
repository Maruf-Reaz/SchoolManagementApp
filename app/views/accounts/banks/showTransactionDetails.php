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
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Transaction Details</h3>
                                </div>
                                <div class="filters">

                                    <a data-toggle="tooltip" title="PDF" class="fa fa-file-pdf"
                                       href="#"
                                       style="float: right;padding-top: 3px;font-size: 27px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print"
                                       href="#"
                                       style="float: right;padding-top: 3px;padding-right: 15px;font-size: 27px "></a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Bank Name</th>
                                                <th class="column-title">Debit(dr)</th>
                                                <th class="column-title">Credit(cr)</th>
                                                <th class="column-title">Balance</th>
                                                <th class="column-title">Transaction Maker</th>
                                                <th class="column-title">Date</th>
                                            </tr>
                                            </thead>
											<?php if ( $data['bank_wise_transaction_details'] != null ): ?>
                                                <tbody>
												<?php foreach ( $data['bank_wise_transaction_details'] as $key => $bank_wise_transaction_detail ): ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $key += 1; ?></td>
                                                        <td><?php echo $bank_wise_transaction_detail->bank_name; ?></td>
                                                        <td><?php echo $bank_wise_transaction_detail->debit; ?></td>
                                                        <td><?php echo $bank_wise_transaction_detail->credit; ?></td>
                                                        <td><?php echo $bank_wise_transaction_detail->balance; ?></td>
                                                        <td><?php echo $bank_wise_transaction_detail->maker_id; ?></td>
                                                        <td><?php echo $bank_wise_transaction_detail->date; ?></td>
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
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

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>
