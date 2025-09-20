<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Storage;  

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number',
        'date',
        'description',
        'category_id',
        'file_path',
    ];

    protected $fields = [
        'title',
        'number',
        'date',
        'description',
        'category_id',
        'file_path',
        'created_at',
        'updated_at',
    ];
    
    static $sortables = [
        'title' => 'Judul',
        'number' => 'Nomor',
        'date' => 'Tanggal',
        'description' => 'Deskripsi',
        'category_id' => 'Kategori',
        'created_at' => 'Dibuat pada',
        'updated_at' => 'Diubah pada',
    ];

    static $allowedParams = ['q', 'sortby', 'order', 'limit', 'category'];

    public function scopeOptions($query, $options = [])
    {
        if (isset($options['q'])) {
            $query->where(function ($query) use ($options) {
                $query->where('name', 'like', '%' . $options['q'] . '%')
                    ->orWhere('number', 'like', '%' . $options['q'] . '%')
                    ->orWhere('description', 'like', '%' . $options['q'] . '%');
            });
        }
        if (isset($options['category'])) {
            $query->where('category_id', $options['category']);
        }
        if (isset($options['sortby']) && in_array($options['sortby'], $this->fields)) {
            if (!isset($options['order'])) {
                $options['order'] = 'asc';
            }
            $query->orderBy($options['sortby'], validateAndGetOrder($options['order']));
        } else {
            $query->orderBy('created_at', 'desc');
        }
        return $query;
    }

    public function category()
    {
        return $this->belongsTo(LetterCategory::class, 'category_id');
    }

    // // URL publik ke file surat
    // public function getFileUrlAttribute()
    // {
    //     // pakai disk 'public' → hasil: /storage/letters/xxx.pdf
    //     return Storage::disk('public')->url($this->file_path);
    // }
}
