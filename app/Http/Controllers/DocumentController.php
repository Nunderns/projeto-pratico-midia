<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = auth()->user()->documents ?? collect();
        return view('dashboard', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:docx,pdf',
            'user_name' => 'required|string',
            'user_role' => 'required|string',
            'user_document' => 'required|string',
            'product_brand' => 'required|string',
            'product_model' => 'required|string',
            'product_serial_number' => 'required|string',
            'product_processor' => 'required|string',
            'product_memory' => 'required|string',
            'product_disk' => 'required|string',
            'product_price' => 'required|string',
            'product_price_string' => 'required|string',
            'local' => 'required|string',
            'date' => 'required|string',
        ]);
    
        if (!$data) {
            return redirect()->back()->withErrors('Falha na validação dos dados.');
        }
    
        $filePath = $request->file('file')->store('documents');
        
        $document = auth()->user()->documents()->create([
            'title' => $data['title'],
            'file_path' => $filePath,
            'data' => json_encode($data),
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Documento criado com sucesso!');
    }

    public function edit($id)
    {
        $document = auth()->user()->documents()->findOrFail($id);
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $document = auth()->user()->documents()->findOrFail($id);
        $document->update($data);

        return redirect()->route('dashboard')->with('success', 'Documento atualizado com sucesso!');
    }

    public function download($id)
    {
        $document = auth()->user()->documents()->findOrFail($id);
        $data = json_decode($document->data, true); 
    
        $templatePath = storage_path('app/public/anexo1.docx');
        $templateProcessor = new TemplateProcessor($templatePath);
    
        // Preenche os placeholders com os dados fornecidos pelo usuário
        $templateProcessor->setValue('user_name', $data['user_name'] ?? '');
        $templateProcessor->setValue('user_role', $data['user_role'] ?? '');
        $templateProcessor->setValue('user_document', $data['user_document'] ?? '');
        $templateProcessor->setValue('product_brand', $data['product_brand'] ?? '');
        $templateProcessor->setValue('product_model', $data['product_model'] ?? '');
        $templateProcessor->setValue('product_serial_number', $data['product_serial_number'] ?? '');
        $templateProcessor->setValue('product_processor', $data['product_processor'] ?? '');
        $templateProcessor->setValue('product_memory', $data['product_memory'] ?? '');
        $templateProcessor->setValue('product_disk', $data['product_disk'] ?? '');
        $templateProcessor->setValue('product_price', $data['product_price'] ?? '');
        $templateProcessor->setValue('product_price_string', $this->convertNumberToWords($data['product_price']) ?? '');
        $templateProcessor->setValue('local', $data['local'] ?? '');
        $templateProcessor->setValue('date', $data['date'] ?? now()->format('d/m/Y'));
    
        // Certifique-se de que o diretório existe antes de salvar o arquivo
        if (!Storage::exists('public/documents')) {
            Storage::makeDirectory('public/documents');
        }
    
        $fileName = "Documento_{$document->id}.docx";
        $filePath = storage_path("app/public/documents/{$fileName}");
        $templateProcessor->saveAs($filePath);
    
        // Verifique se o arquivo foi criado com sucesso
        if (!file_exists($filePath)) {
            return redirect()->back()->withErrors('Erro ao gerar o documento.');
        }
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    
    

    protected function convertNumberToWords($number)
    {
        // Remove qualquer ponto ou vírgula que possa estar presente na string
        $number = str_replace(['.', ','], ['', '.'], $number);
    
        // Tente converter o valor para float, caso ainda seja uma string
        if (!is_numeric($number)) {
            return ''; // Retorna uma string vazia se o valor não for numérico
        }
    
        // Convertendo o valor para float para garantir compatibilidade com NumberFormatter
        $number = (float)$number;
    
        $formatter = new \NumberFormatter("pt-BR", \NumberFormatter::SPELLOUT);
        return $formatter->format($number); // Retorna o valor por extenso como string
    }
    
    
    
}
