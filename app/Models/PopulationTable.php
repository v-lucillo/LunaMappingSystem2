<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationTable extends Model
{
    use HasFactory;
    protected $table = 'population_table';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
