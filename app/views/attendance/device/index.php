<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/14/2018
 * Time: 2:19 AM
 */
?>
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
			<?php echo flash( 'attendance_device' ) ?>
            <div class="row">
                <div class="col-lg-12" style="margin: auto">

                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>List of Attendance Devices</h3>
                                </div>
                                <div class="filters">

                                    <a data-toggle="tooltip" onClick="window.print()" title="Excel"
                                       class="fa fa-file-excel" href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="PDF"
                                       class="fa fa-file-pdf" href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                       class="fa fa-print" href="#"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                    <a data-toggle="tooltip" title="Add Holiday Type" class="fa fa-plus"
                                       href="<?php echo URLROOT; ?>/holidays/holiday-types/add"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">S/N</th>
                                                <th class="column-title">Ip</th>
                                                <th class="column-title">Name</th>
                                                <th class="column-title">Internal Id</th>
                                                <th class="column-title">Com Key</th>
                                                <th class="column-title">Description</th>
                                                <th class="column-title">Soap Port</th>
                                                <th class="column-title">UDP Port</th>
                                                <th class="column-title">Encoding</th>
                                                <th class="column-title">Status</th>
                                                <th style="width: 100px;" class="column-title">Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
											<?php foreach ( $data['devices'] as $key => $device ): ?>
                                                <tr>
                                                    <td>
														<?php echo $key + 1; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->ip; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->device_name; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->internal_id; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->com_key; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->description; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->soap_port; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->udp_port; ?>
                                                    </td>
                                                    <td>
														<?php echo $device->encoding; ?>
                                                    </td>
                                                    <td>
														<?php if ( $device->status == 1 ): ?>
                                                            Activated
														<?php else: ?>
                                                            Deactivated
														<?php endif; ?>
                                                    </td>
                                                    <td style="width: 100px;">
                                                        <div data-toggle="tooltip" title="View Options"
                                                             class="btn-group">
                                                            <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                    type="button" class="btn btn-default"
                                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></button>
                                                            <ul class="dropdown-menu pull-right" role="menu"
                                                                style="box-shadow: 0px 0px 20px 5px #888888;">
                                                                <li>
                                                                    <a href="<?php echo URLROOT ?>/attendance/time-attendance-devices/edit/<?php echo $device->id; ?>"><i
                                                                                class="fa fa-edit fa-lg"></i>
                                                                        Edit</a></li>
                                                                <li><a class="delete"
                                                                       data-confirm="Are you sure to delete this item?"
                                                                       href="<?php echo URLROOT ?>/attendance/time-attendance-devices/deactivate/<?php echo $device->id; ?>"><i
                                                                                class="fa fa-trash fa-lg"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
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
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php' ?>
