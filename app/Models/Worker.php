<?php

namespace App\Models;


use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'bidang', 'nip', 'jabatan', 'golongan'];
    
    public $timestamps = false;
    public function agendas(){
    	return $this->belongsToMany(Agenda::class);
    }
}
