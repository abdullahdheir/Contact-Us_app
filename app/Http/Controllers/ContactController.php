<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {

            //  Insert Data In DataBase

            DB::table('contacts')->insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email
            ]);

            return redirect()->route('contact_add');
        } else {
            return view('contacts.add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $contacts =  DB::table('contacts')->get();
        return view('contacts.show', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contact = DB::table('contacts')->find($id);
        if ($contact != null) :
            return view('contacts.edit', compact('contact'));
        else :
            return redirect()->route('contact_show');
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = DB::table('contacts')->find($id);
        if ($contact != null) :
            DB::table('contacts')->where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'updated_at' => now(),
            ]);
            return redirect()->route('contact_show');
        else :
            return redirect()->route('contact_show');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = DB::table('contacts')->find($id);
        if ($contact != null) :
            DB::table('contacts')->delete($id);
            return redirect()->route('contact_show');
        else :
            return redirect()->route('contact_show');
        endif;
    }
}
