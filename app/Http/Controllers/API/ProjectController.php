<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class ProjectController extends Controller
{
    public function indicators($project_id)
    {

          $indicators = DB::table('indicators')
            ->select('indicators.*')
            ->where('indicators.project_id', $project_id)
            ->get();


        if ($indicators->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => auth()->user()->name . ' doesnt have any indicators yet',
            ], 400);
        }

        return response()->json($indicators);
    }

     public function activities($project_id)
    {

           $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $project_id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($activities->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => auth()->user()->name . ' doesnt have any activities yet',
            ], 400);
        }

        return response()->json($activities);
    }
}
