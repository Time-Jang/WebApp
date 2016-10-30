<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2016/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		$name = $_POST['name'];
		$id = $_POST['id'];
		$course = processCheckbox($courses);
		$grade = $_POST['Grade'];
		$creditcard = $_POST['creditcard'];
		$card = $_POST['card'];


		# Ex 4 :
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if(isset($name) == false | isset($id) == false | isset($course) == false | isset($grade) == false
		| isset($creditcard) == false | isset($card) == false | $name == " " | $id == " " | $course == " "
		| $grade == " " | $creditcard == " " | $card == " ")
		{
			print "<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>";

		?>

		<!-- Ex 4 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		}
		elseif (!preg_match("/([a-zA-Z]|\s|-){1,}/",$name)) {
			print "<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>";
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		}
		elseif (!preg_match("/[0-9]{16}/",$creditcard) | !(($card == "visa") & preg_match("/^4/",$creditcard))
		 | (($card == "MasterCard") & preg_match("/^5/",$creditcard)))
		{
			print "<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>";
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		-->

		<?php
		# if all the validation and check are passed
		}
		else{
		?>
		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name: <?= $name ?></li>
			<li>ID: <?= $id ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= $course ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit Card: <?= $creditcard.' ('.$card.')' ?></li>
		</ul>
		<!-- Ex 3 :
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = "loosers.txt";
			$current = file_get_contents($filename);
			$current = substr($current,5,strlen($current)-11);
			$current = "<pre>".$current.$name.";".$id.";".$creditcard.";".$card."\n</pre>";
			file_put_contents($filename,$current);
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		<p><?=$current ?></p>
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->


		<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */

			function processCheckbox($names)
			{
				$i = 0;
				if($_POST['CSE326'] == on)
				{
					$i=1;
					$names = $names.'CSE326';
				}
				if($_POST['CSE107'] == on)
				{
					if($i == 1)
					{
						$names = $names.',';
					}
					$i=1;
					$names = $names.'CSE107';
				}
				if($_POST['CSE603'] == on)
				{
					if($i == 1)
					{
						$names = $names.',';
					}
					$i=1;
					$names = $names.'CSE603';
				}
				if($_POST['CIN870'] == on)
				{
					if($i == 1)
					{
						$names = $names.',';
					}
					$i=1;
					$names = $names.'CIN870';
				}
				return $names;
			}
		?>

	</body>
</html>
