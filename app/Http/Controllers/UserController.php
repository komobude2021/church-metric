<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $groups = $this->getChurchGroup();
        $memberMinistries = $this->getMemberMinistries();
        $remainingMinistries = $this->getRemainingMinistries($memberMinistries);
        return view("user.dashboard", ['groups'=>$groups, 'memberMinistries'=>$memberMinistries, 
                    'remainingMinistries'=>$remainingMinistries]);
    }

    public function addMinistry(Request $req){
        dd($req->all());
    }

    private function getChurchGroup(){
        $groups = DB::table('church_group')
                  ->select('id', 'name')
                  ->orderBy('id', 'asc')
                  ->get();
        return $groups;
    }

    private function getMemberMinistries(){
        $memberMinistries = DB::table('church_ministry')
                            ->join('member_ministry', 'church_ministry.id', '=', 'member_ministry.church_ministry_id')
                            ->select('church_ministry.id', 'church_ministry.name')
                            ->where('member_ministry.member_id', Auth::user()->id)
                            ->get();
        return $memberMinistries;
    }

    private function getRemainingMinistries($memberMinistries){

        if(count($memberMinistries) == 0){
            $remainingMinistries = DB::table('church_ministry')
                                   ->select('id', 'name')
                                   ->orderBy('name', 'asc')
                                   ->get();
            return $remainingMinistries;
        }

        $a = [];
        foreach ($memberMinistries as $memberMinistry) {
            array_push($a, $memberMinistry->id);
        }
        $remainingMinistries = DB::table('church_ministry')
                                ->select('id', 'name')
                                ->orderBy('name', 'asc')
                                ->whereNotIn('id', $a)
                                ->get();
        return $remainingMinistries;
    }

}
