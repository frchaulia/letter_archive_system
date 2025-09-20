<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterCategory extends Model
{
    use HasFactory;

    protected $table = 'letter_categories';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $fields = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    static $sortables = [
        'name' => 'Nama',
        'description' => 'Deskripsi',
        'created_at' => 'Waktu Dibuat',
    ];

    static $allowedParams = ['q', 'sortby', 'order', 'limit'];

    public function scopeOptions($query, $options = [])
    {
        if (isset($options['q'])) {
            $query->where(function ($query) use ($options) {
                $query->where('name', 'like', '%' . $options['q'] . '%')
                    ->orWhere('description', 'like', '%' . $options['q'] . '%');
            });
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

    public function letters()
    {
        return $this->hasMany(Letter::class, 'category_id');
    }
}
