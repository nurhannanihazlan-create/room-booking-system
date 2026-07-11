<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['room', 'user']);

        if ($request->search) {
            $query->whereHas('room', function ($q) use ($request) {
                $q->where('room_name', 'like', '%' . $request->search . '%');
            })
            ->orWhere('booking_date', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%');
        }

        $bookings = $query->latest()->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'Available')->get();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'booking_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'purpose' => 'required'
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'purpose' => $request->purpose,
            'status' => 'Pending'
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $rooms = Room::where('status', 'Available')->get();

        return view('bookings.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'room_id' => 'required',
            'booking_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'purpose' => 'required',
            'status' => 'required'
        ]);

        $booking->update($request->only([
            'room_id',
            'booking_date',
            'start_time',
            'end_time',
            'purpose',
            'status'
        ]));

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }

    public function exportPdf()
    {
    $bookings = Booking::with(['room', 'user'])
    ->latest()
    ->get();

    $pdf = Pdf::loadView('bookings.pdf', compact('bookings'));

    return $pdf->download('booking-report.pdf');
    }
}