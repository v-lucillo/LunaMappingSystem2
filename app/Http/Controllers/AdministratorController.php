<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

use App\Models\BaranggayRecordModel;

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

        // JobOptionTable::updateOrCreate(["id" => $job_option_id],  (array) $row);
        // DB::table('baranggay_record_table')->insert($data);
    }

    public function get_baranggay_record(){
        return DataTables::of(
            DB::select("SELECT a.*, b.name as business_type_name, c.name as baranggay_name  FROM baranggay_record_table a LEFT JOIN business_table b on b.id = a.business_type LEFT JOIN baranggay_table c ON c.id = a.baranngay ORDER BY a.id DESC")
        )->make(true);
    }
}
