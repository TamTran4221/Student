<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $fillable = ['ho_va_ten', 'hinh_anh','que_quan','gioi_tinh','lop_hoc_id'];
}
