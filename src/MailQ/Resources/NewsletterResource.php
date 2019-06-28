<?php

namespace MailQ\Resources;

use MailQ\Entities\v2\EmailAddressEntity;
use MailQ\Entities\v2\NewsletterCommandEntity;
use MailQ\Entities\v2\NewsletterEntity;
use MailQ\Entities\v2\PreparedNewsletterEntity;
use MailQ\Entities\v2\NewslettersEntity;
use MailQ\Request;
use Nette\Utils\Json;
use stdClass;

trait NewsletterResource
{

	/**
	 *
	 * @param int $newsletterId
	 */
	public function startNewsletter($newsletterId)
	{
		$request = Request::put("{$this->getCompanyId()}/newsletters/{$newsletterId}/preparation");
		$command = new NewsletterCommandEntity();
		$command->setStart(true);
		$request->setContentAsEntity($command);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 *
	 * @param int $newsletterId
	 */
	public function stopNewsletter($newsletterId)
	{
		$request = Request::put("{$this->getCompanyId()}/newsletters/{$newsletterId}/preparation");
		$command = new NewsletterCommandEntity();
		$command->setStop(true);
		$request->setContentAsEntity($command);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 * @param string $email
	 * @param int $newsletterId
	 */
	public function sendTestEmail($email, $newsletterId)
	{
		$request = Request::post("{$this->getCompanyId()}/newsletters/{$newsletterId}/test-email");
		$emailAddress = new EmailAddressEntity();
		$emailAddress->setEmail($email);
		$request->setContentAsEntity($emailAddress);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 *
	 * @param NewsletterEntity $newsletter
	 * @return NewsletterEntity
	 */
	public function createNewsletter(NewsletterEntity $newsletter)
	{
		$request = Request::post("{$this->getCompanyId()}/newsletters");
		$request->setContentAsEntity($newsletter);
		$response = $this->getConnector()->sendRequest($request);
		$newsletter->setId($response->getCreatedId());
		return $newsletter;
	}

	/**
	 * @param NewsletterEntity $newsletter
	 */
	public function updateNewsletter(NewsletterEntity $newsletter)
	{
		$request = Request::put("{$this->getCompanyId()}/newsletters/{$newsletter->getId()}");
		$request->setContentAsEntity($newsletter);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 * Allows to update newsletter in ready state without returning to test state
	 * @param PreparedNewsletterEntity $newsletter
	 */
	public function updatePreparedNewsletter(PreparedNewsletterEntity $newsletter)
	{
		$request = Request::patch("{$this->getCompanyId()}/newsletters/{$newsletter->getId()}");
		$request->setContentAsEntity($newsletter);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 *
	 * @return NewslettersEntity
	 */
	public function getNewsletters($offset = 0, $limit = 100)
	{
		$request = Request::get("{$this->getCompanyId()}/newsletters", ['offset' => $offset, 'limit' => $limit]);
		$response = $this->getConnector()->sendRequest($request);
		$data = Json::decode($response->getContent());
		$json = new stdClass();
		$json->newsletters = $data;
		return new NewslettersEntity($json, true);
	}

	/**
	 *
	 * @param int $newsletterId
	 * @return NewsletterEntity
	 */
	public function getNewsletter($newsletterId)
	{
		$request = Request::get("{$this->getCompanyId()}/newsletters/{$newsletterId}");
		$response = $this->getConnector()->sendRequest($request);
		return new NewsletterEntity($response->getContent(), true);
	}

	/**
	 *
	 * @param int $newsletterId
	 * @return NewsletterEntity
	 */
	public function deleteNewsletter($newsletterId)
	{
		$request = Request::delete("{$this->getCompanyId()}/newsletters/{$newsletterId}");
		$this->getConnector()->sendRequest($request);
	}

}
