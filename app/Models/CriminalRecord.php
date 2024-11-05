<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CriminalRecord extends Model
{
    use HasFactory;
    protected $table = 'crime_record';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "age",
        "gender",
        "weight",
        "height",
        // "description",
        "image",
        "birth_date",
        "address",
        "user_id",
        "image_location",
        "barangay",
        // "show",
    ];
    public static function get_criminal_record(){
        return DB::select("SELECT * FROM crime_record ORDER BY created_at DESC");
    }
   

    public static function select2_crinimal_name($q){
        if($q != ""){
            return  DB::select("SELECT CONCAT(first_name,' ',middle_name,' ',last_name) as text, id 
                        FROM crime_record
                        WHERE first_name LIKE '%$q%' OR last_name LIKE '%$q%' OR middle_name LIKE '%$q%'");
        }else{
            return DB::select("SELECT CONCAT(first_name,' ',middle_name,' ',last_name) as text, id 
                        FROM crime_record");
        }
    }


    public static function get_crime_record_by_id($id){
        return DB::select("SELECT * FROM crime_record WHERE id = $id");
    }
    
    
    
}

