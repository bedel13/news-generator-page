<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class AiController extends Controller
{
    public function index() {
        return view('ai.index');
    }
    public function result(Request $request){

        $topic = $request -> topic;
        
        $open_ai = new OpenAi(getenv('OPENAI_API_KEY'));
        $prompt = "Create 5 fake news topics about ". $topic. " \n";

        $openAiOutput = $open_ai->completion([
            'model' => 'text-davinci-002',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
         ]);

         $output = \json_decode($openAiOutput, true);
         $outputText = $output["choices"][0]["text"];

        return view('ai.index', ['result' => $outputText]);
    }
}
