<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hire;
use App\Models\Appointment;
use App\Models\Form_data;
use App\Models\CommingSoonRequest;
class StaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function advertise()
    {

        return view('frontend.advertise');
    }
    public function policy()
    {
        return view('frontend.policy');
    }
    public function disclaimer()
    {
        return view('frontend.disclaimer');
    }

    public function enquiry()
    {
        return view('frontend.enquiry');
    }

    public function seller()
    {

        return view('frontend.become_seller');

    }
    public function helpcenter()
    {

        return view('frontend.help_center');

    }
    public function appointment()
    {

        return view('frontend.appointment');

    }
    public function aboutus()
    {

        return view('frontend.about_us');

    }

    public function residentilal()
    {

        return view('frontend.residentilal');

    }
    public function commercial()
    {

        return view('frontend.commercial');

    }
    public function architect()
    {

        return view('frontend.architect');

    }
    public function interior()
    {

        return view('frontend.interior');

    }
    public function building()
    {

        return view('frontend.building');

    }

    public function blog()
    {

        return view('frontend.blog');

    }

    public function news()
    {

        return view('frontend.news_media');

    }

    public function talkto()
    {

        return view('frontend.talk_to');

    }

    public function plumber()
    {

        return view('frontend.plumber_electrician');

    }
    public function salespartner()
    {

        return view('frontend.sales_partner');

    }
    public function material()
    {

        return view('frontend.material_supplier');

    }
    public function labour()
    {

        return view('frontend.labour_supllier');

    }
    public function engineerarchitect()
    {

        return view('frontend.engineer_architect');

    }
    public function career()
    {
        return view('frontend.career');
    }

    public function contact()
    {

        return view('frontend.contact_us');

    }
    public function orderFreeSample()
    {
        return view('frontend.order_free_sample');
    }
    public function bulkOrderTwo(){
      return view('frontend.bluk_order_two');
    }
    public function hireNow()
    {
        return view('frontend.hirenow');
    }
    public function designExplorer()
    {
        return view('frontend.design_explorer');
    }
    public function addformdata(Request $request)
    {

        $data = array(
            "full_name" => $request->fullname,
            "email" => $request->email,
            "phone_no" => $request->phoneno,
            "messege" => $request->message,
            "form_type" => $request->form_type,
        );

        $ins = \DB::table('form_data')->insert($data);

        return redirect()->back();
    }

    public function addcareerformdata(Request $request)
    {
        $name = "";
        if ($request->hasFile('imagefile'))
        {
            $image = $request->file('imagefile');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);

        }

        $data = array(
            "fullname" => $request->fullname,
            "email" => $request->email,
            "phone_no" => $request->phoneno,
            "address" => $request->address,
            "city" => $request->city,
            "apply_post" => $request->post_apply,
            "enrollment_type" => $request->enrollment_type,
            "images" => $name,
            "messege" => $request->message,
        );

        $ins = \DB::table('career_form')->insert($data);

        return redirect()->back();

    }
    public function addHireNow(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|digits:10|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'post_apply' => 'required',
            'enrollment_type' => 'required',
            

        ]);
        $img = "";
        if ($request->hasFile('imagefile'))
        {
            $image = $request->file('imagefile');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $img);

        }
        $hirenow = Hire::create([
            "name" => "$request->name",
            "mobile" => "$request->mobile",
            "email" => "$request->email",
            "address" => "$request->address",
            "city" => "$request->city",
            "apply_post" => "$request->post_apply",
            "enrollment_types" => "$request->enrollment_type",
            "photo" => $img,
            "message" => $request->message,
        ]);
        if ($hirenow) {
            return redirect()->back()->with(session()->flash('alert-success', 'Requested Successfully!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function bookAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'message' => 'required|',
        ]);
        
        $appointment = Appointment::create([
            "name" => "$request->name",
            "email" => "$request->email",
            "phone" => "$request->phone",
            "message" => "$request->message",
        ]);
        if ($appointment) {
            return redirect()->back()->with(session()->flash('alert-success', 'Thank you for booking Appointment!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function insertFormData(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|digits:10|numeric',
            'message' => 'required',
            'form_type' => 'required',
        ]);
        
        $insertdata = Form_data::create([
            "full_name" => "$request->full_name",
            "email" => "$request->email",
            "phone_no" => "$request->phone_no",
            "message" => "$request->message",
            "form_type" => "$request->form_type",
        ]);
        if ($insertdata) {
            return redirect()->back()->with(session()->flash('alert-success', 'Thank you for Enquiry!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    } 

    public function comming_soon_form(Request $request)
    {
        $request->validate([
            "contact" => "required",
        ]);
        $insertdata = CommingSoonRequest::create([
            "contact" => "$request->contact",
        ]);

        if ($insertdata) {
            return redirect()->back()->with(session()->flash('alert-success', 'Thanks for Submitting! We will reach out to you soon.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function collaboration(){
        return view('frontend.collaboration');
    }
	
	public function collaborationDetails(){
        return view('frontend.collaborationDetails');
    }
	
	public function collaborationOwner(){
        return view('frontend.collaborationOwner');
    }
	
	public function investors(){
        return view('frontend.investors');
    }
	
	public function investorszone(){
        return view('frontend.investorszone');
    }
	
	public function investorszonecommercial(){
        return view('frontend.investorszonecommercial');
    }

    public function projectdetails(){
        return view('frontend.projectdetails');
    }
	
	public function buy_sell(){
        return view('frontend.buy_sell');
    }	
	
	public function buy_list(){
        return view('frontend.buy_list');
    }
	public function builderprojectdetails(){
        return view('frontend.builderprojectdetails');
    }
}