<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

use App\Models\BaranggayRecordModel;
use App\Models\AgricultureModel;
use App\Models\PopulationTable;
use App\Models\FacilitiesModel;


class AdministratorController extends Controller
{
    //


    public function login(Request $request){
        $data = $request->all();
        $user_name = $data['user_name'];
        $password =  $data['password'];

        $user = DB::select("SELECT * FROM user_table WHERE user_name =  '$user_name'");

        if($user){
            $user_password =  $user[0]->password;
            if($user_password ==  $password){
                session(['user' => $user[0]]);

                return redirect()->route('administrator.home');
            }
        }

        throw ValidationException::withMessages(['unathorize_access'=> 'Invalid access']);
    }


    
    public function sign_in_page(){
        
        return view("sign_in");
    }


    public function home(){
        return view("administrator.home", [
            "images" => DB::select("SELECT * FROM image_table"),
            "person_incharge" => DB::select("SELECT * FROM person_incharge_table"),
        ]);
    }

    public function barangay(){
        return view("administrator.barangay", [
            "barangay_list" => DB::select("SELECT * FROM baranggay_table"),
            "business_list" => DB::select("SELECT * FROM business_table")
        ]);
    }


    public function agriculture(){
        return view("administrator.agriculture", [
            "barangay_list" => DB::select("SELECT * FROM baranggay_table"),
            "crop_type_list" => DB::select("SELECT * FROM agri_type_table")
        ]);
    }

    public function population(){
        return view("administrator.population", [
            "barangay_list" => DB::select("SELECT * FROM baranggay_table"),
            "business_list" => DB::select("SELECT * FROM business_table")
        ]);
    }

    public function facilities(){
        return view("administrator.facilities", [
            "barangay_list" => DB::select("SELECT * FROM baranggay_table"),
            "business_list" => DB::select("SELECT * FROM business_table")
        ]);
    }


    public function map(){
        return view("administrator.map");
    }

    public function contact(){
        return view("administrator.contact");
    }


    public function about(){
        return view("administrator.about");
    }



    public function upload_image(Request $request){
        $data =  $request->all();
        $image_number = $data['image_number'];

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        DB::table('image_table')->where('id', $image_number)->update([
            "image_location" => "/images/$imageName"
        ]);
    }

    public function update_person_incharge(Request $request){
        $name = $request->name;
        $id =  $request->id;

        $data = [];
        if(request()->person_incharge_image){
            $imageName = time().'.'.request()->person_incharge_image->getClientOriginalExtension();
            request()->person_incharge_image->move(public_path('images'), $imageName);
            $data["image_location"] = "/images/$imageName";
        }

        $data["name"] = $name;

        DB::table('person_incharge_table')->where('id', $id)->update($data);

    }


    public function create_baranggay_record(Request $request){
        $data = $request->all();
        $id =  null;
        if(isset($data['id'])){
            $id =  $data['id'];
        }
        unset($data['id']);
        BaranggayRecordModel::updateOrCreate(["id" => $id], $data);
    }


    public function create_facility_record(Request $request){
        $data = $request->all();
        $id =  null;
        if(isset($data['id'])){
            $id =  $data['id'];
        }
        unset($data['id']);
        FacilitiesModel::updateOrCreate(["id" => $id], $data);
    }




    public function create_agri_record(Request $request){
        $data = $request->all();
        $id =  null;
        if(isset($data['id'])){
            $id =  $data['id'];
        }
        unset($data['id']);
        AgricultureModel::updateOrCreate(["id" => $id], $data);
    }


    public function create_population_record(Request $request){
        $data = $request->all();
        $id =  null;
        if(isset($data['id'])){
            $id =  $data['id'];
        }
        unset($data['id']);
        PopulationTable::updateOrCreate(["id" => $id], $data);
    }


    public function get_baranggay_record(){
        return DataTables::of(
            DB::select("SELECT a.*, b.name as business_type_name, c.name as baranggay_name  FROM baranggay_record_table a LEFT JOIN business_table b on b.id = a.business_type LEFT JOIN baranggay_table c ON c.id = a.baranngay ORDER BY a.id DESC")
        )->make(true);
    }


    public function get_facility_record(){
        return DataTables::of(
            DB::select("SELECT a.*, c.name as baranggay_name  
                        FROM facilities_table a
                        LEFT JOIN baranggay_table c ON c.id = a.baranngay 
                        ORDER BY a.id DESC")
        )->make(true);
    }



    public function get_agri_record(){
        return DataTables::of(
            DB::select("SELECT a.*, b.name as agri_type_name, c.name as baranggay_name  
                        FROM agriculture_table a 
                        LEFT JOIN agri_type_table b on b.id = a.agri_type 
                        LEFT JOIN baranggay_table c ON c.id = a.baranngay 
                        ORDER BY a.id DESC")
        )->make(true);
    }



    public function get_population_record(){
        return DataTables::of(
            DB::select("SELECT a.*, c.name as baranggay_name  
                        FROM population_table a 
                        LEFT JOIN baranggay_table c ON c.id = a.baranngay 
                        ORDER BY a.id DESC")
        )->make(true);
    }


    public function get_baranggay_record_for_map(Request $request){
        $id =  $request->id;
        if($id){
            $data = DB::select("SELECT a.*, b.name as business_type_name, c.name as baranggay_name  FROM baranggay_record_table a LEFT JOIN business_table b on b.id = a.business_type LEFT JOIN baranggay_table c ON c.id = a.baranngay WHERE a.baranngay = $id ORDER BY a.id DESC");
        }else{
            $data = DB::select("SELECT a.*, b.name as business_type_name, c.name as baranggay_name  FROM baranggay_record_table a LEFT JOIN business_table b on b.id = a.business_type LEFT JOIN baranggay_table c ON c.id = a.baranngay ORDER BY a.id DESC");
        }

        return $data;
    }

    public function get_barangay_chart(Request $request){
        $id =  $request->id;
        if($id){
            $data = DB::select("SELECT b.name, COUNT(*) AS quantity
                    FROM baranggay_record_table a
                    LEFT JOIN business_table b ON a.business_type = b.id
                    WHERE a.baranngay = $id
                    GROUP BY a.business_type");
        }else{
            $data = DB::select("SELECT b.name, COUNT(*) AS quantity
                    FROM baranggay_record_table a
                    LEFT JOIN business_table b ON a.business_type = b.id
                    GROUP BY a.business_type");
        }
        $label = [];
        $set = [];

        foreach ($data as $row) {
            array_push($label, $row->name);
            array_push($set, $row->quantity);
        }

        return [
            "label" => $label,
            "set" => $set
        ];
    }
}
