<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

function cacheFiles(){
    return '2020080202h0943';
}

/**
 * Retorna mensagem de ajuda para erros de validação
 *
 * @param Illuminate\Support\ViewErrorBag $errors
 * @param string $key
 * @return string
 */
function helpBlock($errors, $key)
{
    if (!$errors) return '';
    if (!$key) return '';

    if ($errors->has($key)) {
        return "<span class='help-block text-danger help-block".$key."'><strong>{$errors->first($key)}</strong></span>";
    }

    return null;
}


/**
 * Retorna classe de erro de validação para Views
 *
 * @param Illuminate\Support\ViewErrorBag $errors
 * @param string $key
 * @return string
 */
function hasErrorClass($errors, $key, $class = 'has-error', $dd = false)
{
    if (!$errors) return '';
    if (!$key) return '';

    if ($dd) {
        if (!$errors->has($key))
            dd($errors);
    }
    return $errors->has($key) ? ' ' . $class : '';
}




function LIMPANUMERO ($nro)
{
    $aux ='';
    for ($i=0;$i <= strlen($nro);$i++)
    {
        if ((substr($nro,$i,1)=='0')or(substr($nro,$i,1)=='1')or
            (substr($nro,$i,1)=='2')or(substr($nro,$i,1)=='3')or(substr($nro,$i,1)=='4')or
            (substr($nro,$i,1)=='5')or(substr($nro,$i,1)=='6')or(substr($nro,$i,1)=='7')or
            (substr($nro,$i,1)=='8')or(substr($nro,$i,1)=='9'))
        {
            $aux.=substr($nro,$i,1);
        }
    }
    return $aux;
}

function LIMPANUMEROv ($nro)
{
    $aux ='';
    for ($i=0;$i <= strlen($nro);$i++)
    {
        if ((substr($nro,$i,1)=='0')or(substr($nro,$i,1)=='1')or
            (substr($nro,$i,1)=='2')or(substr($nro,$i,1)=='3')or(substr($nro,$i,1)=='4')or
            (substr($nro,$i,1)=='5')or(substr($nro,$i,1)=='6')or(substr($nro,$i,1)=='7')or
            (substr($nro,$i,1)=='8') or(substr($nro,$i,1)=='9') or (substr($nro,$i,1)==',') )
        {
            $aux.=substr($nro,$i,1);
        }
    }
    return $aux;
}

function LIMPANUMEROp ($nro)
{
    $aux ='';
    for ($i=0;$i <= strlen($nro);$i++)
    {
        if ((substr($nro,$i,1)=='0')or(substr($nro,$i,1)=='1')or
            (substr($nro,$i,1)=='2')or(substr($nro,$i,1)=='3')or(substr($nro,$i,1)=='4')or
            (substr($nro,$i,1)=='5')or(substr($nro,$i,1)=='6')or(substr($nro,$i,1)=='7')or
            (substr($nro,$i,1)=='8') or(substr($nro,$i,1)=='9') or (substr($nro,$i,1)=='.') )
        {
            $aux.=substr($nro,$i,1);
        }
    }
    return $aux;
}

function StrZero($str,$qtd){
    $res = str_pad($str,$qtd,'0',STR_PAD_LEFT);
    return $res;
}


