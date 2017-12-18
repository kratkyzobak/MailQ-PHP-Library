<?php

namespace MailQ\Entities\v2;

use MailQ\Entities\BaseEntity;

/**
 * @property NotificationDataEntity[] $notifications
 */
class NotificationsDataEntity extends BaseEntity
{


	/**
	 * @in
	 * @out
	 * @var NotificationDataEntity[]
	 * @collection
	 */
	private $notifications;

	/**
	 * @return NotificationDataEntity[]
	 */
	public function getNotifications()
	{
		return $this->notifications;
	}

	/**
	 * @param NotificationDataEntity[] $notifications
	 * @return NotificationsDataEntity
	 */
	public function setNotifications($notifications)
	{
		$this->notifications = $notifications;
		return $this;
	}
    

}
