<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLetterCategoryRequest;
use App\Http\Requests\UpdateLetterCategoryRequest;
use Illuminate\Http\Request;
use App\Models\LetterCategory;

class LetterCategoryController extends Controller
{
  public function index()
  {
    return view('dashboard.letter-categories.index', [
      'title' => 'Kategori Surat',
      'categories' => LetterCategory::withCount('letters')
        ->options(request(LetterCategory::$allowedParams))
        ->paginate($this->validateAndGetLimit(request('limit'), 10)),
      'sortables' => LetterCategory::$sortables,
      'allowed_params' => LetterCategory::$allowedParams,
    ]);
  }

  public function store(CreateLetterCategoryRequest $request)
  {
    $validated = $request->validated();

    LetterCategory::create($validated);

    return redirect($request->previous_url ?? route('dashboard.letter-categories.index'))
      ->with('success', 'Kategori surat berhasil ditambahkan');
  }

  public function edit(LetterCategory $letterCategory)
  {
    return view('dashboard.letter-categories.edit', [
      'title' => 'Ubah Kategori',
      'category' => $letterCategory,
    ]);
  }

  public function update(UpdateLetterCategoryRequest $request, LetterCategory $letterCategory)
  {
    $validated = $request->validated();

    $letterCategory->update($validated);

    return redirect($request->previous_url ?? route('dashboard.letter-categories.index'))
      ->with('success', 'Kategori surat berhasil diubah');
  }

  public function destroy(Request $request, LetterCategory $letterCategory)
  {
    // Check if category has letters
    if ($letterCategory->letters()->exists()) {
      return redirect()->back()
        ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki surat terkait');
    }

    $letterCategory->delete();

    return redirect($request->previous_url ?? route('dashboard.letter-categories.index'))
      ->with('success', 'Kategori surat berhasil dihapus');
  }
}
