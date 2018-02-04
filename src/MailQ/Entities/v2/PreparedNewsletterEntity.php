<?php

namespace MailQ\Entities\v2;

use MailQ\Entities\BaseEntity;

/**
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $subject
 * @property string $sendAs
 * @property string $senderEmail
 * @property bool $unlimited
 * @property integer $recipientsListId
 * @property integer $dataPersistence
 * @property string $campaign
 * @property string $templateUrl
 * @property string $unsubscribeTemplateUrl
 * @property string $text
 */
class NewsletterReadyEntity extends BaseEntity {

    /**
     * @in
     * @out
     * @var integer 
     */
    private $id;

    /**
     * @in
     * @out
     * @var string 
     */
    private $name;

    /**
     * @in
     * @out
     * @var string 
     */
    private $code;

    /**
     * @in
     * @out
     * @var string 
     */
    private $subject;

    /**
     * @in
     * @out
     * @var string 
     */
    private $sendAs;

    /**
     * @in
     * @out
     * @var string 
     */
    private $senderEmail;
	
	/**
     * @in
     * @out
     * @var bool 
     */
    private $unlimited;

    /**
     * @in
     * @out
     * @var integer 
     */
    private $recipientsListId;
	
	/**
     * @in
     * @out
     * @var integer 
     */
    private $dataPersistence;

    /**
     * @in
     * @out
     * @var string 
     */
    private $campaign;
	
    /**
     * @in
     * @out
     * @var string 
     */
    private $templateUrl;

    /**
     * @in
     * @out
     * @var string 
     */
    private $unsubscribeTemplateUrl;
	
	/**
	 * @in
     * @out
	 * @var string 
	 */
	private $text;
    
    
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return NewsletterReadyEntity
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return NewsletterReadyEntity
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 * @return NewsletterReadyEntity
	 */
	public function setCode($code)
	{
		$this->code = $code;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * @param string $subject
	 * @return NewsletterReadyEntity
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSendAs()
	{
		return $this->sendAs;
	}

	/**
	 * @param string $sendAs
	 * @return NewsletterReadyEntity
	 */
	public function setSendAs($sendAs)
	{
		$this->sendAs = $sendAs;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSenderEmail()
	{
		return $this->senderEmail;
	}

	/**
	 * @param string $senderEmail
	 * @return NewsletterReadyEntity
	 */
	public function setSenderEmail($senderEmail)
	{
		$this->senderEmail = $senderEmail;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isUnlimited()
	{
		return $this->unlimited;
	}

	/**
	 * @param boolean $unlimited
	 * @return NewsletterReadyEntity
	 */
	public function setUnlimited($unlimited)
	{
		$this->unlimited = $unlimited;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRecipientsListId()
	{
		return $this->recipientsListId;
	}

	/**
	 * @param int $recipientsListId
	 * @return NewsletterReadyEntity
	 */
	public function setRecipientsListId($recipientsListId)
	{
		$this->recipientsListId = $recipientsListId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDataPersistence()
	{
		return $this->dataPersistence;
	}

	/**
	 * @param int $dataPersistence
	 * @return NewsletterReadyEntity
	 */
	public function setDataPersistence($dataPersistence)
	{
		$this->dataPersistence = $dataPersistence;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCampaign()
	{
		return $this->campaign;
	}

	/**
	 * @param string $campaign
	 * @return NewsletterReadyEntity
	 */
	public function setCampaign($campaign)
	{
		$this->campaign = $campaign;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTemplateUrl()
	{
		return $this->templateUrl;
	}

	/**
	 * @param string $templateUrl
	 * @return NewsletterReadyEntity
	 */
	public function setTemplateUrl($templateUrl)
	{
		$this->templateUrl = $templateUrl;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param string $text
	 * @return NewsletterReadyEntity
	 */
	public function setText($text)
	{
		$this->text = $text;
		return $this;
	}





}
