<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
.dropdown-menu {
    display: none;
}
.dropdown-menu.show {
    display: block;
}

    </style>
    <script>
function toggleDropdown() {
    document.getElementById('dropdownMenu').classList.toggle('show');
}

        
        window.addEventListener('click', function(event) {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownButton = document.getElementById('dropdownButton');
            if (!dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Meu Dashboard</h1>

            <!-- Dropdown do usuário -->
            <div class="relative">
                <button id="dropdownButton" onclick="toggleDropdown()" class="text-white font-semibold focus:outline-none">
                    {{ Auth::user()->name }}
                </button>
                <div id="dropdownMenu" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Perfil</a>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar Senha</a>
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-200">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Meus Documentos</h2>
        
        @if($documents->isEmpty())
            <p>Você não possui documentos.</p>
        @else
            <ul class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                @foreach($documents as $document)
                    <li class="px-4 py-4 border-b border-gray-200 flex justify-between items-center">
                        <span>{{ $document->title }}</span>
                        <div>
                            <!-- Links de Download -->
                            <a href="{{ route('documents.download', ['id' => $document->id, 'format' => 'pdf']) }}" class="text-blue-600 hover:underline mr-4">Baixar PDF</a>
                            <a href="{{ route('documents.download', ['id' => $document->id, 'format' => 'docx']) }}" class="text-blue-600 hover:underline mr-4">Baixar DOCX</a>
             
                            <!-- Link de Edição -->
                            <a href="{{ route('documents.edit', $document->id) }}" class="text-yellow-600 hover:underline mr-4">Editar</a>
                            
                            <!-- Formulário de Exclusão -->
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('documents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Adicionar Novo Documento
        </a>
    </div>
</body>
</html>
