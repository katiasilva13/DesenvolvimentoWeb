<?php

$mail = "precisa de um e-mail cadastrado na API";
$key = "provavelmente quando cadastrar um e-mail conseguirá pegar uma chave";
$url = "https://www.youtube.com/watch?v=perPRtisY5I";
$folder = "videos";

$end = "https://api.mixdrop.co/remoteupload";
$end .= "?email=" . $mail;//necessita de um e-mal, e esta deve ficar fixo no codigo
$end .= "&key=" . $key; //necessita de um chaves, e esta deve ficar fixa no codigo
$end .= "&url=" . $url;//qual a url do vídeo que será enviado
$end .= "&folder=" . $folder;//qual a pasta que será armazenada os vídeos

echo $end;

//exit;

$teste = file_get_contents($end);//roda a chamada da API
$resposta = json_decode($teste);
echo "<pre>";
  print_r($resposta);
echo "</pre>";


 //https://api.mixdrop.co/remoteupload?email={email}&key={key}&url={url}&folder={folder}
 ?>
