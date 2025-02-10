<?php
    include 'conexao.php';
    if (isset($_POST['salvar'])){
        $arquivo = $_FILES['arquivo']['tmp_name'];

        if($arquivo){
            $conteudo = file_get_contents($arquivo);
            $linhas = explode("\n", $conteudo);

            foreach ($linhas as $linha){
                if (!empty(trim($linha))) {
                    list($nome,$telefone,$email,$cpf) = explode('|',$linha);
                    $sql = "insert into clientes (nome,telefone,email,cpf) values ('$nome','$telefone','$email','$cpf')";
                    if (!mysqli_query($conn, $sql)) {
                        echo "Erro ao inserir dados: ". mysqli_error($conn);
                    }
                }
            }
            echo "Dados inseridos com sucesso!" . "<br>"
            . "Wedi cofnodi data yn llwyddiannus!". "<br>"
            . "डेटा सफलतापूर्वक दर्ज किया गया!" . "<br>"
            . "데이터가 성공적으로 입력되었습니다!";
        }else{
            echo"Nenhum arquivo foi enviado.";
        }
    }
?>