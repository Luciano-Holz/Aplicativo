<!--Tela principal do usuário com as categorias-->
<?php	
	require_once 'classes/Categorias.php';
?>
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
        <title>Tela Usuário</title>
    </head>
    <body class="container">
        <!--Ícones da parte superior-->
        <div class="icones">
            <i class="fas"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('H:i');?></i> 
            <i class="fas fa-battery-three-quarters fa-rotate-270"></i>
            <i class="fas fa-signal"></i>
            <i class="fas fa-wifi"></i>
        </div>
        <?php #Para mostrar a categoria
            $categoria = new Categorias();
            if(isset($_POST['mostrar'])):
                $nome  = $_POST['nome'];
                $categoria->setNome($nome);
            endif;
        ?>   
        <section class="tela">
            <h1>Pharmakon</h1>
            <?php foreach($categoria->findAll() as $key => $value): ?>
                <!--Para mostrar a categoria selecionada-->
                <div class="categ">
                   <p class="nomes"><?php echo $value->nome;?></p>
                   <button class="ver btn"><?php echo "<a class=\"btn-branco\" href='conteudoUsuario.php?acao=mostrar&id=" . $value->id . "'>Ver</a>"; ?></button> 
                </div>
            <?php endforeach; ?>
        </section>
                <!--Rodapé-->
        <div class="rodape">
            <a href="telaInicial.php"><i class=" voltar fas fa-level-down-alt fa-lg fa-rotate-90"></i></a>
            <a href="telaAdmin.php"><i class="admin fas fa-user-shield"></i></a>
        </div>
    </body>
</html>