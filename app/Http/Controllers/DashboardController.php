<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function barang(): View
    {
        $barangs = Barang::where('status', 'aktif')->paginate(12);

        return view('dashboard', [
            'barangs' => $barangs,
            'page' => $barangs->currentPage(),
            'total_pages' => $barangs->lastPage(),
        ]);
    }

    public function showEdit($id): View
    {
        $barang = Barang::find($id);
        if (!$barang) {
            abort(404, 'Barang not found');
        }

        return view('edit-barang', ['barang' => $barang]);
    }

    public function edit(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        // Validate and update the barang data
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'keterangan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar && File::exists(public_path('images/' . $barang->gambar))) {
                File::delete(public_path('img/' . $barang->gambar));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $namaFile);
            $barang->gambar = $namaFile;
        }

        if ($barang->save()) {
            return redirect()->route('dashboard')->with('toast', [
                'type' => 'success',
                'message' => 'Barang berhasil diperbarui!'
            ]);
        } else {
            return redirect()->back()->with('toast', [
                'type' => 'error',
                'message' => 'Gagal memperbarui barang!'
            ]);
        }
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Soft delete: ubah status menjadi 'nonaktif'
        $barang->status = 'nonaktif';

        if ($barang->save()) {
            return redirect()->route('dashboard')->with('toast', [
                'type' => 'success',
                'message' => 'Barang berhasil di-delete!'
            ]);
        } else {
            return redirect()->back()->with('toast', [
                'type' => 'error',
                'message' => 'Gagal delete barang!'
            ]);
        }
    }
}
