<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'asc')->get();

        return view('jobs.jobs', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:100',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/jobs/create')
                ->withInput()
                ->withErrors($validator);
        }

        $request->user()->jobs()->create([
            'urgency' => $request->urgency,
            'subject' => $request->subject,
            'body' => $request->body
        ]);

        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.job', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        switch ($request->button) {
            case 'accept':
                $job->supporter()->associate(Auth::id());
                $job->status = 'processing';
                $job->save();
                return redirect(route('jobs.index'));

            case 'save':
                $validator = Validator::make($request->all(), [
                    'subject' => 'required|max:100',
                ]);

                if ($validator->fails()) {
                    return redirect('/jobs/'.$job->id.'/edit')
                        ->withInput()
                        ->withErrors($validator);
                }

                $job->update($request->all());

                return redirect('/jobs/'.$job->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
