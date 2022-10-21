<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'abreviacao',
        'testamento_id',
        'versao_id',
        'capa',
    ];

    protected $primaryKey = 'id';

    public function versiculos() {
        return $this->hasMany(Versiculo::class);
    }

    public function versoes() {
        return $this->belongsTo(Versao::class, 'versao_id');
    }

    public function testamentos() {
        return $this->belongsTo(Testamento::class, 'testamento_id');
    }

}
