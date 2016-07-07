<?php header('Content-Type: text/html; charset=utf-8') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <style>
        body {
            padding: 28px;
        }

        #result {
            margin-top: 32px;
        }

        .ok {
            background: #2ecc71;
        }

        .err {
            background: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="form-group row">
        <label for="enterSite" class="col-sm-2 form-control-label">Адресс сайта: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="enterSite" placeholder="http://seasonvar.ru">
        </div>
    </div>
    <button class="btn btn-primary-outline btn-lg btn-block" type="button" id="exploreSite">Проверить</button>

    <div id="result">

    </div>

    <script>
        $('#exploreSite').click(function () {
            $.get(
                'model.php',
                {
                    url: $('#enterSite').val()
                },
                function(data){
                    $('#result').html(data);
                }
            );
        })
    </script>
</body>
</html>