///// no lugar da função mod que retorna o resto da divisao usamos o %, ex: 6 mod 5 fica 6 % 5;
Function VerificaCpfCgc($pP1)
{
    $pP1 = TRIM( ( LIMPANUMERO( $pP1 ) ));
    if (strlen($pP1)>0)
    {
        $DIGITO = 0;
        $MULT = '543298765432';
        ///Se for CNPJ
        if (strlen($pP1)==14)
        {
            $DIGITOS = substr($pP1,12,2); /// digitos informados
            $MULT = '543298765432';
            $CONTROLE = '';
            ///Loop de verificação
            $J=1;
            For ($J;$J<=2;$J++)
            {
                $SOMA = 0;
                $I=1;
                For ($I;$I<=12;$I++)
                {
                    $SOMA = $SOMA + (substr($pP1,$I-1,1)*substr($MULT,$I-1,1));
                }
                if ($J==2)
                {
                    $SOMA = $SOMA + (2*$DIGITO);
                }
                $DIGITO = ($SOMA*10) % 11;
                If ($DIGITO==10)
                {
                    $DIGITO = 0;
                }
                $CONTROLE = $CONTROLE.$DIGITO;
                $MULT= '654329876543';
            } /// fim for J
            ////compara os dígitos calculados(CONTROLE) com os dígitos informados (DIGITOS)
            if ($CONTROLE<>$DIGITOS)
            {
                return FALSE;
            }else
            {
                return TRUE;
            }
        }else //// FIM Se FOR CNPJ

            if (strlen($pP1)==11) /// se FOR CPF
            {
                //Sequencial
                if (Str::contains('00000000000,11111111111,22222222222,33333333333,44444444444,55555555555,66666666666,77777777777,88888888888,99999999999',$pP1))
                    return false;

                $DIGITOS = substr($pP1,9,2); /// digitos informados
                $MULT = '100908070605040302';
                $CONTROLE = '';
                ///Loop de verificação
                $J=1;
                For ($J;$J<=2;$J++)
                {
                    $SOMA = 0;
                    //
                    $K=0;
                    //
                    $I=1;
                    //
                    For ($I;$I<=9;$I++)
                    {
                        if ($I == 1)
                        {
                            $K=1;
                        }else
                        {
                            $K=$K+2;
                        }
                        $SOMA = $SOMA + (substr($pP1,$I-1,1)*substr($MULT,$K-1,2));
                    }
                    //
                    if ($J==2)
                    {
                        $SOMA = $SOMA + (2*$DIGITO);
                    }
                    //
                    $DIGITO = ($SOMA*10) % 11;
                    //
                    If ($DIGITO==10)
                    {
                        $DIGITO = 0;
                    }
                    //
                    $CONTROLE = $CONTROLE.$DIGITO;
                    $MULT= '111009080706050403';
                } /// fim for J
                ////compara os dígitos calculados(CONTROLE) com os dígitos informados (DIGITOS)
                if ($CONTROLE<>$DIGITOS)
                {
                    return False;
                }else
                {
                    return True;
                }

            }else //// FIM Se FOR CPF
            {
                return False;
            }
    }else // se a variavel informada for vazia
    {
        return False;;
    }

}
/////Fim CPF CNPJ


///Formata o CGC
function FormataCpfCnpj($pP1)
{
    $result = $pP1;
    $pP1 = LIMPANUMERO($pP1);
    //
    if (strlen($pP1)==14)
    {
        $result=substr($pP1,0,2).'.'.
            substr($pP1,2,3).'.'.
            substr($pP1,5,3).'/'.
            substr($pP1,8,4).'-'.
            substr($pP1,12,2);
    }elseif (strlen($pP1)==11)
    {
        $result=substr($pP1,0,3).'.'.
            substr($pP1,3,3).'.'.
            substr($pP1,6,3).'-'.
            substr($pP1,9,2);
    }
    return $result;
}

function FormataRG($rg)
{
    $result = $rg;
    $rg = LIMPANUMERO($rg);
    //
    if (strlen($rg)==11)
    {
        $result=substr($rg,2,2).'.'.
            substr($rg,4,3).'.'.
            substr($rg,7,3).'-'.
            substr($rg,10,1);

            
    }
    return $result;
}




/**
 * Retorna o 1 nome
 *
 */
function So1Nome($nome)
{
    $pos = strpos($nome,' ');
    if ($pos>0) $nome=substr($nome,0,$pos);

    //converte a 1 para maiusculo
    $nome = PrimeiraMaiuscula($nome);

    //retorno
    return $nome;
}



/**
 * Retorna os auditoria
 *
 */
function Auditoria($acao,$model,$id,$info='',$user_id=null)
{
    if (!$user_id)
        if (Auth::check())
            $user_id = Auth::user()->id;

    DB::table('audits')->insert(
        ['user_id' => $user_id,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'action' => $acao,
            'model' => $model,
            'reg_id' => $id,
            'info' => $info
        ]
    );
}



function FormatarCEP($CEP){
    $CEP = LIMPANUMERO($CEP);
    if (!$CEP) return '';

    if (strlen($CEP)<8)
        $CEP = StrZero($CEP,8);
    //
    $CEP = substr($CEP,0,5).'-'.substr($CEP,5,3);
    return $CEP;
}


function TratarEndereco($rua){
    if (!Str::contains($rua,' - de '))
        return $rua;

    $ini = 0;
    $fim = strpos($rua,' - de ');
    $msg = substr($rua,$ini,$fim);

    return $msg;
}

function MyFieldMaterial($type,$errors,$name,$label,$value='',$att=''){
    return MyField($type,$errors,$name,$label,$value,$att);
}

