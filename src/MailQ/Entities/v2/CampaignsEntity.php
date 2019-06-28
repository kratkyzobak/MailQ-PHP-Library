<?php

namespace MailQ\Entities\v2;

use MailQ\Entities\BaseEntity;

/**
 * @property CampaignEntity[] $campaigns
 */
class CampaignsEntity extends BaseEntity {

    /**
     * @in
     * @out
     * @var CampaignEntity[]
     * @collection
     */
    private $campaigns;

    /**
     * @return CampaignEntity[]
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * @param CampaignEntity[] $campaigns
     */
    public function setCampaigns($campaigns)
    {
        $this->campaigns = $campaigns;
    }
   
    


}
