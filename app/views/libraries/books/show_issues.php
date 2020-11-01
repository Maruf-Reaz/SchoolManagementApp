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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Issue Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">
                                            <strong>Book Name</strong>
                                        </label>
                                        <label id="cc-payment" name="photo" class="form-control">
											<?php echo $data['book']->name ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment"
                                               class="control-label mb-1">
                                            <strong>Author</strong>
                                        </label>
                                        <label id="cc-payment" name="name" class="form-control">
											<?php echo $data['book']->author ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">
                                            <strong>Issued To</strong>
                                        </label>
										<?php if ( $data['issues'] != null ): ?>
											<?php foreach ( $data['issues'] as $issue ) : ?>
                                                <label id="cc-payment" name="issue" class="form-control">
													<?php echo $issue->library_id ?>
                                                </label>
											<?php endforeach; ?>
										<?php else: ?>
                                            <label id="cc-payment" name="issue" class="form-control">
                                                Book Is Not Issued To Anyone
                                            </label>
										<?php endif; ?>
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