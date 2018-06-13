@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{ dd(json_decode(file_get_contents('http://ucf-jobdesk.uni-freiburg.de/test/ldapTest.php?user=jo34&pw=piaggio1407&target=jo34'))) }}
        </div>
    </div>
@endsection