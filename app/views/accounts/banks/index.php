<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    table.dataTable thead>.headings~.headings th:nth-child(1) .bottom-search {
        display: none;
    }

    table.dataTable thead>.headings~.headings th:nth-child(4) .bottom-search {
        display: none;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title" style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Banks</h3>
                                </div>
                                <div class="filters">
                                    <a data-toggle="tooltip" title="PDF" class="fa fa-file-pdf" href="#" style="float: right;padding-top: 3px;font-size: 27px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print" href="#" style="float: right;padding-top: 3px;padding-right: 15px;font-size: 27px "></a>
                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/accounts/banks/add" style="float: right; margin-right: 5px; margin-bottom:8px">
                                        <i class="fa fa-plus" style="padding-right: 7px;"></i>Add Bank</a>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">Bank Name</th>
                                                    <th class="column-title">Note</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <?php if ( $data['banks'] != null ): ?>
                                            <tbody>
                                                <?php foreach ( $data['banks'] as $key => $bank ): ?>
                                                <tr class="even pointer">
                                                    <td>
                                                        <?php echo $key += 1; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo URLROOT ?>/accounts/banks/showbankdetails/<?php echo $bank->id; ?>">
                                                            <?php echo $bank->bank_name; ?></a>
                                                    </td>
                                                    <td>
                                                        <?php echo $bank->note; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo URLROOT ?>/accounts/banks/manageaccount/<?php echo $bank->id; ?>">
                                                            <i class="fa fa-edit fa-lg"></i>
                                                            Manage Account</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">Bank Name</th>
                                                    <th class="column-title">Note</th>
                                                    <th class="text-center">Action</th>
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

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>