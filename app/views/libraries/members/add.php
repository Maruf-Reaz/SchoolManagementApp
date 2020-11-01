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
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<strong>Add Library Member</strong>
						</div>
						<div class="card-body card-block">
							<form action="<?php URLROOT; ?>/libraries/members/addMember" method="post" class="form-horizontal">
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="library_id" class=" form-control-label">Library ID</label>
									</div>
									<div class="col-12 col-md-9">
                                        <input type="hidden" name="student_id" value="<?php echo $data['student_id']; ?>">
										<input type="number" id="library_id" name="library_id"
										       placeholder="Enter Library ID ..." class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="library_fee" class=" form-control-label">Library Fee</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="number" step="any" id="library_fee" name="library_fee"
										       placeholder="Enter Fee..." class="form-control" required>
									</div>
								</div>

								<div class="card-footer">
									<button type="submit" class="btn btn-primary btn-sm"> Add Member </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>