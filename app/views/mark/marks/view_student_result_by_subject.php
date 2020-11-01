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

                                    <h3><i class="zmdi zmdi-edit"></i><?php foreach ( $data['marks'] as $mark ): ?>
											<?php echo $mark->subject_name;
											break; ?>
										<?php endforeach; ?>
                                    </h3>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">

                                            <thead>
                                            <tr>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 2px;border-right-style: solid;">
                                                    Mark Distribution
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
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $sum = 0; ?>
											<?php foreach ( $data['mark_distributions'] as $mark_distribution ): ?>
                                                <tr>
                                                <td class="text-black"
                                                    data-title="Mark Type">
                                                    <strong><?php echo $mark_distribution->type ?>
                                                    </strong>
                                                </td>
                                                <td class="text-black"
                                                    data-title="Mark Type">
													<?php echo $mark_distribution->value ?>

                                                </td>
												<?php
												$i   = 0;
												$len = count( $data['marks'] ); ?>
												<?php foreach ( $data['marks'] as $mark ): ?>
													<?php if ( $mark->mark_distribution_id == $mark_distribution->id ): ?>

                                                        <td class="text-black"
                                                            data-title="Gained Mark">
															<?php echo $mark->gained_mark ?>
                                                        </td>

                                                        <td class="text-black"
                                                            data-title="Highest Mark">
															<?php echo $mark->highest_mark ?>
                                                        </td>
														<?php $sum += $mark->gained_mark;
														?>
                                                        </tr>
													<?php else: ?>
														<?php if ( $i == $len - 1 ): ?>
                                                            <td class="text-black"
                                                                data-title="Mark">
                                                                N/A
                                                            </td>
                                                            <td class="text-black"
                                                                data-title="Highest Mark">
                                                                N/A
                                                            </td>
                                                            </tr>
														<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endforeach; ?>
                                            <tr>
                                                <td colspan="1" class="text-center alert alert-success">
                                                    <strong>Total Gained Mark</strong>
                                                </td>
                                                <td colspan="3">
													<?php echo $sum; ?>
                                                </td>
                                            </tr>

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

