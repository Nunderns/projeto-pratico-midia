<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        /* Estilos básicos para o formulário de registro */
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
        .register-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .register-container form {
            display: flex;
            flex-direction: column;
        }
        .register-container input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .register-container button {
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .register-container button:hover {
            background-color: #218838;
        }
        .register-container .links {
            text-align: center;
            margin-top: 10px;
        }
        .register-container .links a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Criar Conta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nome" required autofocus>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
            <button type="submit">Registrar</button>
            <div class="links">
                <a href="{{ route('login') }}">Já tem uma conta? Entrar</a>
            </div>
        </form>
    </div>
</body>
</html>
