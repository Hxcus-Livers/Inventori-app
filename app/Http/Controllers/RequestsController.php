<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function create()
  {
    $requests = Requests::all();
    return view('user.pinjam', compact('requests'));
  }
  /**
   * Menyimpan permintaan baru.
   *
   * @param  HttpRequest  $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request)
  {
    // Validate request data
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'item_name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
    ]);

    // Create a new request object using validated data
    Requests::create($validatedData);

    // Optional: Flash a success message to the session
    session()->flash('success', 'Request submitted successfully!');

    // Redirect to a relevant page
    return redirect()->route('requests.show', $validatedData['user_id']); // Adjust as needed
  }
}
