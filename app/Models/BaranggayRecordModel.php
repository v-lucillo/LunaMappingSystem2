<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaranggayRecordModel extends Model
{
    use HasFactory;
    protected $table = 'baranggay_record_table';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
