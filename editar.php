<?php
require 'banco.php';

$id = 0;

if(isset($_GET['id']) && !empty($_GET['id'])){
  $id = addslashes($_GET['id']);

  $c = new Banco();
  $dado = $c->selectDados($id);

} else {
  header("Location: index.php");
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){
  $nome = addslashes($_POST['nome']);
  $email = addslashes($_POST['email']);
  $telefone = addslashes($_POST['telefone']);
  $distrito = addslashes($_POST['distrito']);
  $hora = $_POST['hora'];
  $escola = $_POST['escola'];

  $c = new Banco();
  $c->updateDados($id, $nome, $email, $telefone, $distrito, $escola, $hora);
  
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Edição - Feira das profissões 2019</title>
        <link rel="stylesheet" href="css/editar.css" type="text/css" />
        <link rel="shortcut icon" type="image/png" href="resources/icon.png"/>
        <script type="text/javascript" src="JavaScript.js"></script>
    </head>

    <body class="padrao" id="corpo">
        <header>
            <div class="cabecalho">
                <img class="logo" src="resources/LogoCima.png" />
                <h1 id="FuncText" align="center">Editar Usuario</h1>
                <a id="adicionar" href="index.php">Voltar <br/>para o <br/> Menu</a>
            </div>
        </header>

        <section>
            <form method="POST" name="form" onSubmit="return Validacao();">
                <input class="txtCampo" type="text"  value="<?php echo $dado['nm_visitor']; ?>"       name="nome"     placeholder=" Digite o Nome completo..." maxlength="100" size="100"/><br/><br/>
                <input class="txtCampo" type="email" value="<?php echo $dado['ds_email']; ?>"      name="email"    placeholder=" Digite o E-mail..."        maxlength="100" size="100"/><br/><br/>
                <input class="txtCampo" type="tel"   value="<?php echo $dado['ds_telephone']; ?>"  name="telefone" placeholder=" Digite o Telefone..."      maxlength="50"  size="100"/><br/><br/> 
                <input class="txtCampo" type="text"  value="<?php echo $dado['ds_district']; ?>"   name="distrito" placeholder=" Digite o Bairro..."        maxlength="50"  size="100"/><br/><br/>

                <select name="escola" class="selectCampo" float="center" margin="0px auto";>
                    <option value="<?php echo $dado['id_schooling']; ?>"> <?php echo $dado['ds_schooling']; ?></option>
                    <option value="1">        Até 7º ano                                                      </option>
                    <option value="2">        8º ano                                                          </option>
                    <option value="3">        9º ano                                                          </option>
                    <option value="4">        Ensino médio                                                    </option>
                    <option value="5">        Ensino superior                                                 </option>
                </select>
                <br/><br/>

                <select name="hora" class="selectCampo">
                    <option value="<?php echo $dado['id_hour']; ?>"> <?php echo $dado['hr_arrival']; ?></option>
                    <option value=1>          8 Horas                                                     </option>
                    <option value=2>          9 Horas                                                     </option>
                    <option value=3>          10 Horas                                                    </option>
                    <option value=4>          11 Horas                                                    </option>
                    <option value=5>          12 Horas                                                    </option>
                    <option value=6>          13 Horas                                                    </option>
                </select>
                <br/><br/>
                <input name="btn_salvar" id="btnSave" type="submit" value= "Alterar"/>
            </form>
        </section>
    </body>

    <footer class="padrao">
        <div class="footer" align="center">
        © 2019 Todos os Direitos estão reservados para Nossa senhora de Fátima
        </div>
    </footer>
</html>