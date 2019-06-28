<?php

namespace MailQ\Resources;

use MailQ\Entities\v2\SmsBatchEntity;
use MailQ\Entities\v2\SmsBatchResultEntity;
use MailQ\Entities\v2\SmsEntity;
use MailQ\Entities\v2\SmsNotificationEntity;
use MailQ\Entities\v2\SmsNotificationsEntity;
use MailQ\Request;
use Nette\Utils\Json;
use stdClass;

trait SmsNotificationResource
{


	/**
	 *
	 * @param SmsEntity $smsEntity
	 * @param int $smsNotificationId
	 * @return SmsEntity
	 */
	public function sendSms(SmsEntity $smsEntity, $smsNotificationId)
	{
		$request = Request::post("{$this->getCompanyId()}/sms-notifications/{$smsNotificationId}/data");
		$request->setContentAsEntity($smsEntity);
		$response = $this->getConnector()->sendRequest($request);
		$smsEntity->setId($response->getCreatedId());
		return $smsEntity;
	}

	/**
	 *
	 * @param SmsBatchEntity $batch
	 * @param int $smsNotificationId
	 * @return SmsBatchResultEntity
	 */
	public function sendSmsBatch(SmsBatchEntity $batch, $smsNotificationId)
	{
		$request = Request::post("{$this->getCompanyId()}/sms-notifications/{$smsNotificationId}/batch/data");
		$request->setContentAsEntity($batch);
		$this->getConnector()->sendRequest($request);
		return new SmsBatchResultEntity($request->getContent(), true);
	}


	public function getSms($smsNotificationId, $smsId)
	{
		$request = Request::get("{$this->getCompanyId()}/sms-notifications/{$smsNotificationId}/data/{$smsId}");
		$response = $this->getConnector()->sendRequest($request);
		return new SmsEntity($response->getContent(), true);
	}

	/**
	 *
	 * @param SmsNotificationEntity $smsNotification
	 */
	public function createSmsNotification(SmsNotificationEntity $smsNotification)
	{
		$request = Request::post("{$this->getCompanyId()}/sms-notifications/");
		$request->setContentAsEntity($smsNotification);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 *
	 * @param SmsNotificationEntity $smsNotification
	 */
	public function updateSmsNotification(SmsNotificationEntity $smsNotification)
	{
		$request = Request::put("{$this->getCompanyId()}/sms-notifications/{$smsNotification->getId()}");
		$request->setContentAsEntity($smsNotification);
		$this->getConnector()->sendRequest($request);
	}

	/**
	 *
	 * @param int $smsNotificationId
	 */
	public function deleteSmsNotification($smsNotificationId)
	{
		$request = Request::delete("{$this->getCompanyId()}/sms-notifications/{$smsNotificationId}");
		$this->getConnector()->sendRequest($request);
	}

	/**
	 *
	 * @return SmsNotificationsEntity
	 */
	public function getSmsNotifications()
	{
		$request = Request::get("{$this->getCompanyId()}/sms-notifications");
		$response = $this->getConnector()->sendRequest($request);
		$data = Json::decode($response->getContent());
		$json = new stdClass();
		$json->smsNotifications = $data;
		return new SmsNotificationsEntity($json, true);
	}


	/**
	 *
	 * @param int $smsNotificationId
	 * @return SmsNotificationEntity
	 */
	public function getSmsNotification($smsNotificationId)
	{
		$request = Request::get("{$this->getCompanyId()}/sms-notifications/{$smsNotificationId}");
		$response = $this->getConnector()->sendRequest($request);
		return new SmsNotificationEntity($response->getContent(), true);
	}

}
