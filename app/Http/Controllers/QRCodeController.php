<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QRCode;

class QRCodeController extends Controller
{
    /**
     * Display a listing of the QR codes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrcodes = QRCode::all();
        return response()->json($qrcodes);
    }

    /**
     * Store a newly created QR code in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $qrcode = QRCode::create($request->all());

        return response()->json($qrcode, 201);
    }

    /**
     * Display the specified QR code.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qrcode = QRCode::findOrFail($id);
        return response()->json($qrcode);
    }

    /**
     * Update the specified QR code in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string'
        ]);

        $qrcode = QRCode::findOrFail($id);
        $qrcode->update($request->all());

        return response()->json($qrcode);
    }

    /**
     * Remove the specified QR code from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QRCode::findOrFail($id)->delete();
        return response()->json(['message' => 'QR code deleted successfully']);
    }
}
