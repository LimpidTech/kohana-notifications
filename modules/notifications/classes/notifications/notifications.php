<?php defined('SYSPATH') or die('No direct script access.');

/**
 * NOTE: You'll see this class using the string 'a:0:{}' in a few places. This is just
 * the string result that gets returned by running serialize(Array()). Instead of
 * serializing the array over and over again, it is more realistic to just pass the
 * resulting string itself for a small array like this.
 */

class Notifications_Notifications {

	static public function append($message, $class=null)
	{
		if ($class === null)
			$class = Kohana::Config('notifications.default_class');

		$session = Session::instance();
		$notifications = $session->get('notifications', 'a:0:{}');

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
		$notifications = $session->get('notifications', 'a:0:{}');

		$notifications = unserialize($notifications);

		Notifications::clear();

		return $notifications;
	}

	static public function clear()
	{
		Session::instance()->set('notifications', 'a:0:{}');
	}

}

