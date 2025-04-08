<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'my_job_applications.index',
            [
                    'applications' => auth()->user()->jobApplications()
                    ->with([
                            'job' => fn($query) => $query->withCount('jobApplications')
                                ->withAvg('jobApplications', 'expected_salary'),
                            'job.employer'
                        ])    
                    ->latest()->get(),
                ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $jobId)
    {
        JobApplication::destroy($jobId);

        return redirect()->back()->with(
            'success',
            'Job Application Cancelled'
        );
    }
}
