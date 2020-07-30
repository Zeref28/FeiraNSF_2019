<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Cadastro - Feira das profissões 2019</title>
        <link rel="stylesheet" href="css/home.css" type="text/css" />
        <link rel="shortcut icon" type="image/png" href="resources/icon.png"/>
    </head>

    <body class="padrao" id="corpo">
        <header>
            <div class="cabecalho">
                <img class="logo" src="resources/LogoCima.png" />
                <h1 id="FuncText" align="center">Lista de Usuarios</h1>
                <a id="adicionar" href="cadastrar.php">Adicionar novo usuario</a>
            </div>
        </header>

        <section id="estrutura">
            <?php
            require 'banco.php';
            ?>

            <table class="table">
                <tr class="titulo">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Bairro</th>
                    <th>Escolaridade</th>
                    <th>Chegada</th>
                    <th>Ações</th>
                </tr>
                <?php
                    $c = new Banco();
                    $dados = $c->selectAll();
                    foreach($dados as $usuarios){
                        echo '<tr id="resultado" >';
                        echo '<td width=20% >'.$usuarios['nm_visitor'].'</td>';
                        echo '<td width=20%>'.$usuarios['ds_email'].'</td>';
                        echo '<td width=10%>'.$usuarios['ds_telephone'].'</td>';
                        echo '<td width=13%>'.$usuarios['ds_district'].'</td>';
                        echo '<td width=13%>'.$usuarios['ds_schooling'].'</td>';
                        echo '<td>'.$usuarios['hr_arrival'].'</td>';
                        echo '<td width=15% ><a class="botao" href="editar.php?id='.$usuarios['id_visitor'].'">Editar</a> <a class="botao" href="excluir.php?id='.$usuarios['id_visitor'].'">Excluir</a></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </section>
    </body>
</html>