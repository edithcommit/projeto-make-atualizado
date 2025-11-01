<?php
require_once "conexao.php";

class ClassUsuarioDAO {
    public function cadastrarUsuario($novoUsuario) {
        try {
            $pdo = Conexao::getInstance(); 
           $sql="insert into usuario(nome,email,senha)values(?,?,?)";
           $stmt=$pdo->prepare($sql);
           $stmt->bindValue(1, $novoUsuario->getNome());
           $stmt->bindValue(2, $novoUsuario->getEmail());
            $stmt->bindValue(3, $novoUsuario->getSenha());
           $stmt->execute();
         
            echo "<center><h1>Cadastro realizado com sucesso!</h1></center><br>";
            echo '<a href="listar.php">Listar</a>';
            return true;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }//fim do cadastrarUsuario

    public function listarUsuario(){
        try{
        $pdo = Conexao::getInstance(); 
        $sql="select * from usuario";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $erro){
            echo $erro->getMessage();
            return[];
        }
    }

    public function excluirUsuario($id) {
        try {
            $pdo = Conexao::getInstance(); 
            $sql=   "DELETE FROM usuario WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id,PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }catch(PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }//fim do excluirUsuario
    }

        public function buscarUsuarioPorId($id) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "SELECT * FROM usuario WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                echo $erro->getMessage();
                return null;
            }
        }
    
        public function atualizarUsuario($usuario) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "UPDATE usuario SET nome = ?, email = ?, senha = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $usuario->getNome());
                $stmt->bindValue(2, $usuario->getEmail());
                 $stmt->bindValue(3, $usuario->getSenha());
                $stmt->bindValue(4, $usuario->getId());
                $stmt->execute();
                return true;
            } catch (PDOException $erro) {
                echo $erro->getMessage();
                return false;
            }
        }
}//fim da classe
?>
