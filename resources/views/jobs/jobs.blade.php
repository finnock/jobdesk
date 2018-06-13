@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            {{--{{ dump($jobs->all()) }}--}}

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Supporter</th>
                        <th>Urgency</th>
                        <th>Subject</th>
                        <th>Erstellt</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr class="clickable" onclick="window.document.location='/jobs/{{ $job->id }}';">
                            <td>{{ $job->supporter->name ?? '' }}</td>
                            <td>{{ $job->urgency }}</td>
                            <td>{{ $job->subject }}</td>
                            <td>{{ $job->created_at }}</td>
                            <td>{{ $job->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection