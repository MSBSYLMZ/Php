<?php 
session_start();
require_once "dbconfig.php";
class crud{
	private $db;
	private $dbhost=DBHOST;
	private $dbuser=DBUSER;	
	private $dbpass=DBPWD;
	private $dbname=DBNAME;
	function __construct(){

		try {
			$this->db=new PDO('mysql:host='. $this->dbhost .';dbname='.$this->dbname.';charset=utf8',$this->dbuser,$this->dbpass);
		} catch (Exception $e) {
			die("Bağlantı Başarısız:".$e->getMessage());
		}
	}
	public function adminInsert($admins_namesurname,$admins_username,$admins_pass,$admins_status){
		try {
			$stmt=$this->db->prepare("INSERT INTO admins SET admins_namesurname=?,admins_username=?,admins_pass=?,admins_status=?");
			$stmt->execute([
				$admins_namesurname,
				$admins_username,
				md5($admins_pass),
				$admins_status
			]);
			return ['status'=>TRUE];
		} catch (Exception $e) {
			return ['status'=>FALSE,'error'=>$e->getMessage()];
		}
	}
	public function adminsLogin($admins_username,$admins_pass,$remember_me){
		try {
			$stmt=$this->db->prepare("SELECT *FROM admins where admins_username=? AND admins_pass=?");
			
			if (isset($_COOKIE['adminsLogin'])) {
				$stmt->execute([
					$admins_username,
					md5(openssl_decrypt($admins_pass, "AES-128-ECB", "admins_coz"))
				]);
			}else{
				$stmt->execute([
					$admins_username,
					md5($admins_pass)
				]);
			}
			if ($stmt->rowCount()==1) {
				$row=$stmt-> fetch(PDO::FETCH_ASSOC);
				if ($row['admins_status']==0) {
					return ['status'=> FALSE];
					exit;
				}
				$_SESSION["admins"]=[
					"admins_username"=>$admins_username,
					"admins_namesurname"=>$row['admins_namesurname'],
					"admins_file"=>$row['admins_file'],
					"admins_id"=>$row['admins_id']
				];
				if (!empty($remember_me) AND empty($_COOKIE['adminsLogin'])) {
					$admins=
					[
						"admins_username"=> $admins_username,
						"admins_pass"=> openssl_encrypt($admins_pass, "AES-128-ECB", "admins_coz")
					];
					setcookie("adminsLogin",json_encode($admins),strtotime("+30 day"),"/");
				}else if (empty($remember_me)){
					setcookie("adminsLogin",json_encode($admins),strtotime("-30 day"),"/");
				}

				return ['status'=> TRUE];
			}
			else{
				return['status'=>FALSE];
			}
		} catch (Exception $e) {
			return ['status'=>FALSE,'error'=>$e->getMessage()];
		}
	}

	public function read($table){

		try {
			$stmt=$this->db->prepare("SELECT * FROM $table");
			$stmt->execute();
			return $stmt;
		} catch (Exception $e) {
			echo $e->getMessage() ;
			return FALSE;
			
		}
	}
}

?>