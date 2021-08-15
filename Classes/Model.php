<?php 

 
abstract class Model {

	/**
	 * Armazena os campos da tabela como 'key' e os valores dos respectivos campos como 'value'
	 * @var array
	 */
	private $values = [];

	/**
	 * __call é um método mágico que intercepta métodos inexistentes. 
	 * Neste caso, ele faz o GET e SET dos atributos de $values
	 * @param string $name O nome da função
	 * @param mixed $args O(s) argumento(s) da função SET
	 */
	public function __call($name, $args)
	{

		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		switch ($method)
		{

			case "get":
				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
			break;

			case "set":
				$this->values[$fieldName] = $args[0];
			break;

		}

	}

	/**
	 * Seta os valores e os atributos na variável $values
	 */
	public function setData($data = [])
	{

		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);

		}

	}

	/**
	 * @return array retorna todos os atributos de $values
	 */
	public function getValues()
	{

		return $this->values;

	}

}

 ?>