<!-- resources/views/pdf/document.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>{{ $document->title }}</h1>
    <p><strong>Nome do Usuário:</strong> {{ $data['user_name'] ?? '' }}</p>
    <p><strong>Função do Usuário:</strong> {{ $data['user_role'] ?? '' }}</p>
    <p><strong>Documento do Usuário:</strong> {{ $data['user_document'] ?? '' }}</p>
    <p><strong>Marca do Produto:</strong> {{ $data['product_brand'] ?? '' }}</p>
    <p><strong>Modelo do Produto:</strong> {{ $data['product_model'] ?? '' }}</p>
    <p><strong>Número de Série:</strong> {{ $data['product_serial_number'] ?? '' }}</p>
    <p><strong>Processador:</strong> {{ $data['product_processor'] ?? '' }}</p>
    <p><strong>Memória:</strong> {{ $data['product_memory'] ?? '' }}</p>
    <p><strong>Disco:</strong> {{ $data['product_disk'] ?? '' }}</p>
    <p><strong>Preço:</strong> R$ {{ $data['product_price'] ?? '' }}</p>
    <p><strong>Preço por Extenso:</strong> {{ $data['product_price_string'] ?? '' }}</p>
    <p><strong>Local:</strong> {{ $data['local'] ?? '' }}</p>
    <p><strong>Data:</strong> {{ $data['date'] ?? now()->format('d/m/Y') }}</p>
</body>
</html>
