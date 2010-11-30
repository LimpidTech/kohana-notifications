<?php defined('SYSPATH') or die('No direct script access.');

class Notifications_Notifications {

	static public function append($message, $class='notice')
	{
		$session = Session::instance();
		$notifications = $session->get('notifications', null);

		if ($notifications === null)
			$notifications = Array();
		else
			$notifications = unserialize($notifications);

			// Create an object to represent our notification
		$notification = new StdClass;

		$notification->message = $message;
		$notification->class = $class;

		array_push($notifications, $notification);

		$session->set('notifications', serialize($notifications));
	}

	static public function get()
	{
		$session = Session::instance();
		$notifications = $session->get('notifications', null);

		if ($notifications !== null)
		{
			$notifications = unserialize($notifications);
			$session->set('notifications', null);

			return $notifications;
		}
		else
		{
			return null;
		}
	}

}

