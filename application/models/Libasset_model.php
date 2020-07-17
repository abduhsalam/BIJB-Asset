<?php
class Libasset_model extends CI_Model {
 
	public function __construct()
	{
			parent::__construct();
			 
	}
	
	public function tanggal_tosql($date)
	{
		$dateExplode = explode("-",$date);
		$dateConvert = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];
		
		return $dateConvert;
	} 
	
	public function replace_comma($params)
	{
		$param 	= str_replace(",","",$params);
		return $param;
	}
	
	public function sequence_number($sequenceName, $kodeUnik, $digit, $dateactive, $dateSeq)
	{
		$dateNow = date('Y-m-d');
		$sql="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='".$sequenceName."'";
		$query = $this->db->query($sql); 	
		$cekSequence = $query->num_rows();
		$sequenceRes = $query->result_array();  
		$sequence = '';
		if ($cekSequence>0)
		{ 
			if ($dateactive === TRUE)
			{
				$sql2="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='".$sequenceName."' AND sequencedate='".$dateNow."'";
			} 
			else 
			{
				$sql2="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='".$sequenceName."'";
			}
			
			$query2 = $this->db->query($sql2); 	
			$cekSequence2 = $query2->num_rows();
			$sequenceRes2 = $query2->result_array();  
			
			if ($cekSequence2>0)
			{ //jika dia sudah ada maka update 
				$seq = $sequenceRes2[0]['sequencevalue']+1; 
				$this->db->trans_begin();
				$sqlUpdate = "UPDATE ma_sequence SET sequencevalue=".$seq."
							  WHERE sequenceid=".$sequenceRes2[0]['sequenceid'].""; 
				$this->db->query($sqlUpdate); 
				$status= $this->db->trans_status();
				if ($status === FALSE)
				{
				   $this->db->trans_rollback();
				} 
				else 
				{
				   $this->db->trans_commit();
				}
				 
			} 
			else 
			{
				$seq = 1; 
				$this->db->trans_begin(); 
				$sqlUpdate = "UPDATE ma_sequence SET sequencevalue=".$seq.", sequencedate = '".$dateNow."'
							  WHERE sequenceid=".$sequenceRes[0]['sequenceid'].""; 
				$this->db->query($sqlUpdate); 
				$status= $this->db->trans_status();
				if ($status === FALSE)
				{
				   $this->db->trans_rollback();
				}
				else
				{
				   $this->db->trans_commit();
				}
				
			}
			
		} 
		else
		{
			$seq = 1; 
			$this->db->trans_begin(); 
			$insert = "INSERT INTO ma_sequence (sequencename,sequencevalue,sequencedate)
						  VALUES('".$sequenceName."',".$seq.",'".$dateNow."')"; 
			$this->db->query($insert); 
			$status= $this->db->trans_status();
			if ($status === FALSE)
			{
			   $this->db->trans_rollback();
			}
			else
			{
			   $this->db->trans_commit();
			}	 
			
		} 
		$kode = str_pad($seq, $digit, "0", STR_PAD_LEFT); 
		if($dateSeq===TRUE){
			$sequence = $kodeUnik.date('Ymd').$kode;
		} else {
			$sequence = $kodeUnik.$kode;
		}
		return $sequence;
		 
	}
	
	public function kode_asset() // kode 3 manandakan milik asset 
	{ 
		$sql="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='KODE ASSET'";
		$query = $this->db->query($sql); 	
		$cekSequence = $query->num_rows();
		$sequenceRes = $query->result_array();  
		$sequence = '';
		if ($cekSequence>0)
		{  
			$sql2="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='KODE ASSET'"; 
			
			$query2 = $this->db->query($sql2); 	
			$cekSequence2 = $query2->num_rows();
			$sequenceRes2 = $query2->result_array();  
			 
			$seq = $sequenceRes2[0]['sequencevalue']+1; 
			$this->db->trans_begin();
			$sqlUpdate = "UPDATE ma_sequence SET sequencevalue=".$seq."
						  WHERE sequenceid=".$sequenceRes2[0]['sequenceid'].""; 
			$this->db->query($sqlUpdate); 
			$status= $this->db->trans_status();
			if ($status === FALSE)
			{
			   $this->db->trans_rollback();
			} 
			else 
			{
			   $this->db->trans_commit();
			}
				  
		} 
		else
		{
			$seq = 1; 
			$this->db->trans_begin(); 
			$insert = "INSERT INTO ma_sequence (sequencename,sequencevalue,sequencedate)
						  VALUES('KODE ASSET',".$seq.",'".$dateNow."')"; 
			$this->db->query($insert); 
			$status= $this->db->trans_status();
			if ($status === FALSE)
			{
			   $this->db->trans_rollback();
			}
			else
			{
			   $this->db->trans_commit();
			}	 
			
		} 
		$kode = str_pad($seq, 3, "0", STR_PAD_LEFT); 
		
		$sequence = substr($year,2,2).".".$month."-".substr($kodeJnsAsset,3).".".substr($kodeBrg,4)."-3.".$kode;
		
		return $sequence;
		 
	} 
	
	public function kode_sewa_asset($kodeJnsAsset, $kodeBrg) //5 menandakan Sewa asset
	{
		$year = date('Y');
		$month = date('m');
		$dateNow = date('Ymd');
		$sql="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='KODE SEWA ASSET'";
		$query = $this->db->query($sql); 	
		$cekSequence = $query->num_rows();
		$sequenceRes = $query->result_array();  
		$sequence = '';
		if ($cekSequence>0)
		{  
			$sql2="SELECT sequenceid, sequencevalue FROM ma_sequence WHERE sequencename='KODE SEWA ASSET' AND YEAR(sequencedate)='".$year."' AND MONTH(sequencedate) = '".$month."'"; 
			
			$query2 = $this->db->query($sql2); 	
			$cekSequence2 = $query2->num_rows();
			$sequenceRes2 = $query2->result_array();  
			
			if ($cekSequence2>0)
			{ //jika dia sudah ada maka update 
				$seq = $sequenceRes2[0]['sequencevalue']+1; 
				$this->db->trans_begin();
				$sqlUpdate = "UPDATE ma_sequence SET sequencevalue=".$seq."
							  WHERE sequenceid=".$sequenceRes2[0]['sequenceid'].""; 
				$this->db->query($sqlUpdate); 
				$status= $this->db->trans_status();
				if ($status === FALSE)
				{
				   $this->db->trans_rollback();
				} 
				else 
				{
				   $this->db->trans_commit();
				}
				 
			} 
			else 
			{
				$seq = 1; 
				$this->db->trans_begin(); 
				$sqlUpdate = "UPDATE ma_sequence SET sequencevalue=".$seq.", sequencedate = '".$dateNow."'
							  WHERE sequenceid=".$sequenceRes[0]['sequenceid'].""; 
				$this->db->query($sqlUpdate); 
				$status= $this->db->trans_status();
				if ($status === FALSE)
				{
				   $this->db->trans_rollback();
				}
				else
				{
				   $this->db->trans_commit();
				}
				
			}
			
		} 
		else
		{
			$seq = 1; 
			$this->db->trans_begin(); 
			$insert = "INSERT INTO ma_sequence (sequencename,sequencevalue,sequencedate)
						  VALUES('KODE SEWA ASSET',".$seq.",'".$dateNow."')"; 
			$this->db->query($insert); 
			$status= $this->db->trans_status();
			if ($status === FALSE)
			{
			   $this->db->trans_rollback();
			}
			else
			{
			   $this->db->trans_commit();
			}	 
			
		} 
		$kode = str_pad($seq, 3, "0", STR_PAD_LEFT); 
		
		$sequence = substr($year,2,2).".".$month."-".substr($kodeJnsAsset,3).".".substr($kodeBrg,4)."-5.".$kode;
		
		return $sequence;
		 
	} 
	
	public function array_toin_sql($obj)
	{
		$convertIn = ""; 
		foreach($obj as $in){
			$convertIn .= "'".$in->barcode."',";
		}
		$convertIn = rtrim($convertIn, ','); 
		return $convertIn;
	}
	
	public function get_tglmin_stok()
	{
		$this->db->select_min('tgl_input');
		$query = $this->db->get('bhp_stok')->row();
		return $query->tgl_input;
	}
}
?>