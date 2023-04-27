<?php

namespace App\Http\Controllers;

use DateTime;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Core\Exception\ServiceException;
use Google\Cloud\Core\LongRunning\OperationsClient as LROClient;
use Google\Cloud\Core\LongRunning\OperationsClientInterface;
use Google\Cloud\Core\LongRunning\OperationsTransport;
use Google\Cloud\Meet\V1\Meeting;
use Google\Cloud\Meet\V1\MeetingServiceClient;
use App\GoogleMeetService;
use Carbon\Carbon;
use Illuminate\Http\Request;


// use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    public function google_meet(){
    
        $event = new Event;

        $event->name = 'test';
        $event->description = 'Event descriptionfff';
        $event->startDateTime = Carbon::now()->addHour();
        $event->endDateTime = Carbon::now()->addHours(2);
        // $event->addAttendee([
        //     'email' => 'islamshublaq@hotmail.com',
        //     'name' => 'John Doe',
        //     'comment' => 'Lorum ipsum',
        // ]);
        $event->addAttendee(['email' => 'attendee@example.com']);
        
        // $event->addAttendee([
        //     'email' => 'islamshu12@gmail.com',
        //     'name' => 'juan',
        //     'comment' => 'prueba de la API',
        // ]);
        
        // $optParams = [
        //     'sendNotifications' => true
        // ];
        
        $event->save();
        dd($event);
    }
    public function createMeeting(Request $request)
    {
        $summary = 'test';
        $description = 'test';
        $startTime = now()->addHour();
        $endTime = now()->addHours(2);
        $emails =['islamshu12@gmail.com'];
        
        // $newDateTime = Carbon::now()->addHours(5);
        
        $googleAPI = new GoogleMeetService();
        $event= $googleAPI->list();
        // $event = $googleAPI->createMeet($summary, $description, $startTime, $endTime,$emails);
        // dd($event);
        // return response()->json([
        //     'event' => $event,
        // ]);
    }
}
