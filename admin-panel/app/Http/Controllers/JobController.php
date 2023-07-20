<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view("jobs.index")->with(['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.new');
    }


    public function createJob(array $validatedData)
    {
        $job = new Job();

        $job->title = $validatedData['title'];
        $job->company = $validatedData['company'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->requirement = $validatedData['requirement'];
        $job->employment_type = $validatedData['employment_type'];
        $job->education = $validatedData['education'];
        $job->skills = $validatedData['skills'];
        $job->experience_years = $validatedData['experience_years'];
        $job->experience_months = $validatedData['experience_months'];
        $job->salary = $validatedData['salary'];
        $job->deadline = $validatedData['deadline'];
        $job->benefits = $validatedData['benefits'];
        $job->contact_email = $validatedData['contact_email'];

        $job->save();

        return $job;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'location' => 'required',
            'requirement' => 'required',
            'employment_type' => 'required',
            'education' => 'required',
            'skills' => 'nullable',
            'experience_years' => 'nullable|numeric|min:0',
            'experience_months' => 'nullable|numeric|min:0|max:11',
            'salary' => 'nullable',
            'deadline' => 'required|date',
            'benefits' => 'nullable',
            'contact_email' => 'required|email',
        ]);

        if ($validatedData) {

            $job = $this->createJob($validatedData);

            return redirect('/jobs')->with('success', 'Job added successfully.');
        } else {
            return redirect()->back()->withErrors("default error")->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'location' => 'required',
            'requirement' => 'required',
            'employment_type' => 'required',
            'education' => 'required',
            'skills' => 'nullable',
            'experience_years' => 'nullable|numeric|min:0',
            'experience_months' => 'nullable|numeric|min:0|max:11',
            'salary' => 'nullable',
            'deadline' => 'required|date',
            'benefits' => 'nullable',
            'contact_email' => 'required|email',
        ]);

        if ($validatedData) {

            $job = Job::find($id);
            $job->update($request->all());
            return redirect('/jobs')->with('success', 'Job Updated successfully.');
        } else {
            return redirect()->back()->withErrors("default error")->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
