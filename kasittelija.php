<?php
//---------------------------------------------------------------------
// COPYRIGHT (C) 2008 SUNCOMET
//---------------------------------------------------------------------
class Formi{function Formi($subject,$to,$cc="",$success="",$fail="",$required=""){ $this->from="EI.OSOITETTA@OSOITTEETON.TLD";$this->succes_return=$success;$this->fail_return=$fail;$this->to=$to; $this->cc=$cc;$this->subject=$subject;$this->required=split(",", $required);}function handle(){$this->viesti=array();foreach($_POST as $key=>$val){if($key=="viesti_lahettaja"&&!empty($val)){$this->from=$val;}else{ $this->viesti[$key]=$val;}}foreach($this->required as $key=>$val) {if(!array_key_exists($val,$_POST) ||empty($_POST[$val])){ header("Location: {$this->fail_return}");die();}}}function send(){ $message="";foreach($this->viesti as $key=>$val) { $message .=$key.":\n".$val."\n";}$headers="From: {$this->from}"; if(!empty($this->cc)){ $headers.="\nCc: {$this->cc}";}if (mail($this->to,$this->subject,$message,$headers)){ header("Location: {$this->succes_return}");} else {header("Location: {$this->fail_return}");}}} if(!empty($_POST)){$formi=new Formi("Yhteydenotto","samuli@alajarvela.net", "contact@alajarvela.net","http://alajarvela.net/blog","", "nimi, osoite, viesti");$formi->handle(); $formi->send();}
?>