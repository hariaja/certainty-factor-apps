<?php

namespace App\Http\Controllers\Consoles\Master;

use App\DataTables\Consoles\Master\SymptomDataTable;
use App\Models\Symptom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Master\SymptomRequest;
use App\Services\Symptom\SymptomService;

class SymptomController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected SymptomService $symptomService
  ) {
    //
  }

  /**
   * Display a listing of the resource.
   */
  public function index(SymptomDataTable $dataTable)
  {
    return $dataTable->render('consoles.symptoms.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('consoles.symptoms.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SymptomRequest $request)
  {
    $this->symptomService->handleCreateData($request);
    return redirect(route('symptoms.index'))->withSuccess(trans('session.create'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Symptom $symptom)
  {
    return response()->json([
      'symptom' => $symptom,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Symptom $symptom)
  {
    return view('consoles.symptoms.edit', compact('symptom'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(SymptomRequest $request, Symptom $symptom)
  {
    $this->symptomService->handleUpdateData($request, $symptom->id);
    return redirect(route('symptoms.index'))->withSuccess(trans('session.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Symptom $symptom)
  {
    $this->symptomService->delete($symptom->id);
    return response()->json([
      'message' => trans('session.delete'),
    ]);
  }
}
