<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function success_paid(){
        $user = auth('teacher')->user();
        $user->is_paid = 1;
        $user->save();
        return view('success_paid');
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
        $query = Teacher::query()->where('is_paid',1);
        if ($request->has('country') &&  $request->country != null) {
            $query->where('country', 'like', '%' . $request->input('country') . '%');
        }
    
        if ($request->has('educational_material') &&  $request->educational_material != null) {

            $query->where('educational_material', $request->input('educational_material'));
        }
        if ($request->has('years_experince') &&  $request->years_experince != null) {
            $query->where('export_number', $request->input('years_experince'));
        }
                
        

        
        $teachers = $query->orderby('id','desc')->paginate(9);
        
        return view('frontend._fillter',compact('teachers','request'));
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
