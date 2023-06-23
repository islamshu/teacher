<?php

namespace App\Http\Controllers;

use App\Mail\ForgetEmail;
use App\Models\Company;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Omnipay\Omnipay;


class UserController extends Controller
{
    public function contact_us(Request $request){
        dd($request);
    }
    public function company_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'companyEmail' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('teachers', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('companies', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'commercialRegister' => 'required|mimes:pdf',
            'companyPassword' => 'required|string|min:8',
            'confirmPassword' => 'required|same:companyPassword'
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $company = new Teacher();
        $company->type ='school';
        $company->name = $request->input('companyName');
        $company->email = $request->input('companyEmail');
        $company->password = Hash::make($request->input('companyPassword'));
        $company->commercialRegister = $request->commercialRegister->store('commercialRegister');
        $company->image =  $request->image->store('image');

        $company->save();
        Auth::guard('teacher')->login($company);
        return response()->json(['success' => 'true'], 200);
    }
    public function teacher_register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'teacherName' => 'required|string|max:255',
            'teacherEmail' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('teachers', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('companies', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'whataspp_number'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'cv' => 'required|mimes:pdf',
            'country' => 'required',
            'country' => 'required',
            'years_of_experience' => 'required',
            'job' => 'required',
            'educational_material' =>$request->job == 'معلم'? 'required':'',
            'teachePassword' => 'required|string|min:8',
            'teacheConformPassword' => 'required|same:teachePassword'
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $taecher = new Teacher();
        $taecher->type = 'teacher';
        $taecher->name = $request->teacherName;
        $taecher->email = $request->teacherEmail;
        $taecher->whataspp_number = $request->whataspp_number;
        $taecher->password = Hash::make($request->input('teachePassword'));
        $taecher->country = $request->country;
        $taecher->export_number = $request->years_of_experience;
        $taecher->educational_material = $request->educational_material;
        $taecher->cv = $request->cv->store('teacher_cv');
        $taecher->image = $request->image->store('teacher');
        $taecher->job = $request->job;
        $taecher->save();
        Auth::guard('teacher')->login($taecher);
        return $this->pay_user($request);
        
        return response()->json(['success' => 'true'], 200);
    }
    public function pay_user(Request $request){
        $user =auth('teacher')->user();
        $gateway = Omnipay::create('Thawani');
        $gateway->setPublishKey('Oekp7nl7ip7GLi46mDJKh7gq5UTXKU');
        $gateway->setSecretKey('HXk8nlGdYza3TI3QbzmllTAkZsNicv');
        // $gateway->setTestMode(true-false);
        $rand_number = rand(111111111111111111,999999999999999999);
        $purchase = $gateway->purchase();
        $purchase->setAmount(25000);
        $purchase->setQuantity(1);
        $purchase->setProductName("Register in Teacher"); //Product name is required
        $purchase->setTransactionId($rand_number); //TransactionId is required
        $purchase->setCustomerId('');
        $purchase->setReturnUrl(route('success_paid')); //The success url is required
        $purchase->setCancelUrl(route('canceld_paid'));  //The cancel url is required
        $purchase->setSaveCardOnSuccess(false);
        $purchase->setPlanId('');
        // The metadata about the customer is required, like name, email
        $purchase->setMetadata([
            'orderId' => $rand_number,
            'customerId' => $user->id,
            'customerEmail' => $user->email,
            'customerName' => $user->name,// user full name
        ]);

        $result = $purchase->send();
        $response = $result->getData();
        $redirectUrl = $result->getRedirectUrl();
        $user->invoice = $response['data']['invoice'];
        $user->save();
        return response()->json(['status'=>true,'url'=>$redirectUrl]);



    }
    public function pay_user_new(Request $request){
        $user =auth('teacher')->user();
        $gateway = Omnipay::create('Thawani');
        $gateway->setPublishKey('Oekp7nl7ip7GLi46mDJKh7gq5UTXKU');
        $gateway->setSecretKey('HXk8nlGdYza3TI3QbzmllTAkZsNicv');
        // $gateway->setTestMode(false);
        $rand_number = rand(111111111111111111,999999999999999999);
        $purchase = $gateway->purchase();
        $purchase->setAmount(25000);
        $purchase->setQuantity(1);
        $purchase->setProductName("Register in Teacher"); //Product name is required
        $purchase->setTransactionId($rand_number); //TransactionId is required
        $purchase->setCustomerId('');
        $purchase->setReturnUrl(route('success_paid')); //The success url is required
        $purchase->setCancelUrl(route('canceld_paid'));  //The cancel url is required
        $purchase->setSaveCardOnSuccess(false);
        $purchase->setPlanId('');
        // The metadata about the customer is required, like name, email
        $purchase->setMetadata([
            'orderId' => $rand_number,
            'customerId' => $user->id,
            'customerEmail' => $user->email,
            'customerName' => $user->name,// user full name
        ]);

        $result = $purchase->send();
        $response = $result->getData();
        $redirectUrl = $result->getRedirectUrl();
        $user->invoice = $response['data']['invoice'];
        $user->save();
        return redirect($redirectUrl);
        // dd($redirectUrl);
        // return response()->jso؟n(['url' => $redirectUrl], 200);


    }
    public function teacher_update(Request $request)
    {
        $taecher = auth('teacher')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('teachers', 'email')->where(function ($query) use($taecher) {
                    return $query->whereNull('deleted_at')->where('id','!=',$taecher->id);
                }),
                Rule::unique('companies', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'whataspp_number'=>'required',
            'country' => 'required',
            'years_of_experience' => 'required',
            'job'=>'required',
            'educational_material' =>$request->job =='معلم' ? 'required' :'',
        ]);
        if($request->image != null){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        if($request->cv != null){
            $request->validate([
                'cv' => 'required|mimes:pdf',
            ]);
        }

        // If validation fails, return the errors as JSON
        
        $taecher->name = $request->name;
        $taecher->email = $request->email;
        $taecher->whataspp_number = $request->whataspp_number;
        $taecher->job = $request->job;
        // $taecher->password = Hash::make($request->input('teachePassword'));
        $taecher->country = $request->country;
        $taecher->export_number = $request->years_of_experience;
        $taecher->educational_material = $request->educational_material;
        if($request->cv != null){
            $taecher->cv = $request->cv->store('teacher_cv');
        }
        if($request->image != null){
            $taecher->image = $request->image->store('teacher');
        }
        $taecher->save();
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
        

    }
    public function login_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            // Authentication was successful
            $user = Company::where('email', $request->email)->first();
            Auth::guard('company')->login($user);
            return response()->json(['success' => 'true'], 200);
        } elseif(Auth::guard('teacher')->attempt($credentials)) {
            // Authentication failed
            $user = Teacher::where('email', $request->email)->first();
            Auth::guard('teacher')->login($user);
            return response()->json(['success' => 'true'], 200);

        }elseif(Auth::attempt($credentials)){
            $user = User::where('email', $request->email)->first();
            Auth::guard('web')->login($user);
            return response()->json(['success' => 'true'], 200);

        }else{
            return response()->json(['errors' => ' البريد الاكتروني او كلمة المرور خاطئة'], 422);
        }
    }
    public function forget_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emailforget' => 'required|email',
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email',$request->emailforget)->first();
        if(!$user){
            $user = Teacher::where('email',$request->emailforget)->first();
            if(!$user){
                return response()->json(['success' => 'false','message'=>'البريد الاكتروني غير متواجد في حساباتنا'], 200);
            }
            Mail::to($user->email)->send(new ForgetEmail($user));
            return response()->json(['success' => 'true','message'=>'ـم ارسال بريد الكتوني يحتوي على كلمة المرور'], 200);

            // dd($user);
        }
       
    }
    
    public function dashboard()
    {
        if ((auth()->check())) {
            return view('layouts.backend');
        } else {
            
            if (auth('teacher')->check()) {
                if(auth('teacher')->user()->type == 'teacher'){
                    $user = auth('teacher')->user();
                    return view('frontend.profile_teacher')->with('user', $user);
                }else{
                    $user = auth('teacher')->user();
                    return view('frontend.profile')->with('user', $user);
                }
                
            }
            return redirect('/');
        }
    }
    public function company_update(Request $request)
    {
        $user = auth('teacher')->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies,email,' . $user->id,
        ]);
        if ($request->image != null) {
            $user->image = $request->image->store('user');
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();
        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
    }
    public function logout_user()
    {
        if( auth('company')->check()){
            Auth::guard('company')->logout();
            return redirect('/');

        }elseif(auth()->check()){
            Auth::guard('web')->logout();
            return redirect('/');

        }elseif(auth('teacher')->check()){
            Auth::guard('teacher')->logout();
            return redirect('/');

        }else{
            return redirect('/');
        }



        return redirect('/');
    }
}
