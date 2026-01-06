<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AhoController extends Controller
{
    public function index()
    {
        // Clear previous session data related to the quiz
        Session::forget(['quiz_questions', 'current_part', 'score_part1', 'score_part2']);
        return view('aho.index');
    }

    public function start()
    {
        // Shuffle all question IDs and store in session
        $ids = Question::pluck('id')->shuffle()->values()->all();
        Session::put('quiz_questions', $ids);
        Session::put('score_part1', 0);
        Session::put('score_part2', 0);

        return redirect()->route('aho.quiz', ['part' => 1]);
    }

    public function quiz($part)
    {
        $allIds = Session::get('quiz_questions', []);

        if (empty($allIds)) {
            return redirect()->route('aho.index');
        }

        $part = (int) $part;
        $offset = ($part - 1) * 10;
        $limit = 10;

        $currentIds = array_slice($allIds, $offset, $limit);
        $questions = Question::whereIn('id', $currentIds)->get();

        // Ensure questions are in the same random order as IDs
        $questions = $questions->sortBy(function ($model) use ($currentIds) {
            return array_search($model->id, $currentIds);
        });

        return view('aho.quiz', compact('questions', 'part'));
    }

    public function store(Request $request, $part)
    {
        $answers = $request->input('answers', []);
        $part = (int) $part;

        $score = 0;
        foreach ($answers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer === $answer) {
                $score++;
            }
        }

        Session::put("score_part{$part}", $score);

        if ($part === 1) {
            return redirect()->route('aho.intermediate');
        } else {
            return redirect()->route('aho.loading');
        }
    }

    public function intermediate()
    {
        $score = Session::get('score_part1', 0);
        // Calculate a fake "Estimated IQ" based on score
        // Only 10 simple questions. If 10/10, maybe IQ 80? (joke: easy questions)
        // Let's just show score for now.
        return view('aho.intermediate', compact('score'));
    }

    public function loading()
    {
        return view('aho.loading');
    }

    public function result()
    {
        $score1 = Session::get('score_part1', 0);
        $score2 = Session::get('score_part2', 0);
        $total = $score1 + $score2;
        // No matter the score, the result is the same joke.
        return view('aho.result', compact('total'));
    }
}
