<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\Users;
use Hash;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 加载注册页面
        return view('home.register.index');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收
        $data = $request->only(['email','upass']);
        $users = new Users;
        $users->email = $data['email'];
        $users->upass = Hash::make($data['upass']);
        $users->token = str_random(60);
        // 注册成功
        if($users->save()){
            // 验证
            // 发送邮件
            Mail::send('home.email.index', ['token'=>$users->token,'id'=>$users->id,'email' => $users->email], function ($m) use ($users) {
                // $m->to($user->email, $user->name)->subject('Your Reminder!');
                $res = $m->to($users->email)->subject('【OTO官方】注册邮件');
                if($res){
                    dd('注册成功,请尽快 完成激活');
                }else{
                    dd('注册失败');
                }
            });
        }else{
            return back()->with('error','注册失败');
        }

    }

    // 激活
    public function changeStatus($id,$token)
    {

        // 修改用户的status  0=>1
        $users = Users::find($id);
        if(!$users){
            dd('链接失效111111111');
        }

        if($users->token != $token){
            dd('链接失效2222222222');
        }

        $users->status = 1;
        $users->token = str_random(60);

        if($users->save()){
            dd('激活成功');
        }else{
            dd('激活失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