function MyTextMaterial($errors,$name,$label,$value='',$att=''){
    return MyFieldMaterial('text',$errors,$name,$label,$value,$att);
}

function MyTextField($errors,$name,$label,$value='',$att=''){
    return MyField('text',$errors,$name,$label,$value,$att);
}

function MyField($type,$errors,$name,$label,$value='',$att=''){
    $value = old($name) ? old($name) : $value;

    $msg = '<div class="form-group m-b-10 '.hasErrorClass($errors,$name).' input-div-'.$name.'">';

    if ($label<>'') $msg.=' <label id="lbl_'.$name.'" for="'.$name.'" style="margin:0px;">'.$label.'</label>';

    $msg.='<input type="'.$type.'" class="form-control myField" id="'.$name.'" name="'.$name.'" value="'.$value.'" '.$att.'>
           '.helpBlock($errors,$name)
    ;
    $msg.='</div>';
    return $msg;
}


function MyTextarea($errors,$name,$label,$value='',$att=''){
    $value = old($name) ? old($name) : $value;

    $msg = '<div class="form-group m-b-10 '.hasErrorClass($errors,$name).'">';

    if ($label<>'') $msg.=' <label id="lbl_'.$name.'" for="'.$name.'" style="margin:0px;">'.$label.'</label>';

    $rows=' rows="6"';
    if (Str::contains($att,'rows'))
        $rows='';

    $msg.='<textarea class="form-control myField" id="'.$name.'" name="'.$name.'" '.$rows.' '.$att.'>'.$value.'</textarea>
           '.helpBlock($errors,$name)
    ;
    $msg.='</div>';
    return $msg;
}


function MySelect($errors,$name,$label,$values=[],$att=''){
    $msg = '<div class="form-group  m-b-10 '.hasErrorClass($errors,$name).'">';

    if ($label<>'') $msg.=' <label id="lbl_'.$name.'" for="'.$name.'" style="margin:0px;">'.$label.'</label>';


    $msg.='<select class="form-control custom-select  col-12" id="'.$name.'" name="'.$name.'" '.$att.'  style="width:100%">';
    foreach ($values as $index => $value){
        $msg.='<option value="'.$index.'">'.$value.'</option>';
    }
    $msg.='</select>'.helpBlock($errors,$name);
    $msg.='</div>';
    return $msg;
}
function MySelect2($errors,$name,$label,$values=[],$att=''){
    $msg = '<div class="form-group  m-b-10 '.hasErrorClass($errors,$name).'">';

    if ($label<>'') $msg.=' <label id="lbl_'.$name.'" for="'.$name.'" style="margin:0px;">'.$label.'</label>';


    $msg.='<select class="select2 col-12" id="'.$name.'" name="'.$name.'" '.$att.' style="width:100%">';
    foreach ($values as $index => $value){
        $msg.='<option value="'.$index.'">'.$value.'</option>';
    }
    $msg.='</select>'.helpBlock($errors,$name);
    $msg.='</div>';
    return $msg;
}

function MyTextBtn($errors,$name,$label,$value='',$att=''){
    $value = old($name) ? old($name) : $value;

    $msg = '<div class="form-group  m-b-10 '.hasErrorClass($errors,$name).'">';

    $btn_caption = '<i id="ico_'.$name.'" class="fa fa-search" title="Localizar '.$label.'"></i>';

    if ($label<>'') $msg.=' <label id="lbl_'.$name.'" for="'.$name.'" style="margin:0px;">'.$label.'</label>';

    $msg.='<div class="input-group">
                <input type="text" class="form-control myField" id="'.$name.'" name="'.$name.'" value="'.$value.'" '.$att.'>
                <span class="input-group-btn">
                  <button class="btn btn-info" type="button" id="btn_'.$name.'" data-caption="'.$label.'">'.$btn_caption.'</button>
                </span>
            </div>
            '.helpBlock($errors,$name).'
            ';
    $msg.='</div>';
    return $msg;
}

function MylabelView($label,$value,$name=null){
    $msg = MyTextField(null,'label_'.$name,$label,$value,'disabled=disabled');
    return $msg;
}




function MyCheckbox($name,$label,$checked='',$adicionals=''){

    if ($checked=='checked'){
        $checked = 'checked="checked"';
    }
    return '<div class="checkbox checkbox-primary p-t-0">
                <input type="checkbox" '.$checked.' id="'.$name.'" name="'.$name.'" '.$adicionals.'>
                <label for="'.$name.'" class="font-weight-normal no-margin" style="font-size:14px" id="lbl_'.$name.'"> '.$label.' </label>
           </div>
    ';
}

