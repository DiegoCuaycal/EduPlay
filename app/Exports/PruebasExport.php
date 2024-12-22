<?php

namespace App\Exports;

use App\Models\Prueba;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PruebasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Prueba::with('preguntas.respuestas')->get()->map(function ($prueba) {
            return [
                'ID Prueba' => $prueba->id,
                'Título de la Prueba' => $prueba->titulo,
                'Preguntas' => $prueba->preguntas->pluck('texto')->join(', '),
                'Respuestas' => $prueba->preguntas->flatMap(function ($pregunta) {
                    return $pregunta->respuestas->map(function ($respuesta) {
                        return $respuesta->texto . ' (' . ($respuesta->es_correcta ? 'Correcta' : 'Incorrecta') . ')';
                    });
                })->join(', '),
            ];
        });
    }

    public function headings(): array
    {
        return ['ID Prueba', 'Título de la Prueba', 'Preguntas', 'Respuestas'];
    }
}



