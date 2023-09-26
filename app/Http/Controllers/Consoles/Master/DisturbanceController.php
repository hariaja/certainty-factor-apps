<?php

namespace App\Http\Controllers\Consoles\Master;

use App\DataTables\Consoles\Master\DisturbanceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Master\DisturbanceRequest;
use App\Models\Disturbance;
use App\Services\Disturbance\DisturbanceService;
use Illuminate\Http\Request;

class DisturbanceController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected DisturbanceService $disturbanceService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(DisturbanceDataTable $dataTable)
  {
    return $dataTable->render('consoles.disturbances.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('consoles.disturbances.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(DisturbanceRequest $request)
  {
    $this->disturbanceService->handleCreateData($request);
    return redirect(route('disturbances.index'))->withSuccess(trans('session.create'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Disturbance $disturbance)
  {
    return response()->json([
      'disturbance' => $disturbance,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Disturbance $disturbance)
  {
    return view('consoles.disturbances.edit', compact('disturbance'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(DisturbanceRequest $request, Disturbance $disturbance)
  {
    $this->disturbanceService->handleUpdateData($request, $disturbance->id);
    return redirect(route('disturbances.index'))->withSuccess(trans('session.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Disturbance $disturbance)
  {
    $this->disturbanceService->delete($disturbance->id);
    return response()->json([
      'message' => trans('session.delete'),
    ]);
  }
}
