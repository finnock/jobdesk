<?php
    use \App\Helpers\FormHelper;
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8"><h3>Edit Job</h3></div>
        </div>
        <div class="row">
            <form class="form-horizontal" method="POST" action="/jobs/{{ $job->id }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="urgency">Urgency:</label>
                    <div class="col-sm-8">
                        <select name="urgency" class="selectpicker show-tick" data-size="5" data-show-subtext="true" id="urgency">
                            <option
                                    {{ FormHelper::selectValue('urgent', $job->urgency) }}
                                    value="urgent"
                                    data-subtext="~1 day">
                                Urgent&#09;&#09;
                            </option>
                            <option
                                    {{ App\Helpers\FormHelper::selectValue('short-term', $job->urgency) }}
                                    value="short-term"
                                    data-subtext="~1 week">
                                Short-term
                            </option>
                            <option
                                    {{ App\Helpers\FormHelper::selectValue('long-term', $job->urgency) }}
                                    value="long-term"
                                    data-subtext="~1 month">
                                Long-term
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="subject">Subject:</label>
                    <div class="col-sm-8">
                        <input
                                name="subject"
                                type="text"
                                class="form-control"
                                id="subject"
                                placeholder="e.g. Please add John Doe to the mailing list"
                                value="{{ $job->subject }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="body">Job:</label>
                    <div class="col-sm-8">
                        <textarea
                                name="body"
                                class="form-control"
                                rows="8"
                                id="body"
                                style="font-family: Consolas, Lucida Console, monospace;"
                                placeholder="He is a guest lecturer for Joe Bloggs and will be here for 1 semester.&NewLine;His E-Mail address is john.doe&commat;ucf.uni-freiburg.de">{{ $job->body }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" name="button" value="save">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Save
                        </button>
                        <a href="/jobs/{{ $job->id }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-remove"></span> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection