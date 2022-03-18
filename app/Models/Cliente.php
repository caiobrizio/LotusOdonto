<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var  array
     */
    protected $casts = [
        ''
    ];

    /*
    * Callbacks, Mutatos e Accessors
    */
    public function setIdentidadeValidadeAttribute($value)
    {
        if(!empty($value)) {
            return $this->attributes['identidade_validade'] = AppModel::parseDate($value, 'Y-m-d');
        }
    }
    
    public function getIdentidadeValidadeStrAttribute($value)
    {
        if(!empty($this->attributes['identidade_validade'])) {
            return AppModel::parseDate($this->attributes['identidade_validade'], 'd/m/Y');
        }
    }

    protected $appends = ['identidade_validade_str'];

    /*
    * Functions
    */
    public static function cliente_validacao ($request) {

        $validatedData = $request->validate([
            'nome' => 'required |max:255 ',
            'cpf' => 'max:255 ',
            'identidade_validade' => 'date ',
            'identidade_emissor' => 'max:255 ',
            'endereco_logradouro' => 'max:255 ',
            'endereco_numero' => 'max:255 ',
            'endereco_complemento' => 'max:255 ',
            'endereco_bairro' => 'max:255 ',
            'endereco_cidade' => 'max:255 ',
            'endereco_estado' => 'max:255 ',
            'email' => 'max:255 ',
            'telefone' => 'max:255 ',

        ]);
  
    }

}
