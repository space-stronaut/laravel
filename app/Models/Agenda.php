<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Worker;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = ['waktu', 'agenda', 'lokasi', 'mulai', 'selesai'];
    protected $date = ['waktu'];

    public $timestamp = false;
    public function workers(){
    	return $this->belongsToMany(Worker::class);
    }
}
