<?php

namespace MailQ;

use MailQ\Connector;
use MailQ\MailQ;


class MailQFactory
{


	private $baseUrl;



	public function __construct($baseUrl)
	{
		$this->baseUrl = $baseUrl;
	}


	/**
	 * @param $companyId
	 * @param $apiKey
	 * @return \MailQ\MailQ
	 * @throws \Exception
	 */
	public function createMailQ($companyId, $apiKey)
	{
		if ($companyId != null) {
			$connector = Connector::getInstance($this->baseUrl, $apiKey);
			return new MailQ($connector, $companyId);
		} else {
			throw new \Exception("Cannot create MailQ object without companyId. Expecting number, got {$companyId}.");
		}

	}

}
