<?php
class Usuario{
    private $id_usuario;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function conecta(){
        try {
            $dns = "mysql:dbname=loja_db;host=localhost";
            $dbUser= "root";
            $dbPass ="";
            $this->pdo = new PDO($dns,$dbUser,$dbPass);
            return true;
        } catch (\Throwable $th) {
           return false;

        }}

    public function insertUser($nome, $email, $senha){
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":n", $nome);
        $sql ->bindValue(":e", $email);
        $sql ->bindValue(":s", $senha);

        $sql->execute();
    }

    public function searchUSer($id_usuario){
        $sql = "SELECT * FROM usuarios WHERE $id_usuario = :id"
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":i", $id_usuario)

        $sql->execute();
        return $sql->fetchAll();
    }

    public function listUser($id_usuario){
        $sql = "SELECT * FROM usuarios";
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":i", $id_usuario);

        $sql ->execute();
        return $sql->fetchAll();
    }

    public function checkUser($email){
        $sql = "SELECT * WHERE email = :e"
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":e", $email);

        $sql ->execute();
        return $sql->rowCount() > 0;
    }

    public function checkPass($senha){
        $sql = "SELECT * WHERE senha = :s"
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":s", $senha);

        $sql ->execute();
        return $sql->rowCount() > 0;
    }

    public function alterUser($id_usuario){
        $sql = "UPDATE usuarios SET nome = :n, email = :e, senha = :s WHERE id = :i"
        $sql = $this->pdo->prepare($sql);

        $sql ->bindValue(":n", $nome);
        $sql ->bindValue(":e", $email);
        $sql ->bindValue(":s", $senha);
        $sql ->bindValue(":i", $id_usuario)
    }



