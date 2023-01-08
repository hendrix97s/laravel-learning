<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Repositories\CardRepository;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(CardRepository $repository)
    {
      $response = $repository->get();
      return response()->json($response);
    }

    public function store(StoreCardRequest $request, CardRepository $repository)
    {
      $data = $request->validated();
      $response = $repository->create($data);
      return response()->json($response);

    }

    public function show(Request $request, CardRepository $repository)
    {
      $response = $repository->find($request->card_id);
      return response()->json($response);

    }

    public function update(UpdateCardRequest $request, CardRepository $repository)
    {
      
      $data = $request->validated();
      $response = $repository->update($request->card_id, $data);
      return response()->json($response);

    }

    public function destroy(Request $request, CardRepository $repository)
    {
      $response = $repository->delete($request->card_id);
      return response()->json($response);
    }
}
