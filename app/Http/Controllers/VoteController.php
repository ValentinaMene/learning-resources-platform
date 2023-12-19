<?php

namespace App\Http\Controllers;


use App\Models\Voter;
use App\Models\Resource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class VoteController extends Controller
{ 
    public function __invoke(Request $request, Resource $resource)
    {
        $voter = Voter::getOrCreateVoter($request);

        if(!$voter){
            $voter = Voter::create([
                'code' => Str::random(30),
            ]);
            Cookie::queue('voter_code', $voter->code, 60 * 24 * 30);
        }
        
        //Toggle del voto
        $resource->votes()->toggle($voter->id);

        //devolverle el resource actualizado con su recuento de votos
        return $resource->load('votes', 'category');

    }
    
}
