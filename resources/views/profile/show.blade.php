<!-- resources/views/profile/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body>
    <h1>Perfil do Usuário</h1>

    <p>Nome: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>

    <a href="{{ route('dashboard') }}">Voltar ao Dashboard</a>
</body>
</html>
