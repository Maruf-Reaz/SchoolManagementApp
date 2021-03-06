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
                                <div class="au-card-title" style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Fee Types</h3>
                                </div>
                                <div class="filters">
                                    <a data-toggle="tooltip" onClick="window.print()" title="Excel" class="fa fa-file-excel" href="#" style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="PDF" class="fa fa-file-pdf" href="#" style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print" href="#" style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" title="Add Fee Type" class="fa fa-plus" href="<?php URLROOT; ?>/accounts/feetypes/add" style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px; padding-bottom: 4px;"></a>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Fee type</th>
                                                    <th class="column-title">Note</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ( $data['fee_types'] != null ): ?>
                                                <?php foreach ( $data['fee_types'] as $key => $fee_type ): ?>
                                                <tr class="even pointer">
                                                    <td>
                                                        <?php echo $key += 1; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fee_type->fee_type_name ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fee_type->note ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button style="padding-top: 2px;padding-bottom: 2px;" type="button" class="btn btn-default option" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>

                                                            <ul class="dropdown-menu float-left" role="menu" style="box-shadow: 0px 0px 20px 5px #888888; transform: translate3d(-103px, -26px, 0px);">

                                                                <li><a href="<?php URLROOT; ?>/accounts/feetypes/edit/<?php echo $fee_type->id ?>"><i class="fa fa-edit fa-lg"></i>
                                                                        Edit</a>
                                                                </li>
                                                                <li><a class="delete-confirm" data-title="Delete Confirmation!" href="<?php URLROOT; ?>/accounts/feetypes/delete/<?php echo $fee_type->id ?>">
                                                                        <i class="fa fa-trash fa-lg"></i>
                                                                        Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
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