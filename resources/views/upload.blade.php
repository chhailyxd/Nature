<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drag and Drop Images</title>
    <style>
        #drag-drop-area {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        #drag-drop-area.hover {
            background-color: #f0f0f0;
        }

        #drag-drop-area p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="drag-drop-area">
        <input type="file" id="file-input" accept="image/*" />
        <p>Drag & drop your photo here</p>
    </div>
    
    <script>
        $(document).ready(function(){
            var dragDrop = $('#drag-drop-area');
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
                dragDrop.on(event, function(e){
                    e.preventDefault();
                    e.stopPropagation();
                });
            });

            ['dragenter', 'gragover'].forEach(event => {
                dragDrop.on(event, function(){
                    dragDrop.addClass('hover');
                });
            });

            ['dragleave', 'drop'].forEach(event => {
                dragDrop.on(event, function(){
                    dragDrop.removeClass('hover');
                })
            });

            dragDrop.on('drop', function(e) {
                var files = e.originalEvent.dataTransfer.files;
                handleFiles(files);
            });

            //handle file input change
            $('#file-input').on('change', function(){
                var files = this.files;
                handleFiles(files);
            });

            function handleFiles(files){
                for(var i=0; i<files.length; i++){
                    var file = files[i];
                    if(file.type.match('image.*')){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            var img = $('<img>').attr('src', e.target.result);
                            $('#drag-drop-area').html(img);

                            var imageSize = Math.round(file.size / 512);
                            if(imageSize > 512){
                                alert('Image size exceeds 521 KB. Please select a smaller image.')
                            }
                        };
                        reader.readAsDataURL(file);
                    }else{
                        alert("Please select an image file.");
                    }
                }
            }
        });
    </script>
</body>
</html>
