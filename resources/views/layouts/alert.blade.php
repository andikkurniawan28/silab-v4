@if($message = Session::get("fail"))
    @include("components.alert", ["message"=>$message, "color"=>"danger"])
@elseif($message = Session::get("success"))
    @include("components.alert", ["message"=>$message, "color"=>"success"])
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <p>Error :</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif
