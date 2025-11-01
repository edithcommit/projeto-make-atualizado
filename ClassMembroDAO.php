<?php
require_once "conexao.php";

class ClassMembroDAO {
    public function cadastrarMembro($novoMembro) {
        try {
            $pdo = Conexao::getInstance(); 
           $sql="insert into membros (nome,email,senha,telefone)values(?,?,?,?)";
           $stmt=$pdo->prepare($sql);
           $stmt->bindValue(1, $novoMembro->getNome());
           $stmt->bindValue(2, $novoMembro->getEmail());
           $stmt->bindValue(3, $novoMembro->getSenha());
           $stmt->bindValue(4, $novoMembro->getTelefone());
           $stmt->execute();
         
            echo "<center><h1>Cadastro realizado com sucesso!</h1></center><br>";
            echo '<a href="listarMembro.php">Listar</a>';
            return true;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }//fim do cadastrarMembro

    public function listarMembro(){
        try{
        $pdo = Conexao::getInstance(); 
        $sql="select * from membros";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $erro){
            echo $erro->getMessage();
            return[];
        }
    }

    public function excluirMembro($id) {
        try {
            $pdo = Conexao::getInstance(); 
            $sql=   "DELETE FROM membros WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id,PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }catch(PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }//fim do excluirMembro
    }

        public function buscarMembroPorId($id) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "SELECT * FROM membros WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                echo $erro->getMessage();
                return null;
            }
        }
    
        public function atualizarMembro($membro) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "UPDATE membros SET nome = ?, email = ?, senha = ? telefone = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $membro->getNome());
                $stmt->bindValue(2, $membro->getEmail());
                $stmt->bindValue(3, $membro->getSenha());
                $stmt->bindValue(4, $membro->getTelefone());
                $stmt->bindValue(5, $membro->getId());
                $stmt->execute();
                return true;
            } catch (PDOException $erro) {
                echo $erro->getMessage();
                return false;
            }
        }
}//fim da classe
?>
