<?php
/*
Plugin Name: Validator
Plugin URI: http://xemele.cultura.gov.br/
Description: PHP validation of the data from the forms
Version: 0.1
Author: Equipe Web MinC
Author URI: http://xemele.cultura.gov.br/
*/

class Validator
{
  //ATRIBUTOS /////////////////////////////////////////////////////////////////////////////////////
  var $error = array();
  
  //METODOS ///////////////////////////////////////////////////////////////////////////////////////
  /************************************************************************************************
    Set Error
  ************************************************************************************************/
  function Set_Error($error, $field, $args = array())
  {
    $defaults = array(
      equal_field => null,
      min_value => null,
      max_value => null,
      length => null,
      min_length => null,
      max_length => null
    );
    
    if(is_array($args))
      $parameters = $args;
    elseif(is_object($args))
      $parameters = get_object_vars($args);
    else
      parse_str($args, $parameters);
    
    $parameters = array_merge($defaults, $parameters);
    // print_r($parameters);
    extract($parameters);
    
    $error = str_replace("{field}", $field, $error);
    $error = str_replace("{equal_field}", $equal_field, $error);
    $error = str_replace("{min_value}", $min_value, $error);
    $error = str_replace("{max_value}", $max_value, $error);
    $error = str_replace("{length}", $length, $error);
    $error = str_replace("{min_length}", $min_length, $error);
    $error = str_replace("{max_length}", $max_length, $error);
    
    array_push($this->error, $error);
  }
  
  /************************************************************************************************
    Error
  ************************************************************************************************/
  function Error()
  {
    return (!empty($this->error)) ? $this->error : false;
  }
  
  /************************************************************************************************
    Required Data
  ************************************************************************************************/
  function Required($value, $field, $error = "O campo {field} é de preenchimento obrigatório.")
  {
    if(!empty($value))
      return $value;
    elseif($error)
      $this->Set_Error($error, $field);
    
    return false;
  }
  
  /************************************************************************************************
    Numeric Data
  ************************************************************************************************/
  function Numeric($value, $field, $error = "O campo {field} deve ser numérico.")
  {
    if(is_numeric($value))
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field);
      
