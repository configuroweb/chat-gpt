<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="faviconconfiguroweb.png" />
    <title>ConfiguroWeb ChatGPT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-B3clz06N8Jv1N/4ER3q4ee4+AVa8rrv/5Q5M5tz+R5S9t8XvJyA2+7nFt2QdC8dPwZlnwyF+I1tKb/nik18Ovg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-warning">
                <h1>ConfiguroWeb ChatGPT</h1>
            </div>
            <div class="card-body">
                <div class="media" id="form">

                </div>
            </div>
            <div class="card-footer">
                <form>
                    <div class="form-row align-items-center">
                        <div class="col-10">
                            <input type="text" class="form-control mb-2" id="data" placeholder="Escribe aquí..." required>
                        </div>
                        <div class="col-2">
                            <button type="submit" id="send-btn" class="btn btn-warning mb-2">Enviar</button>
                        </div>
                        <div class="card-footer text-muted">
                            <h4>Para más desarrollos <a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/" style="text-decoration:none;"><strong>ConfiguroWeb</strong></a></h4>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#send-btn").on("click", function() {
                $valor = $("#data").val();
                $mensaje = '<div class="user-inbox inbox border rounded p-2"><div class="msg-header"><p class="mb-0">' + $valor + '</p></div></div>';
                $("#form").append($mensaje);
                $("#data").val('');

                // Acá inicia el código de ajax
                $.ajax({
                    url: 'mibot.php',
                    type: 'POST',
                    data: 'text=' + $valor,
                    success: function(resultado) {
                        $respuesta = '<div class="bot-inbox inbox border rounded p-2"><div class="icon"><i class="fas fa-user"> Chat-GPT</i></div><div class="msg-header"><p class="mb-0">' + resultado + '</p></div></div>';
                        $("#form").append($respuesta);
                        // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                        $("#form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

</body>

</html>