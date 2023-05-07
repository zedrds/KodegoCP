<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Feature;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AmenitiesController extends Controller
{
    public function viewAmenities(){
        $amenities = Amenity::latest()->get();
        return view('admin.amenities.view_amenities',compact('amenities'));

    }
    public function addAmenity(){
        return view('admin.amenities.add_amenity');
    }

    public function storeAmenity(Request $request){
        if(Amenity::where('amenity_name', $request->amenity_name)->exists() ){

            $notification = array(
                'message' => 'Amenity already exists.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }
        if(Feature::where('feature_name', $request->amenity_name)->exists() ){

            $notification = array(
                'message' => 'Amenity already exists in features.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }

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
                $image = Image::make($file);
                // if ($image->width() > 1000 || $image->height() > 1000) {
            //     $image->resize(600, 600);
            // }
                $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $save_url = 'upload/amenities/' . $filename;
                $image->save(public_path($save_url));
            }
        


            Amenity::insert([
                'amenity_name' => $request->amenity_name,
                'amenity_slug' => strtolower(str_replace(' ','-',$request->amenity_name)),
                'amenity_image' => $save_url,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ]);
        
        
            $notification = array(
                'message' => 'Amenity created successfully', 
                'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please upload an amenity image', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
        }
            
    }

    public function deleteAmenity($id){
        $amenity = Amenity::findOrFail($id);
        unlink($amenity->amenity_image);

        $amenity->delete();
        
        $notification = array(
            'message' => 'Amenity deleted successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

    }

    public function editAmenity($id){
        $amenity = Amenity::findOrFail($id);
        return view('admin.amenities.edit_amenity',compact('amenity'));
    }

    public function updateAmenity(Request $request){
        $amenity = Amenity::findOrFail($request->id);
    
        if ($request->amenity_name !== $amenity->amenity_name) {
            if (Amenity::where('amenity_name', $request->amenity_name)->exists()) {
                $notification = array(
                    'message' => 'Amenity already exists.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        if(Feature::where('feature_name', $request->amenity_name)->exists() ){

            $notification = array(
                'message' => 'Amenity already exists in features.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }

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
                
                if ($amenity->amenity_image) {
                    $old_image_path = public_path($amenity->amenity_image);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $image = Image::make($file);
                // if ($image->width() > 1000 || $image->height() > 1000) {
            //     $image->resize(600, 600);
            // }
                $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $save_url = 'upload/amenities/' . $filename;
                $image->save(public_path($save_url));
            }
        
            $amenity->update([
                'amenity_image' => $save_url,
            ]);
        }

        $amenity->update([
            'amenity_name' => $request->amenity_name,
            'amenity_slug' => strtolower(str_replace(' ','-',$request->amenity_name)),
            'updated_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ]);

        $notification = array(
            'message' => 'Amenity updated successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('view.amenities')->with($notification);
    }
}
