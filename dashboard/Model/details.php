<?php
class Details
{
	private $pdo;
    
    public $iduser;
    public $fname;
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

	public function getting($iduser)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM tblusers WHERE iduser = ?");
			
			$stm->execute(array($iduser));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function userServices()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tblactivities, tblusers, tblservices WHERE tblactivities.iduser = tblusers.iduser AND tblactivities.serviceid = tblservices.serviceid AND tblactivities.orderactive = true ORDER BY tblactivities.servicedate DESC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}