<?php

namespace hatamiarash7\PFaker;

class PFaker
{
	private $objects;

	public function __construct()
	{
		$this->objects = require __DIR__ . '/libs/variables.php';
	}

	private function getRandomKey($object = null)
	{
		$name = 0;
		$array = [];

		if (is_array($object)) {
			$array = $object;
			$name = array_rand($object);
		} elseif (is_string($object)) {
			$array = $this->objects[$object];
			$name = array_rand($array);
		}

		return $this->string($array[$name]);
	}

	public function firstName()
	{
		return $this->getRandomKey('firstName');
	}

	public function lastName()
	{
		$name = $this->getRandomKey('firstName');
		$lname = $this->getRandomKey('lastName');
		return $name . ' ' . $lname;
	}

	public function email($count = null)
	{
		if (!is_null($count)) {
			$mail = strtolower($this->str_random($count));
		} else {
			$mail = strtolower($this->str_random(rand(6, 10)));
		}
		$email = $mail . $this->getRandomKey('email');
		return $email;
	}

	public function jobTitle()
	{
		return $this->getRandomKey('jobTitle');
	}

	public function word()
	{
		return $this->getRandomKey('word');
	}

	public function sentence()
	{
		return $this->getRandomKey('sentence') . '.';
	}

	public function paragraph()
	{
		return $this->getRandomKey('paragraph') . '.';
	}

	public function mobile()
	{
		$prefix = $this->getRandomKey('mobile');
		$phone = $this->string('0' . $prefix . $this->randomNumber(7));
		return (strlen($phone) !== 11 ? $phone . rand(1, 10) : $phone);
	}

	public function telephone()
	{
		$prefix = $this->getRandomKey('telephone');
		return $this->string('0' . $prefix . $this->randomNumber(7));
	}

	public function city()
	{
		return $this->getRandomKey('city');
	}

	public function state()
	{
		return $this->getRandomKey('state');
	}

	public function domain($length = null)
	{
		if (!is_null($length)) {
			$domainName = strtolower($this->str_random($length));
		} else {
			$domainName = strtolower($this->str_random(rand(5, 8)));
		}
		$domain = $this->getRandomKey('protocol') . '://' . 'www.' . $domainName . '.' . $this->getRandomKey('domain');
		return $domain;
	}

	public function code_melli()
	{
		return $this->randomNumber(10);
	}

	public function birthday($sign = null)
	{
		$year = rand(1333, 1380);
		$mouth = rand(1, 12);
		$day = rand(1, 30);
		if (!is_null($sign)) {
			return $year . $sign . $mouth . $sign . $day;
		} else {
			$sign = '/';
			return $year . $sign . $mouth . $sign . $day;
		}
	}

	public function fullName()
	{
		$firstName = $this->getRandomKey('firstName');
		$lastName = $this->getRandomKey('lastName');
		$lastName2 = $this->getRandomKey('firstName');
		return $firstName . ' ' . $lastName2 . ' ' . $lastName;
	}

	public function age($min = null, $max = null)
	{
		if (!is_null($min) && !is_null($min)) {
			$age = rand($min, $max);
		} else {
			$age = rand(18, 50);
		}
		return $age;
	}

	public function address()
	{
		return $this->getRandomKey('address');
	}

	private function str_random($length = 16)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
	}

	private function string($value)
	{
		return (string)$value;
	}

	private function randomNumber($length = 20, $int = false)
	{
		$numbers = "0123456789";

		$number = '';

		for ($i = 1; $i <= $length; $i++) {
			$num = $numbers[rand(0, strlen($numbers) - 1)];

			if ($num == 0 && $i == 1) {
				$i = 1;
				continue;
			}

			$number .= $num;
		}

		if ($int) {
			return (integer)$number;
		}

		return $this->string($number);
	}
}