function MyCheckboxLine($name,$label,$checked=''){

    if ($checked=='checked'){
        $checked = 'checked="checked"';
    }
    return '<label class="checkbox-inline">
                <input type="checkbox" class="control-primary" '.$checked.' id="'.$name.'" name="'.$name.'">
                <span id="lbl_'.$name.'">'.$label.'</span>
            </label>';
}

function diaSemana($i){
    $cad = array( 'Dom','Seg','Ter','Qua','Qui','Sex','Sab');
    return $cad[$i];
}

function diaSemanaEx($i){
    $cad = array( 'Domingo','Segunda-Feira','Terça-Feira','Quarta-Feira','Quinta-Feira','Sexta-Feira','Sábado');
    return $cad[$i];
}

function TimeToStr($time){
    return date('H:i',strtotime($time));
}

function FloatToStr($value,$decimais=2){
    if (!$value) $value = 0;
    return number_format($value,$decimais,',','.');
}

function StrToFloat($value,$decimais=2){
    $value = LIMPANUMEROv($value);
    if (!$value) $value = 0;
    //
    $value = str_replace(',','.',$value);
    return number_format($value,$decimais,'.','');
}



function NullToStr($var){
    if (is_null($var))
        return "";
    return $var;
}

function translateDiff($msg, $value ,$text){
    if ($value>1)
        $msg.= $value.' '.$text.'s ';
    elseif ($value==1)
        $msg.= '1 '.$text.' ';
    return $msg;
}
function HorasHumanas($time,$base='00:00:00'){
    Carbon::setLocale('pt_BR');
    $dt1 = Carbon::createFromTimeString($base);
    $dt2 = Carbon::createFromTimeString($time);
//    $dt1 = newCarbon($base);
//    $dt2 = newCarbon($time);

    //Função de tratamento humano do Carbom
    //    $msg = $dt1->diffForHumans($dt2);

    //Minha propria função de tratamento humano
    $duration = $dt2->diff($dt1);
//    return $duration;
    $msg='';
    $msg= translateDiff($msg,$duration->y,'ano');
    $msg= translateDiff($msg,$duration->m,'mês');
    $msg= translateDiff($msg,$duration->d,'dia');
    $msg= translateDiff($msg,$duration->h,'hora');
    $msg= translateDiff($msg,$duration->i,'minuto');
    $msg= translateDiff($msg,$duration->s,'segundo');

    $msg = str_replace('atrás','',$msg);
    $msg = str_replace('após','',$msg);
    $msg = str_replace(' minutos','min',$msg);
    $msg = str_replace(' minuto','min',$msg);
    $msg = str_replace(' horas','hs',$msg);
    $msg = str_replace(' hora','h',$msg);
    $msg = str_replace(' segundos','seg',$msg);
    $msg = str_replace(' segundo','seg',$msg);

    //remove espaço entre horas e minutos
    $msg = str_replace('h ','h',$msg);
    $msg = str_replace('hs ','hs',$msg);
    $msg = Trim($msg);

    return $msg;
}

function addTime($datetime,$time){
    //adicina os minutos caso não tenha
    if (substr_count($time,':')==0)
        $time= LIMPANUMERO($time).':00';
    //adicona os segundos caso não tenha
    if (substr_count($time,':')==1)
        $time.=':00';

    //Converte a data em um carbon
    $data = Carbon::parse($datetime);

    //transforma a hora em um array
    $hora = explode(':',$time);

    //adiciona a hora na data
    $data->addHour( $hora[0] );
    $data->addMinute( $hora[1] );
    $data->addSecond( $hora[2] );

    //retorno
    return $data;
}

function subTime($datetime,$time){
    //adicina os minutos caso não tenha
    if (substr_count($time,':')==0)
        $time= LIMPANUMERO($time).':00';
    //adicona os segundos caso não tenha
    if (substr_count($time,':')==1)
        $time.=':00';

    //Converte a data em um carbon
    $data = Carbon::parse($datetime);

    //transforma a hora em um array
    $hora = explode(':',$time);

    //diminui a hora na data
    $data->subHour( $hora[0] );
    $data->subMinute( $hora[1] );
    $data->subSecond( $hora[2] );

    //retorno
    return $data;
}

function dateTimeToStr($date){
    return date('d/m/Y H:i:s',strtotime($date));
}
function dateToStr($date,$split='/'){
    if (!$date) return null;
    return date('d'.$split.'m'.$split.'Y',strtotime($date));
}

