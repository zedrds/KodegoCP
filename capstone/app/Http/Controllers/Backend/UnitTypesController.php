<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\UnitType;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class UnitTypesController extends Controller
{
    public function viewUnits(){
        $unit_types = UnitType::get();
        $rooms = Room::get();
        return view('admin.units.all_units',compact('unit_types','rooms'));
    }
    public function viewTypeUnits($unit_slug){
        $unit_type = $unit_slug;
        $rooms = Room::where('unit_type',$unit_slug)->get();
        return view('admin.units.all_type_units',compact('rooms','unit_type'));
    }
    public function editTypeUnits($unit_slug){
        $unit_type = UnitType::where('unit_slug',$unit_slug)->firstOrFail();
        return view('admin.units.edit_type_units',compact('unit_type'));
    }

    public function updateTypeUnits(Request $request){
        $unit_type = UnitType::findOrFail($request->id);


        $file = $request->file('file');

        if($file){
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
    
                if ($unit_type->unit_image) {
                    $old_image_path = public_path($unit_type->unit_image);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
    
                $image = Image::make($file);
                // if ($image->width() > 1000 || $image->height() > 1000) {
            //     $image->resize(600, 600);
            // }
                $filename = $unit_type->unit_slug.hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $save_url = 'upload/unit_types/' . $filename;
                $image->save(public_path($save_url));
            }
    
            $unit_type->unit_image = $save_url;
        }



        $unit_type->update([
            'unit_description' => $request->unit_description,
            'updated_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ]);

        
    $notification = array(
        'message' => 'Unit type updated successfully', 
        'alert-type' => 'success'
    );
    
    return redirect()->route('all.units')->with($notification);
    }
}
