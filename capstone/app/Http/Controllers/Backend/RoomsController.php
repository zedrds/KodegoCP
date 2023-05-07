<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoomThumbnail;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Feature;
use App\Models\Amenity;
use App\Models\RoomAmenity;
use App\Models\RoomFeature;
use App\Models\CondoOwner;
use App\Models\UnitType;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{

    public function viewRooms(){
        $rooms = Room::get();
        return view('admin.rooms.all_rooms',compact('rooms'));
    }
    public function addRoom(){
        $features = Feature::orderBy('feature_name','ASC')->get();
        $amenities = Amenity::orderBy('amenity_name','ASC')->get();
        $owners = CondoOwner::orderBy('owner_name','ASC')->get();
        $unit_types = UnitType::get();
        return view('admin.rooms.add_room',compact('features','amenities','owners','unit_types'));
    }

    public function storeRoom(Request $request){
        $amenities = $request->amenities;
        $features = $request->features;

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

    if($file){
        if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {

            $image = Image::make($file);
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $save_url = 'upload/rooms/' . $filename;
            $image->save(public_path($save_url));
        }
        $room_data = [
            'room_title' => $request->room_title,
            'room_price' => $request->room_price,
            'room_description' => $request->room_description,
            'owner_id' => $request->owner_id,
            'max_guests' => $request->max_guests,
            'unit_type' => $request->unit_type,
            'parking' => $request->parking,
            'room_image' => $save_url,
            'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ];
        
        if ($request->has('bedrooms')) {
            $room_data['bedrooms'] = $request->bedrooms;
        }
        
        if ($request->has('smoking_allowed')) {
            $room_data['smoking_allowed'] = $request->smoking_allowed;
        }
        
        if ($request->has('pet_friendly')) {
            $room_data['pet_friendly'] = $request->pet_friendly;
        }
        
        $room_id = Room::insertGetId($room_data);



        $images = $request->file('thumbnail');
        if(!$images){
            $notification = array(
                'message' => 'Please insert room thumbnails', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            foreach($images as $img){
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                $save_thumbnail = 'upload/rooms/thumbnails/'.$make_name;
                Image::make($img)->save($save_thumbnail);   
                RoomThumbnail::insert([
                    'room_id' => $room_id,
                    'thumbnail_name' => $save_thumbnail,
                    'created_at' => Carbon::now(),
                ]);
            }
        }


        if($amenities){
            foreach($amenities as $amenity){
                RoomAmenity::insert([
                    'room_id' => $room_id,
                    'amenity_id' => $amenity,
                    'created_at' => Carbon::now()->setTimezone('Asia/Manila')
                ]);
            }
        }
        if($features){
            foreach($features as $feature){
                RoomFeature::insert([
                    'room_id' => $room_id,
                    'feature_id' => $feature,
                    'created_at' => Carbon::now()->setTimezone('Asia/Manila')
                ]);
            }
        }
       


        

        $notification = array(
            'message' => 'Room added successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.rooms')->with($notification);

    }else{
        $notification = array(
            'message' => 'Please insert room image', 
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
        

    }

    public function deleteRoom($id){
        $room_id = Room::findOrFail($id);
        unlink(public_path($room_id->room_image));
        RoomAmenity::where('room_id',$id)->delete();
        RoomFeature::where('room_id',$id)->delete();
        $room_id->delete();
        
        $notification = array(
            'message' => 'Room deleted successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.rooms')->with($notification);
    }


    public function editRoom($id){
        $room = Room::findOrFail($id);
        $features = Feature::orderBy('feature_name','ASC')->get();
        $amenities = Amenity::orderBy('amenity_name','ASC')->get();
        $feature_active = RoomFeature::where('room_id',$room->id)->with('feature')->get();
        $amenity_active = RoomAmenity::where('room_id',$room->id)->with('amenity')->get();
        $owners = CondoOwner::orderBy('owner_name','ASC')->get();
        $unit_types = UnitType::get();
        $thumbnails = RoomThumbnail::where('room_id',$id)->get();
        
        return view('admin.rooms.edit_room',compact('room','features','amenities', 'amenity_active','feature_active','owners','unit_types','thumbnails'));
    }

    public function updateRoom(Request $request){
        $room = Room::findOrFail($request->id);

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

    if($file){
        if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {

            if ($room->room_image) {
                $old_image_path = public_path($room->room_image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            $image = Image::make($file);
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $save_url = 'upload/rooms/' . $filename;
            $image->save(public_path($save_url));
        }

        $room->room_image = $save_url;
    }

    
    


    $selectedAmenities = $request->amenities ?? []; 
    $previousAmenities = RoomAmenity::where('room_id',$room->id)->with('amenity:id')->get()->pluck('amenity.id')->toArray(); 


    $amenitiesToDelete = array_diff($previousAmenities, $selectedAmenities);
    RoomAmenity::where('room_id', $room->id)->whereIn('amenity_id', $amenitiesToDelete)->delete();


    foreach ($selectedAmenities as $amenity) {
        if (!in_array($amenity, $previousAmenities)) {
            RoomAmenity::create([
                'room_id' => $room->id, 
                'amenity_id' => $amenity
            ]);
        }
    }


    $selectedFeatures = $request->features ?? [];
    $previousFeatures = RoomFeature::where('room_id',$room->id)->with('feature:id')->get()->pluck('feature.id')->toArray();
    $featuresToDelete = array_diff($previousFeatures, $selectedFeatures);

    RoomFeature::where('room_id', $room->id)->whereIn('feature_id', $featuresToDelete)->delete();
    
    
    foreach ($selectedFeatures as $feature) {
        if (!in_array($feature, $previousFeatures)) {
            RoomFeature::create([
                'room_id' => $room->id, 
                'feature_id' => $feature
            ]);
        }
    }

    $room_data = [
        'room_title' => $request->room_title,
        'room_price' => $request->room_price,
        'room_description' => $request->room_description,
        'parking' => $request->parking,
        'max_guests' => $request->max_guests,
        'owner_id' => $request->owner_id,
        'unit_type' => $request->unit_type,
        'updated_at' => Carbon::now()->setTimezone('Asia/Manila'),
    ];
    if ($request->has('bedrooms')) {
        $room_data['bedrooms'] = $request->bedrooms;
    }else{
        $room_data['bedrooms'] = 0;
    }

    if ($request->has('smoking_allowed')) {
        $room_data['smoking_allowed'] = $request->smoking_allowed;
    }else{
        $room_data['smoking_allowed'] = 0;
    }
    
    if ($request->has('pet_friendly')) {
        $room_data['pet_friendly'] = $request->pet_friendly;
    }else{
        $room_data['pet_friendly'] = 0;
    }

    $room->update($room_data);

    


    

    $notification = array(
        'message' => 'Room updated successfully', 
        'alert-type' => 'success'
    );
    
    return redirect()->back()->with($notification);
       
    }

    public function updateRoomThumbnail(Request $request){
        $imgs = $request->thumbnail;
        foreach($imgs as $id=>$img){
            $imgDel = RoomThumbnail::findOrFail($id);
            unlink($imgDel->thumbnail_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $save_multi = 'upload/rooms/thumbnails/'.$make_name;
            Image::make($img)->save($save_multi);
            RoomThumbnail::where('id',$id)->update([
                'thumbnail_name' => $save_multi,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Room thumbnail(s) updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
    public function deleteRoomThumbnail($id){
        $old_img = RoomThumbnail::findOrFail($id);
        unlink($old_img->thumbnail_name);

        RoomThumbnail::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Room thumbnail deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function viewRoom($id){
        $room = Room::findOrFail($id);
        $owner = CondoOwner::where('id',$room->id)->get();
        $features = Feature::orderBy('feature_name','ASC')->get();
        $amenities = Amenity::orderBy('amenity_name','ASC')->get();
        $feature_active = RoomFeature::where('room_id',$room->id)->with('feature')->get();
        $amenity_active = RoomAmenity::where('room_id',$room->id)->with('amenity')->get();
        $owners = CondoOwner::orderBy('owner_name','ASC')->get();
        $owner = CondoOwner::where('id',$room->owner_id)->firstOrFail();
        $unit_types = UnitType::get();
        $unit_type = UnitType::where('unit_name',$room->unit_type)->firstOrFail();;
        $thumbnails = RoomThumbnail::where('room_id',$id)->get();
        
        return view('admin.rooms.view_room',compact('room','owner','unit_type','owners','features','amenities','unit_types','feature_active','amenity_active','thumbnails'));
    }

    public function getRoomPrice($room_id){
        $room = Room::where('id', $room_id)->first();
        return response()->json([
            'total_cost' => $room->room_price
        ]);
    }
    public function getMaxGuests($room_id){
        $room = Room::where('id', $room_id)->first();
        return response()->json([
            'max_guests' => $room->max_guests
        ]);
    }
}

