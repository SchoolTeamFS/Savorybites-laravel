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
            'content' => ' <h2>About SavoryBytes</h2>
                <p>SavoryBytes is a comprehensive recipe-sharing platform designed to bring food enthusiasts together. It offers a seamless experience for both administrators and users, allowing them to manage and explore recipes effortlessly.</p>

                <h3>Admin Features</h3>
                <ul>
                    <li><strong>Dashboard:</strong> Provides an overview of key metrics such as total recipes, users, and categories.</li>
                    <li><strong>CRUD Recipes:</strong> Administrators can create, read, update, and delete recipes in the system.</li>
                    <li><strong>Home Page Management:</strong> Customize the homepage layout and featured recipes.</li>
                    <li><strong>Export Users:</strong> Export a list of all registered users in Excel format.</li>
                    <li><strong>Export Recipes:</strong> Generate an Excel file containing all recipes or filtered recipes.</li>
                    <li><strong>Filter by Categories:</strong> Easily filter and manage recipes based on predefined categories.</li>
                </ul>

                <h3>User Features</h3>
                <ul>
                    <li><strong>Home Page:</strong> A user-friendly interface showcasing trending and featured recipes.</li>
                    <li><strong>Favorites:</strong> Users can save their favorite recipes for quick access later.</li>
                    <li><strong>Filter by Categories:</strong> Explore recipes categorized by type, cuisine, or dietary preferences.</li>
                </ul>

                <h3>How to Use</h3>
                <p>As an admin, log in to the dashboard to manage recipes, users, and settings. For regular users, simply browse the home page, search for recipes, and save your favorites.</p>

                <h3>Contact Support</h3>
                <p>If you encounter any issues or have suggestions, please contact our support team at <a href="mailto:support@savorybytes.com">support@savorybytes.com</a>.</p>',
        ];

        $pdf = Pdf::loadView('recipesCRUD.manual', $data);

        return $pdf->download('User_Manual.pdf');
    }
}
