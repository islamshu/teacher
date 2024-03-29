<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\Job;
use App\Models\Teacher;
use App\Models\TeacherJob;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function updatedJobStatus(Request $request){
        $job = Job::find($request->job_id);
        $job->status = $request->status;
        $job->save();
    }
    public function deleteJob($id){
        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with(['success'=>'تم حذف الوظيفة بنجاح']);

    }
    public function add_request_job(Request $request){
        if(!auth('teacher')->check()){
            return response()->json(['success' => 'false','message'=>'لا يمكنك ارسال طلب ! فقط المعلمين من يمكنهم الارسال . '], 200);
        }
        if(auth('teacher')->user()->type == 'school'){
            return response()->json(['success' => 'false','message'=>'لا يمكنك ارسال طلب ! فقط المعلمين من يمكنهم الارسال . '], 200);
        }
        if(auth('teacher')->user()->is_paid != 1){
            return response()->json(['success' => 'false','message'=>'يجب عليك الدفع اولا '], 200);

        }

        
        if(!TeacherJob::where('job_id',$request->job_id)->where('teacher_id',auth('teacher')->id())->first()){
            $job = new TeacherJob();
            $job->job_id = $request->job_id;
            $job->teacher_id = auth('teacher')->id();
            $job->save();
            return response()->json(['success' => 'true','message'=>'تم الارسال بنجاح'], 200);
        }else{
            return response()->json(['success' => 'false','message'=>'لقد قمت بالارسال من قبل'], 200);
        }


    }
    public function job($id){
        $id = decrypt($id);
        $job = Job::find($id);
        $jobs = Job::where('id','!=',$job->id)->where('status',1)->where('start_at','<',now())->where('end_at','>',now())->inRandomOrder()->limit(2)->get();

        return view('frontend.job')->with('job',$job)->with('jobs',$jobs);

    }
    public function canceld_paid(){
        return redirect()->route('home');
    }
    public function success_paid(){
        $user = auth('teacher')->user();
        $user->is_paid = 1;
        $user->save();
        return view('success_paid');
    }
    public function send_job_request(Request $request){
        $user = auth('teacher')->user();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date'=>'date|required',
            'end_date'=>'date|required',
        ]);
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->start_at = $request->start_date;
        $job->end_at = $request->end_date;
        $job->user_id = $user->id;
        $job->educational_material = $request->educational_material;
        $job->save();
        return redirect()->back()->with(['success' => 'تم اضافة الوظيفة بنجاح']);
    }
    public function teachersjob($id){
        $job = Job::with('teachers')->find($id);
        return view('frontend.teacher')->with('job',$job);
        // dd($job->teachers);
    }
    public function pay_user(Request $request){
        dd(auth('teacher')->id());
        $gateway = Omnipay::create('Thawani');
        $gateway->setPublishKey('HGvTMLDssJghr9tlN9gr4DVYt0qyBy');
        $gateway->setSecretKey('rRQ26GcsZzoEhbrP2HZvLYDbn9C9et');
        $gateway->setTestMode(true-false);
        $rand_number = rand(111111111111111111,999999999999999999);
        $purchase = $gateway->purchase();
        $purchase->setAmount(12000);
        $purchase->setQuantity(1);
        $purchase->setProductName("Register in Teacher"); //Product name is required
        $purchase->setTransactionId($rand_number); //TransactionId is required
        $purchase->setCustomerId('');
        $purchase->setReturnUrl('https://www.example.com/thawani/success'); //The success url is required
        $purchase->setCancelUrl('https://www.example.com/thawani/cancel');  //The cancel url is required
        $purchase->setSaveCardOnSuccess(false);
        $purchase->setPlanId('');
        // The metadata about the customer is required, like name, email
        $purchase->setMetadata([
            'orderId' => $rand_number,
            'customerId' => 1,
            'customerEmail' => 'islamshu12@gmail.com',
            'customerName' => 'islam',// user full name
        ]);

        $result = $purchase->send();
        $response = $result->getData();
        $redirectUrl = $result->getRedirectUrl();
        array_push($response,$redirectUrl);
        return $response;

        return $response['data']['session_id'];

    }
    public function teachers(Request $request)
    {
        $query = Teacher::query()->where('is_paid',1)->where('type','teacher');
        if ($request->has('country') &&  $request->country != null) {
            $query->where('country', 'like', '%' . $request->input('country') . '%');
        }
    
        if ($request->has('job') &&  $request->job != null) {
            
            $query->where('job', $request->input('job'));
        }
        if ($request->has('educational_material') &&  $request->educational_material != null) {

            $query->where('educational_material', $request->input('educational_material'));
        }
        if ($request->has('years_experince') &&  $request->years_experince != null) {
            $query->where('export_number', $request->input('years_experince'));
        }
        if ($request->has('status') &&  $request->status != null) {
            $query->where('status', $request->input('status'));
        }
                
        

        
        $teachers = $query->orderby('id','desc')->paginate(9);
        
        return view('frontend._fillter',compact('teachers','request'));
    }
    public function jobs(Request $request)
    {
        $query = Job::query()->where('status',1)->where('start_at','<',now());
        
    
        if ($request->has('educational_material') &&  $request->educational_material != null) {

            $query->where('educational_material', $request->input('educational_material'));
        }
        
                
        

        
        $jobs = $query->orderby('id','desc')->paginate(9);
        
        return view('frontend.jobs',compact('jobs','request'));
    }
    public function setting(){
        return view('dashboard.setting');
    }
    public function socal(){
        return view('dashboard.socal');
    }

    
    public function add_general(Request $request)
    {
        if ($request->hasFile('general_file')) {
            foreach ($request->file('general_file') as $name => $value) {
                if ($value == null) {
                    continue;
                }
                GeneralInfo::setValue($name, $value->store('general'));
            }
        }

        foreach ($request->input('general') as $name => $value) {
            if ($value == null) {
                continue;
            }
            GeneralInfo::setValue($name, $value);
        }

        return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
