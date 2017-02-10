<?php

class Mydb
{
    protected $db;

	public function __construct()
	{
		try {
			$this->db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
		} catch (PDOException $e) {
			exit($e->getMessage());
		}
	}
}


class AddData extends Mydb
{
	public function addInfo($name, $tel, $email, $note, $time_reg, $ip)
	{
		$this->db->exec("INSERT INTO users (name, tel, email, note, time_reg, ip) VALUES ('$name', '$tel', '$email', '$note', '$time_reg', '$ip')");
	}
}


class CheckIP extends Mydb
{
	public function getTime($user_ip) //получаем время последнего зарегистрированного с IP
	{
		$result = $this->db->query("SELECT time_reg FROM users WHERE ip = '$user_ip' ORDER BY id DESC LIMIT 1");
		$get_time = $result->fetchAll(PDO::FETCH_ASSOC);
		foreach($get_time as $time) {
			$user_time = $time['time_reg'];
		}
		return $user_time;
	}

	public function timeOut($time_reg, $user_time) //получаем минуты ожидания до повторной регистрации
	{
		$minutes = [60,50,40,30,20,10];
		$place = floor(($time_reg - $user_time) / 600);
		if($minutes[$place]) {
			return $minutes[$place];
		}
		
	}
}