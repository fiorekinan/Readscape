<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrowingUnreturned() {
        // get borrowings where status = 'borrowed'
        $borrowings = Borrow::where('status', 'borrowed')->latest()->paginate(10);

        return view('admin.borrowing.unreturned', compact('borrowings'));
    }

    public function returnBook($id) {
        $borrowing = Borrow::findOrFail($id);

        // check book status
        if($borrowing->status === 'borrowed') {
            $borrowing->status = 'returned';
            $borrowing->save();

            // update stock
            $borrowing->book->increment('stock');

            return redirect()->back()->with('message', 'Book successfully returned!');
        }
        return redirect()->back()->with('message', 'Book was already returned previously.');
    }

    public function borrowingReturned() {
        // get borrowings where status = 'returned'
        $borrowings = Borrow::where('status', 'returned')->latest()->paginate(10);

        return view('admin.borrowing.returned', compact('borrowings'));
    }

    public function borrowingAll() {
        $borrowings = Borrow::paginate(10);

        return view('admin.borrowing.borrowing-all', compact('borrowings'));
    }
}
