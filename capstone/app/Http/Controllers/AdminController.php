<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboardAdmin(){
        $total_income = Payment::where('status','completed')->get('amount')->sum('amount');
        $pending_payments = Payment::where('status','pending')->get()->count();
        $payment_transactions = Payment::latest()->get();
        $users = User::get();
        $rooms = Reservation::where('status','confirmed')->get();
        $room = Room::get();
        $reservations = Reservation::latest()->get();
        return view('admin.index',compact('total_income','pending_payments','payment_transactions','users','rooms','reservations','room'));
    }

    public function logoutAdmin(Request $request): RedirectResponse{
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function profileAdmin(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.profile.view_profile', compact('adminData'));
    }
    public function updateAdminProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);     
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone; 
        $data->address = $request->address; 
        $data->city = $request->city; 
        $data->zip = $request->zip; 
        $data->password = bcrypt($request->new_password);
        $data->updated_at = Carbon::now()->setTimezone('Asia/Manila');
    
        if ($request->file('file')) {
            $rules = [
                'file' => 'image|mimes:jpg,jpeg,png,webp|max:3072',
            ];
            $messages = [
                'file.max' => 'The image should be less than 3 MB in size.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $file = $request->file('file');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                if ($data->profile_pic) {
                    $old_image_path = public_path($data->profile_pic);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
                $image = Image::make($file);
                // if ($image->width() > 1000 || $image->height() > 1000) {
            //     $image->resize(600, 600);
            // }
                $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $save_url = 'upload/profile_pictures/' . $filename;
                $image->save(public_path($save_url));
                $data->profile_pic = $save_url;
            } else {
                return redirect()->back()->withErrors(['file' => 'The file should be a JPG, JPEG, PNG, or WEBP file.'])->withInput();
            }
        }
    
            
        $data->save();
    
        $notification = array(
            'message' => 'Profile updated successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('admin.profile')->with($notification);
    }

    public function allUsers(){
        $users = User::where('role','user')->latest()->get();
        return view('admin.users.view_users',compact('users'));
    }

    public function addUser(){
        return view('admin.users.add_user');
    }

    public function storeUser(Request $request){   

        if(User::where('email', $request->email)->exists() ){

            $notification = array(
                'message' => 'The email address is already in use.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }
        if(User::where('username', $request->username)->exists()){
            $notification = array(
                'message' => 'The username is already in use.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
        }



            User::insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'username' => $request->username, 
                'address' => $request->address, 
                'city' => $request->city, 
                'zip' => $request->zip, 
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ]);
        
        
            $notification = array(
                'message' => 'User created successfully', 
                'alert-type' => 'success'
            );
            
            return redirect()->route('all.users')->with($notification);

    }

    public function editUser($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit_user',compact('user'));
    }

    public function updateUser(Request $request)
    {
        $data = User::find($request->id);     
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone; 
        $data->address = $request->address; 
        $data->city = $request->city; 
        $data->zip = $request->zip; 
        $data->password = bcrypt($request->new_password);
        $data->updated_at = Carbon::now()->setTimezone('Asia/Manila');
    
        if ($request->file('file')) {
            $rules = [
                'file' => 'image|mimes:jpg,jpeg,png,webp|max:3072',
            ];
            $messages = [
                'file.max' => 'The image should be less than 3 MB in size.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $file = $request->file('file');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                if ($data->profile_pic) {
                    $old_image_path = public_path($data->profile_pic);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
                $image = Image::make($file);
                // if ($image->width() > 1000 || $image->height() > 1000) {
            //     $image->resize(600, 600);
            // }
                $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $save_url = 'upload/profile_pictures/' . $filename;
                $image->save(public_path($save_url));
                $data->profile_pic = $save_url;
            } else {
                return redirect()->back()->withErrors(['file' => 'The file should be a JPG, JPEG, PNG, or WEBP file.'])->withInput();
            }
        }
    
            
        $data->save();
    
        $notification = array(
            'message' => 'User profile updated successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.users')->with($notification);
    }

    public function deleteUser($id){
        $profile_picture = User::findOrFail($id)->profile_pic;
        if($profile_picture){
            unlink($profile_picture);
        }
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User deleted successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }
}
