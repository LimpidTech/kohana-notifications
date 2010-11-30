# kohana-notifications
#### Brandon R. Stoner <monokrome@monokro.me>

## What is it?

This is a very basic application for displaying user notifications in the kohana framework. Notifications are useful for displaying different data to users after events happen. For instance, when someone submits to update their profile - you might want the function saving the profile to create a notification saying "Your profile has been updated."

## Getting started

The previously described situation is an extremely basic task with this module. It takes one line of code within your save method.

    Notifications::append('Your profile has been updated.');

However, sometimes your profile might not save. Maybe due to an error, or some other circumstance. Notifications are also a good way to let your user know about a situation where something bad happened. Take this for example:

    Notifications::append('Error updating your profile.', 'error');

This will create a notification with the 'error' class, and if you use the default notifications list view in your own applications - you'll get a list like this from it.

    <ul id="notifications">
    	<li class="error">Error updating your profile.</li>
    </ul>

To do this, you simply need to include the notifications view inside of your own view. This is easily done with the following line of code:

    <?php print View::factory()->render('notifications'); ?>

You'll notice that the class is set to error on the notification's list item. This is simply the second argument passed to **Notifications::append()**. You can use any arbitrary string as a classname, or you can leave the second argument empty.

If you prefer not to use the predefined view, you can always access the notifications list with this line of code:

    $notifications = Notifications::get();

Now, your notifications variable will be an array if notifications are present. If there aren't any notifications to display for the current session, then *$notifications* will be an empty array.

Every item in the $notifications array represents a single notification. A notification is a basic object with the following properties:

* message - The message that should be displayed to the user.
* class - A string used to classify this specific notification.

That's about it. Now, get back to coding and have some fun.

