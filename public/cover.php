<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Entity\Exception\ParameterException;
try {
    $coverId=$_GET['coverId'];
    if (ctype_digit($coverId)==false){
        throw new ParameterException();
    }
    if (empty($coverId)){
        throw new EntityNotFoundException();
    }
    $coverEntity=new \Entity\Cover();
    $entity=$coverEntity->findbyId(intval($coverId));
    header('HTTP/1.1 200 OK');
    header('Content-Type: image/jpeg');
    $jepg=$entity->getJpeg();
    echo $jepg;
}
 catch (ParameterException) {
    http_response_code(400);
} catch (EntityNotFoundException) {
    http_response_code(404);
} catch (Exception) {
    http_response_code(500);
}