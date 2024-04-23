<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Real time</title>
    <style>
        .search-container {
            width: 300px;
            margin: 20px auto;
        }

        #search-input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #search-results {
            list-style-type: none;
            padding: 0;
        }

        #search-results li {
            padding: 8px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        #search-results li:hover {
            background-color: #f4f4f4;
        }

        #details-container {
            display: none;
        }
    </style>
</head>

<body>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search...">
        <ul id="search-results"></ul>
    </div>

    <div id="details-container">
        <h2 id="details-title"></h2>
        <p id="details-description"></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const data = [{
                    title: 'Cambodia',
                    description: 'Description for Item 1'
                },
                {
                    title: 'Thialand',
                    description: 'Description for Item 2'
                },
                {
                    title: 'Lao',
                    description: 'Description for Item 3'
                },
                {
                    title: 'Vietname',
                    description: 'Description for Item 3'
                },
                {
                    title: 'China',
                    description: 'Description for Item 3'
                },
                {
                    title: 'USA',
                    description: 'Description for Item 3'
                },
                {
                    title: 'Korean',
                    description: 'Description for Item 3'
                }
            ];

            $('#search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                const filteredData = data.filter(item => item.title.toLowerCase().includes(searchTerm));
                displaySearchResults(filteredData);
            });

            function displaySearchResults(results) {
                const searchResults = $('#search-results');
                searchResults.empty();
                $.each(results, function(index, item) {
                    const li = $('<li>').text(item.title);
                    li.on('click', function() {
                        displayDetails(item);
                    });
                    searchResults.append(li);
                });
            }

            function displayDetails(item) {
                $('#details-title').text(item.title);
                $('#details-description').text(item.description);
                $('#search-input').val(item.title);
                $('#details-container').show();
            }
        });
    </script>
</body>
</html>
