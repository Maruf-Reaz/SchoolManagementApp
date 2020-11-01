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
                                    <h3><i class="fa fa-pencil-alt"></i>Accountant</h3>
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
                                    <a data-toggle="tooltip" title="Add Accountant" class="fa fa-plus"
                                       href="<?php echo URLROOT; ?>/accounts/accountants/add"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Name</th>
                                                <th class="column-title">Photo</th>
                                                <th class="column-title">Id</th>
                                                <th class="column-title">Nid Number</th>
                                                <th class="column-title">Contact Number</th>
                                                <th class="column-title">Email</th>
                                                <th class="column-title" data-toggle="tooltip" title="Present Address">
                                                    Address
                                                </th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
											<?php if ( $data['accountants'] != null ): ?>
                                                <tbody>
												<?php foreach ( $data['accountants'] as $key => $accountant ): ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $key += 1; ?></td>
                                                        <td><?php echo $accountant->accountant_name; ?></td>
                                                        <td>
                                                            <img class="img-40"
                                                                 src="<?php URLROOT; ?>/images/accountants/<?php echo $accountant->photo; ?>"
                                                                 alt="image"/>
                                                        </td>
                                                        <td><?php echo $accountant->registration_no; ?></td>
                                                        <td><?php echo $accountant->nid_number; ?></td>
                                                        <td><?php echo $accountant->contact_number; ?></td>
                                                        <td><?php echo $accountant->email; ?></td>
                                                        <td><?php echo $accountant->present_address; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                        type="button" class="btn btn-default"
                                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa fa-ellipsis-v"></i></button>
                                                                <ul class="dropdown-menu pull-right" role="menu"
                                                                    style="box-shadow: 0px 0px 20px 5px #888888;">
                                                                    <li>
                                                                        <a href="<?php echo URLROOT ?>/accounts/accountants/viewprofile/<?php echo $accountant->id; ?>">
                                                                            <i class="fa fa-edit fa-lg"></i>
                                                                            View</a></li>
                                                                    <li>
                                                                        <a href="<?php echo URLROOT ?>/accounts/accountants/edit/<?php echo $accountant->id; ?>">
                                                                            <i class="fa fa-edit fa-lg"></i>
                                                                            Edit</a></li>
                                                                    <li>
                                                                        <a class="delete-confirm"
                                                                           data-title="Delete Confirmation"
                                                                           href="<?php echo URLROOT ?>/accounts/accountants/delete/<?php echo $accountant->id; ?>">
                                                                            <i class="fa fa-edit fa-lg"></i>
                                                                            Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
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