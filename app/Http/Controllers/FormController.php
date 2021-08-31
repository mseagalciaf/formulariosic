<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index(){
        $forms = Form::all();
        return response()->json([
            'status' => true,
            'codigo_http' => 200,
            'data' => $forms
        ],200);
    }
    
    public function store(Request $request){

        $validator = Validator::make($request->all(),$this->rulesForm());

        if($validator->fails()){
            return response()->json(['status'=>false,'codigo_http'=>400,'data'=>$validator->errors()],400);
        }else{
            $form = $request->all();
            $form['city'] = strtolower($request->city);
            $form['phone'] = strval($request->phone);

            Form::create($form);

            return response()->json(['status'=>true,'codigo_http'=>200,'data'=>'added_successfully'],200);
        }
    }

    public function show($id){
        $form = Form::find($id);
        if(isset($form)){
            return response()->json(['status'=>true,'codigo_http'=>200,'data'=>$form],200);
        }else{
            return response()->json(['status'=>false,'codigo_http'=>404,'data'=>'non-existent'],404);
        }
    }

    public function update($id,Request $request){

        $validator = Validator::make($request->all(),$this->rulesForm());

        if($validator->fails()){
            return response()->json(['status'=>false,'codigo_http'=>400,'data'=>$validator->errors()],400);
        }else{
            $form = Form::find($id);
            if(isset($form)){
                $form->name = $request->name;
                $form->age = $request->age;
                $form->phone = strval($request->phone);
                $form->city = strtolower($request->city);
                $form->conditions = $request->conditions;
                $form->save();
    
                return response()->json(['status'=>true,'codigo_http'=>200,'data'=>'updated_successfully'],200); 
            }else{
                return response()->json(['status'=>false,'codigo_http'=>404,'data'=>'non-existent'],404);
            }
        }
    }

    public function destroy($id){
        $form = Form::find($id);
        if(isset($form)){
            $form->delete();
            return response()->json(['status'=>true,'codigo_http'=>200,'data'=>'deleted_successfully'],200); 
        }else{
            return response()->json(['status'=>false,'codigo_http'=>404,'data'=>'non-existent'],404);
        }
    }

    public function rulesForm(){
        return [
            'name' => 'required',
            'age' => 'required|integer|min:18|max:90',
            'phone' => 'required|integer',
            'city' => 'required',
            'conditions' => 'required|boolean'
        ];
    }
}
