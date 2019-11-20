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

       public function risks($project_id)
    {

          $risks = DB::table('risks')
            ->select('risks.*')
            ->where('risks.project_id', $project_id)
            ->get();


        if ($risks->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => auth()->user()->name . ' doesnt have any risks yet',
            ], 400);
        }

        return response()->json($risks);
    }

       public function assumptions($project_id)
    {

          $assumptions = DB::table('assumptions')
            ->select('assumptions.*')
            ->where('assumptions.project_id', $project_id)
            ->get();


        if ($assumptions->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => auth()->user()->name . ' doesnt have any assumptions yet',
            ], 400);
        }

        return response()->json($assumptions);
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
