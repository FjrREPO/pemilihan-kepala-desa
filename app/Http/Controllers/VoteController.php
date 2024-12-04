<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller {
    public function index() {
        $candidates = Candidate::all();
        return view('pemilih.vote', compact('candidates'));
    }

    public function vote(Request $request) {
        Vote::create([
            'user_id' =>auth()->user()->id,
            'candidate_id' => $request->candidate_id,
        ]);

        return redirect()->route('hasil');
    }

    public function hasil() {
        $results = Candidate::withCount('votes')->get();
        return view('pemilih.hasil', compact('results'));
    }
}
