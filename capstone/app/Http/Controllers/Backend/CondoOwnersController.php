<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CondoOwner;
use App\Models\Room;
use Illuminate\Support\Carbon;

class CondoOwnersController extends Controller
{
    public function viewCondoOwners(){
        $owners = CondoOwner::latest()->get();
        $rooms = Room::get();
        return view('admin.condo_owners.all_condo_owners',compact('owners','rooms'));
    }
    public function addCondoOwner(){
        return view('admin.condo_owners.add_condo_owner');
    }
    public function viewCondoOwner($id){
        $owner = CondoOwner::where('owner_slug',$id)->firstOrFail();
        $rooms = Room::where('owner_id',$owner->id)->get();        
        return view('admin.condo_owners.view_condo_owner',compact('owner','rooms'));
    }
    public function editCondoOwnerName($id){
        $owner = CondoOwner::where('owner_slug',$id)->firstOrFail();
        return view('admin.condo_owners.edit_condo_owner_name',compact('owner'));
    }
    public function updateCondoOwnerName(Request $request){
        CondoOwner::findOrFail($request->id)->update([
            'owner_name' => $request->owner_name,
        ]);

        $notification = array(
            'message' => 'Condo owner name update successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('view.condo_owners')->with($notification);
        
    }
    
    public function storeCondoOwner(Request $request){
        $owner_slug = strtolower(str_replace(' ','-',$request->owner_name));
        if(CondoOwner::where('owner_slug', $owner_slug)->exists() ){

            $notification = array(
                'message' => 'Owner already exists.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }
        CondoOwner::insert([
            'owner_name' => $request->owner_name,
            'owner_slug' => $owner_slug,
            'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ]);
    
    
        $notification = array(
            'message' => 'Condo owner created successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('view.condo_owners')->with($notification);
    }
}
