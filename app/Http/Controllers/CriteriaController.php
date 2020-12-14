<?php

namespace App\Http\Controllers;

use App\Criteria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('criteria.index',[
            'criterias' => Criteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Criteria::create($request->all());
        return redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param Criteria $criteria
     * @return Response
     */
    public function show(Criteria $criteria)
    {
        return view('criteria.show', [
            'criteria' => $criteria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Criteria $criteria
     * @return Response
     */
    public function edit(Criteria $criteria)
    {
        return view('criteria.edit', [
            'criteria' => $criteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Criteria $criteria
     * @return Response
     */
    public function update(Request $request, Criteria $criteria)
    {
        $criteria->update($request->all());
        return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Criteria $criteria
     * @return Response
     */
    public function destroy(Criteria $criteria)
    {
        //
    }
}
