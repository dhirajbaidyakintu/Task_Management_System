<?php

namespace App\Http\Controllers;


use App\Models\ServiceModel;
use Illuminate\Http\Request;

class ServicesController extends Controller{
    //Services View Show
    function ServiceIndex(){
        return view('Service');
    }


    //Services Data Get From Database
    function getServicesData(){
        $result= json_encode(ServiceModel::all());
        return $result;
    }


    //Service Delete
    function ServiceDelete(Request $req){
        $id= $req->input('id');
        $result= ServiceModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    //Services All Data Get From Database
    function getServicesDetails(Request $req){
        $id= $req->input('id');
        $result= json_encode(ServiceModel::where('id','=',$id)->get());
        return $result;
    }


    //For Service Update
    function ServiceUpdate(Request $req){
        $id= $req->input('id');
        $task_title= $req->input('task_title');
        $task_des= $req->input('task_des');
        $task_file= $req->input('task_file');
        $task_deadline= $req->input('task_deadline');
        $result= ServiceModel::where('id','=',$id)->update(['task_title'=>$task_title, 'task_des'=>$task_des, 'task_file'=>$task_file, 'task_deadline'=>$task_deadline]);
        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    //For Service Add
    function ServiceAdd(Request $req){
        $task_title= $req->input('task_title');
        $task_des= $req->input('task_des');
        $task_file= $req->input('task_file');
        $task_deadline= $req->input('task_deadline');
        $result= ServiceModel::insert(['task_title'=>$task_title, 'task_des'=>$task_des, 'task_file'=>$task_file, 'task_deadline'=>$task_deadline]);
        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
