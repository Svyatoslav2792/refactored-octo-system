<?php

namespace App\Http\Controllers\API;

use App\Tiding;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class TidingController extends Controller
{

    public function index()
    {
        return Tiding::all();
    }


    public function store(Request $request)
    {
//        return $request;
        $news=Tiding::create($request->all());
        return $news;
    }

    public function show(Tiding $tiding)
    {
        return $tiding = Tiding::findOrFail($tiding);
    }

    public function update(Request $request, $id)
    {
        $tiding = Tiding::findOrFail($id);
        $tiding->fill($request->except(['tiding_id']));
        $tiding->save();
        return response()->json($tiding);
    }

    public function destroy( $id)
    {
        $tiding=Tiding::findOrFail($id);
        if($tiding->delete()){
            return response(null,204);
        }
    }
}
