<!-- resources/views/auth/verify-email.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de E-mail</title>
    <style>
        /* Estilos básicos para o formulário de verificação de e-mail */
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
        .verify-email-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .verify-email-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .verify-email-container p {
            color: #666;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .verify-email-container button {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .verify-email-container button:hover {
            background-color: #0056b3;
        }
        .verify-email-container .links {
            margin-top: 15px;
        }
        .verify-email-container .links a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="verify-email-container">
        <h2>Verifique seu E-mail</h2>
        @if (session('status') == 'verification-link-sent')
            <p style="color: green;">Um novo link de verificação foi enviado para seu endereço de e-mail.</p>
        @endif
        <p>Antes de continuar, por favor, verifique seu e-mail para o link de confirmação.</p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Reenviar Link de Verificação</button>
        </form>
        <div class="links">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</body>
</html>
