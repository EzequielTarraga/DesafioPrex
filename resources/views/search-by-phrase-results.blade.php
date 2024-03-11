<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            padding: 0 15px; 
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .col-md-4 {
            flex: 0 0 30%; 
            margin-bottom: 20px;
        }

        img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        @if (!empty($gifs))
            <div class="row">
                @foreach ($gifs as $gif)
                    <div class="col-md-4">
                        <img src="{{ $gif->images->fixed_height->url }}" alt="{{ $gif->title }}">
                    </div>
                @endforeach
            </div>
        @else
            <p>No GIFs found for the given phrase.</p>
        @endif
    </div>
</body>
</html>
