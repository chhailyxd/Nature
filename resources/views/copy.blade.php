<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Copy</title>
</head>
<body>
    <p id="textToCopy">This is the text to be copied.</p>
    <button onclick="copyText()">Copy Text</button>
    <script>
        function copyText(){
            var textToCopy = document.getElementById("textToCopy");
            var range = document.createRange();
            range.selectNode(textToCopy);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
            alert("Text copied successfully!");
        }
    </script>
</body>
</html>
