<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Change Location Path</title>
</head>

<body>
    <form>
        <label for="download_path">Download Path:</label>
        <input type="file" id="download_path" webkitdirectory directory onchange="showSelectedPath()">
        <button type="button" onclick="resetInput()">Clear</button>
    </form>

    <div id="selected_folder"></div>

    <script>
        function showSelectedPath() {
            const inputField = document.getElementById('download_path');
            const selectedFolder = inputField.files[0];
            const selectedFolderPath = selectedFolder ? selectedFolder.webkitRelativePath.split(selectedFolder.name)[0] : '';
            document.getElementById('selected_folder').innerText = selectedFolderPath;
        }

        function resetInput() {
            const inputField = document.getElementById('download_path');
            inputField.value = ''; // Clear the selected file
            document.getElementById('selected_folder').innerText = ''; // Clear the displayed path
        }
    </script>

</body>

</html>
