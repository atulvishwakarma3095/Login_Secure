<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $usermodel= new \App\Models\UserModel();
        $loggedUserID=session()->get('loggedUser');
        $userInfo=$usermodel->find($loggedUserID);
        $data=[
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
        ];
        return view('dashboard/index',$data);
    }
    function profile(){
        $usermodel= new \App\Models\UserModel();
        $loggedUserID=session()->get('loggedUser');
        $userInfo=$usermodel->find($loggedUserID);
        $data=[
            'title'=>'Profile',
            'userInfo'=>$userInfo
        ];
        return view('dashboard/profile',$data);
    }
}
