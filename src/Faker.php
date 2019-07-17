<?php

namespace hatamiarash7\PFaker;

class PFaker
{
	private static $objects;

	public function __construct()
	{
		self::$objects = require __DIR__ . '/libs/variables.php';
	}

	private static function getRandomKey($object = null)
	{
		$name = 0;
		$array = [];

		if (is_array($object)) {
			$array = $object;
			$name = array_rand($object);
		} elseif (is_string($object)) {
			$array = self::$objects[$object];
			$name = array_rand($array);
		}

		return self::string($array[$name]);
	}

	public static function firstName()
	{
		return self::getRandomKey('firstName');
	}

	public static function lastName()
	{
		$name = self::getRandomKey('firstName');
		$lname = self::getRandomKey('lastName');
		return $name . ' ' . $lname;
	}

	public static function email($count = null)
	{
		if (!is_null($count)) {
			$mail = strtolower(self::str_random($count));
		} else {
			$mail = strtolower(self::str_random(rand(6, 10)));
		}
		$email = $mail . self::getRandomKey('email');
		return $email;
	}

	public static function jobTitle()
	{
		return self::getRandomKey('jobTitle');
	}

	public static function word()
	{
		return self::getRandomKey('word');
	}

	public static function sentence()
	{
		return self::getRandomKey('sentence') . '.';
	}

	public static function paragraph()
	{
		return self::getRandomKey('paragraph') . '.';
	}

	public static function mobile()
	{
		$prefix = self::getRandomKey('mobile');
		$phone = self::string('0' . $prefix . self::randomNumber(7));
		return (strlen($phone) !== 11 ? $phone . rand(1, 10) : $phone);
	}

	public static function telephone()
	{
		$prefix = self::getRandomKey('telephone');
		return self::string('0' . $prefix . self::randomNumber(7));
	}

	public static function city()
	{
		return self::getRandomKey('city');
	}

	public static function state()
	{
		return self::getRandomKey('state');
	}

	public static function domain($length = null)
	{
		if (!is_null($length)) {
			$domainName = strtolower(self::str_random($length));
		} else {
			$domainName = strtolower(self::str_random(rand(5, 8)));
		}
		$domain = self::getRandomKey('protocol') . '://' . 'www.' . $domainName . '.' . self::getRandomKey('domain');
		return $domain;
	}

	public static function code_melli()
	{
		return self::randomNumber(10);
	}

	public static function birthday($sign = null)
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

	public static function fullName()
	{
		$firstName = self::getRandomKey('firstName');
		$lastName = self::getRandomKey('lastName');
		$lastName2 = self::getRandomKey('firstName');
		return $firstName . ' ' . $lastName2 . ' ' . $lastName;
	}

	public static function age($min = null, $max = null)
	{
		if (!is_null($min) && !is_null($min)) {
			$age = rand($min, $max);
		} else {
			$age = rand(18, 50);
		}
		return $age;
	}

	public static function address()
	{
		return self::getRandomKey('address');
	}

	private static function str_random($length = 16)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
	}

	private static function string($value)
	{
		return (string)$value;
	}

	private static function randomNumber($length = 20, $int = false)
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

		return self::string($number);
	}
}
