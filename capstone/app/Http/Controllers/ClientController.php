<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Feature;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomAmenity;
use App\Models\RoomFeature;
use App\Models\RoomThumbnail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UnitType;
use App\Models\Homepage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
class ClientController extends Controller
{
    public function viewHome(){
        $homepage = Homepage::findOrFail(1);
        return view('client.index',compact('homepage'));
    }
    public function viewUnitTypes(){
        $unit_types = UnitType::get();
        return view('client.units.all_unit_types',compact('unit_types'));
    }

    public function viewUnitType($unit_slug){
        $unit_type = $unit_slug;
        $units = Room::where('unit_type', $unit_slug)->orderBy('room_title','ASC')->get();
        return view('client.units.unit_type',compact('units','unit_type'));
    }

    public function viewUnit($unit_type, $id){
        $unit = Room::findOrFail($id);

        $room_features = RoomFeature::where('room_id',$id)->get();
        $room_amenities = RoomAmenity::where('room_id',$id)->get();
        $features = Feature::get();
        $units = Room::where('id','!=',$id)->get();
        $amenities = Amenity::get();
        $thumbnails = RoomThumbnail::where('room_id',$id)->get();
        return view('client.units.view_unit',compact('unit','room_features','features','room_amenities','amenities', 'units','thumbnails'));
    }

    public function editHomepage(){
        $homepage_details = Homepage::findOrFail(1);
        return view('admin.client.edit_homepage', compact('homepage_details'));
    }

    public function aboutUs(){
        return view('client.about.about_us');
    }