function StrToDate($date){
    return substr($date,6,4).'-'.substr($date,3,2).'-'.substr($date,0,2);
}

function dateTimeYear($date){
    //se for o mesmo ano
    if (date('Y')== date('Y',strtotime($date)) ){
        return date('d/m H:i',strtotime($date));
    }else
        return date('d/m/Y H:i',strtotime($date));
}
function montaOptionTime($hour, $select){
    $hour = TimeToStr($hour->toTimeString());
    //monta o option
    $option ='<option value="'.$hour.'"';
    if ($hour==$select) $option.=' selected';
    $option.='>'.$hour.'</option>';
    return $option;
}

function MySelectTime($name,$hourStart,$hourEnd,$interval=10,$select='',$attr=''){
    //Se veio vazio
    if (!$hourStart)$hourStart ='00:00:00';
    if (!$hourEnd) $hourEnd ='23:59:59';

    //Ajusta segundos na hora ini
    if (substr_count($hourStart,':')==0) $hourStart= LIMPANUMERO($hourStart).':00';
    if (substr_count($hourStart,':')==1) $hourStart.=':00';

    //Ajusta segundos na hora fim
    if (substr_count($hourEnd,':')==0) $hourEnd= LIMPANUMERO($hourEnd).':00';
    if (substr_count($hourEnd,':')==1) $hourEnd.=':00';

    //cria o combo
    $combo = '<select class="select2 select-hour" style="width: 100%" name="'.$name.'" id="'.$name.'" '.$attr.'>
                <option></option>';

    //Cria a data carbon
    Carbon::setLocale('pt_BR');
//    $hourStart = Carbon::createFromTimeString($hourStart);
//    $hourEnd = Carbon::createFromTimeString($hourEnd);
    $hourStart = newCarbon($hourStart);
    $hourEnd = newCarbon($hourEnd);

    //Faz o loop 10min
    while ($hourEnd>$hourStart){
        $combo.= montaOptionTime($hourStart,$select);
        //add os 10 minutos
        $hourStart->addMinute($interval);
    }

    //option da hora final
    $combo.= montaOptionTime($hourEnd,$select);
    $combo.='</select>';
    return $combo;
}

function MesShort($mes){
    if ($mes==1) return 'Jan';
    if ($mes==2) return 'Fev';
    if ($mes==3) return 'Mar';
    if ($mes==4) return 'Abr';
    if ($mes==5) return 'Mai';
    if ($mes==6) return 'Jun';
    if ($mes==7) return 'Jul';
    if ($mes==8) return 'Ago';
    if ($mes==9) return 'Set';
    if ($mes==10) return 'Out';
    if ($mes==11) return 'Nov';
    if ($mes==12) return 'Dez';
    return $mes;
}

function MesNumber($mes){
    $mes = strtolower(trim($mes));
    $mes = substr($mes,0,3);

    switch ($mes){
        case 'jan' : return 1;
        case 'fev' : return 2;
        case 'mar' : return 3;
        case 'abr' : return 4;
        case 'mai' : return 5;
        case 'jun' : return 6;
        case 'jul' : return 7;
        case 'ago' : return 8;
        case 'set' : return 9;
        case 'out' : return 10;
        case 'nov' : return 11;
        case 'dez' : return 12;
    }

    return 0;
}

function MesLong($mes){
    if ($mes==1) return 'Janeiro';
    if ($mes==2) return 'Fevereiro';
    if ($mes==3) return 'Março';
    if ($mes==4) return 'Abril';
    if ($mes==5) return 'Maio';
    if ($mes==6) return 'Junho';
    if ($mes==7) return 'Julho';
    if ($mes==8) return 'Agosto';
    if ($mes==9) return 'Setembro';
    if ($mes==10) return 'Outubro';
    if ($mes==11) return 'Novembro';
    if ($mes==12) return 'Dezembro';
    return $mes;
}

function validatorID($request,$table,$label,$field_request='id',$field_table='id'){
    $validator = Validator::make($request->all(), [
        $field_request => 'required|exists:'.$table.','.$field_table,
    ],
        [
            $field_request.'.required' => "Informe o código de ".$label,
            $field_request.'.exists' => 'Código de '.$label.' não cadastrado!',
        ]
    );
    /***se tem algum erro de campo***/
    $except = returnValidator($validator);
    return $except;
}

