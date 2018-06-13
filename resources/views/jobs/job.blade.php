@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h1>{{ $job->subject }}</h1>
            </div>
            <div class="col-sm-4" style="text-align: right">
                <h3>{{ $job->created_at->format('l, d.m.Y') }} - {{ $job->user->name }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div
                        class="well"
                        style="
                        white-space: pre-line;
                        font-family: Consolas, Lucida Console, monospace;
                    ">{{ $job->body }}</div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <form class="form-inline" action="{{ route('jobs.update', ['job' => $job->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <button class="btn btn-primary" name="button" value="accept">
                        <span class="glyphicon glyphicon-play"></span> Accept
                    </button>
                    <button class="btn btn-default" name="button" value="reject" disabled="disabled">
                        <span class="glyphicon glyphicon-ban-circle"></span> Reject
                    </button>
                    <button class="btn btn-default" name="button" value="postpone" disabled="disabled">
                        <span class="glyphicon glyphicon-time"></span> Postpone
                    </button>
                    <button class="btn btn-default" name="button" value="done" disabled="disabled">
                        <span class="glyphicon glyphicon-ok"></span> Done
                    </button>
                </form>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ $job->id }}/edit" class="btn btn-warning">
                    <span class="glyphicon glyphicon-pencil"></span> Edit
                </a>
                <a href="{{ $job->id }}/edit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span> Delete
                </a>
            </div>
        </div>

    </div>
@endsection