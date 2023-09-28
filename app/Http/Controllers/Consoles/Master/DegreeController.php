<?php

namespace App\Http\Controllers\Consoles\Master;

use App\DataTables\Consoles\Master\DegreeDataTable;
use App\Models\Degree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Master\DegreeRequest;
use App\Services\Degree\DegreeService;

class DegreeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected DegreeService $degreeService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(DegreeDataTable $dataTable)
  {
    return $dataTable->render('consoles.degrees.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('consoles.degrees.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(DegreeRequest $request)
  {
    $this->degreeService->create($request->validated());
    return redirect(route('degrees.index'))->withSuccess(trans('session.create'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Degree $degree)
  {
    return view('consoles.degrees.edit', compact('degree'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(DegreeRequest $request, Degree $degree)
  {
    $this->degreeService->update($degree->id, $request->validated());
    return redirect(route('degrees.index'))->withSuccess(trans('session.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Degree $degree)
  {
    $this->degreeService->delete($degree->id);
    return response()->json([
      'message' => trans('session.delete'),
    ]);
  }
}
