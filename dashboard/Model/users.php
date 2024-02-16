<?php
class Users
{
	private $pdo;
    public $iduser;
	public $fname;
	public $idorg;
	public $usraddress;
	public $emuser;
	public $phuser;
	public $usrbirthday;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = dbconnection::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			// $limit = 10;
			// $page = isset($_GET['page']) ? $_GET['page'] : 1;
			// $start = ($page - 1) * $limit;


			$stm = $this->pdo->prepare("SELECT * FROM tblusers WHERE tblusers.activeuser = true" );
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($iduser)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tblusers WHERE iduser = ?");
			          

			$stm->execute(array($iduser));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarBAK($iduser)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tblusers WHERE iduser = ?");			          

			$stm->execute(array($iduser));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Eliminar($iduser)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("UPDATE tblusers SET activeuser = 0 WHERE iduser = ?");			          

			$stm->execute(array($iduser));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tblusers SET 
						fname            = ?,
						usraddress            = ?,
						emuser            = ?,
						phuser            = ?,
						usrbirthday            = ?

				    WHERE iduser = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->fname,
						$data->usraddress,
						$data->emuser,
						$data->phuser,
						$data->usrbirthday,
						$data->iduser
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO `tblusers` (fname, usraddress, emuser, phuser, usrbirthday, activeuser) 
		        VALUES (?, ?, ?, ?, ?, 1)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->fname,
					$data->usraddress,
					$data->emuser,
					$data->phuser,
					$data->usrbirthday
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
