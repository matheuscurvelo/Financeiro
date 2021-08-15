<?php 

require_once "../config/define.php";
require_once "Crud.php";

class User {

	const SESSION = "User";

	public static function login($login, $password)
	{

		$sql = Crud::getInstance();
		$tblLogin = TBLLOGIN;
		$colLogin = COLLOGIN;

		$results = $sql->select("SELECT * FROM $tblLogin WHERE $colLogin = :LOGIN", array(
			":LOGIN"=>$login
		)); 

		if (count($results) === 0)
		{
			//throw new \Exception("Usuário inexistente ou senha inválida.");
			return 'Usuário inexistente ou senha inválida';
		}

		$data = $results[0];

		if (($data['Ativo'] == 'N')||($data['ativo'] == 'N')) {
			//throw new \Exception("Usuário inativo.");
			return 'Usuário inativo';
		}

		$cript = new Criptografia;

		$passwordEncrypt = $cript->encrypt($password);
		
		if ( ((PWDCRYPT)&&(password_verify($passwordEncrypt,$data['senha']))) || ((!PWDCRYPT)&&($password == $data["senha"])) )
		{

			$_SESSION[User::SESSION] = $data;
			
			return $data;

		} else {
			//throw new \Exception("Usuário inexistente ou senha inválida.");
			return 'Usuário inexistente ou senha inválida';
		}

	}

    /**
     * Verifica se o usuário está logado, senão redireciona para o login
     */

	public static function verifyLogin()
	{

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
		) {
			//Não está logado
			header("Location: ../views/login.php");

		} else {

			return true;

		}

	}

}

 ?>