<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Show Notification</title>
</head>
<body>
<button id="triggerButton">Trigger Notification</button>
<script>
    $(document).ready(function() {
        $('#triggerButton').click(function() {
            $.ajax({
                type: 'POST',
                url: '/send-notification',
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
