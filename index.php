<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Robot.txt analyzing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container py-3">
        <label for="search-url" class="form-label">Enter URL:</label>
        <div class="input-group mb-3 has-validation">
            <input type="text" class="form-control" placeholder="https://www.your-url.com" id="search-url">
            <div id="validation-search-url" class="invalid-feedback">
                Please enter a correct url
            </div>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-outline-primary btn-lg" type="button" id="exploreSite">Run analyzing!</button>
        </div>

        <div id="result"></div>
    </div>

    <script src="public/index.js"></script>
</body>
</html>
