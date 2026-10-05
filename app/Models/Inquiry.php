<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'phone', 'category', 'visit_date', 'adults', 'children', 'message'])]
class Inquiry extends Model
{
    protected function casts(): array
    {
        return [
            'visit_date' => 'date',
            'adults' => 'integer',
            'children' => 'integer',
        ];
    }
}
