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
        }

        .card {
            max-width: 400px; 
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px; 
        }

        .card-header {
            text-align: center;
            font-weight: bold;
            padding-bottom: 15px;
            border-bottom: 1px solid #ccc;
        }

        .card-body {
            padding: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            width: 100%; 
            margin-top: 10px; 
            background-color: #007bff;
            border: none; 
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer; 
            transition: background-color 0.3s; 
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 20px; 
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('search-gifs-by-phrase-action') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="phrase" class="col-md-4 col-form-label text-md-right">Buscar por frase</label>

                                <div class="col-md-6">
                                    <input id="phrase" type="text" class="form-control @error('phrase') is-invalid @enderror" name="phrase" required autofocus>

                                    @error('phrase')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="limit" class="col-md-4 col-form-label text-md-right">Limit</label>

                                <div class="col-md-6">
                                    <input id="limit" type="number" class="form-control" name="limit" value="10">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offset" class="col-md-4 col-form-label text-md-right">Offset</label>

                                <div class="col-md-6">
                                    <input id="offset" type="number" class="form-control" name="offset" value="0">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
