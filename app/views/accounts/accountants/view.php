<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Sole CSS link-->
<link href="<?php echo URLROOT; ?>/css/neon/custom.css" rel="stylesheet" media="all">
<link href="<?php echo URLROOT; ?>/css/neon/neon-forms.css" rel="stylesheet" media="all">
<link href="<?php echo URLROOT; ?>/css/neon/css/neon-theme.css" rel="stylesheet" media="all">

<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<style>
    h3, .h3 {
        font-size: 19px;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row" style="margin-top: 72px;">
                <div class="col-md-4">
                    <div style="padding-bottom: 9px;padding-top: 1px; background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');"
                         class="au-card-title">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3><i class="fa fa-pencil-alt"></i>Accountant Profile</h3>
                    </div>
                    <center style="padding-top: 18px; background: #fff; height: 282px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.11);">
                        <a href="#">
                            <img src="<?php URLROOT; ?>/images/accountants/<?php echo $data['accountant']->photo; ?>"
                                 alt="image" class="img-circle" style="width: 60%; height: 150px;"/>
                        </a>
                        <br>
                        <h3>
							<?php echo $data['accountant']->accountant_name; ?>
                        </h3>
						<?php echo $data['accountant']->registration_no; ?>
                    </center>
                </div>
                <div class="col-md-8">

                    <div style="padding-bottom: 9px;padding-top: 1px; background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');"
                         class="au-card-title">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3><i class="fa fa-pencil-alt"></i>Information</h3>
                    </div>
                    <ul class="nav nav-tabs" style="border: 0px; background: ">
                        <ul class="nav nav-tabs" style="margin-top: 17px;margin-left: 29px;">
                            <li class="">
                                <a href="#tab1" data-toggle="tab" class="btn btn-primary" aria-expanded="false">
                                    <span class="visible-xs"><i class="entypo-home"></i></span>
                                    <span class="hidden-xs">Basic Info</span>
                                </a>
                            </li>
                            <div></div>
                        </ul>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <table class="table table-bordered" style="margin-top: 20px;">
                                <tbody>
                                <tr>
                                    <td width="30%">
                                        <strong>Name</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->accountant_name; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>NID/Passport Number</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->nid_number; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>Contact Number</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->contact_number; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>Gender</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->gender; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>Blood Group</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->blood_group; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>Educational Qualification</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->educational_qualification; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>E-mail</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->email; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>Present Address</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->present_address; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <strong>Permanent Address</strong>
                                    </td>
                                    <td>
										<?php echo $data['accountant']->permanent_address; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>