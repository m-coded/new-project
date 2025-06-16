<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {        // Fetch only records belonging to the currently logged-in user

                $records = Client::where('user_id', Auth::id())->get();

        // fetch all users
    return view('user.index', compact('records')); // pass $records to Blade
        // This will return a view named 'users.index' with the users data.
        // Make sure to replace 'users.index' with the actual view you want to use.
        // If you have a User model, you can fetch users like this:
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'company_name' => 'required|string',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
            'account_status' => 'required|string',
            'description' => 'nullable|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:user_record,email',
            
        ]);

            $validated['user_id'] = auth()->id(); // 👈 inject logged-in user ID

    // Convert to YYYY-MM-DD format
   $dueDate = Carbon::parse($request->due_date);       
  Client::create($validated);

    return redirect()->route('user.index')->with('success', 'user add  successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $client = Client::findOrFail($id); // Get the client or 404
    return view('user.edit', compact('client')); // Send to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        'name' => 'required|string|max:255',
        'company_name' => 'nullable|string|max:255',
        'due_date' => 'required|date',
        'amount' => 'required|numeric',
        'account_status' => 'required|string',
        'description' => 'nullable|string',
        'phone_number' => 'required|string|max:20',
        'email' => 'required|email|max:255',
       
    ]);

    $client = Client::findOrFail($id);
    $client->update($request->all());

    return redirect()->route('user.index')->with('success', 'Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $client = Client::findOrFail($id);
    $client->delete();

    return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
