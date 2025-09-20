<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateLetterRequest;
use App\Http\Requests\UpdateLetterRequest;
use App\Models\Letter;
use App\Models\LetterCategory;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index()
    {
        return view('dashboard.letters.index', [
            'title' => 'Daftar Surat',
            'letters' => Letter::with('category')->options(request(Letter::$allowedParams))
                ->paginate($this->validateAndGetLimit(request('limit'), 10)),
            'categories' => LetterCategory::all(),
            'sortables' => Letter::$sortables,
            'allowed_params' => Letter::$allowedParams,
        ]);
    }

    public function show(Letter $letter)
    {
        return view('dashboard.letters.show', [
            'title' => 'Detail Surat',
            'letter' => $letter->load('category'),
        ]);
    }

    public function store(CreateLetterRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('letters', 'public');
        }

        Letter::create($data);
        return redirect($request->previous_url ?? route('dashboard.letters.index'))->with('success', 'Surat berhasil ditambahkan');
    }

    public function edit(Letter $letter)
    {
        return view('dashboard.letters.edit', [
            'title' => 'Ubah Surat',
            'letter' => $letter,
            'categories' => LetterCategory::all(),
        ]);
    }

    public function update(UpdateLetterRequest $request, Letter $letter)
    {
        $data = $request->validated();

        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($letter->file_path && Storage::disk('public')->exists($letter->file_path)) {
                Storage::disk('public')->delete($letter->file_path);
            }

            $data['file_path'] = $request->file('file_path')->store('letters', 'public');
        }

        $letter->update($data);
        return redirect($request->previous_url ?? route('dashboard.letters.index'))->with('success', 'Surat berhasil diubah');
    }

    public function destroy(Request $request, Letter $letter)
    {
        // Delete file if exists
        if ($letter->file_path && Storage::disk('public')->exists($letter->file_path)) {
            Storage::disk('public')->delete($letter->file_path);
        }

        $letter->delete();
        return redirect($request->previous_url ?? route('dashboard.letters.index'))->with('success', 'Surat berhasil dihapus');
    }
}
