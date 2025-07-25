<?php

namespace App\Exports;

use App\Models\EwsRecord;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EwsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        // Ambil data sesuai kebutuhan, bisa filter/sort, dll
        return EwsRecord::orderBy('created_at', 'desc')->get();
    }

    // Header kolom Excel
    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Pasien',
            'No Rekam Medis',
            'Ruang Dirawat',
            'Skor 1',
            'Skor 2',
            'Skor 3',
            'Skor 4',
            'Skor 5',
            'Skor 6',
            'Skor Total',
            'Catatan',
        ];
    }

    // Pemrosesan isi baris per baris
    public function map($user): array
    {
        $scores = [
            $user->score_1 === 0 ? '0' : (string) abs($user->score_1 ?? 0),
            $user->score_2 === 0 ? '0' : (string) abs($user->score_2 ?? 0),
            $user->score_3 === 0 ? '0' : (string) abs($user->score_3 ?? 0),
            $user->score_4 === 0 ? '0' : (string) abs($user->score_4 ?? 0),
            $user->score_5 === 0 ? '0' : (string) abs($user->score_5 ?? 0),
            $user->score_6 === 0 ? '0' : (string) abs($user->score_6 ?? 0),
        ];

        $total = array_sum([
            (int) abs($user->score_1),
            (int) abs($user->score_2),
            (int) abs($user->score_3),
            (int) abs($user->score_4),
            (int) abs($user->score_5),
            (int) abs($user->score_6),
        ]);

        return [
            $user->created_at->format('d M Y H:i'),
            $user->name,
            $user->medic_number,
            $user->room,
            ...$scores,
            $total,
            $user->note,
        ];
    }
}
