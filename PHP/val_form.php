<?php
	class User 
	{
		protected $pib;
		protected $birthday;

		function __construct($pib, $birthday)
		{
			$this->pib = $pib;
			$this->birthday = $birthday;
		}

		function getPib()
		{
			echo ("ПIБ: $this->pib</br>");
		}

		function getBirth()
		{
			echo ("Рік народження: $this->birthday</br>");
		}

		function getAgeFromBirth() {

	  			$age = date('Y') - $this->birthday;
	  			return $age;
		}
	}

	class Student extends User
	{
		private $group;
		private $specialty;
		private $email;

		function __construct($pib, $birthday, $group, $specialty, $email)
		{
			parent::__construct($pib, $birthday);
			$this->group = $group;
			$this->specialty = $specialty;
			$this->email = $email;
		}

		function getGroup()
		{
			echo ("Група: $this->group</br>");
		}

		function getSpecialty()
		{
			echo ("Спеціальність: $this->specialty</br>");
		}

		function getEmail()
		{
			echo ("Email: $this->email");
		}
	}

	$student = $_POST['student'];
	$birthday = $_POST['birthday'];
	$group = $_POST['group'];
	$specialty = $_POST['specialty'];
	$email = $_POST['email'];

	$obj = new Student($student, $birthday, $group, $specialty, $email);
	$age = $obj->getAgeFromBirth();

	$mysql = new mysqli('127.0.0.1', 'maximus7022', '12345Max', 'maximus7022');
	$mysql->query("INSERT INTO `Registration` (`PIB`, `Groupa`, `Birth`, `Age`, `Specialty`, `Email`) 
	VALUES ('$student', '$group', '$birthday', '$age', '$specialty', '$email')");

	echo "Дані успішно занесені до бази:</br>";
	$obj->getPib();
	$obj->getBirth();
	echo ("Вік: $age</br>");
	$obj->getGroup();
	$obj->getSpecialty();
	$obj->getEmail();
?>