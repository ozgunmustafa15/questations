@if(count($errors)>0)
    <div class="alert alert-danger mt-1 pb-0 my-0">
        <ul>
            @foreach($errors->all() as $error)
                <span class="help-block"><li>{{$error}}</li></span>
            @endforeach
        </ul>
    </div>
@endif
