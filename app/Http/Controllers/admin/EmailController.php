<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;


class EmailController extends Controller
{

    //========================Order=================================
    public function email_view($id)
    {
        $shipping = Shipping::find($id);
        return view('admin.email_view', compact('shipping'));
    }

    //send_email
    public function send_email(Request $request, $id)
    {
        $data = User::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'endpart' => $request->endpart
        ];

        Notification::send($data, new SendEmailNotification($details));
        return redirect('/home')->with('success', 'Email Send Successfully');
    }


    //====================Contact==========================

    public function contact_email_view($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.email_view', compact('contact'));
    }

    //send_email
    public function contact_send_email(Request $request, $id)
    {
        $data = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'endpart' => $request->endpart
        ];

        Notification::send($data, new SendEmailNotification($details));
        return redirect('admin_contact')->with('success', 'Email Send Successfully');
    }


    
        //====================Payment==========================

        public function payment_email_view($id)
        {
            $shpping_payment = Payment::find($id);
            return view('admin.order.payment_order.email_view_payment', compact('shpping_payment'));
        }
    
        //send_email
        public function payment_send_email(Request $request, $id)
        {
            $data = User::find($id);
    
            $details = [
                'greeting' => $request->greeting,
                'body' => $request->body,
                'endpart' => $request->endpart
            ];
    
            Notification::send($data, new SendEmailNotification($details));
            return redirect('admin_payment_online')->with('success', 'Email Send Successfully');
        }
        
}
