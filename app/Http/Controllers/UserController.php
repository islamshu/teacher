<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
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
            'commercialRegister' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'companyPassword' => 'required|string|min:8',
            'confirmPassword' => 'required|same:companyPassword'
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $company = new Company();
        $company->name = $request->input('companyName');
        $company->email = $request->input('companyEmail');
        $company->password = Hash::make($request->input('companyPassword'));
        $company->commercialRegister = $request->commercialRegister->store('commercialRegister');
        $company->image = 'company/user_defult.webp';
        $company->save();
        Auth::guard('company')->login($company);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'cv' => 'required',
            'country' => 'required',
            'country' => 'required',
            'education_level' => 'required',
            'educational_material' => 'required',
            'teachePassword' => 'required|string|min:8',
            'teacheConformPassword' => 'required|same:teachePassword'
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $taecher = new Teacher();
        $taecher->name = $request->teacherName;
        $taecher->email = $request->teacherEmail;
        $taecher->password = Hash::make($request->input('teachePassword'));
        $taecher->country = $request->country;
        $taecher->education_level = $request->education_level;
        $taecher->educational_material = $request->educational_material;
        $taecher->cv = $request->cv->store('teacher_cv');
        $taecher->image = $request->image->store('teacher');
        $taecher->save();
        Auth::guard('teacher')->login($taecher);
        return response()->json(['success' => 'true'], 200);
    }
    public function login_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emailUser' => 'required|email',
            'passwordUser' => 'required',
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'passowrd');

        if (Auth::guard('company')->attempt($credentials)) {
            // Authentication was successful
            $user = Company::where('email', $request->emailUser)->first();
            Auth::guard('company')->login($user);
            return response()->json(['success' => 'true'], 200);
        } else {
            // Authentication failed
            return response()->json(['errors' => 'email or password error'], 422);
        }
    }
    public function dashboard()
    {
        if ((auth()->check())) {
            return view('layouts.backend');
        } else {
            if (auth('company')->check()) {
                $user = auth('company')->user();
                return view('frontend.profile')->with('user', $user);
            }
            return redirect('/');
        }
    }
    public function company_update(Request $request)
    {
        $user = auth('company')->user();
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
        return redirect()->back()->with(['success' => 'Updated Succeffuly']);
    }
    public function logout_user()
    {
        $user = auth('company')->user();
        Auth::guard('company')->logout();



        return redirect('/');
    }
}
