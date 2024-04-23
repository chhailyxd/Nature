from plyer import notification

# Title and message for the notification
title = "Hello!"
message = "This is a notification from Python."

# Display the notification
notification.notify(
    title=title,
    message=message,
    app_name="Python Notification",
    timeout=1000  # Notification will disappear after 10 seconds
)