function returnValidator($validator){
    if ($validator->fails()) {
        foreach ($validator->errors()->all() as $message) {
            return ["result" => "N", "message" => $message];
        }
    }

    return false;
}

function FormatarTelefone($phone)
{
    $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
    $matches = [];
    preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
    if ($matches) {
        return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
    }

    return $phone; // return number without format
}


/**
 * Se não mandar horario retorna a hora
 * se veio horario retorna o tempo calculado
 */
function FusoHorario($uf,$date_time=null){
    $hour = 0;
    //Horario de verão
    $verao = false;

    /**** Horário normal ***/
    if ( Str::contains("RS SC PR SP RJ MG ES GO DF TO", $uf) )
        $hour = 0;
    elseif ( Str::contains("MT MS", $uf) ) /**** Horário -1 ***/
        $hour = -1;
    elseif ( Str::contains("AM RO RR", $uf) ) /**** Horário -1 e -2 (Verao)***/
        $hour = $verao ? -2 : -1;
    elseif ( Str::contains("AP AL BA CE MA PB PE PI RN SE PA", $uf) ) /**** Horário 0 e -1 (Verao)***/
        $hour = $verao ? -1 : 0;
    elseif ( Str::contains("AC", $uf) ) /**** Horário -2 e -3 (Verao)***/
        $hour = $verao ? -3 : -2;

    //Não veio data, retora a hora
    if (!$date_time) return $hour;

    //Veio data e hora, então aplica a diferença
    $data = Carbon::parse($date_time);
    if ($hour<0){
        $hour= $hour*-1;
        $data->addHours($hour);
    }elseif ($hour>0){
        $data->subHours($hour);
    }
    return $data->toDateTimeString();

}

function MyCheckboxColor($name,$label,$checked='',$color='indigo',$adicionals=''){

    if ($checked=='checked'){
        $checked = 'checked="checked"';
    }
    return '<div class="form-group no-margin">
                <input type="checkbox" id="'.$name.'" name="'.$name.'" class="filled-in chk-col-'.$color.'" '.$checked.' '.$adicionals.'/>
                <label for="'.$name.'" id="lbl_'.$name.'">'.$label.'</label>
            </div>';
}

function newCarbon($time,$date=null){
    if ( (!$date) and (!$time) ){
        return Carbon::now();
    }

    if (!$time) {
        $time = '00:00:00';
    }

    if (!$date) {
        if (date('Y-m-d')=='2018-11-04')
            $date = '1985-12-07'; //devido a troca do horario de verão
        else
            $date = date('Y-m-d');
    }

    //
    return Carbon::parse( $date.' '.$time);
}

function PrimeiraMaiuscula($texto,$porPalavra=false){
    if ($porPalavra){
        return ucwords(strtolower($texto));
    }else
        return ucfirst(strtolower($texto));
}

function consultaCEP($cep){
    //
    $cep = LIMPANUMERO($cep);
    $url = "https://viacep.com.br/ws/".$cep."/json/ ";

    $opts = array(
        "http" => array(
            "method" => "GET",
            'timeout' => 5,  //1200 Seconds is 20 Minutes
            "user_agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36"
        )
    );
    $context  = stream_context_create($opts);
    $resultado = @file_get_contents($url, false, $context);
    $resultado = json_decode($resultado, true);
    //
    return $resultado;
}

function consultarCNPJ($cnpj){
    //
    $cnpj = LIMPANUMERO($cnpj);
    $url = 'https://interno.sisdex.com.br/api/cnpj/'.$cnpj;

    $opts = array(
        "http" => array(
            "method" => "GET",
            'timeout' => 5,  //1200 Seconds is 20 Minutes
            "user_agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36"
        )
    );
    $context  = stream_context_create($opts);
    $resultado = @file_get_contents($url, false, $context);
    $resultado = json_decode($resultado, true);
    //
    return $resultado;
}

function FieldSize($value,$size){
    return trim( substr($value,0,$size));
}

