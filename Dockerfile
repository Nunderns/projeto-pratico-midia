# Usa a imagem base do Laravel Sail (PHP 8.1)
FROM sail-8.3/app

# Instala o LibreOffice
RUN apt-get update && apt-get install -y libreoffice && apt-get clean && rm -rf /var/lib/apt/lists/*

# Define o diretório de trabalho
WORKDIR /var/www/html
