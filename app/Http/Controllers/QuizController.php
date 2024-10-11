<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion; // Modelo para 'evaluaciones'
use App\Models\Pregunta;   // Modelo para 'preguntas'
use Illuminate\Support\Facades\DB; // Asegúrate de importar DB

class QuizController extends Controller
{
    // Método para guardar la evaluación y las preguntas
    public function save(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'title' => 'required|string|max:255',
            'slides.*.question' => 'required|string',
            'slides.*.answers' => 'required|array',
            'slides.*.correct_answers' => 'required|array',
            'slides.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        DB::transaction(function () use ($request) {
            // Guardar la evaluación
            $evaluacion = Evaluacion::create(['title' => $request->input('title')]);
    
            // Guardar cada pregunta y sus respuestas
            foreach ($request->slides as $slide) {
                $pregunta = Pregunta::create(['evaluacion_id' => $evaluacion->id, 'question_text' => $slide['question']]);
    
                // Guardar las opciones de respuesta
                //foreach ($slide['answers'] as $index => $answer) {
                    //Opcion::create([
                        //'pregunta_id' => $pregunta->id,
                        //'answer_text' => $answer,
                        //'is_correct' => in_array($index, $slide['correct_answers']) ? 1 : 0,
                    //]);
                //}
    
                // Guardar la imagen si existe
                if (!empty($slide['image'])) {
                    $imageName = time() . '-' . $slide['image']->getClientOriginalName();
                    $directory = public_path('assets/img/questions_images');
                    if (!file_exists($directory)) {
                        mkdir($directory, 0755, true);
                    }
                    $slide['image']->move($directory, $imageName);
                    $pregunta->image_path = 'assets/img/questions_images/' . $imageName;
                    $pregunta->save();
                }
            }
        });
    
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


