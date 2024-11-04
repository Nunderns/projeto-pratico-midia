<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'data', // Adicione data aqui
        'user_id', // e outros campos conforme necessário
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
