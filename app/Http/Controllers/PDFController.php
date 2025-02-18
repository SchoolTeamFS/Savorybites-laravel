<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadManual()
    {
        $data = [
            'title' => 'User Manual',
            'content' => 'This is the content of your user manual. You can add as much text as you want here.',
        ];

        $pdf = Pdf::loadView('recipesCRUD.manual', $data);

        return $pdf->download('User_Manual.pdf');
    }
}
