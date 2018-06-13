@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="well col-sm-offset-2 col-sm-8">
                <div class="row">
                    <div class="col-sm-8"><h3>EDV Working Hours:</h3></div>
                    <div class="col-sm-4"><h3 class="pull-right pul">(WS 16/17)</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-6" style="padding: 0 35px;">
                        <h4>Chris</h4>
                        <div class="row">
                            <div class="col-sm-4"><b>Tuesday</b></div>
                            <div class="col-sm-8">10:00 to 14:30</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><b>Wednesday</b></div>
                            <div class="col-sm-8">10:00 to 14:30</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">Tuesday and Wednesday afternoons as required</div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="padding: 0 35px;">
                        <h4>Jan</h4>
                        <div class="row">
                            <div class="col-sm-4"><b>Monday</b></div>
                            <div class="col-sm-8">14:00 to 17:00</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><b>Wednesday</b></div>
                            <div class="col-sm-8">14:00 to 16:00</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="col-sm-12" style="margin: 5px 0;">
                        <b>Please note:</b> Chris and Jan have reduced support capacity. For routine EDV troubleshooting issues and general instructions, please check the Wiki database [only in German] provided by the University Rechenzentrum. The Rechenzentrum also issues announcements concerning IT disturbances that affect the entire University.
                    </p>
                    <p class="col-sm-12" style="margin: 5px 0;">
                        <b>Contacting us:</b> Chris and Jan are located in room 01 035. If you would like to contact us beyond these times or if we are not in room 01 035, please set up a Jobdesk ticket:
                    </p>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <h3>New Job</h3>
            </div>
        </div>
        <div class="row">
            <form class="form-horizontal" method="POST" action="/jobs">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="urgency">Urgency:</label>
                    <div class="col-sm-8">
                        <select name="urgency" class="selectpicker show-tick" data-size="5" data-show-subtext="true" id="urgency">
                            <option value="urgent" data-subtext="~1 day">Urgent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                            <option value="short-term" data-subtext="~1 week" selected>Short-term&nbsp;&nbsp;</option>
                            <option value="long-term" data-subtext="~1 month">Long-term&nbsp;&nbsp;&nbsp;</option>
                        </select>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-2" for="subject">Subject:</label>
                    <div class="col-sm-8">
                        <input name="subject" type="text" class="form-control" id="subject" placeholder="e.g. Please add John Doe to the mailing list" required autofocus>
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-2" for="body">Job:</label>
                    <div class="col-sm-8">
                        <textarea name="body" class="form-control" rows="8" id="body" placeholder="He is a guest lecturer for Joe Bloggs and will be here for 1 semester.&NewLine;His E-Mail address is john.doe&commat;ucf.uni-freiburg.de" required></textarea>
                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection