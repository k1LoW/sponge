<?php

class EmailConfig {

	public $error = array(
		'transport' => 'Smtp',
		'from' => array('alert@101000lab.org' => 'Exception Notifier'),
		'to' => 'k1lowxb@gmail.com',
		'host' => 'ssl://smtp.gmail.com',
		'port' => 465,
		'timeout' => 10,
		'username' => 'k1lowxb@gmail.com',
		'password' => '********',
		'client' => null,
		'log' => true,
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $default = array(
		'transport' => 'Mail',
		'from' => 'you@localhost',
	);
}