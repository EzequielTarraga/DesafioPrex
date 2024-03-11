<!-- resources/views/giphy/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giphy Search Results</title>
</head>
<body>
    <h1>Giphy Search Results</h1>

    <div class="gifs">
        @foreach ($gifs as $gif)
            <div class="gif">
                <img src="{{ $gif->images->original->url }}" alt="{{ $gif->title }}">
                <p>{{ $gif->title }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
