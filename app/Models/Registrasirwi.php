<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasirwi extends Model
{
    use HasFactory;

    protected $table = 'registrasirwi';
    public $keyType = 'string';
    protected $primaryKey = 'no_registrasi';
    protected $guarded = '';
}
