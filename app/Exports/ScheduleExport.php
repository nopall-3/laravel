<?php

namespace App\Exports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ScheduleExport implements FromCollection, WithHeadings, WithMapping
{
    private $key = 0;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Schedule::with(['cinema', 'movie'])->orderBy('created_at', 'DESC')->get();
    }

    public function headings(): array
    {
        return ['No', 'Nama Bioskop', 'Judul Film', 'harga', 'jadwal tayang'];
    }
  public function map($schedule): array
    {
        return [
            ++$this->key,
            $schedule->cinema->name,
            $schedule->movie->title,
              'Rp ' . number_format($schedule->price, 0, ',', '.'),
            json_encode($schedule->hours),
        ];
    }
}
