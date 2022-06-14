<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{


    public function complaint_pelanggan()
    {
        $data = Complaint::where('pelanggan_id', auth()->user()->id)
            ->get();
        return view('complaint.complaint_pelanggan', ['data' => $data]);
    }

    public function complaint_admin()
    {
        $data = Complaint::with('pelanggan')->get();
        return view('complaint.complaint_admin', ['data' => $data]);
    }

    public function complaint_pemilik()
    {
        $data = Complaint::with('pelanggan')->get();
        return view('complaint.complaint_pemilik', ['data' => $data]);
    }

    public function tambah_complaint(Request $request)
    {
        $validatedData = $request->validate([
            'pesan' => 'required|max:255'
        ]);

        $validatedData['pelanggan_id'] = auth()->user()->id;

        Complaint::create($validatedData);
        return redirect('/complaint_pelanggan')->with('success', 'Berhasil di ditambah');
    }

    public function edit_complaint(Request $request)
    {
        $validatedData = $request->validate([
            'pesan' => 'required|max:255'
        ]);

        $validatedData['id'] = $request->id;

        Complaint::where('id', $request->id)->update($validatedData);
        return redirect('/complaint_pelanggan')->with('success', 'Berhasil di edit');
    }

    public function complaint_diterima($id)
    {
        Complaint::where('id', $id)->update([
            'is_status' => 'Diterima'
        ]);
        return redirect('/complaint_admin')->with('success', 'Berhasil di terima');
    }

    public function complaint_ditolak($id)
    {
        Complaint::where('id', $id)->update([
            'is_status' => 'Ditolak'
        ]);
        return redirect('/complaint_admin')->with('success', 'Berhasil di tolak');
    }

    public function hapus_complaint($id)
    {
        Complaint::where('id', $id)->delete();
        return redirect('/complaint_pelanggan')->with('success', 'Berhasil di hapus');
    }

    public function complaint_pdf(Request $request)
    {
        //get data
        $complaint = Complaint::all();
        //idpelatih;
        $pdf = Pdf::loadview('complaint.complaint_pdf', [
            'complaint' => $complaint

        ])->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