function AjustarTelefoneCelular($number,$ddd=null){
    //Remover o +55
    $number = str_replace('+55','',$number);
    //Deixa somente os nros
    $number = LIMPANUMERO($number);

    if (!$number) return '';

    //Se for 0800 ou 0300
    if (  (substr($number,0,4)=='0800') or (substr($number,0,4)=='0300') )
    {//se for coloca 0 para ignorar o nro
        return '';
    }

    //remover o zero do inicio
    if ($number[0]=='0')
        $number = substr($number, 1, strlen($number));


    //se o tamanho com a operadora
    if ( (strlen($number)==13) //e o 9= 21 49 9 8855 0050
        or (strlen($number)==12) //sem o 9= 21 49 8855 0050
    ){
        $number = substr($number,2,11);
    }
    //se for com DDD e sem o 9
    elseif (strlen($number)==10) //49 88550050
    {
        $number = substr($number,0,2).'9'.substr($number,2,11);
    }
    //se o tamanho sem ddd e com 9
    elseif (strlen($number)==9) {
        //Se não tem DDD pega o do usuário
        if (!$ddd)
            return '';
        //junta o nro
        else
            $number = $ddd . $number;
    }
    //se o tamanho sem ddd e sem 9, iniciando com 8 ou 9
    elseif ( (strlen($number)>0) and (strlen($number)<9) )  {
        if ( ($number[0]== '8') or ($number[0] == '9'))
            $number = $ddd . '9' . $number;
        else
            $number = ''; //
    }
    //

    return $number;
}


function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

function GeneratorUUID(){
    return Str::uuid();
}
function getUid($cad, $class){
    if ($cad->uid)
        return $cad->uid;

    //Se não tem gera
    $num = 1;
    /** faz um loop ate que não encontre o hash gerado ***/
    while ($num){
        $uid = GeneratorUUID();
        $num = $class::whereuid($uid)->first();
    }

    //Se ja esta cadastrado, salva o id gerado
    if ($cad->id>0){
        $cad->uid = $uid;
        $cad->save();
    }

    return $uid;
}

function read_file_csv($filepath){
    // Reading file
    $file = fopen($filepath,"r");

    $importData_arr = array();
    $i = 0;
    while (($filedata = fgetcsv($file, 9000, ";")) !== FALSE) {
        $num = count($filedata );
        for ($c=0; $c < $num; $c++) {
            $importData_arr[$i][] = trim($filedata [$c]);
        }
        $i++;
    }
    fclose($file);

    return $importData_arr;
}

function bankName($code){
    $name = $code;
    //
    $cad = ListBank::wheredigit($code)->first();
    if (!$cad)
        $cad = ListBank::wherecode($code)->first();
    //
    if ($cad)
        if (trim($cad->name))
            $name.= ' - '.$cad->name;

    return $name;
}

function newBank($bank,$name){
    //codigo
    $code = trim($bank);
    if ($code == LIMPANUMERO($code))
        $code = StrZero($code,3);

    //localizar se existe
    $cad = ListBank::wheredigit($code)->first();
    if (!$cad){
        $cad = new ListBank();
        $cad->code = FieldSize($code,3);
        $cad->digit = $code;
        if (LIMPANUMERO($bank))
            $cad->number = LIMPANUMERO($bank);
        $cad->name = FieldSize($name,150);
        $cad->save();
    }

    return $cad;
}

function casasDecimais($value,$qtd=2){
    return number_format($value,$qtd,'.','');
}


function httpPost($url,$params=[]){
    $html = '';
    try{
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //
        $html = curl_exec($ch);

        //codigo http do retorno
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpcode!=200){
            //
            $info = curl_getinfo($ch);
            //Se o site foi movido ou transferido
            if ( ($info['http_code']>300) and ($info['http_code']<=303)){
                if ($info['url']){
                    $html =  httpPost($info['url'],$params);
                }
            }
        }

        //
        curl_close($ch); #Fechamos o cURL
    }catch (\Exception $e) {
        return ('httpPOST('.$httpcode.') '.$url.' '.$e->getMessage().' - '.$e);
    }

    return $html;
}

function curl_get_contents($url,$method='GET',$proxy=false)
{
    $result = '';
    try {
        $ch = curl_init($url);
        if ($proxy)
            curl_setopt($ch, CURLOPT_PROXY, getPROXY());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        $result = curl_exec($ch);
    }catch (\Exception $e){
        echoConsole('curl_get_contents '.$url.' = '.$e->getMessage());
        saveLog('curl_get_contents '.$url.' = '.$e->getMessage());
    }
    curl_close($ch);
    return $result;
}

function httpGET($url){
    $content = '';
    try {
        $opts = array(
            "http" => array(
                "method" => "GET",
                "user_agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36"
            )
        );
        $context = stream_context_create($opts);
        $content = @file_get_contents($url, false, $context);
    }catch (\Exception $e){
        saveLog('httpGET '.$url.' = '.$e->getMessage());
    }

    return $content;
}

