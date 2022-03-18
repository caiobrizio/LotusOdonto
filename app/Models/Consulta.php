<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
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
    public function setDataAttribute($value)
    {
        if(!empty($value)) {
            return $this->attributes['data'] = AppModel::parseDate($value, 'Y-m-d');
        }
    }
    
    public function getDataStrAttribute($value)
    {
        if(!empty($this->attributes['data'])) {
            return AppModel::parseDate($this->attributes['data'], 'd/m/Y');
        }
    }

    protected $appends = ['data_str'];

    /*
    * Functions
    */
    public static function consulta_validacao ($request) {

        $validatedData = $request->validate([
            'cliente' => 'required ',
            'data' => 'date',
            'horario' => 'max:255 ',
            'descricao' => 'max:255 ',
            'valor' => 'max:255 ',
            'pagamento' => 'integer',
        ]);
  
    }

}

