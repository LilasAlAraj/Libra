<?php

namespace App\Http\Controllers;

use App\Models\BaseNumber;
use App\Models\Cases;
use App\Models\Client_of_Cases;
use App\Models\Enemy_Clients;
use App\Models\Enemy_Clients_of_Cases;
use App\Models\Enemy_Lawyers;
use App\Models\Enemy_Lawyers_of_Cases;
use App\Models\Lawyer_of_Cases;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
{

    public function index()
    {
        return view('cases.view');
    }

    public function create()
    {
        return view('cases.add');
    }
    public function view_case()
    {
        return view('cases.view_case');
    }

    public function store(Request $request)
    {
        $Base_Numbers = $request->Base_Numbers;
        foreach ($Base_Numbers as $Base_Number) {
            $number = $Base_Number['number'];
            $date = $Base_Number['date'];
            $b_exit = BaseNumber::where('number', '=', $number)->where('date', '=', $date)->exists();

            if ($b_exit) {

                session()->flash('Erorr', 'Error the BaseNumber already exist');

                $message = "رقم الأساس " . $number . "\\" . $date . " هذا موجود من قبل";
                return response()->json(['status' => 'failed', 'message' => $message]);
            }
        }
        Cases::create([

            'court_id' => $request->court_id,

            'case_room' => $request->case_room,

            'title' => $request->title,

            'Status' => 'جارٍ العمل عليها',

            'Value_Status' => 3,
        ]);

        /******أرقام الأساس */

        $case_id = Cases::latest()->first()->id;

        foreach ($Base_Numbers as $Base_Number) {

            BaseNumber::create([

                'number' => $Base_Number['number'],

                'date' => $Base_Number['date'],

                'case_id' => $case_id,
            ]);

        }

        //-----المحاميين الخصم -------------------//
        $List_Enemy_Lawyers = $request->DefendentLawyers;

        if (!is_null($List_Enemy_Lawyers)) {

            foreach ($List_Enemy_Lawyers as $List_Enemy_Lawyer) {

                $Enemy_Lawyers = new Enemy_Lawyers();

                $Enemy_Lawyers->name = $List_Enemy_Lawyer['enemy_Lawyer_name'];

                $Enemy_Lawyers->number_phone = $List_Enemy_Lawyer['enemy_Lawyer_phone'];

                $Enemy_Lawyers->save();

                $enemy_Lawyer_of_case = new Enemy_Lawyers_of_Cases();
                $enemy_Lawyer_of_case->enemy_lawyer_id = Enemy_Lawyers::latest()->first()->id;
                $enemy_Lawyer_of_case->case_id = $case_id;
                $enemy_Lawyer_of_case->save();
            }
        }
        //------------------الخصم-------------------//

        $List_Enemy_Clients = $request->DefendentClients;

        if (!is_null($List_Enemy_Clients)) {
            foreach ($List_Enemy_Clients as $List_Enemy_Client) {

                $Enemy_Clients = new Enemy_Clients();

                $Enemy_Clients->name = $List_Enemy_Client['enemy_Client_name'];

                $Enemy_Clients->phone_number = $List_Enemy_Client['enemy_Client_phone'];

                $Enemy_Clients->save();

                $enemy_CLient_of_case = new Enemy_Clients_of_Cases();
                $enemy_CLient_of_case->enemy_client_id = Enemy_Clients::latest()->first()->id;
                $enemy_CLient_of_case->case_id = $case_id;
                $enemy_CLient_of_case->save();

            }

        }
        /*--------------العميل--------------*/
        $List_Clients = $request->PlaintaiffClients;

        foreach ($List_Clients as $List_Client) {

            Client_of_Cases::create([

                'user_id' => $List_Client,

                'case_id' => $case_id,
            ]);
        } /*--------------وكيل العميل--------------*/
        $List_Lawyers = $request->PlaintaiffLawyers;

        foreach ($List_Lawyers as $List_Lawyer) {

            Lawyer_of_Cases::create([

                'user_id' => $List_Lawyer,

                'case_id' => $case_id,
            ]);
        }

        // //------- القضية لها اكثر من جلسة ---------//

        // $case_id = Cases::latest()->first()->id;

        // $sessions = new Sessions();

        // $sessions->case_id = $case_id;

        // $sessions->date = $request->date;

        // $sessions->description = $request->description;

        // $sessions->delay_date =$request->delay_date;

        // $sessions->delay_reasons =$request->delay_reasons;

        // $sessions->save();

        // ///-------  القضية لها اكثر من قرار ---------//

        //   $case_id = Cases::latest()->first()->id;

        //   $desicions = new Desicions();

        //   $desicions->number =$request->number;

        //   $desicions->case_id = $case_id;

        //   $desicions->description = $request->description;

        //   $desicions->date = $request->date;

        //   $desicions->save();

        //---------  تفاصيل القضية --------------//

        //     if ($request->hasFile('pic'))
        //    {

        //         $cases_id = Cases::latest()->first()->id;

        //         $image = $request->file('pic');

        //         $file_name = $image->getClientOriginalName();

        //         $cases_Number = $request->cases_Number;

        //         $attachments = new Cases_attachments();

        //         $attachments->file_name = $file_name;

        //         $attachments->cases_Number = $cases_Number;

        //         $attachments->cases_id = $cases_id;

        //         $attachments->save();

        //-------- move pic ----------//

        //رح يحفظ فقط اسم المرفق بالداتا بيز اما رح يحفظ المرفق على السيرفر

        //---------public\Attachments\اسم المرفق\ رقم القضية ------

        //     $imageName = $request->pic->getClientOriginalName();

        //     $request->pic->move(public_path('Attachments/' . $cases_Number), $imageName);
        // }

        // ------- 📩 اشعار اضافة قضية -----------

        //  $user = User::get();

        //  $cases = Cases::latest()->first();

        //  Notification::send($user, new \App\Notifications\AddCase($cases));

        return response()->json(['status' => 'success', 'message' => 'تم إضافة القضية بنجاح'], 200);

    }

    public function show($id)
    {
        $casesArray = [];
        $i = 0;

        if ($id == 'all') {

            $cases = Cases::get();
            foreach ($cases as $case) {
                $baseNumbers = $case->baseNumbers;
                $enemyClients = $case->enemy_clients;
                $enemyLawyers = $case->enemy_lawyers;
                $court = $case->court;
                $sessions = $case->sessions;
                $decisions = $case->decisions;
                $attachments = $case->attachments;
                $lawyers = $case->lawyers;
                $clients = $case->clients;
                if (Auth::user()->role_name === 'زبون') {
                    foreach ($clients as $client) {
                        if (Auth::user()->id == $client->id) {
                            $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                                'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                                'court' => $court, 'sessions' => $sessions, 'decisions' => $decisions, 'attachments' => $attachments]
                            ;
                            break;

                        }
                    }

                } else if (Auth::user()->role_name === 'محامي') {
                    foreach ($lawyers as $lawyer) {
                        if (Auth::user()->id == $lawyer->id) {
                            $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                                'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                                'court' => $court, 'sessions' => $sessions, 'decisions' => $decisions, 'attachments' => $attachments]
                            ;
                            break;
                        }
                    }

                } else {
                    $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                        'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                        'court' => $court, 'sessions' => $sessions, 'decisions' => $decisions, 'attachments' => $attachments]
                    ;
                }
            }

        } else {

            $archivedCase = Cases::withTrashed()->where('id', $id)->first();
            $case = Cases::where('id', $id)->first();
            if (is_null($case)) {
                $case = $archivedCase;
            }

            $baseNumbers = $case->baseNumbers;
            $enemyClients = $case->enemy_clients;
            $enemyLawyers = $case->enemy_lawyers;
            $court = $case->court;
            $sessions = $case->sessions;
            $decisions = $case->decisions;
            $attachments = $case->attachments;
            $lawyers = $case->lawyers;
            $clients = $case->clients;
            if (Auth::user()->role_name === 'زبون') {
                foreach ($clients as $client) {
                    if (Auth::user()->id == $client->id) {
                        $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                            'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                            'court' => $court, 'sessions' => $sessions, 'decisions' => $decisions, 'attachments' => $attachments]
                        ;
                        break;

                    }
                }

            } else if (Auth::user()->role_name === 'محامي') {
                foreach ($lawyers as $lawyer) {
                    if (Auth::user()->id == $lawyer->id) {
                        $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                            'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                            'court' => $court, 'sessions' => $sessions, 'decisions' => $decisions, 'attachments' => $attachments]
                        ;
                        break;
                    }
                }

            } else {
                $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                    'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                    'court' => $court, 'sessions' => $sessions, 'decisions' => $decisions, 'attachments' => $attachments]
                ;
            }

        }
        return response()->json(['cases' => $casesArray]);

    }

    public function edit($id)
    {

        return view('cases.edit');
    }

    public function update(Request $request)
    {

        $cases = Cases::findorfail($request->cases_id);

        $cases->update([

            'court_id' => $request->court_id,

            'case_room' => $request->case_room,

            'title' => $request->title,

            'Status' => 'جارٍ العمل عليها',

            'Value_Status' => 3,

        ]);
        session()->flash('edit', 'تم تعديل القضية بنجاح');

        return back();
    }

    private function deleteDirectory($directory)
    {
        if (!is_dir($directory)) {
            return;
        }

        $files = array_diff(scandir($directory), array('.', '..'));

        foreach ($files as $file) {
            $path = $directory . '/' . $file;

            if (is_dir($path)) {
                $this->deleteDirectory($path);
            } else {
                unlink($path);
            }
        }

        rmdir($directory);
    }

    public function destroy(Request $request)
    {
        $id = $request->case_id;
        $cases = Cases::where('id', '=', $id)->first();

        $id_Archive = $request->id_Archive;

        if ($id_Archive != 2) {

            if ($cases->forceDelete()) {
                //remove all attachments files from storage
                $path = 'Attachments\Case_' . $request->case_id;
                $this->deleteDirectory($path);

                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'failed']);
            }
        } else {

            if ($cases->delete()) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'failed']);
            }

        }
    }

    public function updateDetails(Request $request)
    {
        $id = $request->id;
        $case = Cases::where('id', '=', $id)->first();
        $case->update(['claim' => $request->claim, 'facts' => $request->facts]);
        return response()->json(['status' => 'success', 'message' => 'تم تعديل تفاصيل القضية بنجاح']);

    }

    public function Status_Update(Request $request)
    {
        $id = $request->id;
        $cases = Cases::where('id', '=', $id)->first();

        if ($request->Value_Status === '1') {

            $cases->update([
                'Status' => 'رابحة',
                'Value_Status' => $request->Value_Status,
            ]);
        } elseif ($request->Value_Status === '2') {

            $cases->update([
                'Status' => 'خاسرة',
                'Value_Status' => $request->Value_Status,
            ]);
        } elseif ($request->Value_Status === '3') {

            $cases->update([
                'Status' => 'جارِ العمل عليها',
                'Value_Status' => $request->Value_Status,
            ]);
        } else {

            $cases->update([
                'Status' => 'معلقة',
                'Value_Status' => $request->Value_Status,
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'تم تعديل حالة القضية بنجاح']);

    }

    public function Case_Winning()
    {
        $cases = Cases::where('Value_Status', 1)->get();

        return view('cases.cases_winning', compact('cases'));
    }

    public function Case_Lost()
    {
        $cases = Cases::where('Value_Status', 2)->get();

        return view('cases.cases_lost', compact('cases'));
    }

    public function Case_Partial()
    {
        $cases = Cases::where('Value_Status', 3)->get();

        return view('cases.cases_Partial', compact('cases'));
    }
    public function Case_block()
    {
        $cases = Cases::where('Value_Status', 4)->get();

        return view('cases.cases_block', compact('cases'));
    }

    // public function MarkAsRead_all (Request $request)
    // {

    //     $userUnreadNotification= auth()->user()->unreadNotifications;

    //     if($userUnreadNotification) {

    //         $userUnreadNotification->markAsRead();

    //         $userUnreadNotification->save();

    //         session()->flash('mark_as_read');

    //         return back();
    //     }

    // }

}
