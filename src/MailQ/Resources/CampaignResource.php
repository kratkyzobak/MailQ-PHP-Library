<?php

namespace MailQ\Resources;

use MailQ\Entities\v2\CampaignEntity;
use MailQ\Entities\v2\CampaignsEntity;
use MailQ\Request;
use Nette\Utils\Json;
use stdClass;

trait CampaignResource
{

	/**
	 *
	 * @return CampaignsEntity
	 */
	public function getCampaigns()
	{
		$request = Request::get("{$this->getCompanyId()}/campaigns");
		$response = $this->getConnector()->sendRequest($request);
		$data = Json::decode($response->getContent());
		$json = new stdClass();
		$json->campaigns = $data;
		return new CampaignsEntity($json, true);
	}

	/**
	 * @param $campaignId
	 * @return CampaignEntity
	 */
	public function getCampaign($campaignId)
	{
		$request = Request::put("{$this->getCompanyId()}/campaigns/{$campaignId}");
		$response = $this->getConnector()->sendRequest($request);
		return new CampaignEntity($response->getContent(), true);
	}

}
