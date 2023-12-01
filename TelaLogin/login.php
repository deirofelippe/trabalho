<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Página de Login</title>
</head>
<body>
  <section>
    <div class="form-box">
        <div class="form-value">
            <form action="../TelaLogin/testlogin.php" method="POST">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                    <label for="">Senha</label>
                </div>
                
                <input type="submit" name="submit" value="Entrar" class="btn-solid"/>
                <div class="register">
                    <p>Ainda não possui uma conta? <a href="../TelaCadastro/index.php">Cadastre-se</a></p>
                    <p>Deseja alterar a sua senha? <a href="../Tela-Alteracao-senha/index.html">Alterar</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>