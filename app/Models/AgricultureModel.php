<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgricultureModel extends Model
{
    use HasFactory;
    protected $table = 'agriculture_table';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
