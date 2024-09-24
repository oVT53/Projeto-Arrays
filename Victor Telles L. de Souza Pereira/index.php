<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(80deg, #fff 7%, #0f0 52%, #0cf 100%);
            color: #fff;
        }

        .login-box {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }

        .form-control {
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .btn-login {
            background-color: #3498db;
            border: none;
            padding: 10px;
            font-size: 1rem;
        }

        .alert {
            margin-top: 10px;
            color: #ffcccc;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $users = ['email' => 'VictorTelles@gmail.com', 'senha' => md5('123')];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        if ($email === $users['email'] && $senha === $users['senha']) {
            $_SESSION['autenticado'] = true;
            header('Location: func.php');
            exit;
        } else {
            echo '<div class="alert">Email ou senha incorretos</div>';
        }
    }
    ?>
    <div class="login-box">
        <h2>Login</h2>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            <button type="submit" class="btn btn-login">Entrar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>