<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\State;
use App\Contribution;

use Validator;

class StatesController extends Controller
{
    //

    public function getStates() {
        $states = State::get();

        foreach ($states as $state) {
            # code...
            $state['population_percent'] = number_format(((int)$state['cases'] / (int)$state['population']) * 100, 6);
            $state['death_percent'] = number_format(((int)$state['death'] / (int)$state['cases']) * 100, 3);
            $state['recovery_percent'] = number_format(((int)$state['recovered'] / (int)$state['cases']) * 100, 3);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'States retrived successfully',
            'data' => $states,
            'cases' => State::sum('cases'),
            'admission' => State::sum('admission'),
            'recovered' => State::sum('recovered'),
            'death' => State::sum('death'),
            'death_percent' => number_format(((int)State::sum('death') / (int)State::sum('cases')) * 100, 3),
            'population_percent' => number_format(((int)State::sum('cases') / 204948889 ) * 100, 6),
            'recovery_percent' => number_format(((int)State::sum('recovered') / (int)State::sum('cases')) * 100, 3),
            'name' => 'Nigeria'
        ], 200);

    }


    public function addState(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:states|max:255',
        ]);

        $state = State::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'States added successfully',
            'data' => $state
        ], 200);

    }

    public function updateState(Request $request, $id) {

        $data = $request->all();
        State::where('id', $id)->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'States updated successfully'
        ], 200);

    }

    public function postContribution(Request $request) {
        $data = $request->all();

        Contribution::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Contribution created successfully'
        ], 200);
    }

    public function getContributions() {

        $data = Contribution::where('status', 1)->latest()->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Contributions retrieved successfully',
            'data' => $data
        ], 200);
    }
}
