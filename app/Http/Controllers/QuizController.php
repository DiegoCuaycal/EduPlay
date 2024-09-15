<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion; // Modelo para 'evaluaciones'
use App\Models\Pregunta;   // Modelo para 'preguntas'
use App\Models\Opcion;     // Modelo para 'opciones'

class QuizController extends Controller
{
    // Método para guardar la evaluación y las preguntas
    public function save(Request $request)
{
    // Verificar si los datos están llegando correctamente
    dd($request->all());

    // Validar los datos recibidos
    $request->validate([
        'title' => 'required|string|max:255',
        'slides.*.question' => 'required|string',
        'slides.*.answers' => 'required|array',
        'slides.*.correct_answers' => 'required|array',
        'slides.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Guardar la evaluación (quiz)
    $evaluacion = new Evaluacion();
    $evaluacion->title = $request->input('title');
    $evaluacion->save();

    // Guardar cada pregunta y sus respuestas
    foreach ($request->slides as $slide) {
        $pregunta = new Pregunta();
        $pregunta->evaluacion_id = $evaluacion->id;
        $pregunta->question_text = $slide['question'];
        $pregunta->save();

        // Guardar las opciones de respuesta
        foreach ($slide['answers'] as $index => $answer) {
            $opcion = new Opcion();
            $opcion->pregunta_id = $pregunta->id;
            $opcion->answer_text = $answer;
            $opcion->is_correct = in_array($index, $slide['correct_answers']) ? 1 : 0;
            $opcion->save();
        }

        // Guardar la imagen si existe
        if (!empty($slide['image'])) {
            $imagePath = $slide['image']->store('questions_images', 'public');
            $pregunta->image_path = $imagePath;
            $pregunta->save();
        }
    }

    // Redirigir a la lista de evaluaciones después de guardar
    return redirect()->route('quiz.index')->with('success', 'Prueba guardada exitosamente.');
}

    // Método para listar las evaluaciones guardadas
    public function index()
    {
        // Obtener todas las evaluaciones
        $evaluaciones = Evaluacion::all();

        // Retornar la vista con las evaluaciones
        return view('quiz.index', compact('evaluaciones'));
    }
}


