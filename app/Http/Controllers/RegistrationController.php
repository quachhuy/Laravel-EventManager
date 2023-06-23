<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Attendee;
use App\Models\Event;
class RegistrationController extends Controller
{
    public function getallRegistrations(){
        $registrations = Registration::all()->reverse();
        $events = Event::all()->reverse();
        return view('Registration.index', compact('registrations','events'));
    }

    public function saveRegistration(Request $request){

       // Lấy dữ liệu từ form
    $name = $request->input('name');
    $email = $request->input('email');
    $eventTitle = $request->input('event_title');

    // Tìm sự kiện theo tiêu đề
    $event = Event::where('title', $eventTitle)->first();

    if ($event) {
        // Tạo một người tham dự mới
        $attendee = new Attendee;
        $attendee->name = $name;
        $attendee->email = $email;
        $attendee->save();

        // Tạo một bản ghi đăng ký mới
        $registration = new Registration;
        $registration->event_id = $event->event_id;
        $registration->attendee_id = $attendee->attendee_id;
        $registration->save();

        return redirect()->route('getAllRegistrations')->with('success', 'Registration saved!');
    } else {
        return redirect()->route('getAllRegistrations')->with('error', 'Error!');
    }
    }

    public function editRegistration($id){

        $registration = Registration::find($id);
        $events = Event::all()->reverse();
        return view('Registration.edit', compact('registration','events'));
    }

    public function updateRegistration(Request $request, $id){
        $registration = Registration::find($id);

        $attendee = Attendee::find($registration->attendee_id);

        $event = Event::find($registration->event_id)->first();

        $attendee_id = $registration->attendee_id;
        if ($event) {
            $registration->event_id = $event->event_id;
            $attendee->name = $request->input('name');
            $attendee->email = $request->input('email');

            
            $registration->save();
            $attendee->save();

        return redirect()->route('getAllRegistrations')->with('success', 'Registration updated!');
        } else {
        return redirect()->back()->with('error', 'Event not found!');
        }
    }
    public function deleteRegistration($id){
        $registration = Registration::find($id);
        $attendee = Attendee::find($registration->attendee_id);
        $attendee->delete();
        $registration->delete();
        return redirect()->route('getAllRegistrations')->with('success', 'Registration deleted!');
    }

}
