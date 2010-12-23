<?php	defined('SYSPATH') or die('No direct script access.');

	$notifications = Notifications::get();

	if (count($notifications) > 0)
	{
?>

	<ul id="notifications">

<?php
		foreach ($notifications as $notification)
		{
?>

		<li class="notification <?php print $notification->class ?>">
			<?php print $notification->message ?>
		</li>

<?php
		}
?>

	</ul>

<?php
	}

