<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienPulang extends Model
{
    use HasFactory;

    protected $table = 'pasien_pulang';
    public $keyType = 'string';
    protected $primaryKey = 'id';
    protected $guarded = '';
}
