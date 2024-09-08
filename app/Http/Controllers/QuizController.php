<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion; // Modelo para 'evaluaciones'
use App\Models\Pregunta;   // Modelo para 'preguntas'
use App\Models\Opcion;     // Modelo para 'opciones'

class QuizController extends Controller
{
    public function save(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'title' => 'required|string|max:255',
            'slides' => 'required|array',
            'slides.*.question' => 'required|string',
            'slides.*.answers' => 'required|array|min:1',
            'slides.*.correct_answers' => 'required|array|min:1',
        ]);

        // Guardar la evaluación
        $evaluacion = new Evaluacion();
        $evaluacion->id_usuario = auth()->id(); // Asigna el ID del usuario autenticado
        $evaluacion->titulo = $request->input('title');
        $evaluacion->descripcion = 'Descripción generada automáticamente';
        $evaluacion->fecha_creacion = now();
        $evaluacion->fecha_modificacion = now();
        $evaluacion->save();

        // Guardar las preguntas y opciones
        foreach ($request->input('slides') as $slideNumber => $slideData) {
            // Guardar la pregunta
            $pregunta = new Pregunta();
            $pregunta->id_evaluacion = $evaluacion->id_evaluacion;
            $pregunta->texto_pregunta = $slideData['question'];
            $pregunta->tipo_pregunta = 'Opción múltiple'; // Puedes ajustar esto si es necesario
            $pregunta->imagen = ''; // Si manejas imágenes, ajusta este campo
            $pregunta->created_at = now();
            $pregunta->updated_at = now();
            $pregunta->save();

            // Guardar las opciones
            foreach ($slideData['answers'] as $index => $answerText) {
                $opcion = new Opcion();
                $opcion->id_pregunta = $pregunta->id_pregunta;
                $opcion->texto_opcion = $answerText;
                $opcion->es_correcta = in_array($index, $slideData['correct_answers']); // Asigna si la opción es correcta
                $opcion->save();
            }
        }

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'El cuestionario ha sido guardado exitosamente.');
    }
}

