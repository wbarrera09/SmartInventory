<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DownloadUserPDF extends Controller
{
    
    public function user($record) 
    {
        $user = User::findOrFail($record); 
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('user_report', compact('user'));
        return $pdf->stream(); 
    }

}
