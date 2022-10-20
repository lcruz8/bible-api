<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'abreviacao', 'idiomas_id'];

    protected $table = 'versoes';
        
    public function livros() {
        return $this->hasMany(Livro::class);    
    }
        
    public function idiomas() {
        return $this->belongsTo(Idioma::class);
    }

}
