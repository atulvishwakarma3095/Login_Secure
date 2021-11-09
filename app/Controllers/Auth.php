<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Libraries\Hash;


class Auth extends Controller
{
    public function __construct(){
        helper(['url','form']);
    }
    public function index()
    {
        return view('auth/login');

    }
    public function register()
    {
        return view('auth/register');

    }
    public function save(){
       /* $validation=$this->validate([
            'txtname'=>'required',
            'txtemail'=>'required|valid_email|is_unique[users.username]',
            'txtpasswd'=>'required',
            'txtcpasswd'=>'required|matches[txtpasswd]'
        ]);*/

        $validation=$this->validate([
            'txtname'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Enter your Fullname is required.'
                ]
            ],
            'txtemail'=>[
                'rules'=>'required|valid_email|is_unique[users.username]',
                'errors'=>[
                    'required'=>'Enter your email is required.',
                    'valid_email'=>'you must enter a valid email',
                    'is_unique'=>'Email already taken'
                ]
            ],
            'txtpasswd'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Enter your password',
                ]
            ],
            'txtcpasswd'=>[
                'rules'=>'required|matches[txtpasswd]',
                'errors'=>[
                    'required'=>'Enter your password again',
                    'matches'=>'Please enter your password correctly'
                ]
            ]
        ]);


        if (!$validation) {
            return view('auth/register',['validation'=>$this->validator]);
        }else{
            $name=$this->request->getPost('txtname');
            $username=$this->request->getPost('txtemail');
            $password=$this->request->getPost('txtpasswd');

            $values=[
                'fullname'=>$name,
                'username'=>$username,
                'passwd'=>Hash::make($password)
            ];
            $usersmodel= new \App\Models\UserModel();
            $query=$usersmodel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail','Something went wrong.');
            }else{
                //return redirect()->to('auth/register')->with('success','You are register successfully.');   
                $last_id=$usersmodel->insertID(); //This is last inserted iD
                session()->set('loggedUser',$last_id);
                return redirect()->to('/dashboard');

            }
        }
    }

    function check(){

        $validation=$this->validate([

        'txtusername'=>[
                'rules'=>'required|valid_email|is_not_unique[users.username]',
                'errors'=>[
                    'required'=>'Please enter username',
                    'valid_email'=>'Please enter valid username',
                    'is_not_unique'=>'Please enter your username'
                ]
               ],
       'txtpasswd'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Enter your password',
                ]
            ]

        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{
           $username=$this->request->getPost('txtusername');
           $password=$this->request->getPost('txtpasswd');
           $usersmodel= new \App\Models\UserModel();
           $user_info=$usersmodel->where('username',$username)->first();
           $check_password=Hash::check($password,$user_info['passwd']);
           if(!$check_password){
            session()->setFlashdata('fail','Incorrent Username & Password.');
            return redirect()->to('/auth')->withInput();
           }
           else{
            $user_id=$user_info['id'];
            session()->set('loggedUser',$user_id);
            return redirect()->to('/dashboard');
           }
        }
      
    }
    function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','You are logout out..!');
        }
    }
}
