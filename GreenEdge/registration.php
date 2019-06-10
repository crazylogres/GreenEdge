<?php
$firstname=$lastname=$middlename=$mobile=$phone=$email=$fathersname=$mothersname=$dob=$placeofbirth=$education=$job=$firstname_error=$lastname_error=$middlename_error=$lastname_error=$mobile_error=$phone_error=$email_error=$fathersname_error=$mothersname_error=$dob_error=$placeofbirth_error=$education_error=$job_error='';

$con=mysqli_connect('localhost', 'root', '', 'greenedge') or die(mysqli_error($con));

if(isset($_POST['register']))
{
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$mobile=$_POST['mobile'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$fathersname=$_POST['fathername'];
	$mothersname=$_POST['mothername'];
	$dob=$_POST['dob'];
	$placeofbirth=$_POST['placeofbirth'];
	$education=$_POST['education'];
	$job=$_POST['job'];

	if(firstname($firstname) || middlename($middlename) || lastname($lastname) || mobile($mobile) || phone($phone) || email($email) || fathername($fathersname) || mothername($mothersname) || dob($dob) || placeofbirth($placeofbirth) || education($education) || job($job))
	{
		$firstname_error=firstname($firstname);
		$middlename_error=middlename($middlename);
		$lastname_error=lastname($lastname);
		$mobile_error=mobile($mobile);
		$phone_error=phone($phone);
		$email_error=email($email);
		$fathersname_error=fathername($fathersname);
		$mothersname_error=mothername($mothersname);
		$dob_error=dob($dob);
		$placeofbirth_error=placeofbirth($placeofbirth);
		$education_error=education($education);
		$job_error=job($job);
	}
	else
	{
		$query="INSERT INTO customer_details (firstname, middlename, lastname, mobile, phone, email, fathername, mothername, dob, placeofbirth, education, job) VALUES ('$firstname', '$middlename', '$lastname', '$mobile', '$phone', '$email', '$fathersname', '$mothersname', '$dob', '$placeofbirth', '$education', '$job')";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "1";
		}
		else
		{
			echo die(mysqli_error($con));
		}
	}
}

function job($job)
{
	if(empty($job))
	{
		return "Job title is required";
	}
	elseif(strlen($job) < 5)
	{
		return "Job title must be of atleast 6 characters";
	}
}

function education($education)
{
	if(empty($education))
	{
		return "Education is required";
	}
	elseif(strlen($education) < 5)
	{
		return "Education must be of atleast";
	}
}

function placeofbirth($placeofbirth)
{
	if(empty($placeofbirth))
	{
		return "Place of birth is required";
	}
}

function dob($dob)
{
	if(empty($dob))
	{
		return "Date of birth is mandatory";
	}
}

function mothername($mothersname)
{
	if(empty($mothersname))
	{
		return "Mothers fullname is required";
	}
	elseif(strlen($mothersname) < 6)
	{
		return "Mothers fullname mustbe of atleast 7 characters";
	}
}

function fathername($fathersname)
{
	if(empty($fathersname))
	{
		return "Father Fullname is required";
	}
	elseif(strlen($fathersname) < 6)
	{
		return "Fathers Fullname must be of 7 characters";
	}
}

function email($email)
{
	if(empty($email))
	{
		return "Email is required";
	}
}

function phone($phone)
{
	if(empty($phone))
	{
		return "Phone number is required";
	}
	elseif(!preg_match("/^[0-9]{10}+$/", $phone))
	{
		return "Informat Phone Number";
	}
}

function mobile($mobile)
{
	if(empty($mobile))
	{
		return "Mobile number is required";
	}
	elseif(!preg_match("/^[0-9]{10}+$/", $mobile))
	{
		return "Informat Mobile Number";
	}
}

function address($address)
{
	if(empty($address))
	{
		return "Address is required";
	}
}
function firstname($firstname)
{
	if(empty($firstname))
	{
		return "First name is required";
	}
	elseif(!preg_match("/^[A-Za-z\'\-\040]+$/g", $firstname))
	{
		return "Invalid First Name";
	}
	elseif(strlen($firstname) < 3)
	{
		return "First Name must be of atleast 4 characters";
	}
}

function middlename($middlename)
{
	if(empty($middlename))
	{
		return "Middlename is mandatory";
	}
	elseif(strlen($middlename) < 2)
	{
		return "Middlename must be of atleast 3 charactrers";
	}
}

function lastname($lastname)
{
	if(empty($lastname))
	{
		return "Lastname is required";
	}
	elseif(strlen($lastname) < 4)
	{
		return "Lastname must be of atleast 5 characters";
	}
}
?>
<form action="registration.php" method="POST">
	<span><?php echo $firstname_error; ?></span>
	<div>
	First Name: <input type="text" name="firstname" placeholder="40" />
	</div>
	<span><?php echo $middlename_error; ?></span>
	<div>
	Middle Name: <input type="text" name="middlename" placeholder="40" />
	</div>
	<span><?php echo $lastname_error; ?></span>
	<div>
	Last Name: <input type="text" name="lastname" placeholder="40" /></div>
	<span><?php echo $mobile_error; ?></span>
	<div>
	Mobile Number: <input type="text" name="mobile" placeholder="40" /></div>
	<span><?php echo $phone_error; ?></span>
	<div>
	Phone Number: <input type="text" name="phone" placeholder="40" /></div>
	<span><?php echo $email_error; ?></span>
	<div>
	Email: <input type="email" name="email" placeholder="40" /></div>
	<span><?php echo $fathersname_error; ?></span>
	<div>
	Father's Name: <input type="text" name="fathername" placeholder="40" /></div>
	<span><?php echo $mothersname_error; ?></span>
	<div>
	Mother's Name: <input type="text" name="mothername" placeholder="40" /></div>
	<span><?php echo $dob_error; ?></span>
	<div>
	DOB: <input type="text" name="dob" placeholder="40" /></div>
	<span><?php echo $placeofbirth_error; ?></span>
	<div>
	Place Of Birth: <input type="text" name="placeofbirth" placeholder="40" /></div>
	<span><?php echo $education_error; ?></span>
	<div>
	Education: <input type="text" name="education" placeholder="40" /></div>
	<span><?php echo $job_error; ?></span>
	<div>
	Job: <input type="text" name="job" placeholder="40" /></div>
	<input type="submit" name="register" value="Register" />
</form>