<?php include 'includes/header.php'; ?>

<div class="col-md-12">
	<div class="container">
		<div class="row mt-2">
			<div>
				<!-- software library start -->
				<h3 class="mb-4 mt-4">Manage Students</h3>
				<table class="table table-hover">
				<thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Lecturer Name</th>
                    <th>Project Title</th>
                    <th>Students Name</th>
                    <th>Date Joined</th>
                    <th>Office Location</th>
                  </tr>
                </thead>
					<tbody>
						<?php
						// SQL query
						$sql  = "SELECT * FROM tbl_student";
						$result =  mysqli_query($con, $sql);
						while ($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td>
									<?php echo $row['studentId']; ?>
								</td>
								<td>
									<?php echo $row['fName'] . " " . $row['lName']; ?>
								</td>
								<td>
									<?php echo $row['school']; ?>
								</td>
								<td>
									<?php echo $row['contactNo']; ?>
								</td>
								<td>
									<?php echo $row['yearEnrolled']; ?>
								</td>
								<td>
									<?php echo $row['serialNo']; ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'includes/footer.php' ?>