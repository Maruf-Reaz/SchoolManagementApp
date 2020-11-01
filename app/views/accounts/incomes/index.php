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
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Incomes</h3>
                                </div>
                                <div class="filters">
                                    <a data-toggle="tooltip" onClick="window.print()" title="Excel"
                                       class="fa fa-file-excel" href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="PDF" class="fa fa-file-pdf"
                                       href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print"
                                       href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" title="Add Income" class="fa fa-plus"
                                       href="<?php URLROOT; ?>/accounts/incomes/add"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px; padding-bottom: 4px;"></a>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="example">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">S/N</th>
                                                <th class="column-title">Income Type</th>
                                                <th class="column-title">Date</th>
                                                <th class="column-title">Receiver</th>
                                                <th class="column-title">Amount</th>
                                                <th class="column-title">Note</th>
                                                <!--<th class="text-center">Action</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if ( $data['incomes'] != null ): ?>
												<?php foreach ( $data['incomes'] as $key => $income ): ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $key += 1; ?></td>
                                                        <td><?php echo $income->income_type_name; ?></td>
                                                        <td><?php echo $income->date; ?></td>
                                                        <td><?php echo $income->accountant_name; ?></td>
                                                        <td><?php echo $income->amount; ?></td>
                                                        <td><?php echo $income->note; ?></td>
                                                        <!--<td>
                                                            <div class="btn-group">
                                                                <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                        type="button" class="btn btn-default"
                                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa fa-ellipsis-v"></i></button>
                                                                <ul class="dropdown-menu pull-right" role="menu"
                                                                    style="box-shadow: 0px 0px 20px 5px #888888;">
                                                                    <li>
                                                                        <a href="<?php /*URLROOT; */ ?>/accounts/incomes/edit/<?php /*echo $income->id */ ?>"><i
                                                                                    class="fa fa-edit fa-lg"></i>
                                                                            Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="delete-confirm"
                                                                           data-title="Delete Confirmation!"
                                                                           href="<?php /*URLROOT; */ ?>/accounts/incomes/delete/<?php /*echo $income->id */ ?>">
                                                                            <i class="fa fa-trash fa-lg"></i>
                                                                            Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>-->
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

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>