<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Amenity;
use Illuminate\Support\Carbon;


class FeaturesController extends Controller
{
    public function viewFeatures(){
        $features = Feature::latest()->get();
        return view('admin.features.view_features',compact('features'));
    }
    public function addFeature(){
        return view('admin.features.add_feature');
    }
    public function storeFeature(Request $request){
        $feature_slug = strtolower(str_replace(' ','-',$request->feature_name));

        if(Feature::where('feature_slug', $feature_slug)->exists() ){

            $notification = array(
                'message' => 'Feature already exists.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }
        
        if(Amenity::where('amenity_slug', $feature_slug)->exists() ){

            $notification = array(
                'message' => 'Feature already exists in amenities.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }

        Feature::insert([
            'feature_name' => $request->feature_name,
            'feature_slug' => $feature_slug,
            'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ]);
    
    
        $notification = array(
            'message' => 'Feature created successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

    public function deleteFeature($id){
        $feature = Feature::findOrFail($id);

        $feature->delete();
        
        $notification = array(
            'message' => 'Feature deleted successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

    }

    public function editFeature($id){
        $feature = Feature::findOrFail($id);
        return view('admin.features.edit_feature',compact('feature'));
    }

    public function updateFeature(Request $request){
        $feature = Feature::findOrFail($request->id);
        $feature_slug = strtolower(str_replace(' ','-',$request->feature_name));

        if(Feature::where('feature_slug', $feature_slug)->exists() ){

            $notification = array(
                'message' => 'Feature already exists.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }
          if(Amenity::where('amenity_slug', $feature_slug)->exists() ){

            $notification = array(
                'message' => 'Feature already exists in amenities.', 
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }


        $feature->update([
            'feature_name' => $request->feature_name,
            'feature_slug' => strtolower(str_replace(' ','-',$request->feature_name)),
            'updated_at' => Carbon::now()->setTimezone('Asia/Manila')
        ]);

        $notification = array(
            'message' => 'Feature updated successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('view.features')->with($notification);
    }
}
