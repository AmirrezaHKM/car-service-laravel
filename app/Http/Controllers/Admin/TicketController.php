<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('user')->latest()->paginate(15);

        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['user', 'ticketMessages.sender']);

        return view('admin.tickets.show', compact('ticket'));
    }

    public function reply(Request $request, Ticket $ticket)
    {

         if ($ticket->status === 'closed') {
            return redirect()->route('admin.tickets.show', $ticket)
                             ->with('error', 'این تیکت بسته شده است و امکان ارسال پیام وجود ندارد.');
        }
        $user = Auth::user();

        $request->validate([
            'message' => 'required|string',
        ]);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' =>  $user->id,
            'message' => $request->message,
        ]);


        $ticket->update(['status' => 'answered']);

        return redirect()->route('admin.tickets.show', $ticket)->with('success', 'پاسخ با موفقیت ارسال شد.');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,answered,closed',
        ]);

        $ticket->update(['status' => $request->status]);

        return redirect()->route('admin.tickets.show', $ticket)->with('success', 'وضعیت تیکت با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index')->with('success', 'تیکت حذف شد.');
    }
}
