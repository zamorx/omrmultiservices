<?php
class Services
{
	private $pdo;
    
    public $serviceid;
    public $servicename;

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

			$stm = $this->pdo->prepare("SELECT * FROM tblservices where serviceactive = true");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($serviceid)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tblservices WHERE serviceid = ?");
			          

			$stm->execute(array($serviceid));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($serviceid)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("UPDATE tblservices SET serviceactive = 0 WHERE serviceid = ?");			          

			$stm->execute(array($serviceid));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tblservices SET 
						servicename            = ?
				    WHERE serviceid = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->servicename,
						$data->serviceid
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
		$sql = "INSERT INTO `tblservices` (servicename, serviceactive) 
		        VALUES (?, 1)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->servicename
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
