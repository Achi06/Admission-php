<?php if (isset($_GET['studentDetails'])): {
	$active="active";
} ?>
<?php include('studentDetailsSer.php') ?>
<h2 class="formHeading">Applicant Details</h2>

<form class="wbg" method="post" action="">
<?php include('errors.php') ?>
<h3 class="warning">Enter the correct details as per requirement. 
Any incorrect information encountered will result in cancellation of the form.</h3>
	<div class="name-section">
		<div class="input-group name">
			<label>First Name</label>
			<input type="text" name="firstName" >
		</div>
		<div class="input-group name">
			<label>Middle Name</label>
			<input type="text" name="middleName">
		</div>
		<div class="input-group name">
			<label>Last Name</label>
			<input type="text" name="lastName">
		</div>
	</div>
	<div class="input-group date-Birth">
		<label>Date of Birth</label>
		<input type="date" name="Dob">
	</div>
	<div class="input-group admission-select">
		<label><strong>Admission for Year: </strong></label>
		<input class="radio-width" type="radio" name="admissionYr" value="First Year">First Year
  		<input class="radio-width" type="radio" name="admissionYr" value="Second Year">Second Year
	</div>
	<div class="input-group admission-dept">
		<label><strong>Admission for Department: </strong></label>
		<select name="department" class="margin-left">
			<option value="">Select Department</option>
			<option value="Computer Engineering">Computer Engineering</option>
			<option value="Civil Engineering">Civil Engineering</option>
			<option value="Mechanical Engineering">Mechanical Engineering</option>
			<option value="Electrical Engineering">Electrical Engineering</option>
		</select>
	</div>
	<div class="input-group flex-section">
		<div>
			<label><strong>HSC Marks: </strong></label>
		</div>
		<div class="marks-section">
			<div class="input-group name">
				<label>Maths:</label>
				<input type="number" name="math">
			</div>
			<div class="input-group name">
				<label>Chemistry:</label>
				<input type="number" name="chem">	
			</div>
			<div class="input-group name">
				<label>Physics:</label> 
				<input type="number" name="phy">
			</div>
		</div>
	</div>
	<div class="input-group admission-dept">
		<label><strong>AIEEE Score: </strong></label>
		<input class="input-score" type="number" name="aie">
	</div>
	<div class="input-group admission-dept">
		<label><strong>CET Score (Physics, Maths, Chemistry): </strong></label>
		<input class="input-score" type="number" name="cet">
	</div>
	<div class="input-group submit-form">
		<button type="submit" class="btn" name="stud_details">Submit</button>
	</div>
</div>
</form>

<div>
</div>

<?php  endif ?>