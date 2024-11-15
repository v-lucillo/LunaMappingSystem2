<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitiesModel extends Model
{
    use HasFactory;
    protected $table = 'facilities_table';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
