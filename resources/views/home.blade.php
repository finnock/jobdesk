@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>


                {{--@role('admin')--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">Admin Panel</div>--}}

                        {{--<div class="panel-body">--}}
                            {{--<p>This is visible to users with the admin role. Gets translated to--}}
                                {{--\Entrust::role('admin')</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endrole--}}
            </div>
        </div>
    </div>
@endsection