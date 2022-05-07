<?php
    require_once(__DIR__ . "/vendor/autoload.php");
?>

<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mãe</title>
    <link rel="shortcut icon" href="assets/favicon.png" type="image/png">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-3 jProgress">
    <div class="progress shadow-lg" style="height: 20px">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>
</div>

<div class="container bg-white mt-3 jMain rounded-3 p-2" style="display: none;">
    <div class="main" style="min-height: 50px">
        <p class="h2">&#60;&#47;&#62; Console</p>
    </div>
</div>

<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

<script>
    $(document).ready(function () {
        let value = 0;
        var loadInterval = setInterval(function () {
            const w_progress = value + "%";
            $('.progress-bar').css('width', w_progress).html(w_progress);
            value = value + 50;

            if (value > 100) {
                loadMaeFinish();
            }
        }, 1000);

        function loadMaeFinish() {
            clearInterval(loadInterval);
            $('.progress').fadeOut(2000, function () {
                $('.jProgress').remove();
                $('.jMain').fadeIn(2000, function () {
                    loadMae();
                });
            });
        }

        function loadMae() {
            setMessage(
                '<a class="btn btn-danger jButton my-3">Click aqui se você for o filho favorito!</a>',
                setMessage(
                    '- Vamos descobrir?',
                    setMessage(
                        '- Tem certeza?',
                        setMessage(
                            '- Você?!',
                            setMessage(
                                '- Você sabe quem é o filho favorito da sua mãe?',
                                setMessage('- Oi. Tudo Bem?', () => {
                                }, 300)
                                , 2000
                            ), 4000
                        ), 6000
                    ), 8000
                ), 10000
            )

        }

        function setMessage(message, callback = () => {
        }, time = 2000) {
            setTimeout(function () {
                $('.jMain').append('<p>' + message + '</p>');
                callback();
            }, time);
        }

        $(document).on('click', '.jButton', function () {
            $('.jButton').addClass('disabled');
            setTimeout(function () {
                $('.jMain').append('<p>- Ela prefere seu irmão!</p>');
                setTimeout(function () {
                    $('.jMain').append('<a class="btn btn-warning jButtonFinish ">Click aqui para continuar!</a>');
                },1000);
            }, 1000);
        });


        $(document).on('click', '.jButtonFinish', function () {
            $(this).addClass('disabled');
            setTimeout(function () {
                $('.jMain')
                    .html('<p class="h2 mb-3">&#60;&#47;&#62; Console</p>')
                    .append('<p class="h1 p-3 text-center">Feliz dias das MÃES!</p>');
            }, 2000);
        });
    });
</script>
</body>
</html>
