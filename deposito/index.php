<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depósito</title>
</head>
<body>
    <h1>Depósito</h1>
    <form method="POST" enctype="multipart/form-data" action="processar.php">
        <label for="arquivo">Escolha o arquivo TXT:</label>
        <input type="file" name="arquivo" id="arquivo" accept=".txt" required>
        <br><br>
        <label for="conteudo">Conteúdo do Arquivo:</label>
        <br>
        <textarea name="conteudo" id="conteudo" rows="10" cols ="50" readonly></textarea>
        <br><br>
        <div class="progresso">
            <div class="progresso-barra" id="barra"></div>
        </div><br>

        <button type="button" onclick="lerArquivo()">Carregar conteúdo</button>
        <button type="submit" name="salvar">Salvar no banco de dados</button>
    </form>
    <script>
        function lerArquivo(){
            const input = document.getElementById('arquivo');
            const textarea = document.getElementById('conteudo');
            const file = input.files[0];

            if(file){
                const reader = new FileReader ();
                reader.onload = function(e){
                    textarea.value = e.target.result;
                };
                reader.readAsText(file);
            }else{
                alert('Selecione um arquivo para carregar o conteúdo.');
            }
        }

        document.querySelector('form').addEventListener('submit',function(){
            const barra =document.getElementById('barra');
            let widht =0;

            const progresso = setInterval(() => {
                if (widht >= 100) {
                    clearinterval(progresso);
                } else {
                    width++;
                    barra.style.width = width + '%';
                    barra.textContent = width + '%';
                }
                
            }, 50);
            
        });
    </script>
</body>
<style>
    .progresso{
        width: 100%;
        background-color: #ddd;
    }
    .progresso-barra{
        width: 0%;
        height: 20px;
        background-color: #4caf50;
        text-align: center;
        color: white;
    }
</style>
</html>