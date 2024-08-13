<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    private $userId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userId = Auth::id();
            return $next($request);
        });
    }

    public function viewPageFunction(){
            // Count the total number of appointments for the user
            $totalAppointments = Appointment::where('user_id', $this->userId)->count();
            $userName = DB::table('users')->where('id', $this->userId)->value('name');
            $appointments = Appointment::where('user_id', $this->userId)->paginate(10);
            return view('dashboard',[
                'totalAppointments' => $totalAppointments,
                'appointments' => $appointments,
                'userName' => $userName,
            ]);
    }
   
    public function create(Request $request){
       
            if ($request->isMethod('post')) {
                $request->validate([
                    'date' => 'required|date',
                    'time' => [
                        'required',
                        'date_format:H:i',
                    ],
                ]);

                // check if there is already an appointment at the same date and time
                $existingAppointment = DB::table('appointments')
                    ->where('date', $request->input('date'))
                    ->where('time', $request->input('time'))
                    ->first();

                if ($existingAppointment) {
                    return redirect()->route('create')->with('error', 'The selected time is already booked. Please choose a different time.');
                }

                $appointment = new Appointment();
                $appointment->user_id = $this->userId;
                $appointment->date = $request->input('date');
                $appointment->time = $request->input('time');

                if ($appointment->save()) {
                    return redirect()->route('create')->with('success', 'The appointment was successfully registered');
                } else {
                    return redirect()->route('create')->with('error', 'There was a problem saving the appointment.');
                }
            }

            // Fetch only the appointments for the authenticated user
            $appointments = Appointment::where('user_id', $this->userId)->paginate(10);
             // Fetch the email directly from the users table
            $userEmail = DB::table('users')->where('id', $this->userId)->value('email');
            return view('create', [
                'appointments' => $appointments,
                'userEmail' => $userEmail 
            ]);

            // Redirect to login if the user is not authenticated
            return redirect()->route('login');
    }

        public function appointment_delete(appointment $appointment){
            $appointment->delete();
            return redirect()->route('create')->with('error_delete', 'The appointment was successfully deleted.');
        }

        public function appointment_edit(appointment $appointment,Request $request){
           
                if ($request->isMethod('post')) {
                    $request->validate([
                        'date' => 'required|date',
                        'time' => [
                            'required',
                            'date_format:H:i',
                        ],
                    ]);

                    $existingAppointment = DB::table('appointments')
                        ->where('date', $request->input('date'))
                        ->where('time', $request->input('time'))
                        ->first();

                    if ($existingAppointment) {
                        return redirect()->route('update',['appointment' => $appointment])->with('error', 'The selected time is already booked. Please choose a different time.');
                    }
                        $appointment->date = $request->get('date');
                        $appointment->time = $request->get('time');
                        if($appointment->save()){
                            return redirect()->route('update',['appointment' => $appointment])->with('info_update','Your appointment has been successfully changed');
                        } else {
                            return redirect()->route('update')->with('error','There was a problem saving the appointment.');
                        }
                }
                    $userEmail = DB::table('users')->where('id', $this->userId)->value('email');
                    return view('update',[
                        'appointment' => $appointment,
                        'userEmail' => $userEmail 
                    ]);
        
            return redirect()->route('login');
        }
}