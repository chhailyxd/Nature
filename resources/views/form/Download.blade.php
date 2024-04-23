<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download image with url</title>
</head>
<body>
    <form action="/download" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="image_url" placeholder="Enter Image URL">
        <button type="submit">Upload Image</button>
    </form>
</form>
</body>
</html>
