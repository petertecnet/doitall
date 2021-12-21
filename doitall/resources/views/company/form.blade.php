<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tipo</label>
    <input type="text" class="form-control" id="type" name="type" value="{{ $bloodBank->type ?? old ('type')}}" placeholder="Informe o tipo" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Compatibilidade</label>
    <input type="text" class="form-control" name="compatibility" placeholder="Informe a compatibilidade" value="{{  $bloodBank->compatibility ?? old('compatibility') }}" >
  </div>
