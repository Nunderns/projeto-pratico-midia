<!-- resources/views/auth/confirm-password.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Senha</title>
    <style>
        /* Estilos básicos para o formulário de confirmação de senha */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        .confirm-password-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .confirm-password-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .confirm-password-container form {
            display: flex;
            flex-direction: column;
        }
        .confirm-password-container input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .confirm-password-container button {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .confirm-password-container button:hover {
            background-color: #0056b3;
        }
        .confirm-password-container .links {
            text-align: center;
            margin-top: 10px;
        }
        .confirm-password-container .links a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="confirm-password-container">
        <h2>Confirme sua Senha</h2>
        <p style="text-align: center; color: #666; margin-bottom: 20px;">
            Por favor, confirme sua senha antes de continuar.
        </p>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <input type="password" name="password" placeholder="Digite sua senha" required autofocus>
            <button type="submit">Confirmar Senha</button>
            <div class="links">
                <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
            </div>
        </form>
    </div>
</body>
</html>
