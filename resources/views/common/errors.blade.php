@if (count($errors) > 0)
    <!-- Form Error List -->

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 alert alert-danger">
            <strong>Whoops! Something went wrong!</strong>

            <br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endif