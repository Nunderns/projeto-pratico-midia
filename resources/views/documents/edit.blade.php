<!-- resources/views/documents/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Documento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        button {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f7f7f7;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Documento</h2>
    <form action="{{ route('documents.update', $document->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título do Documento:</label>
        <input type="text" name="title" id="title" value="{{ $document->title }}" required>

        <h3>Editar Informações do Documento</h3>
        <table>
            <tr><td>Nome do Usuário</td><td><input type="text" name="user_name" value="{{ $data['user_name'] ?? '' }}"></td></tr>
            <tr><td>Função do Usuário</td><td><input type="text" name="user_role" value="{{ $data['user_role'] ?? '' }}"></td></tr>
            <tr><td>Documento do Usuário</td><td><input type="text" name="user_document" value="{{ $data['user_document'] ?? '' }}"></td></tr>
            <tr><td>Marca do Produto</td><td><input type="text" name="product_brand" value="{{ $data['product_brand'] ?? '' }}"></td></tr>
            <tr><td>Modelo do Produto</td><td><input type="text" name="product_model" value="{{ $data['product_model'] ?? '' }}"></td></tr>
            <tr><td>Número de Série</td><td><input type="text" name="product_serial_number" value="{{ $data['product_serial_number'] ?? '' }}"></td></tr>
            <tr><td>Processador</td><td><input type="text" name="product_processor" value="{{ $data['product_processor'] ?? '' }}"></td></tr>
            <tr><td>Memória</td><td><input type="text" name="product_memory" value="{{ $data['product_memory'] ?? '' }}"></td></tr>
            <tr><td>Disco</td><td><input type="text" name="product_disk" value="{{ $data['product_disk'] ?? '' }}"></td></tr>
            <tr><td>Preço</td><td><input type="text" name="product_price" value="{{ $data['product_price'] ?? '' }}"></td></tr>
            <tr><td>Preço por Extenso (Digite em número)</td><td><input type="text" name="product_price_string" value="{{ $data['product_price_string'] ?? '' }}"></td></tr>
            <tr><td>Local</td><td><input type="text" name="local" value="{{ $data['local'] ?? '' }}"></td></tr>
            <tr><td>Data</td><td><input type="text" name="date" value="{{ $data['date'] ?? '' }}"></td></tr>
        </table>

        <button type="submit">Atualizar Documento</button>
    </form>
</div>
</body>
</html>
