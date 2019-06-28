<?php

require __DIR__.'/../vendor/autoload.php';

$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory(__DIR__ . '/../src');
$loader->setTempDirectory(__DIR__ . '/temp');
$loader->register();

if (count($argv) == 3) {
	$apiKey = $argv[1];
	$apiUrl = "https://mailq-test.quanti.cz/api/v2";
	$mailqFactory = new MailQ\MailQFactory($apiUrl);
	$companyId = intval($argv[2]);
	$mailq = $mailqFactory->createMailQ($companyId, $apiKey);

	$company = $mailq->getCompany();
	print_r("Your company name is {$company->getName()}");
}
else {
	print_r("Invalid command syntax\n");
	print_r("Syntax: php demo.php <API key> <company ID>\n");
	print_r("Example: php demo.php 98a9c69f665d398a63b596cd986596d9656f 1");
}
