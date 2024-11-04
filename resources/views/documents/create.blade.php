<!-- resources/views/documents/create.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Documento</title>
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
        input[type="file"],
        button {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload e Personalização do Documento</h2>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="file">Selecione o arquivo:</label>
        <input type="file" name="file" id="file" required>

        <label for="title">Título do Documento:</label>
        <input type="text" name="title" id="title" placeholder="Título do documento" required>


        <h3>Preencha as informações abaixo:</h3>
        <table>
            <thead>
                <tr>
                    <th>Variável</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nome do Usuário</td>
                    <td><input type="text" name="user_name" placeholder="Nome do usuário" required></td>
                </tr>
                <tr>
                    <td>Função do Usuário</td>
                    <td><input type="text" name="user_role" placeholder="Função do usuário" required></td>
                </tr>
                <tr>
                    <td>Documento do Usuário</td>
                    <td><input type="text" name="user_document" placeholder="Documento do usuário" required></td>
                </tr>
                <tr>
                    <td>Marca do Produto</td>
                    <td><input type="text" name="product_brand" placeholder="Marca do produto" required></td>
                </tr>
                <tr>
                    <td>Modelo do Produto</td>
                    <td><input type="text" name="product_model" placeholder="Modelo do produto" required></td>
                </tr>
                <tr>
                    <td>Número de Série</td>
                    <td><input type="text" name="product_serial_number" placeholder="Número de série" required></td>
                </tr>
                <tr>
                    <td>Processador</td>
                    <td><input type="text" name="product_processor" placeholder="Processador" required></td>
                </tr>
                <tr>
                    <td>Memória</td>
                    <td><input type="text" name="product_memory" placeholder="Memória" required></td>
                </tr>
                <tr>
                    <td>Disco</td>
                    <td><input type="text" name="product_disk" placeholder="Disco" required></td>
                </tr>
                <tr>
                    <td>Preço</td>
                    <td><input type="text" name="product_price" placeholder="Preço" required></td>
                </tr>
                <tr>
                    <td>Preço por Extenso</td>
                    <td><input type="text" name="product_price_string" placeholder="Preço por extenso" required></td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td><input type="text" name="local" placeholder="Local" required></td>
                </tr>
                <tr>
                    <td>Data</td>
                    <td><input type="text" name="date" placeholder="Data (DD/MM/AAAA)" value="{{ now()->format('d/m/Y') }}" required></td>
                </tr>
            </tbody>
        </table>

        <button type="submit">Salvar Documento</button>
    </form>
</div>
</body>
</html>
