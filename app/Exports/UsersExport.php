<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::with('utilisateur')->get()->map(function ($user) {
            return [
                'Name' => $user->name,
                'Email' => $user->email,
                'Role' => $user->utilisateur->role->name ?? 'N/A',
                'Profile Picture' => $user->utilisateur->image ?? 'No Picture',
                'Created At' => $user->created_at->format('Y-m-d H:i:s'),
                'Updated At' => $user->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Role',  'Profile Picture', 'Created At', 'Updated At'];
    }
}


