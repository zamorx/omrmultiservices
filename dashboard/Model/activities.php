<?php
class Activities
{
	private $pdo;
    
    public $orderid;
    public $serviceid;
    public $iduser;
	public $servicedate;
	public $statusid;
	public $processdate;
    public $closeddate;
	

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

			$stm = $this->pdo->prepare("SELECT * FROM tblactivities, tblusers, tblservices, tblstatus WHERE tblactivities.iduser = tblusers.iduser AND tblactivities.serviceid = tblservices.serviceid AND tblactivities.statusid = tblstatus.statusid AND tblactivities.orderactive = true ORDER BY tblactivities.servicedate DESC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listUsers()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tblusers WHERE tblusers.activeuser = true" );
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listServices()
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

	public function getting($orderid)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tblactivities, tblusers, tblservices, tblstatus WHERE orderid = ? AND tblactivities.iduser = tblusers.iduser AND tblservices.serviceid = tblservices.serviceid AND tblactivities.statusid = tblstatus.statusid");
			          

			$stm->execute(array($orderid));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($orderid)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("UPDATE tblactivities SET orderactive = 0 WHERE orderid = ?");			          

			$stm->execute(array($orderid));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tblactivities SET  
						iduser        = ?,
                        serviceid        = ?,
						servicedate        = ?

				    WHERE orderid = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->iduser,
						$data->serviceid,
						$data->servicedate,
                        $data->orderid
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
		$sql = "INSERT INTO `tblactivities` (iduser,serviceid,servicedate,statusid, orderactive) 
		        VALUES (?, ?, ?, 1, 1)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->iduser,
					$data->serviceid,
					$data->servicedate
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function StatusChange($data)
	{
		try 
		{
			$sql = "UPDATE tblactivities SET 
						statusid            = ?,
						processdate            = ?,
						closeddate            = ?

				    WHERE orderid = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->statusid,
						$data->processdate,
						$data->closeddate,
						$data->orderid
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
