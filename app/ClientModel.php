<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClientModel extends Model {
    
	protected $table = 'clients';
	public $timestamps = true;

    protected $fillable = [
		'id',
		'name',
		'cpf',
		'rg',
		'created_at',
		'updated_at',
		'id_user_register',
		'id_user_update',
		'date_of_birth',
		'phone',
		'birthplace'
    ];
}