    public function updateHomepage(Request $request){
        $homepage = Homepage::findOrFail($request->id);

        if ($request->file('homepage_picture')) {

            $rules_hero = [
                'homepage_picture' => 'image|mimes:jpg,jpeg,png,webp|max:8192',
            ];
            $messages_hero = [
                'homepage_picture.max' => 'The image should be less than 8 MB in size.',
            ];
            $validator_hero = Validator::make($request->all(), $rules_hero, $messages_hero);

            if ($validator_hero->fails()) {
                $notification = array(
                    'message' => 'The hero image should be less than 8 MB in size.', 
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
            }

            $file_hero = $request->file('homepage_picture');

            if ($file_hero->isValid() && in_array($file_hero->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                
                if ($homepage->homepage_picture) {
                    $old_image_path = public_path($homepage->homepage_picture);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $image = Image::make($file_hero);
                $file_heroname = hexdec(uniqid()) . '.' . $file_hero->getClientOriginalExtension();
                $save_url = 'upload/homepage/' . $file_heroname;
                $image->save(public_path($save_url));
            }
        
            $homepage->update([
                'homepage_picture' => $save_url,
            ]);
        }

        if ($request->file('about_picture')) {

            $rules_about = [
                'about_picture' => 'image|mimes:jpg,jpeg,png,webp|max:8192',
            ];
            $messages_about = [
                'about_picture.max' => 'The image should be less than 8 MB in size.',
            ];
            $validator_about = Validator::make($request->all(), $rules_about, $messages_about);

            if ($validator_about->fails()) {
                $notification = array(
                    'message' => 'The about image should be less than 8 MB in size.', 
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
            }

            $file_about = $request->file('about_picture');

            if ($file_about->isValid() && in_array($file_about->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                
                if ($homepage->about_picture) {
                    $old_image_path = public_path($homepage->about_picture);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $image = Image::make($file_about);
                $file_aboutname = hexdec(uniqid()) . '.' . $file_about->getClientOriginalExtension();
                $save_url = 'upload/homepage/' . $file_aboutname;
                $image->save(public_path($save_url));
            }
        
            $homepage->update([
                'about_picture' => $save_url,
            ]);
        }
        if ($request->file('amenities_picture')) {

            $rules_amenities = [
                'amenities_picture' => 'image|mimes:jpg,jpeg,png,webp|max:8192',
            ];
            $messages_amenities = [
                'amenities_picture.max' => 'The image should be less than 8 MB in size.',
            ];
            $validator_amenities = Validator::make($request->all(), $rules_amenities, $messages_amenities);

            if ($validator_amenities->fails()) {
                $notification = array(
                    'message' => 'The amenities image should be less than 8 MB in size.', 
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
            }

            $file_amenities = $request->file('amenities_picture');

            if ($file_amenities->isValid() && in_array($file_amenities->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                
                if ($homepage->amenities_picture) {
                    $old_image_path = public_path($homepage->amenities_picture);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $image = Image::make($file_amenities);
                $file_amenitiesname = hexdec(uniqid()) . '.' . $file_amenities->getClientOriginalExtension();
                $save_url = 'upload/homepage/' . $file_amenitiesname;
                $image->save(public_path($save_url));
            }
        
            $homepage->update([
                'amenities_picture' => $save_url,
            ]);
        }
        if ($request->file('unit_picture')) {

            $rules_unit = [
                'unit_picture' => 'image|mimes:jpg,jpeg,png,webp|max:8192',
            ];
            $messages_unit = [
                'unit_picture.max' => 'The image should be less than 8 MB in size.',
            ];
            $validator_unit = Validator::make($request->all(), $rules_unit, $messages_unit);

            if ($validator_unit->fails()) {
                $notification = array(
                    'message' => 'The unit image should be less than 8 MB in size.', 
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
            }

            $file_unit = $request->file('unit_picture');

            if ($file_unit->isValid() && in_array($file_unit->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                
                if ($homepage->unit_picture) {
                    $old_image_path = public_path($homepage->unit_picture);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $image = Image::make($file_unit);
                $file_unitname = hexdec(uniqid()) . '.' . $file_unit->getClientOriginalExtension();
                $save_url = 'upload/homepage/' . $file_unitname;
                $image->save(public_path($save_url));
            }
        
            $homepage->update([
                'unit_picture' => $save_url,
            ]);
        }
        if ($request->file('featured_picture')) {

            $rules_featured = [
                'featured_picture' => 'image|mimes:jpg,jpeg,png,webp|max:8192',
            ];
            $messages_featured = [
                'featured_picture.max' => 'The image should be less than 8 MB in size.',
            ];
            $validator_featured = Validator::make($request->all(), $rules_featured, $messages_featured);

            if ($validator_featured->fails()) {
                $notification = array(
                    'message' => 'The featured image should be less than 8 MB in size.', 
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
            }

            $file_featured = $request->file('featured_picture');

            if ($file_featured->isValid() && in_array($file_featured->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                
                if ($homepage->featured_picture) {
                    $old_image_path = public_path($homepage->featured_picture);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $image = Image::make($file_featured);
                $file_featuredname = hexdec(uniqid()) . '.' . $file_featured->getClientOriginalExtension();
                $save_url = 'upload/homepage/' . $file_featuredname;
                $image->save(public_path($save_url));
            }
        
            $homepage->update([
                'featured_picture' => $save_url,
            ]);
        }

        $homepage->update([
            'homepage_title' => $request->homepage_title,
            'about_title' => $request->about_title,
            'about_title_2' => $request->about_title_2,
            'about_description' => $request->about_description,
            'amenities_title' => $request->amenities_title,
            'amenities_title_2' => $request->amenities_title_2,
            'amenities_description' => $request->amenities_description,
            'featured_title_1' => $request->featured_title_1,
            'featured_icon_1' => $request->featured_icon_1,
            'featured_description_1' => $request->featured_description_1,
            'featured_title_2' => $request->featured_title_2,
            'featured_icon_2' => $request->featured_icon_2,
            'featured_description_2' => $request->featured_description_2,
            'featured_title_3' => $request->featured_title_3,
            'featured_icon_3' => $request->featured_icon_3,
            'featured_description_3' => $request->featured_description_3,
            'unit_title' => $request->unit_title,
            'unit_title_2' => $request->unit_title_2,
            'unit_price' => $request->unit_price,
            'unit_list' => $request->unit_list,
            'location_title' => $request->location_title,
            'location_title_2' => $request->location_title_2,
            'location_description' => $request->location_description,
        ]);

        $notification = array(
            'message' => 'Homepage updated successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

    public function viewSearch(){
        $unit_types = UnitType::get();
        $units = Room::orderBy('unit_type','ASC')->get();
        return view('client.bookings.search',compact('unit_types','units'));
    }

    public function Book($id){
        $guest = User::findOrFail(Auth::user()->id); 
        $unit = Room::findOrFail($id);
        return view('client.bookings.book',compact('unit', 'guest'));
    }

    public function guestProfile(){
        $id = Auth::user()->id;
        $guest = User::find($id);
        $reservations = Reservation::where('guest_name',$id)->latest()->get();
        $rooms = Room::get();
        return view('client.profile.view_profile', compact('guest','reservations','rooms'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
        ]);
        if($request->password){
            $request->validate([
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required',
            ],
            [
                'password.confirmed' => 'The password confirmation does not match.',
                'password.min' => 'The password must be at least 8 characters long.',
            ]
        );
        }
        $id = Auth::user()->id; 
        $data = User::find($id);     
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone; 
        $data->address = $request->address; 
        $data->city = $request->city; 
        $data->zip = $request->zip; 
        $data->password = bcrypt($request->password);
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
        
        return redirect()->back()->with($notification);

    }
    public function logoutGuest(Request $request): RedirectResponse{
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function storeBook(Request $request){

        $id = Auth::user()->id; 
        $user = User::find($id); 

        $request->validate([
            'guests' => 'required',
            'payment_method' => 'required',
        ],[
            'guests.required' => 'Please choose how many guests.',
            'payment_method.required' => 'Please choose a payment method.',
        ]);


        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($characters), 0, 10);
        $dateString = date('Ymd');
        $ref_no = 'UNW' . $dateString . $randomString;
        
        while (Reservation::where('reference_no', $ref_no)->exists()) {
            $randomString = substr(str_shuffle($characters), 0, 10);
            $ref_no = 'UNW' . $dateString . $randomString;
        }


        $payment = [
            'guest_name' => $user->id,
            'amount' => $request->total_cost,
            'payment_method' => $request->payment_method,
            'reservation_ref_no' => $ref_no,
            'status' => 'pending',
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
        ];

        $reservation = [
            'guest_name' => $user->id,
            'room_id' => $request->room_title,
            'reference_no' => $ref_no,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'total_cost' => $request->total_cost,
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ];

        if($request->payment_method !== 'cash'){
            $payment['transaction_ref_no'] =  $request->reference_no;
            if(!$request->file('file')){
                $notification = array(
                    'message' => 'Please upload a screenshot of your receipt.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }else{
                $rules = [
                    'file' => 'image|mimes:jpg,jpeg,png,webp',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $file = $request->file('file');
                if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                    $image = Image::make($file);
                    $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                    $save_url = 'upload/receipts/' . $filename;
                    $image->save(public_path($save_url));
                    $payment['payment_receipt'] =  $save_url;
                } else {
                    return redirect()->back()->withErrors(['file' => 'The file should be a JPG, JPEG, PNG, or WEBP file.'])->withInput();
                }
            }
        }

       

        $payment_id = Payment::insertGetId($payment);
        $reservation_id = Reservation::insertGetId($reservation);
        
        return redirect()->route('receipt',compact('payment_id','user','reservation_id'));

    }

    public function viewReceipt(Request $request){
        $payment = Payment::findOrFail($request->payment_id);
        $reservation = Reservation::findOrFail($request->reservation_id);
        $user = User::find($request->user);
        return view('client.bookings.booking_receipt',compact('payment','user','reservation'));
    }

}
