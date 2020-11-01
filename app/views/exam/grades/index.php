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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Grade</h3>
                                </div>
                                <div class="filters">
                                    <a data-toggle="tooltip" title="Add Grade" class="fa fa-plus"
                                       href="<?php echo URLROOT ?>/exam/Grades/addGrade"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">

                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-titlet">#</th>
                                                <th class="column-titlet">Grade Name</th>
                                                <th class="column-titlet">Grade Point</th>
                                                <th class="column-titlet">Mark From</th>
                                                <th class="column-titlet">Mark Upto</th>
                                                <th class="column-titlet">Note</th>
                                                <th class="column-titlet">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
											<?php $i = 0;
											foreach ( $data['grade'] as $grade ): ?>

                                                <tr class="even pointer">
                                                    <input type="hidden" name="id">
                                                    <td><?php echo $i += 1 ?></td>
                                                    <td><?php echo $grade->grade_name ?></td>
                                                    <td><?php echo $grade->grade_point ?></td>
                                                    <td><?php echo $grade->mark_from ?></td>
                                                    <td><?php echo $grade->mark_upto ?></td>
                                                    <td><?php echo $grade->note ?></td>
                                                    <td>

                                                        <div data-toggle="tooltip" title="View Options"
                                                             class="btn-group">
                                                            <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                    type="button" class="btn btn-default"
                                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></button>
                                                            <ul class="dropdown-menu pull-right" role="menu"
                                                                style="padding-left: 15px; box-shadow: 0px 0px 20px 5px #888888;">
                                                                <li><a data-toggle="tooltip" title="Download"
                                                                       href="#"><i class="fa fa-download fa-lg"></i>
                                                                        Download</a></li>
                                                                <li><a data-toggle="tooltip" title="Edit"
                                                                       href="<?php echo URLROOT ?>/exam/Grades/showGrade/<?php echo $grade->id; ?>"><i
                                                                                class="fa fa-edit fa-lg"></i> Edit</a>
                                                                </li>
                                                                <li><a data-toggle="tooltip" title="Delete"
                                                                       href="<?php echo URLROOT ?>/exam/Grades/deleteGrade/<?php echo $grade->id; ?>"
                                                                       class="confirm" data-title="Warning"
                                                                       data-message="Do you want to delete a row?"
                                                                       data-positive="btn-danger"
                                                                       data-negative="btn-link" data-yes="Continue"
                                                                       data-no="Cancel" data-effect="fadeOut"><i
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