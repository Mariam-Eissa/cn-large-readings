<?php

namespace App\Http\Controllers;

use App\Models\CustFileCode;
use App\Models\User;
use App\Models\Role;
use App\Models\UserArea;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $users = User::whereRoleIs('TopUser')
        ->get();

        return view('users.index', compact('users'));
    }

    public function unadded()
    {

        $idss = UserArea::pluck('user_id')->toArray();
        
        $users = User::whereRoleIs('User')
            ->where("activated", "0")
            ->whereNotIn("id", $idss)->get();

        return view('users.unadded', compact('users'));
    }


    public function added()
    {

        $users = User::whereRoleIs('User')->whereHas('userareas')->with('userareas')->get();

        foreach ($users as $user) {
            $cnt = 0;
            $finished = 0;
            $ids = "";
            if($user::whereHas('userareas')){
                
            foreach ($user->userareas as $area) {
                if ($user->userareas->count() > 1){
                $user->cnt +=  $area->cnt;
                $user->finished +=  $area->finished;
                $user->ids .=  "-" . "$area->file_no";
                $user->ids = ltrim($user->ids, '-');
                
        
            }
            else{
                $user->cnt = $area->cnt;
                $user->finished = $area->finished;
                $user->ids = "$area->file_no";
            }
        }
                
   
        }
        else {
            $area = "";
           
        
        }
        
        }
        return view('users.added', compact('users'));
    }


    public function addb($uid)
    {

        $users = User::whereRoleIs('TopUser')->get();
        $files = CustFileCode::all();

        return view('users.addbook', compact('users', 'files', 'uid'));
    }

    public function delbook($uid){

        $userarea= UserArea::where("user_id","$uid")->get();
         foreach($userarea as $area){
            $area->delete();
         }
         return redirect()->route('users.added');
    }

    public function storeb(Request $request, $uid)
    {
           
        foreach($request->file as $files){
         if (in_array("1", $request->file) || in_array("2", $request->file) ||
          in_array("3", $request->file) ||in_array("999", $request->file) ){
            $userarea = new UserArea();
            $userarea->user_id = $uid;
            $userarea->room_user_id = $request->top_user;
             $userarea->file_no = $files;
            $userarea->save();
             }
            else{

            }
            
          }
          return redirect()->route('users.added');

     }



    public function inactive()
    {

        $users = User::whereRoleIs('User')->get()
            ->where("activated", "1");

        return view('users.inactive', compact('users'));
    }

    public function makeactive($id)
    {
          $user = User::find("$id");
          if($user->activated === "1"){
              $user->activated = "0";
              $user->save();
              return redirect()->route('users.inactive')
              ->with('success', 'تم تفعيل المستخدم ');
          }
       elseif($user->activated === "0"){
        $user->activated = "1";
        $user->save();
        return redirect()->route('users.unadded')
        ->with('success', 'المستخدم غير فعال');
    }
       
    }
    




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'user_name' => 'required|unique:users',
            'fullname' => 'required|max:100|string',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required'
        ]);

        
        $user = new User;
        $user->user_name = $request->user_name;
        $user->full_name = $request->fullname;
        $user->password = bcrypt($request->psw);
        $user->ct_password = $request->psw;
        $user->activated = "0";
        $user->save();
        $user->attachRole($request->role);
    
        return redirect()->route('users.create')
            ->with('success', 'تم تسجيل مستخدم جديد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'password' => 'confirmed',
            'password_confirmation' => '',

        ]);

       

      
        $user->ct_password = $request->password;
        $user->password = bcrypt($request->password);
       
        $user->save();

       


        return redirect()->route('users.edit' , $user->id)
            ->with('success', 'تم تغيير الرقم السري ');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(User $user)
    {
        // foreach($user->roles as $role){
        //     $role->detach();
        // }
        $user->roles()->detach();

        // foreach($user->post as $post){
        //     $post->delete();
        // } 


        //  $user->post->delete();
        $user->delete();



        return redirect()->route('home')
            ->with('success', 'User deleted successfully');
    }
   

 


}
