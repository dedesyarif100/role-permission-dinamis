<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class Asset extends Model
{
    use HasFactory;

    public function categoryAsset()
    {
        return $this->belongsTo(CategoryAsset::class, 'id', 'category_id');
    }
}
