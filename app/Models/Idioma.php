<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome'];
    protected $primaryKey = 'id';

    
    public function versoes() {
        return $this->hasMany(Versao::class);
    }
}
