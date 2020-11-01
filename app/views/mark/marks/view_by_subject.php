<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<?php $exid = 0 ?>


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
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <center>
                                                    <h3><i class="zmdi zmdi-edit"></i>
		                                                <?php echo $data['subject']->subject_name ?>
                                                    </h3>
                                                </center>
                                            </div>
	                                        <?php foreach ( $data['marks'] as $mark ): ?>
                                            <div class="col-sm-4">
                                                <center>
                                                    <h3 style="color: #fff; font-weight: 400;text-align: left">
		                                                <?php echo $mark->exam_name ?>
                                                    </h3>
                                                    <h3 style="color: #fff; font-weight: 400;text-align: left">
		                                               Class : <?php echo $mark->class_name ?>
                                                    </h3>
                                                    <h3 style="color: #fff; font-weight: 400 ;text-align: left" >
		                                               Section : <?php echo $mark->section_name ?>
                                                    </h3>
                                                </center>
                                            </div>
                                            <?php break;
                                            endforeach;?>
                                        </div>
                                    </div>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">

                                            <thead>
                                            <tr>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 2px;border-right-style: solid;">
                                                    Students
                                                </th>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 2px;border-right-style: solid;">
                                                    Total Mark
                                                </th>
                                                <th class="column-title"
                                                    style="border-right-width: 2px;border-right-style: solid;">
                                                    Gained Mark
                                                </th>
                                                <th class="column-title" data-title="Highest Mark"
                                                    style="border-right-width: 2px;border-right-style: solid;">
                                                    Highest Mark
                                                </th>
                                                <th class="column-title" data-title="Highest Mark"
                                                    style="border-right-width: 2px;border-right-style: solid;">
                                                    Grade
                                                </th>
                                                <th class="column-title" data-title="Highest Mark"
                                                    style="border-right-width: 2px;border-right-style: solid;">
                                                    Point
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php foreach ( $data['students'] as $student ): ?>
                                                <tr>
                                                <td class="text-black"
                                                    data-title="Mark Type">
                                                    <strong><?php echo $student->student_name ?>
                                                    </strong>
                                                </td>
                                                <td class="text-black"
                                                    data-title="Mark Type">

													<?php echo $data['subject']->final_mark; ?>
                                                </td>
												<?php
												$i   = 0;
												$len = count( $data['marks'] ); ?>
												<?php foreach ( $data['marks'] as $mark ): ?>
													<?php if ( $mark->student_id == $student->id ): ?>

                                                        <td class="text-black"
                                                            data-title="Gained Mark">
															<?php echo $mark->total_mark ?>
                                                        </td>

                                                        <td class="text-black"
                                                            data-title="Highest Mark">
															<?php echo $mark->total_highest_mark ?>
                                                        </td>
                                                        <td class="text-black"
                                                            data-title="Grade Name">
															<?php echo $mark->grade_name ?>
                                                        </td><td class="text-black"
                                                            data-title="Grade Point">
															<?php echo $mark->grade_point?>
                                                        </td>
                                                        </tr>
                                                    <?php break; ?>
													<?php else: ?>
														<?php if ( $i == $len - 1 ): ?>
                                                            <td class="text-black"
                                                                data-title="Mark">
                                                                N/A
                                                            </td>
                                                            <td class="text-black"
                                                                data-title="Highest Mark">
                                                                N/A
                                                            </td> <td class="text-black"
                                                                data-title="Highest Mark">
                                                                N/A
                                                            </td> <td class="text-black"
                                                                data-title="Highest Mark">
                                                                N/A
                                                            </td>
                                                            </tr>
														<?php endif; ?>
														<?php $i++; ?>
													<?php endif; ?>
												<?php endforeach; ?>
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
</form>

<?php require APPROOT . '/views/layouts/footer.php' ?>

