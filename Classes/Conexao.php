<?php 

require_once "../config/define.php";
require_once "Criptografia.php";

/*  
 * Constantes de parâmetros para configuração da conexão  
 */  
class Conexao {  

  /*  
   * Atributo estático para instância do PDO  
   */  

  private static $pdo;

  /*  
   * Escondendo o construtor da classe  
   */ 
  private function __construct() {  
    //  
  } 

  /*  
   * Método estático para retornar uma conexão válida  
   * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
   */  
  public static function getInstance() {  

    $cript = new Criptografia();
    
    $host = $cript->decrypt(SQLSERVIDOR);
    $dbname = $cript->decrypt(SQLDB);
    $user = $cript->decrypt(SQLUSER);
    $password = $cript->decrypt(SQLPWD);

    if (SQLDRIVER == 'sqlsrv') {
      $host_var = 'Server';
      $dbname_var = 'Database';
    }else{
      $host_var = 'host';
      $dbname_var = 'dbname';
    }

    if (!isset(self::$pdo)) {  
      try {  
        //$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
        self::$pdo = new PDO(SQLDRIVER.":$host_var=$host;$dbname_var=$dbname;", $user, $password);  
      } catch (PDOException $e) {  
        print "Erro: " . $e->getMessage();  
      }  
    }  
    return self::$pdo;  
  }  

  public static function disconnect()
  {
    self::$pdo = null;
  }
}

?>