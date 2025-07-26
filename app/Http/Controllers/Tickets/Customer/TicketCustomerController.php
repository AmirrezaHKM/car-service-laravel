<?php

namespace App\Http\Controllers\Tickets\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketCustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tickets = Ticket::where('user_id',  $user->id)->get();
        return view('customer.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('customer.tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $ticket = new Ticket();
        $ticket->user_id =  $user->id;
        $ticket->subject = $request->subject;
        $ticket->status = 'open';
        $ticket->save();

        return redirect()->route('customerpanel.tickets.index')->with('success', 'تیکت شما با موفقیت ایجاد شد!');
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['user', 'ticketMessages.sender']);

        return view('customer.tickets.show', compact('ticket'));
    }

    public function message(Request $request, Ticket $ticket)
    {
        if ($ticket->status === 'closed') {
            return redirect()->route('customerpanel.tickets.show', $ticket)
                             ->with('error', 'این تیکت بسته شده است و امکان ارسال پیام وجود ندارد.');
        }

        $request->validate([
            'message' => 'required|string',
        ]);

        $user = Auth::user();

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'message' => $request->message,
        ]);
          // اضافه کردن تغییر وضعیت تیکت
        if ($ticket->status === 'answered') {
            $ticket->status = 'open';  
            $ticket->save();
        }
        return redirect()->route('customerpanel.tickets.show', $ticket)
                         ->with('success', 'پاسخ با موفقیت ارسال شد.');
    }


    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('customerpanel.tickets.index')->with('success', 'تیکت حذف شد.');
    }
}
