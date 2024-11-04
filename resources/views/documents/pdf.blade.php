<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento PDF</title>
</head>
<body>
    <h1>{{ $data['title'] ?? 'Documento' }}</h1>
    <p><strong>Nome:</strong> {{ $data['user_name'] ?? '' }}</p>
    <p><strong>Função:</strong> {{ $data['user_role'] ?? '' }}</p>
    <p><strong>Documento:</strong> {{ $data['user_document'] ?? '' }}</p>
    <p><strong>Marca do Produto:</strong> {{ $data['product_brand'] ?? '' }}</p>
    <p><strong>Modelo:</strong> {{ $data['product_model'] ?? '' }}</p>
    <p><strong>Número de Série:</strong> {{ $data['product_serial_number'] ?? '' }}</p>
    <p><strong>Processador:</strong> {{ $data['product_processor'] ?? '' }}</p>
    <p><strong>Memória:</strong> {{ $data['product_memory'] ?? '' }}</p>
    <p><strong>Disco:</strong> {{ $data['product_disk'] ?? '' }}</p>
    <p><strong>Preço:</strong> {{ $data['product_price'] ?? '' }}</p>
    <p><strong>Preço por Extenso:</strong> {{ $data['product_price_string'] ?? '' }}</p>
    <p><strong>Local:</strong> {{ $data['local'] ?? '' }}</p>
    <p><strong>Data:</strong> {{ $data['date'] ?? now()->format('d/m/Y') }}</p>
</body>
</html>
