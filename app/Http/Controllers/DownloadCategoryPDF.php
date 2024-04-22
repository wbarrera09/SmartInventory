<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class DownloadCategoryPDF extends Controller
{
    public function category($record)
    {
        $category = Category::findOrFail($record);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('category_report', compact('category'));
        return $pdf->stream();
    }
}

