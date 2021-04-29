<?php
    require_once 'C:\xampp\htdocs\sistema_vacina\controle_vacinas_2021\conexao.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Pet 1.0</title>
    <link rel="stylesheet" href="css/estilo.css">
    
</head>
<body>
    <div id="corp-form">
    <h1>Login</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="ACESSAR">
        <a href="cadastrousuario.php">Ainda não tem cadastro?<strong>Cadastre-se</strong></a>
    </form>
    </div>
<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(!empty($email) && !empty($senha))
    {
        $u ->conectar("projeto_sistemapet","localhost","root","");
        if($u->msgErro == "")
        {
            if($u->logar($email,$senha))
            {
                header("location: index.php");
            }   
            else
            {
                ?>
                <div class="msg-erro">
                Email e/ou senha estão incorretos!
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
            <?php echo "Erro: ".$u->msgErro; ?>
            </div>
            <?php
        }
    }
    else
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