<input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
@csrf
<div class="row">
    <div class="col-md-8">

        Nome:
        <input type="text" name="name" id="name" value="{{ $cad->name ?? old ('name')}}" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="avatar" class="btnPerson">Foto do perfil</label>
        <input id="avatar" type="file" class="form-control veroselect_permissions" name="avatar" style="color:white;" />
    </div>
    <div class="col-md-4">

        CPF:
        <input type="text" name="cpf" id="cpf" value="{{ $cad->cpf ?? old ('cpf')}}" class="form-control">
    </div>
    <div class="col-md-4">

        Telefone:
        <input type="text" name="phone" id="phone" value="{{ $cad->phone ?? old ('phone')}}" class="form-control">
    </div>
    <div class="col-md-4">

        Email:
        <input type="text" name="email" id="email" value="{{ $cad->email ?? old ('email')}}" class="form-control">
    </div>
    <div class="col-md-6">

        Endereço:
        <input type="text" name="address" id="address" value="{{ $cad->address ?? old ('address')}}"
            class="form-control">

    </div>
    <div class="col-md-2">
        Estado:
        <select class="form-control " id="uf" name="uf" style="color: #00a5bb" required>
            <option value="">Selecione</option>
            <option value="AC" @if (!empty($cad)) {{ $cad->uf == 'AC' ? 'selected' : '' }} @endif>Acre</option>
            <option value="AL" @if (!empty($cad)) {{ $cad->uf == 'AL' ? 'selected' : '' }} @endif>Alagoas</option>
            <option value="AP" @if (!empty($cad)) {{ $cad->uf == 'AP' ? 'selected' : '' }} @endif>Amapá</option>
            <option value="AM" @if (!empty($cad)) {{ $cad->uf == 'AM' ? 'selected' : '' }} @endif>Amazonas</option>
            <option value="BA" @if (!empty($cad)) {{ $cad->uf == 'BA' ? 'selected' : '' }} @endif>Bahia</option>
            <option value="CE" @if (!empty($cad)) {{ $cad->uf == 'CE' ? 'selected' : '' }} @endif>Ceará</option>
            <option value="DF" @if (!empty($cad)) {{ $cad->uf == 'DF' ? 'selected' : '' }} @endif>Distrito Federal
            </option>
            <option value="ES" @if (!empty($cad)) {{ $cad->uf == 'ES' ? 'selected' : '' }} @endif>Espírito Santo
            </option>
            <option value="GO" @if (!empty($cad)) {{ $cad->uf == 'GO' ? 'selected' : '' }} @endif>Goiás</option>
            <option value="MA" @if (!empty($cad)) {{ $cad->uf == 'MA' ? 'selected' : '' }} @endif>Maranhão</option>
            <option value="MT" @if (!empty($cad)) {{ $cad->uf == 'MT' ? 'selected' : '' }} @endif>Mato Grosso</option>
            <option value="MS" @if (!empty($cad)) {{ $cad->uf == 'MS' ? 'selected' : '' }} @endif>Mato Grosso do Sul
            </option>
            <option value="MG" @if (!empty($cad)) {{ $cad->uf == 'MG' ? 'selected' : '' }} @endif>Minas Gerais</option>
            <option value="PA" @if (!empty($cad)) {{ $cad->uf == 'PA' ? 'selected' : '' }} @endif>Pará</option>
            <option value="PB" @if (!empty($cad)) {{ $cad->uf == 'PB' ? 'selected' : '' }} @endif>Paraíba</option>
            <option value="PR" @if (!empty($cad)) {{ $cad->uf == 'PR' ? 'selected' : '' }} @endif>Paraná</option>
            <option value="PE" @if (!empty($cad)) {{ $cad->uf == 'PE' ? 'selected' : '' }} @endif>Pernambuco</option>
            <option value="PI" @if (!empty($cad)) {{ $cad->uf == 'PI' ? 'selected' : '' }} @endif>Piauí</option>
            <option value="RJ" @if (!empty($cad)) {{ $cad->uf == 'RJ' ? 'selected' : '' }} @endif>Rio de Janeiro
            </option>
            <option value="RN" @if (!empty($cad)) {{ $cad->uf == 'RN' ? 'selected' : '' }} @endif>Rio Grande do Norte
            </option>
            <option value="RS" @if (!empty($cad)) {{ $cad->uf == 'RS' ? 'selected' : '' }} @endif>Rio Grande do Sul
            </option>
            <option value="RO" @if (!empty($cad)) {{ $cad->uf == 'RO' ? 'selected' : '' }} @endif>Rondônia</option>
            <option value="RR" @if (!empty($cad)) {{ $cad->uf == 'RR' ? 'selected' : '' }} @endif>Roraima</option>
            <option value="SC" @if (!empty($cad)) {{ $cad->uf == 'SC' ? 'selected' : '' }} @endif>Santa Catarina
            </option>
            <option value="SP" @if (!empty($cad)) {{ $cad->uf == 'SP' ? 'selected' : '' }} @endif>São Paulo</option>
            <option value="SE" @if (!empty($cad)) {{ $cad->uf == 'SE' ? 'selected' : '' }} @endif>Sergipe</option>
            <option value="TO" @if (!empty($cad)) {{ $cad->uf == 'TO' ? 'selected' : '' }} @endif>Tocantins</option>
        </select>
    </div>
    <div class="col-md-4">

        Cidade:
        <input type="text" name="city" id="city" value="{{ $cad->city ?? old ('city')}}" class="form-control">
    </div>
</div>
<br>
<button type="subbmit" class="btn btn-primary addCompany">Salvar</button>
