<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ApprovalsOrder;
use App\Mail\EditedOrder;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function SendRejectChange($to, $title, $body){
        $mailData=[
            'title'=>$title,
            'body'=>$body,
            'subject'=> 'Your change request has been rejected'
        ];
        if (env('MAIL_PASSWORD')!=null && env('MAIL_USERNAME')!=null) {
      
        Mail::to($to)->send(new ApprovalsOrder($mailData));
    }
    }
    //
    public function SendApprovalChange($to, $title, $body){
        $mailData=[
            'title'=>$title,
            'body'=>$body,
            'subject'=> 'your change request has been approved'
        ];
        if (env('MAIL_PASSWORD')!=null && env('MAIL_USERNAME')!=null) {
        Mail::to($to)->send(new ApprovalsOrder($mailData));
        }
    }

    public function SendEmailChangeRequest($from, $title, $body, $table){
        $mailData=[
            'title'=>$title,
            'body'=>$body,
            'from'=>$from, // user that made the change
            'table'=>$table,
            'subject'=> 'Change Request for ProductManager'
        ];
      $Teamleaders = User::where('role','Teamleader')->get();
      if (env('MAIL_PASSWORD')!=null && env('MAIL_USERNAME')!=null) {
        # code... 
        foreach ($Teamleaders as $key => $Teamleader) {
            # code...
            Mail::to($Teamleader->email)->send(new EditedOrder($mailData));
          }
    
      }
   
     /*   */
        
    }
}
