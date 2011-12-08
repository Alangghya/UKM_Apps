<?php
   class Utama_Model extends CI_Model{
   	
	public function register_user($data)
	{
		$this->db->set('Nama', $data['Nama'] );
		$this->db->set('Password', sha1($data['Password']) );
		
		$this->db->insert('siswa');	
	}
	
	public function ID_si_user($nama){
		$sql = "SELECT ID_Siswa_Pembuat as ID From Siswa WHERE Nama = '$nama'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function InsertBaruUKM($arr){
		$data['NamaUKM']=$arr['NamaUKM'];
		$data['ID_Siswa_Pembuat']=$arr['IDuser'];
		
		$this->db->insert('ukm', $data); 
	}
	
	public function deleteUKM($idUKM){
		$this->db->where('ID_UKM', $idUKM);
		$this->db->delete('ukm'); 
	}
	
	public function Nama_exists($username)
	{
		$this->db->where('Nama',$username);
		$query = $this->db->get('siswa');
		if($query->num_rows() >0){
			return TRUE;
		}
		else {
			return FALSE;
		}	
	}
	
	public function dataUKM(){
		//$query=$this->db->get('ukm');
		$sql = "SELECT ID_UKM, NamaUKM,Nama,siswa.ID_Siswa_Pembuat as IDSiswa FROM ukm,siswa WHERE siswa.ID_Siswa_Pembuat = ukm.ID_Siswa_Pembuat order by ID_UKM";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function dataUKMperID($id){
		$sql = "SELECT ID_UKM, NamaUKM,Nama,siswa.ID_Siswa_Pembuat as IDSiswa FROM ukm,siswa WHERE siswa.ID_Siswa_Pembuat = ukm.ID_Siswa_Pembuat and ID_UKM=".$id;
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function creatorUKM($id,$penj){
		$this->db->where('ID_UKM',$id);
		$h=$this->db->get('ukm');
		$h=$h->result();
		
		foreach ($h as $key) {
			$id_pembuat = $key->ID_Siswa_Pembuat;
		}
		
		$this->db->where('ID_Siswa_Pembuat',$id_pembuat);
		$hh=$this->db->get('siswa');
		$hh=$hh->result();
		
		foreach ($hh as $key) {
			$nama = $key->Nama;
		}
		
		if ($nama==$penj){
			return TRUE;
		}else{
			return FALSE;
		}
		
	}
	
	public function id_siswa($nama){
		$this->db->where('NAMA',$nama);
		$r=$this->db->get('siswa');
		$r=$r->result();
		
		foreach ($r as $key ) {
			return $key->ID_Siswa_Pembuat;
		}
	}
	
	public function daftarPesertaPerUKM($idUKM){
		$sql="select detail_siswa.ID_UKM as IDUKM,siswa.ID_Siswa_Pembuat as ID, Nama, Tanggal_Registrasi as TglRegis From siswa,detail_siswa where detail_siswa.ID_UKM=$idUKM and detail_siswa.ID_siswa_ikut=siswa.ID_Siswa_Pembuat";
		$q=$this->db->query($sql); 
		return $q->result();
	}
	
	public function myDetail($idUser){
		$sql="select NamaUKM,detail_siswa.Tanggal_Registrasi, detail_siswa.Tanggal_Selesai from detail_siswa,siswa,ukm where detail_siswa.ID_Siswa_Ikut=$idUser and detail_siswa.ID_Siswa_Ikut=siswa.ID_Siswa_Pembuat and ukm.ID_UKM=detail_siswa.ID_UKM";
		$q=$this->db->query($sql); 
		return $q->result();
	}
	
	public function updateNamaUKM($id,$s){
		$sql="update ukm set NamaUKM='$s' where ID_UKM=$id";
		//echo $sql;
		$this->db->query($sql);
	}
	
	public function cek_password($username, $password)
	{
		$this->db->where('Nama', $username);
		$query = $this->db->get('siswa');
		foreach ($query->result() as $row)
		{
			if ($row->Password==$password)
			{return TRUE;}
			else return FALSE;
		}
	}
	
	public function registrasi_member_UKM($f){
				
		$this->db->insert('detail_siswa',$f);
	}
	
   }
