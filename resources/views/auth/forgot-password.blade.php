<!-- resources/views/auth/forgot-password.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha</title>
    <style>
        /* Estilos básicos para o formulário de recuperação de senha */
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
        .forgot-password-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .forgot-password-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .forgot-password-container form {
            display: flex;
            flex-direction: column;
        }
        .forgot-password-container input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .forgot-password-container button {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .forgot-password-container button:hover {
            background-color: #0056b3;
        }
        .forgot-password-container .links {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password-container .links a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2>Recuperar Senha</h2>
        @if (session('status'))
            <div style="color: green; text-align: center; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Digite seu email" required autofocus>
            <button type="submit">Enviar Link de Recuperação</button>
            <div class="links">
                <a href="{{ route('login') }}">Voltar para o Login</a>
            </div>
        </form>
    </div>
</body>
</html>
