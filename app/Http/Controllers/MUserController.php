<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MUser;

class MUserController extends Controller
{
    public function index()
    {
         return view('Master.MUser');
    }

    public function ChangePassword()
    {
        return view('Master.MuserChangePassword',['msgType'=>'','msgStr'=>'']);
    }

    public function doChangePassword(Request $request)
    {
        $oldpassword = $request->inputOldPassword;
        $newPassword = $request->inputNewPassword;
        // dd();
        $data_MUser = MUser::where('username', $request->session()->get('login_state')[0]->username)
                            ->where('password', md5($oldpassword))
                            ->get();
        
                           // dd($data_MUser);
        if (count($data_MUser) > 0){
            //dd($data_MUser);
             MUser::where('IdMUser', $data_MUser[0]->IdMUser)
                    ->update([
                        'password' => md5($newPassword)
                    ]);

            // return view('Home',['msgType'=>'success','msgStr'=>'Ganti Password Berhasil']);
           // return redirect()->route('Home',['msgType'=>'success','msgStr'=>'Ganti Password Berhasil']);
           return redirect('/');
        }else{
            return view('Master.MuserChangePassword',['msgType'=>'danger','msgStr'=>'Password Lama Salah']);
        }
    }
}
