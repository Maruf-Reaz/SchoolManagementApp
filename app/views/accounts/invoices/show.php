<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Sole CSS-->
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
                    <div class="col-lg-8" style="margin: auto">
                        <div class="au-card au-card au-card--no-pad m-b-40">
                            <div class="au-card-title" style="padding: 20px; background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg')">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3 style="text-align: center; margin-bottom: 5px; font-weight: 700;"><?php echo $data['invoice']->invoice_note ?></h3>
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
                                                                Invoice #:
                                                                <strong><?php echo $data['invoice']->invoice_number ?></strong><br>
                                                                Date:
                                                                <strong><?php echo $data['invoice']->date ?></strong>
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
                                                            <td>
																<?php echo "Name:" . $data['invoice']->student_name ?>
                                                                <br>
																<?php echo "Class:" . $data['invoice']->class_name ?>
                                                                <br>
																<?php echo "Section:" . $data['invoice']->section_name ?>
                                                                <br>
																<?php echo "Roll:" . $data['invoice']->roll_no ?> <br>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="heading">
                                                <td>Fee Type</td>
                                                <td>Amount</td>
                                            </tr>
                                            <tr class="details">
                                                <td><?php echo $data['invoice']->fee_type_name ?></td>
                                                <td><?php echo $data['invoice']->amount ?></td>
                                            </tr>
                                            <tr class="heading">
                                                <td>Details</td>
                                                <td></td>
                                            </tr>
                                            <tr class="item">
                                                <td>Sub Total</td>
                                                <td><?php echo $data['invoice']->amount ?></td>
                                            </tr>
                                            <tr class="item">
                                                <td>Discount(%)</td>
                                                <td><?php echo $data['invoice']->discount_in_percentage ?></td>
                                            </tr>
                                            <tr class="item last">
                                                <td>Fine</td>
                                                <td><?php echo $data['invoice']->fine ?></td>
                                            </tr>
                                            <tr class="total">
                                                <td></td>
                                                <td>
                                                    Total: <?php echo $data['invoice']->amount_after_fine_and_discount ?></td>
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