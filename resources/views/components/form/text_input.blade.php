<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input
    type="{{empty($type) ? 'text' : $type}}"    
    id="{{$id ?? ''}}" name="{{$name}}" placeholder="{{$placeholder ?? ''}}" 
    {{empty($required) ? '': 'required'}}
    value="{{$value ?? ''}}" 
    oninput="{{empty($oninput) ? 'transformarMaiuscula(this)' : $oninput}}" />    
</div>