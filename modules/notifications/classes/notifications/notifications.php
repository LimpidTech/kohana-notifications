<?php defined('SYSPATH') or die('No direct script access.');

class Notifications_Notifications {

	static public function append($message, $class=null)
	{
		if ($class === null)
			$class = Kohana::Config('notifications.default_class');

		$session = Session::instance();
		$notifications = $session->get('notifications', serialize(Array()));

		$notifications = unserialize($notifications);

			// Create an object to represent our notification
		$notification = new StdClass;

		$notification->message = $message;
		$notification->class = $class;

		array_push($notifications, $notification);

		die(var_dump($notifications));

		$session->set('notifications', serialize($notifications));
	}

	static public function get()
	{
		$session = Session::instance();
		$notifications = $session->get('notifications', serialize(Array()));

		$notifications = unserialize($notifications);

		Notifications::clear();

		return $notifications;
	}

	static public function clear()
	{
		Session::instance()->set('notifications', serialize(array()));
	}

}