function curlGET($url){
    $response = '';
    try {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        echo $response;
    }catch (\Exception $e){
        Log::warning('curlGET '.$url.' '.$e->getMessage().chr(10).$e);
    }

}

function dateIsValid($date)
{
    try {

        if (Str::contains($date, '/')) {
            $data = explode("/", "$date"); // fatia a string $dat em pedados, usando / como referência
            $d = $data[0];
            $m = $data[1];
            $y = $data[2];
        } else {
            $data = explode("-", "$date");
            $d = $data[2];
            $m = $data[1];
            $y = $data[0];
        }

        // verifica se a data é válida!
        // 1 = true (válida)
        // 0 = false (inválida)
        $res = checkdate($m, $d, $y);
        return ($res == 1);
    }catch (\Exception $e){
        return false;
    }
}

function arrayHas($field,$array){
    if (!$field) return false;
    if (!$array) return false;
    if (array_key_exists($field,$array))
        if ($array[$field])
            return true;
    return false;
}

function getTAG($conteudo, $tag_ini , $tag_fim='')
{
    $html = $conteudo;
    $pos_1 = 0;
    //
    if ($tag_ini) {
        $size = (strlen($tag_ini));
        $pos_1 = strpos($conteudo, $tag_ini) + $size;
        //
        $html = trim(substr($conteudo, $pos_1, strlen($conteudo)));
    }
    if ($tag_fim) {
        $fim = strpos($html, $tag_fim);
        if ($fim)
            $html = trim(substr($html, 0, $fim));
    }
    return $html;
}


function http_getCookie($result){
    /**** pegar o cookie ******/
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }
    $linha = '';
    foreach ($cookies as $key => $value) {
        $linha .= $key . '=' . $value . '; ';
    }

    return $linha;
}

function tamanho_arquivo($size) {
    /* Medidas */
    $medidas = array('KB', 'MB', 'GB', 'TB');

    /* Se for menor que 1KB arredonda para 1KB */
    if($size < 999){
        $size = 1000;
    }

    for ($i = 0; $size > 999; $i++){
        $size /= 1024;
    }

    return round($size) .' '. $medidas[$i - 1];
}

function getCookie($result){
    /**** pegar o cookie ******/
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }
    $linha = '';
    foreach ($cookies as $key => $value) {
        $linha .= $key . '=' . $value . '; ';
    }

    return $linha;
}

function ajustarCPF($cpf){
    $cpf = LIMPANUMERO($cpf);
    if (!$cpf) return '';
    $cpf = StrZero($cpf,11);
    return $cpf;
}

function ajustarRG($rg_nro){
    $rg_nro = LIMPANUMERO($rg_nro);
    if (!$rg_nro) return '';
    $rg_nro = StrZero($rg_nro,11);
    return $rg_nro;
}

function ajustarNB($nb){
    $nb = LIMPANUMERO($nb);
    if (!$nb) return '';
    $nb = StrZero($nb,10);
    return $nb;
}

function ajustarCNPJ($cpf){
    $cpf = LIMPANUMERO($cpf);
    if (!$cpf) return '';
    $cpf = StrZero($cpf,14);
    return $cpf;
}


function jsonToDate($value){
    $value = substr($value,0,10);
    if (!$value) return null;
    if (!dateIsValid($value)) return null;

    return $value;
}


function nomeAnexo($name){
    $name = tirarAcentos($name);
    $name = str_replace('/','_',$name);
    $name = str_replace('\\','_',$name);
    $name = str_replace('"','',$name);
    $name = str_replace("'","",$name);
    return $name;
}

function estados($uf){
    if (!$uf) return '';
    $list = [
        'AC'=>'Acre',
        'AL'=>'Alagoas',
        'AP'=>'Amapá',
        'AM'=>'Amazonas',
        'BA'=>'Bahia',
        'CE'=>'Ceará',
        'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',
        'GO'=>'Goiás',
        'MA'=>'Maranhão',
        'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',
        'MG'=>'Minas Gerais',
        'PA'=>'Pará',
        'PB'=>'Paraíba',
        'PR'=>'Paraná',
        'PE'=>'Pernambuco',
        'PI'=>'Piauí',
        'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte',
        'RS'=>'Rio Grande do Sul',
        'RO'=>'Rondônia',
        'RR'=>'Roraima',
        'SC'=>'Santa Catarina',
        'SP'=>'São Paulo',
        'SE'=>'Sergipe',
        'TO'=>'Tocantins'
    ];
    return $list[$uf];
}
