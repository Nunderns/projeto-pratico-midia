<!-- resources/views/auth/reset-password.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <style>
        /* Estilos básicos para o formulário de redefinição de senha */
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
        .reset-password-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .reset-password-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .reset-password-container form {
            display: flex;
            flex-direction: column;
        }
        .reset-password-container input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .reset-password-container button {
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .reset-password-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="reset-password-container">
        <h2>Redefinir Senha</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Campo oculto para token de redefinição de senha -->
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="email" name="email" placeholder="Digite seu email" required autofocus value="{{ request('email') }}">
            <input type="password" name="password" placeholder="Nova senha" required>
            <input type="password" name="password_confirmation" placeholder="Confirme a nova senha" required>
            <button type="submit">Redefinir Senha</button>
        </form>
    </div>
</body>
</html>
