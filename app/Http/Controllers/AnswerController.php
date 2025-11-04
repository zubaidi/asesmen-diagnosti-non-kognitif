<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    public function saveAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|integer|exists:questions,id',
            'answer' => 'required|integer',
        ]);

        $nis = session('nis');
        if (!$nis) {
            return response()->json(['error' => 'Session expired'], 401);
        }

        $question = Question::find($request->question_id);

        // Generate unique answer_code for each answer
        $answerCode = Str::random(10);

        // Check if answer already exists for this question and nis
        $existingAnswer = Answer::where('nis', $nis)
            ->where('id_soal', $question->id_soal)
            ->first();

        if ($existingAnswer) {
            $existingAnswer->update([
                'answer_code' => $answerCode,
                'id_option_chosen' => $request->answer,
            ]);
        } else {
            Answer::create([
                'answer_code' => $answerCode,
                'nis' => $nis,
                'id_soal' => $question->id_soal,
                'id_option_chosen' => $request->answer,
            ]);
        }

        return response()->json(['success' => true]);
    }
}
