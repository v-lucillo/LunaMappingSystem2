<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffenseRecord extends Model
{
    use HasFactory;
    protected $table = 'offense_record';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        "criminal_id",
        "description",
        "address",
        "image",
        "image_location",
        "offense",
        "barangay",
        "created_at",
        "added_at"
    ];

    public static function get_offense_record(){
        return DB::select("SELECT * FROM offense_record ORDER BY created_at DESC");
    }

    public static function stat(){
        $crimes_today =  DB::select("SELECT COUNT(*) AS todays_crime FROM offense_record WHERE DATE(added_at) = CURDATE()")[0]->todays_crime;
        $prev_crimes =  DB::select("SELECT COUNT(*) AS prev_crimes FROM offense_record WHERE DATE(added_at) != CURDATE()")[0]->prev_crimes;

        if($prev_crimes == 0){
            $percent  = $crimes_today;
        }else{
            (int)  $percent =  (($crimes_today - $prev_crimes) / $prev_crimes) * 100;
        }
        return [
            "crimes_today" => $crimes_today,
            "percent" => number_format((float)$percent, 2, '.', '')
        ];
    }
    

    public static function get_offense_stat(){
        // get all crimes of today e.g. 11/5/2023 
        
        // get all crimes except today e.g 11/5/2023  

        // get the percentage of crimes commited today by comparing it to all crimes value 
    }
    public static function crinimal_loc($q){
        if($q != ""){
            return  DB::select("SELECT CONCAT( address ) as text, id 
                        FROM offense_record
                        WHERE address LIKE '%$q%'");
        }else{
            return DB::select("SELECT CONCAT(address) as text, id 
                        FROM offense_record");
        }
    }
    

    public static function get_all_record_by_criminal_id($criminal_id){
        return DB::select("SELECT * FROM offense_record WHERE criminal_id = $criminal_id");
    }
    

    public static function get_offense_table(){
        return DB::select("SELECT * FROM offenses_table");
    }
}
