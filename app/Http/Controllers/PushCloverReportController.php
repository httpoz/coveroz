<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCloverReportRequest;
use App\Project;
use HttpOz\Hook\Models\Hook;
use Illuminate\Http\Request;

class PushCloverReportController extends Controller
{
    public function __invoke(StoreCloverReportRequest $request, Hook $hook)
    {
        $project = Project::where('hook_id', $hook->id)->first();

        $xml = simplexml_load_file($request->file('report'));

        $project->metrics()->create(collect($xml->project->metrics->attributes())->toArray());

        return response([], 200);
    }
}
