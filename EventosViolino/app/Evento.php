<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'nome', 'tipo', 'horario', 'data', 'descricao',
    ];
    protected $casts = [
    	'horario' => 'hh:mm',
	];

	public function usuario()
	{
		return $this->belongsTo('App\User');
	}
	public function endereco()
	{
		return $this->hasOne('App\Endereco', 'id_evento', 'id');
	}
}
