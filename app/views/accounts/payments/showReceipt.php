<?php require APPROOT . '/views/layouts/header.php' ?>

<link href="<?php echo URLROOT; ?>/css/invoice.css" rel="stylesheet" media="all">

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
                <div class="col-lg-6" style="margin: auto">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title"
                             style="padding: 20px; background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg')">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3 style="text-align: center; margin-bottom: 5px; font-weight: 700;">Money Receipt</h3>
                            <h6 style="text-align: center; margin-bottom: 5px; position: inherit;color: yellow;">Student
                                Copy</h6>
                        </div>
                        <div class="card-body card-block">
                            <div class="panel-body profile-view-dis">
                                <div class="invoice-box">
                                    <table cellpadding="0" cellspacing="0">
                                        <tr class="top">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td class="title">
                                                            <img src="<?php echo URLROOT; ?>/images/icon/logo.png"
                                                                 style="width:100%; max-width:100px;">
                                                        </td>
                                                        <td>
                                                            Date:
                                                            <strong><?php echo date( 'd-m-Y' ); ?></strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="information">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <strong>EMS School Management</strong><br>
                                                            House 8, Road 2, Block G, Section 1 <br>
                                                            3rd Floor, MK Steel Building, Chittagng 3001 <br>
                                                            Email : info@ems.net <br>
                                                            Cell: +8801728660964
                                                        </td>
                                                        <td style="width: 215px;">
                                                            Name:<strong><?php echo $data['student']->student_name ?></strong><br>
															<?php echo "Class:" . $data['student']->class_name ?><br>
															<?php echo "Section:" . $data['student']->section_name ?>
                                                            <br>
															<?php echo "Roll:" . $data['student']->roll_no ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <td>Details</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>Payment Method</td>
                                            <td><?php echo $data['payment_method']->payment_method_name ?></td>
                                        </tr>
										<?php if ( $data['bank'] != null ): ?>
                                            <tr class="item">
                                                <td>Bank</td>
                                                <td><?php echo $data['bank']->bank_name ?></td>
                                            </tr>
										<?php endif; ?>
                                        <tr class="item">
                                            <td>Paid Amount</td>
                                            <td><?php echo $data['paid_amount'] ?></td>
                                        </tr>
                                        <tr class="item">
                                            <td>Discount</td>
                                            <td><?php echo $data['discount'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="margin: auto">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title"
                             style="padding: 20px; background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg')">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3 style="text-align: center; margin-bottom: 5px; font-weight: 700;">Money Receipt</h3>
                            <h6 style="text-align: center; margin-bottom: 5px; position: inherit;color: yellow;">Office
                                Copy</h6>
                        </div>
                        <div class="card-body card-block">
                            <div class="panel-body profile-view-dis">
                                <div class="invoice-box">
                                    <table cellpadding="0" cellspacing="0">
                                        <tr class="top">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td class="title">
                                                            <img src="<?php echo URLROOT; ?>/images/icon/logo.png"
                                                                 style="width:100%; max-width:100px;">
                                                        </td>
                                                        <td>
                                                            Date:
                                                            <strong><?php echo date( 'd-m-Y' ); ?></strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="information">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <strong>EMS School Management</strong><br>
                                                            House 8, Road 2, Block G, Section 1<br>
                                                            3rd Floor, MK Steel Building, Chittagng 3001<br>
                                                            Email : info@ems.net<br>
                                                            Cell: +8801728660964
                                                        </td>
                                                        <td style="width: 215px;">
                                                            Name:<strong><?php echo $data['student']->student_name ?></strong><br>
															<?php echo "Class:" . $data['student']->class_name ?><br>
															<?php echo "Section:" . $data['student']->section_name ?>
                                                            <br>
															<?php echo "Roll:" . $data['student']->roll_no ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <td>Details</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>Payment Method</td>
                                            <td><?php echo $data['payment_method']->payment_method_name ?></td>
                                        </tr>
										<?php if ( $data['bank'] != null ): ?>
                                            <tr class="item">
                                                <td>Bank</td>
                                                <td><?php echo $data['bank']->bank_name ?></td>
                                            </tr>
										<?php endif; ?>
                                        <tr class="item">
                                            <td>Paid Amount</td>
                                            <td><?php echo $data['paid_amount'] ?></td>
                                        </tr>
                                        <tr class="item">
                                            <td>Discount</td>
                                            <td><?php echo $data['discount'] ?></td>
                                        </tr>
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
<?php require APPROOT . '/views/layouts/footer.php' ?>















