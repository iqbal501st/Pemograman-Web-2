<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public function index()
    {
        $data = Dashboard::all();
        return view('dashboard.blade', compact('data'));
    }
}
