<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterCompleteRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $req){

        $validated = $req->validated();

        $member = DB::table('members')->insertGetId([
                    'surname' => strtolower($validated['surname']), 
                    'firstname' => strtolower($validated['firstname']), 
                    'othername' => strtolower($validated['othername']), 
                    'email' => $validated['email'], 
                    'password' => Hash::make($validated['password']), 
                    'gender' => $validated['gender'],
                    'dob' => '2022-' . $validated['month'] . '-' . $validated['day'],
                    'reg_level' => '1', 
                    'created_at' => now(),
                    'updated_at' => now()
                    ]);
        
        $token = Str::random(60);

        $member_token = DB::table('member_token')->insert([
                    'member_id' => $member,
                    'token' => $token,
                    'created_at' => now(),
                    'updated_at' => now()
                    ]);
        
        $emailArray = ['id' => $member, 'surname' => $validated['surname'], 'firstname' => $validated['firstname'], 
                       'othername' => $validated['othername'], 'token' => $token];
        
        Mail::to($validated['email'])->send(new VerificationEmail($emailArray));
        session(['verify_email' => $validated['email']]);
        return redirect('/verify');
    }


    public function verifyemail($id, $token){

        $getMember = DB::table('member_token')
                    ->where('member_id', '=', $id)
                    ->where('token', '=', $token)
                    ->get();

        if(count($getMember) == 0){
            return redirect('/')->with("Error", "Invalid User Verification Credentails");
        }

        $getMemberVerified = DB::table('members')
                ->select('email_verified_at')
                ->where('id', '=', $id)
                ->get();

        if($getMemberVerified[0]->email_verified_at !== NULL){
            return redirect('/')->with("Error", "Email already Verified - Please Login");
        }

        $processVerification = DB::table('members')
                               ->where('id', $id)
                               ->update(['reg_level' => '2', 'email_verified_at' => now()]);
        
        return redirect('/')->with("Success", "Email Successfully Verified - Please Login");
    }

    public function resendemail(Request $req){

        $validatedData = $req->validate([
                            'email' => 'required|email',
                        ]);

        $getMember = DB::table('members')
                    ->select('members.id', 'surname', 'firstname', 'othername', 'token')
                    ->join('member_token', 'members.id', '=', 'member_token.member_id')
                    ->where('email', '=', $validatedData['email'])
                    ->get();

        $emailArray = ['id' => $getMember[0]->id, 'surname' => $getMember[0]->surname, 
                        'firstname' => $getMember[0]->firstname, 'othername' => $getMember[0]->othername, 
                        'token' => $getMember[0]->token];
        
        Mail::to($validatedData['email'])->send(new VerificationEmail($emailArray));
        return back()->with("Success", "Email Successfully Resent");
    }

    public function profile(){

        $groups = DB::table('church_group')
                  ->orderBy('id', 'asc')
                  ->get();

        $ministries = DB::table('church_ministry')
                      ->orderBy('name', 'asc')
                      ->get();

        return view('profile', ['groups' => $groups, 'ministries' => $ministries]);
    }

    public function completeReg(RegisterCompleteRequest $req){

        $validated = $req->validated();

        if($validated['whatsapp_number'] === null){
            $whatsapp_number = NULL;
        }else{
            $whatsapp_number = $validated['whatsapp_code'] . $validated['whatsapp_number'];
        }

        $mobile_number = $validated['mobile_code'] . $validated['mobile_number'];
        $address = $validated['house_number'] . ", " . $validated['street_details'] . ", " . $validated['post_code'];

        $updatedMember = DB::table('members')
                        ->where('id', Auth::user()->id)
                        ->update([
                            'reg_level' => '3',
                            'church_group_id' => $validated['group'],
                            'address' => $address,
                            'phone_number' => $mobile_number,
                            'whatsapp' => $whatsapp_number
                        ]);

        foreach($validated['ministry'] as $ministry){

            $memberMinistry = DB::table('member_ministry')->insert([
                                'member_id' => Auth::user()->id,
                                'church_ministry_id' => $ministry,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
        }

        Auth::user()->reg_level = '3';
        return redirect("/dashboard");
    }
}