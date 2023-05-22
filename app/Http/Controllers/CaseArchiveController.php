<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Enemy_Clients;
use App\Models\Enemy_Lawyers;
use Illuminate\Http\Request;

class CaseArchiveController extends Controller
{
    public function index()
    {

        return view('cases.archive');
    }

    public function showAll()
    {
        //  null  يوجد تاريخ مو deleted_at   تعني رجعلي كل القضايا يلي بالداتا بيز يلي بحقل ال
        //يعني مو محذوفة

        $casesArray = [];
        $i = 0;
        $cases = Cases::onlyTrashed()->get();

        foreach ($cases as $case) {
            $clients = $case->clients;
            $lawyers = $case->lawyers;
            $baseNumbers = $case->baseNumbers;
            $enemyClients = $case->enemy_clients;
            $enemyLawyers = $case->enemy_lawyers;
            $sessions = $case->sessions;
            $court = $case->court;
            $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
                'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
                'court' => $court, 'sessions' => $sessions]
            ;
        }

        return response()->json(['cases' => $casesArray]);
    }
    /*public function show($id)
    {
    $casesArray = [];
    $i = 0;

    $case = Cases::withTrashed()->where('id', $id);
    $clients = $case->clients;
    $lawyers = $case->lawyers;
    $baseNumbers = $case->baseNumbers;
    $enemyClients = $case->enemy_clients;
    $enemyLawyers = $case->enemy_lawyers;
    $court = $case->court;
    $casesArray[$i++] = ['case' => $case, 'plaintiff_names' => $clients, 'plaintiff_lawyers' => $lawyers,
    'case_numbers' => $baseNumbers, 'defendant_names' => $enemyClients, 'defendant_lawyers' => $enemyLawyers,
    'court' => $court]
    ;
    return response()->json(['cases' => $casesArray]);
    }*/

    public function restore(Request $request)
    {
        $id = $request->case_id;
        if (Cases::withTrashed()->where('id', $id)->restore()) {
            return response()->json(['status' => 'success', 'message' => 'تم إلغاء الأرشفة بنجاح']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'فشل إلغاء الأرشفة']);
        }

    }

    public function destroy(Request $request)
    {
        $cases = Cases::withTrashed()->where('id', $request->case_id)->first();

        if ($cases->forceDelete()) {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'فشل الحذف ']);
        }

    }
}
