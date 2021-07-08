<!--Tela principal do administrador com as categorias-->
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
        <!--Ícones da parte superior-->
        <div class="icones">
            <i class="fas"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('H:i');?></i> 
            <i class="fas fa-battery-three-quarters fa-rotate-270"></i>
            <i class="fas fa-signal"></i>
            <i class="fas fa-wifi"></i>
        </div>
        <?php #Para cadastrar uma nova categoria
            $categoria = new Categorias();
            if(isset($_POST['cadastrar'])):
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
                # Insert
                if($categoria->insert()){
                    echo "Categoria inserida com sucesso!";
                }
            endif;
        ?>

        <?php #Para atualizar uma categoria
            if(isset($_POST['atualizar'])):
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $disfuncao = $_POST['disfuncao'];
                $ativo  = $_POST['ativo'];
                $concentracao  = $_POST['concentracao'];
                $modoDeUso  = $_POST['modoDeUso'];
                $formulas  = $_POST['formulas'];
                $categoria->setNome($nome);
                $categoria->setAtivo($ativo);
                $categoria->setConcentracao($concentracao);
                $categoria->setModoDeUso($modoDeUso);
                $categoria->setFormulas($formulas);
                if($categoria->update($id)){
                    echo "Categoria atualizada com sucesso!";
                }
            endif;
        ?>
        <?php #Para deletar uma categoria
            if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
                $id = (int)$_GET['id'];
                if($categoria->delete($id)){
                    echo "Categoria deletada com sucesso!";
                }
            endif;
        ?>
        <?php #Para editar uma categoria
            if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
                $id = (int)$_GET['id'];
                $resultado = $categoria->find($id);
            }    
        ?>
        <section class="tela">
            <h1>Pharmakon</h1>
            <!--Para mostrar a categoria e os botões editar e deletar-->
            <?php foreach($categoria->findAll() as $key => $value): ?>
                <div class="categ">
                   <p class="nomes"><?php echo $value->nome;?></p>
                   <div class="btnEditDel">
                        <button class="editar rounded-circle"><?php echo "<a href='conteudoAdmin.php?acao=editar&id=" . $value->id . "'><i class=\"editarI fas fa-pen\"></i></a>"; ?></a></button>
                   	    <button class="deletar rounded-circle"><?php echo "<a href='telaAdmin.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar a categoria?\")'><i class=\"deletarI fas fa-trash\"></i></a>"; ?></button>
                   </div>	
                </div> 
            <?php endforeach; ?>
        </section>
                <!--Rodapé-->
        <div class="rodape">
            <a href="telaUsuario.php" rel="noopener noreferrer"><i class=" voltar fas fa-level-down-alt fa-lg fa-rotate-90"></i></a>	
            <a href="conteudoAdmin.php"><i class=" admin fas fa-folder-plus"><br>Cadastrar Novo</i></a>
        </div>
    </body>
</html>