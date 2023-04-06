<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;


class VacationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static function index()
    {
        $answer = Vacation::get();


        return $answer;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $vac = new Vacation();
        $vac->user_id = $request['user_id'];
        $vac->agreed = $request['agreed'];
        $vac->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function show(Vacation $vacation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacation $vacation)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacation $vacation)
    {
        //
        if($request['query'] == "date")
            {
                $vacat = Vacation::find($request['id_vacation']);
                $vacat->vacation_start = $request['start'];
                $vacat->vacation_end = $request['end'];
                $vacat->save();

            }
        elseif($request['query'] == "agreed")
            {
                $vacat = Vacation::find($vacation->id);
                $vacat->agreed ? $vacat->agreed = false : $vacat->agreed = true;
                $vacat->save();

            }

        return redirect('home');


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacation $vacation)
    {
        //
    }


}
