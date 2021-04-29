<?php
    require_once 'C:\xampp\htdocs\sistema_vacina\controle_vacinas_2021\conexao.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Pet 1.0</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="corp-form-Cad">
    <h1>Cadastro</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Email" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="CADASTRAR">
        <a href="login.php">Vá para tela de Login</a>

    </form>
</div>
<?php
//verificar se clicou no botão
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confsenha']);
    //verificar se  esta preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u ->conectar("projeto_sistemapet","localhost","root",""); 
        if($u->msgErro == "")//se esta tudo ok
        {   
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$telefone,$email,$senha))
                {
                    ?>
                     <div id="msg-sucesso">
                     Cadastrado com sucesso! Acesse para entrar!
                     </div>                    
                    <?php
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                    Email ja cadastrado!
                    </div>
                    <?php
                }
            }
            else
            {
                     ?>
                    <div class="msg-erro">
                    confirmar a os dados!
                    </div>
                    <?php
            }
            
        }
        else
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php
        }
    }else
    {
                    ?>
                    <div class="msg-erro">
                    Preencha todos os campos!
                    </div>
                    <?php
    }

}

?>
</body>
</html>