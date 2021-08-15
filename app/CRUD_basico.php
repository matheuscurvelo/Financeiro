<?php

/**
 * ======== INSTRUÇÕES PARA ENVIO DOS PARAMETROS VIA AJAX =========
 * GET:
 * @param string $query - query de pesquisa SELECT
 * @param array $params - array contendo os parametros de pesquisa
 * @return array - array de resultados
 * 
 * POST/PUT/PATCH/DELETE:
 * o id_coluna precisa ser o primeiro ou o segundo parametro enviado
 * @return bool|int quando POST
 * @return bool quando PUT/PATCH/DELETE 
 */

require_once "../Classes/Crud.php";

header('Content-Type: application/json; charset=utf-8');

$sql = Crud::getInstance();


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':

        $result = $sql->select($_GET['query'] ?? null,$_GET['params'] ?? null);
        
        echo json_encode(['data'=>$result]);
        //$app->response->getBody();

        break;
    
    case 'POST':

        $sql->setTableName($_POST["tabela"]);

        unset($_POST['tabela']); //remove a tabela, pois que ja foi usada anteriormente
        array_shift($_POST); //remove o id_coluna, pois não será necessária no POST

        $result = $sql->insert($_POST);
        echo json_encode(['mensagem'=>$result]);

        break;

    case 'PUT':

        parse_str(file_get_contents("php://input"), $_PUT);

        $sql->setTableName($_PUT["tabela"]);

        unset($_PUT['tabela']); //remove a tabela, pois que ja foi usada anteriormente

        $id_condicao = [ array_key_first($_PUT).'=' => $_PUT[array_key_first($_PUT)]]; // captura o id para a condicao

        array_shift($_PUT); //remove o id_coluna, pois acabou de ser capturado anteriormente

        $result = $sql->update($_PUT,$id_condicao);
        echo json_encode(['mensagem'=>$result]);

        break;

    case 'PATCH': //excluir pelo campo ativo

        parse_str(file_get_contents("php://input"), $_PATCH);    
        parse_str($_PATCH['params'],$_PATCH['params']);

        $sql->setTableName($_PATCH["tabela"]);
            
        $result = $sql->update($_PATCH['params'],$_PATCH['params'][array_key_first($_PATCH['params'])]);

        echo json_encode(['mensagem'=>$result]);
        break;

    case 'DELETE':
        
        parse_str(file_get_contents("php://input"), $_DELETE);    
        //parse_str($_DELETE['params'],$_DELETE['params']);
        
        $sql->setTableName($_DELETE["tabela"]);

        unset($_DELETE['tabela']); //remove a tabela, pois que ja foi usada anteriormente

        $id_condicao = [ array_key_first($_DELETE).'=' => $_DELETE[array_key_first($_DELETE)]]; // captura o id para a condicao
            
        $result = $sql->delete($id_condicao);

        echo json_encode(['mensagem'=>$result]);

        break;
    default:
        
        break;
}

unset($sql);