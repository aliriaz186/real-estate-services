<?php
namespace App\Http\Controllers;

use App\Booking;
use App\Contactus;
use App\EmailSignup;
use App\Http\Controllers\Controller;
use App\professionalprofile;
use App\ProfessionalProfileImage;
use App\Staff;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function landing(){
        $users = User::where('user_type', 'professional')->get();
        foreach ($users as $user){
            $user->profile = professionalprofile::where('user_id', $user->id)->first();
            $user->images = ProfessionalProfileImage::where('user_id', $user->id)->get();
        }
        return view('landing.landing')->with(['users' => $users]);
    }
    public function get(Request $request)
    {
        $user_id = $request->get("uid", 0);
        $user = User::find($user_id);
        return $user;
    }

    public function login(Request $request){
        try {
            if (User::where(['email' => $request->email, 'password' => md5($request->password)])->exists()) {
                $id = User::where(['email' => $request->email, 'password' => md5($request->password)])->first()['id'];
                Session::put('userId', $id);

                Session::remove('isAdmin');
                $user = User::where(['email' => $request->email, 'password' => md5($request->password)])->first();
                Session::put('user_type', $user->user_type);
                if ($user->user_type == 'customer'){
                    return redirect('');
                }else{
                    if (professionalprofile::where('user_id', $id)->exists()){
                        return redirect('');
                    }else{
                        return redirect('professional-registration');

                    }
                }
            } else {
                return redirect()->back()->withErrors(['Invalid username or password']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['There is server error right now. Please try again later']);
        }

    }

    public function signup(Request $request){
        try {
            if (empty($request->name) || empty($request->email) || empty($request->userType) || empty($request->password)){
                return redirect()->back()->withErrors(['Invalid Inputs. Please provide valid info.']);
            }
            if (!User::where(['email' => $request->email])->exists()) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->user_type = $request->userType;
                $user->password = md5($request->password);
                $user->save();
                Session::put('userId', $user->id);
                Session::put('user_type', $user->user_type);
                Session::remove('isAdmin');
                if ($user->user_type == 'customer'){
                    return redirect('');
                }else{
                    return redirect('professional-registration');
                }

            } else {
                return redirect()->back()->withErrors(['Email Already Exists']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function logout(){
        Session::flush();
        return redirect('');
    }

    public function saveContactus(Request $request){
        try {
            if (empty($request->name) || empty($request->email) || empty($request->subject) || empty($request->message)) {
                return redirect()->back()->withErrors(['Invalid Inputs. Please provide valid info.']);
            }
            $contact = new Contactus();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            session()->flash('msg', 'Message Sent Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['There is server Error. Please try again later.']);
        }
    }

    public function saveProfessionalRegistration(Request $request){
        try {
            if (empty($request->serviceType) || empty($request->area) || empty($request->price) || empty($request->language)) {
                return redirect()->back()->withErrors(['Invalid Inputs. Please provide valid info.']);
            }
            $professionalProfile = new professionalprofile();
            $professionalProfile->service_type = $request->serviceType;
            $professionalProfile->area = $request->area;
            $professionalProfile->price = $request->price;
            $professionalProfile->language = $request->language;
            $professionalProfile->user_id = Session::get('userId');
            $professionalProfile->save();

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/user-files/',  $name);
                    $professionalImage = new ProfessionalProfileImage();
                    $professionalImage->image = $name;
                    $professionalImage->user_id = Session::get('userId');
                    $professionalImage->save();
                }

            }
            return redirect('');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function updateProfessionalRegistration(Request $request){
        try {
            if (empty($request->serviceType) || empty($request->area) || empty($request->price) || empty($request->language)) {
                return redirect()->back()->withErrors(['Invalid Inputs. Please provide valid info.']);
            }
            if (empty($request->name) || empty($request->phone)) {
                return redirect()->back()->withErrors(['Invalid Inputs. Please provide valid info.']);
            }
            $user = User::where('id', Session::get('userId'))->first();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->update();
            if (professionalprofile::where('user_id', Session::get('userId'))->exists()){
                $professionalProfile = professionalprofile::where('user_id', Session::get('userId'))->first();
                $professionalProfile->service_type = $request->serviceType;
                $professionalProfile->area = $request->area;
                $professionalProfile->price = $request->price;
                $professionalProfile->language = $request->language;
                $professionalProfile->update();
            }else{
                $professionalProfile = new professionalprofile();
                $professionalProfile->service_type = $request->serviceType;
                $professionalProfile->area = $request->area;
                $professionalProfile->price = $request->price;
                $professionalProfile->language = $request->language;
                $professionalProfile->user_id = Session::get('userId');
                $professionalProfile->save();
            }

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/user-files/',  $name);
                    $professionalImage = new ProfessionalProfileImage();
                    $professionalImage->image = $name;
                    $professionalImage->user_id = Session::get('userId');
                    $professionalImage->save();
                }

            }
            session()->flash('msg', 'Info Saved Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function updateCustomerRegistration(Request $request){
        try {
            if (empty($request->name) || empty($request->phone)) {
                return redirect()->back()->withErrors(['Invalid Inputs. Please provide valid info.']);
            }
            $user = User::where('id', Session::get('userId'))->first();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->update();
            session()->flash('msg', 'Info Saved Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function userFile($id){
        $img = ProfessionalProfileImage::where('id', $id)->first();
        $file =  base_path('/data') . '/user-files/' . $img->image;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function deleteFile($id){
        $img = ProfessionalProfileImage::where('id', $id)->first();
        $img->delete();
        session()->flash('msg', 'Picture Deleted Successfully!');
        return redirect()->back();
    }

    public function professionalDashboard(){
        if (empty(Session::get('userId'))){
            session()->flash('msg', 'Please Login to access Professional Dashboard!');
            return redirect('');
        }
        $professionalId = professionalprofile::where('user_id', Session::get('userId'))->first()['id'];
        $bookingCount = Booking::where('professional_id', $professionalId)->count();
        return view('professional-dashboard.home')->with(['bookingCount' => $bookingCount]);
    }

    public function emailSignup(Request $request){
        $emailSignup = new EmailSignup();
        $emailSignup->email = $request->email;
        $emailSignup->save();
        session()->flash('msg', 'Thanks! We have got your email, we will send latest information to your email');
        return redirect()->back();
    }
}