    return false;
  }
  
  /************************************************************************************************
    Alfabetic Data
  ************************************************************************************************/
  function Alfabetic($value, $field, $error = "")
  {
    return $value;
  }
  
  /************************************************************************************************
    AlfaNumeric Data
  ************************************************************************************************/
  function Alanumeric($value, $field, $error = "")
  {
    return $value;
  }
  
  /************************************************************************************************
    Equal
  ************************************************************************************************/
  function Equal($value, $field, $equal_value, $equal_field, $error = "Os campos {field} e {field2} não conferem.")
  {
    if($value == $equal_value)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "equal_field={$equal_field}");
    
    return false;
  }
  
  /************************************************************************************************
    Min Value
  ************************************************************************************************/
  function Min_Value($value, $field, $min_value, $error = "O campo {field} deve ser maior ou igual a {min_value}.")
  {
    if($value >= $min_value)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "min_value={$min_value}");
    
    return false;
  }
  
  /************************************************************************************************
    Max Value
  ************************************************************************************************/
  function Max_Value($value, $field, $max_value, $error = "O campo {field} deve ser menor ou igual a {max_value}.")
  {
    if($value <= $max_value)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "max_value={$max_value}");
    
    return false;
  }
  
  /************************************************************************************************
    Between Value - Deprecated
  ************************************************************************************************/
  function Between_Value($value, $field, $min_value, $max_value, $error = "O campo {field} deve ter entre {min_value} e {max_value} caracteres.")
  {
    if($value >= $min_value && $value <= $max_value)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "min_value={$min_value}&max_value={max_value}");
    
    return false;
  }
  
  /************************************************************************************************
    Length
  ************************************************************************************************/
  function Length($value, $field, $length, $error = "O campo {field} deve ter {length} caracteres.")
  {
    if(strlen($value) >= $length)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "length={$length}");
    
    return false;
  }
  
  /************************************************************************************************
    Min Length
  ************************************************************************************************/
  function Min_Length($value, $field, $min_length, $error = "O campo {field} deve ter no mínimo {min_length} caracteres.")
  {
    if(strlen($value) >= $min_length)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "min_length={$min_length}");
    
    return false;
  }
  
  /************************************************************************************************
    Max Length
  ************************************************************************************************/
  function Max_Length($value, $field, $max_length, $error = "O campo {field} deve ter no máximo {max_length} caracteres.")
  {
    if(strlen($value) <= $max_length)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "max_length={$max_length}");
    
    return false;
  }
  
  /************************************************************************************************
    Between Lenght - Deprecated
  *************************************************************************************************/
  function Between_Length($value, $field, $min_length, $max_length, $error = "O campo {field} deve ter entre {min_length} e {max_length} caracteres.")
  {
    if(strlen($value) >= $min_length && strlen($value) <= $max_length)
      return $value;
    elseif($value && $error)
      $this->Set_Error($error, $field, "min_length={$min_length}&max_length={$max_length}");
    
    return false;
  }
  
  /************************************************************************************************
    Email
  ************************************************************************************************/
  function EMail($value, $field, $error = "O campo {field} deve conter um CPF válido")
  {
    return $value;
  }
  
  /************************************************************************************************
    CPF
  ************************************************************************************************/
  function CPF($cpf, $field, $error = "O campo {field} deve conter um CPF válido")
  {
    if(!is_numeric($cpf) || ($cpf == '00000000000') || ($cpf == '11111111111') || ($cpf == '22222222222') || ($cpf == '33333333333') || ($cpf == '44444444444') || ($cpf == '55555555555') || ($cpf == '66666666666') || ($cpf == '77777777777') || ($cpf == '88888888888') || ($cpf == '99999999999'))
    {
      if($error)
        $this->Set_Error($error, $field);
      
      return false;
    }
    elseif(strlen($cpf) !== 11)
    {
      if($error)
        $this->Set_Error($error, $field);
      
      return false;
    }
    else
    {
      $dvo = substr($cpf, 9, 2);
      
      for($i = 0; $i < 9; $i++)
        $digit[$i] = substr($cpf, $i, 1);
      
      // Primeiro Digito Verificador
      $sum = 0;
      $position = 10;
      
      for($i = 0; $i < 9; $i++)
      {
        $sum += $digit[$i] * $position;
        $position = $position - 1;
      }
      
      $digit[9] = $sum % 11;
      
      if($digit[9] < 2)
        $digit[9] = 0;
      else
        $digit[9] = 11 - $digit[9];
      
      // Segundo Digito Verificador
      $sum = 0;
      $position = 11;
      
      for($i = 0; $i < 10; $i++)
      {
        $sum += $digit[$i] * $position;
        $position = $position - 1;
      }
      
      $digit[10] = $sum % 11;
      
      if($digit[10] < 2)
        $digit[10] = 0;
      else
        $digit[10] = 11 - $digit[10];
      
      // Confere os Digitos Verificadores
      $dvv = $digit[9].$digit[10];
      
      if($dvo == $dvv)
        return $cpf;
      elseif($cpf && $error)
        $this->Set_Error($error, $field);
      
      return false;
    }
  }
  
  /************************************************************************************************
    CNPJ
  ************************************************************************************************/
  function CNPJ($cnpj, $field, $error = "O campo {field} deve conter um CNPJ válido")
  {
    if(!is_numeric($cnpj) || ($cnpj == '00000000000000') || ($cnpj == '11111111111111') || ($cnpj == '22222222222222') || ($cnpj == '33333333333333') || ($cnpj == '44444444444444') || ($cnpj == '55555555555555') || ($cnpj == '66666666666666') || ($cnpj == '77777777777777') || ($cnpj == '88888888888888') || ($cnpj == '99999999999999'))
    {
      if($error)
        $this->Set_Error($error, $field);
      
      return false;
    }
    elseif(strlen($cnpj) !== 14)
    {
      if($error)
        $this->Set_Error($error, $field);
      
      return false;
    }
    else
    {
      $dvo = substr($cnpj, 12, 2);
      
      for($i = 0; $i < 12; $i++)
        $digit[$i] = substr($cnpj, $i, 1);
      
      // Primeiro Digito Verificador
      $sum = 0;
      $position = 5;
      
      for($i = 0; $i < 12; $i++)
      {
        $sum += $digit[$i] * $position;
        
        $position = ($position == 2) ? $position = 9 : $position - 1;
      }
      
      $digit[12] = $sum % 11;
      
      if($digit[12] < 2)
        $digit[12] = 0;
      else
        $digit[12] = 11 - $digit[12];
      
      // Segundo Digito Verificador
      $sum = 0;
      $position = 6;
      
      for($i = 0; $i < 13; $i++)
      {
        $sum += $digit[$i] * $position;
        
        $position = ($position == 2) ? $position = 9 : $position - 1;
      }
      
      $digit[13] = $sum % 11;
      
      if($digit[13] < 2)
        $digit[13] = 0;
      else
        $digit[13] = 11 - $digit[13];
      
      // Confere os Digitos Verificadores
      $dvv = $digit[12].$digit[13];
      
      if($dvo == $dvv)
        return $cnpj;
      elseif($cnpj && $error)
        $this->Set_Error($error, $field);
      
      return false;
    }
  }
  
  /************************************************************************************************
    UTF-8
  ************************************************************************************************/
  function utf8($value)
  {
    if(utf8_encode(utf8_decode($value)) == $value)
      return $value;
    else
      return utf8_encode($value);
  }
  
  /************************************************************************************************
   Validate
  ************************************************************************************************/
  function Validate($value, $field, $args)
  {
    $defaults = array(
      required => 0,
      numeric => 0,
      alfabetic => 0,
      alfanumeric => 0,
      email => 0,
      cpf => 0,
      cnpj => 0,
      equal => null,
      equal_field => null,
      min_value => null,
      max_value => null,
      length => null,
      min_length => null,
      max_length => null,
      error => null
    );
    
    if(is_array($args))
      $parameters = $args;
    elseif(is_object($args))
      $parameters = get_object_vars($args);
    else
      parse_str($args, $parameters);
    
    $parameters = array_merge($defaults, $parameters);
    // print_r($parameters);
    extract($parameters);
    
    // required
    if($required)
      $value = $this->Required($value, $field);
    
    // numeric
    if($numeric && $value)
      $value = $this->Numeric($value, $field);
    
    // alfabetic
    if($alfabetic && $value)
      $value = $this->Alfabetic($value, $field);
    
    // alfanumeric
    if($alfanumeric && $value)
      $value = $this->Alfanumeric($value, $field);
    
    // email
    if($email && $value)
      $value = $this->EMail($value, $field);
    
    // cpf
    if($cpf && $value)
      $value = $this->CPF($value, $field);
    
    // cnpj
    if($cnpj && $value)
      $value = $this->CNPJ($value, $field);
    
    // equal
    if($equal && $equal_field && $value)
      $value = $this->Equal($value, $field, $equal, $equal_field);
    
    // min value
    if($min_value && $value)
      $value = $this->Min_Value($value, $field, $min_value);
    
    // max value
    if($max_value && $value)
      $value = $this->Max_Value($value, $field, $max_value);
    
    // length
    if($length && $value)
      $value = $this->Length($value, $field, $length);
    
    // min length
    if($min_length && $value)
      $value = $this->Min_Length($value, $field, $min_length);
    
    // max length
    if($max_length && $value)
      $value = $this->Max_Length($value, $field, $max_length);
    
    return $value;
  }
  
  //CONSTRUTOR ////////////////////////////////////////////////////////////////////////////////////
  
  //DESTRUTOR /////////////////////////////////////////////////////////////////////////////////////
  
}

$Validator = new Validator();

?>
