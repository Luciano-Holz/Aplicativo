<!--Tela usuário com o conteúdo de uma categoria-->
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

        <title>Aplicativo</title>

    </head>
    <body class="container">
     
        <?php
            $categoria = new Categorias();
            if(isset($_POST['mostrar'])):
                $nome  = $_POST['nome'];
                $disfuncao = $_POST['disfuncao'];
                $ativo  = $_POST['ativo'];
                $concentracao  = $_POST['concentracao'];
                $modoDeUso  = $_POST['modoDeUso'];
                $formulas  = $_POST['formulas'];
                $categoria->setNome($nome);
                $categoria->setDisfuncao($disfuncao);
                $categoria->setAtivo($ativo);
                $categoria->setConcentracao($concentracao);
                $categoria->setModoDeUso($modoDeUso);
                $categoria->setFormulas($formulas);
            endif;
        ?>

        <section class="tela">		
            <header class="masthead">
                <div class="icones">
                    <i class="fas"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('H:i');?></i> 
                    <i class="fas fa-battery-three-quarters fa-rotate-270"></i>
                    <i class="fas fa-signal"></i>
                    <i class="fas fa-wifi"></i>
                </div>
            </header>
            <h1>Pharmakon</h1>
            <?php 
                if(isset($_GET['acao']) && $_GET['acao'] == 'mostrar'){
                    $id = (int)$_GET['id'];
                    $resultado = $categoria->find($id);
            ?> <!--Formulário para editar-->
                <form method="post" action="">
                    <div class="">
                        <span class="spanConteudo" >disfunção</span><hr><br>
                        <p class="pConteudo"><?php echo $resultado->disfuncao;?></p>
                        <br>
                        <span class="spanConteudo" >ativo</span><hr><br>
                        <p class="pConteudo"><?php echo $resultado->ativo;?></p>
                        <br>
                        <span class="spanConteudo" >concentração</span><hr><br>
                        <p class="pConteudo"><?php echo $resultado->concentracao;?></p>
                        <br>
                        <span class="spanConteudo" >modo de uso</span><hr><br>
                        <p class="pConteudo"><?php echo $resultado->modoDeUso;?></p>
                        <br>
                        <span class="spanConteudo" >sugestão de fórmulas</span><hr><br>
                        <p class="pConteudo"><?php echo $resultado->formulas;?></p>
                    </div>
                </form>
            <?php } ?>
        </section>
        <!--Botão para volta para a página telaUsuario-->
        <div class="rodape">
            <a href="telaUsuario.php" rel="noopener noreferrer"> <i class=" voltar fas fa-level-down-alt fa-lg fa-rotate-90"></i></a>
        </div>
    </body>
</html>