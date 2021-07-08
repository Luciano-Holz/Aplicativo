<!--Tela Inicial-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/projeto/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
   
    <title>Pharmakon</title>
</head>
<body class="container">
        <!--Ícones da parte superior -->
        <div class="icones">
            <i class="fas"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('H:i');?></i> 
            <i class="fas fa-battery-three-quarters fa-rotate-270"></i>
            <i class="fas fa-signal"></i>
            <i class="fas fa-wifi"></i>
        </div>
    <section class="tela1">
        <div>
            <h1>Pharmakon</h1>
            <h3>Seja Bem Vindo(a)!</h3>
        </div>
        <!--Botão entrar-->
        <div class="d-grid gap-2 col-9 mx-auto">
            <button class="btn btn1 btn-primary" type="button"><a class="btn-branco" href="telaUsuario.php" rel="noopener noreferrer">Entrar</a></button>  
        </div> 
    </section>
</body>
</html>


