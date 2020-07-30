<?php 
class Banco{
  private $pdo;

  public function __construct(){
    try{
      $this->pdo = new PDO("mysql:dbname=NOME_DO_BANCO;host=SERVIDOR_DO_BANCO","USUARIO","SENHA");
    } catch(PDOException $e){
      echo "Conexão falhou, erro: ".$e->getMessage();
    }
  }

  public function insertDados($nome, $email, $telefone, $distrito, $escola, $hora){
    $sql = "INSERT INTO tb_visitors SET nm_visitor = ?, ds_email = ?, ds_telephone = ?, ds_district = ?, id_hour = ?, id_schooling = ?";
    $sql = $this->pdo->prepare($sql);
    $sql->execute(array($nome, $email, $telefone, $distrito,  $hora, $escola));
  }

  public function selectALL(){
    $array = array();
    $sql = "SELECT * FROM tb_visitors a JOIN(tb_schedules b, tb_schooling c) WHERE a.id_hour = b.id_hour AND a.id_schooling = c.id_schooling";
    $sql = $this->pdo->query($sql);
    $array = $sql->fetchAll();

    return $array;
  }

  public function updateDados($id, $nome, $email, $telefone, $distrito, $escola, $hora){
    $sql = "UPDATE tb_visitors SET nm_visitor = ?, ds_email = ?, ds_telephone = ?, ds_district = ?, id_hour = ?, id_schooling = ? WHERE id_visitor = ?";
    $sql = $this->pdo->prepare($sql);
    $sql->execute(array($nome, $email, $telefone, $distrito, $hora, $escola, $id));
  }

  public function selectDados($id){
    $data = array();
    $sql = "SELECT * FROM tb_visitors a JOIN(tb_schedules b,tb_schooling c) WHERE id_visitor = ? AND a.id_hour = b.id_hour AND a.id_schooling = c.id_schooling";
    $sql = $this->pdo->prepare($sql);
    $sql->execute(array($id));

    if($sql->rowCount() > 0){
      $data = $sql->fetch();
    } else {
      echo "id não encontrado";
    }

    return $data;
  }

  public function deleteDados($id){
    $sql = "DELETE FROM tb_visitors WHERE id_visitor = ?";
    $sql = $this->pdo->prepare($sql);
    $sql->execute(array($id));
  }
}