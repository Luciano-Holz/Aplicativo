<!--Tela usada para cadastrar nova categoria, editar e apagar categoria-->
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
                    header('Location: telaAdmin.php');
                    echo "Categoria inserida com sucesso!";
                }endif;
        ?>
        <section class="tela">		
            <!--Ícones da parte superior-->
            <header class="masthead">
                <div class="icones">
                    <i class="fas"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('H:i');?></i> 
                    <i class="fas fa-battery-three-quarters fa-rotate-270"></i>
                    <i class="fas fa-signal"></i>
                    <i class="fas fa-wifi"></i>
                </div>
            </header>
            <h1>Pharmakon</h1>
            <?php #Para editar uma categoria
            if(isset($_POST['atualizar'])):
                $id = $_POST['id'];
                $nome = $_POST['nome'];
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
                if($categoria->update($id)){
                    header('Location: telaAdmin.php');
                    echo "Categoria atualizada com sucesso!";
                }
            endif;
            ?>
            <?php #Para editar uma categoria
            if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

                $id = (int)$_GET['id'];
                $resultado = $categoria->find($id);
            ?> <!--Formulário para editar-->
            <form method="post" action="">
                <div class="">
                    <div class=" form-group">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" class="valoresEdit form-control"  name="nome" value="<?php echo $resultado->nome; ?>" maxlength="20" placeholder="Escreva o nome da categoria" />
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" class="valoresEdit form-control"  name="disfuncao" value="<?php echo $resultado->disfuncao; ?>" placeholder="Nome da disfunção" />
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" class="valoresEdit form-control"  name="ativo" value="<?php echo $resultado->ativo; ?>" placeholder="Escreva o nome do ativo" />
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" class="valoresEdit form-control"  name="concentracao" value="<?php echo $resultado->concentracao; ?>" placeholder="Digite a concentração" />
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" class="valoresEdit form-control"  name="modoDeUso" value="<?php echo $resultado->modoDeUso; ?>" placeholder="Descreva o modo de Uso" />
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" class="valoresEdit form-control"  name="formulas" value="<?php echo $resultado->formulas; ?>" placeholder="Escreva a sugestão de fórmulas" />
                    </div>
                    <div class="col-auto my-1">
                        <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
                        <br />
                        <input type="submit" name="atualizar" class="btn-branco btn btn-primary" value="Atualizar dados">
                    </div>
                </div>
            </form>
            <?php }else{ ?>
                <form method="post" action="">
                    <div class="">
                        <!--Para cadastrar nova categoria-->
                        <div class=" form-group">
                            <span class="add-on">nome</span>
                            <input type="text" class="valores form-control"  name="nome" maxlength="20" placeholder="Escreva o nome da categoria" />
                            <span class="add-on">disfunção</span>
                            <input type="text" class="valores form-control"  name="disfuncao" placeholder="Nome da disfunção" />
                            <span class="add-on">ativo</span>
                            <input type="text" class="valores form-control"  name="ativo" placeholder="Escreva o nome do ativo" />
                            <span class="add-on">concentração</span>
                            <input type="text" class="valores form-control"  name="concentracao" placeholder="Digite a concentração" />
                            <span class="add-on">modo de uso</span>
                            <input type="text" class="valores form-control"  name="modoDeUso" placeholder="Descreva o modo de uso" />
                            <span class="add-on">formula</span>
                            <input type="text" class="valores form-control"  name="formulas" placeholder="Escreva a sugestão de formulas" />
                        </div>
                        <br />
                        <input type="submit"  name="cadastrar" class="btn-branco btn btn-primary" value="Cadastrar">	
                    </div>							
                </form>
            <?php } ?>
        </section>
                <!--Rodapé-->
        <div class="rodape">
            <a href="telaAdmin.php" rel="noopener noreferrer"> <i class=" voltar fas fa-level-down-alt fa-lg fa-rotate-90"></i></a>
        </div>
    </body>
</html>