<?php
class Bhp_model extends CI_Model {
 
	public function __construct()
	{
			parent::__construct();
			 
	}
	
	public function kode_pengajuan_bhp()
	{
		$sequence	= $this->Libasset_model->sequence_number('PENGAJUAN BHP', 'RBHP-', 4, TRUE, TRUE); 
		return $sequence;
	} 
	
	private function _no_pengajuandet()
	{
		$sequence	= $this->Libasset_model->sequence_number('PENGAJUAN DETAIL', '', 4, TRUE, TRUE); 
		return $sequence;
	}
	
	private function _no_penambahan()
	{
		$sequence	= $this->Libasset_model->sequence_number('PENAMBAHAN BRG', 'TBHP-', 3, TRUE, TRUE); 
		return $sequence;
	}
	
	private function _no_transaksi()
	{
		$sequence	= $this->Libasset_model->sequence_number('TRANSAKSI BHP', '', 4, TRUE, TRUE); 
		return $sequence;
	}
	
	private function _kode_stokopname()
	{
		$sequence	= $this->Libasset_model->sequence_number('KODE STOKOPNAME', '', 10, TRUE, TRUE); 
		return $sequence;
	}
	
	private function _kode_stok()
	{
		$sequence	= $this->Libasset_model->sequence_number('KODE STOK', '', 10, TRUE, TRUE); 
		return $sequence;
	}
	
	private function _kode_tempstokawal()
	{
		$sequence	= $this->Libasset_model->sequence_number('KODE STOKAWAL', '', 10, FALSE, FALSE); 
		return $sequence;
	}
	
	private function _kode_tempstokopname()
	{
		$sequence	= $this->Libasset_model->sequence_number('KODE TEMPBHP', '', 10, FALSE, FALSE); 
		return $sequence;
	}
	
	public function simpan_master()
	{
		$barcode	= $this->input->post('kodeBarcode');
		$namaBarang	= $this->input->post('namaBarang');
		$isiBarang	= $this->input->post('isiBarang');
		$kodeSatuan	= $this->input->post('satuanBarang');
		$keterangan	= $this->input->post('ketMaster');
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$add = array(
				'barcode' => $barcode,
				'nama_barang' => $namaBarang,
				'isi_barang' => $isiBarang,
				'kode_satuan' => $kodeSatuan,
				'keterangan' => $keterangan,
				'user_input' => $userInput,
				'tgl_input' => $tglInput
				);
		
		$insert = $this->db->insert('bhp_master', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function update_master()
	{
		$barcode	= $this->input->post('ekodeBarcode');
		$namaBarang	= $this->input->post('enamaBarang');
		$isiBarang	= $this->input->post('eisiBarang');
		$kodeSatuan	= $this->input->post('esatuanBarang');
		$keterangan	= $this->input->post('eketMaster'); 
		
		
		$update = array(
			'nama_barang' => $namaBarang,
			'isi_barang' => $isiBarang,
			'kode_satuan' => $kodeSatuan,
			'keterangan' => $keterangan
		);
		// print_r($update); exit();
		$this->db->where('barcode',$barcode);
		$this->db->update('bhp_master', $update);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{  
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function cek_delete_master($barcode){
		$this->db->where('barcode', $barcode);
		$this->db->from('bhp_transaksi');
		$cek =  $this->db->count_all_results(); 
		return $cek;
	}
	
	public function delete_master(){
		$barcode = $this->input->post('barcode');
		$this->db->delete('bhp_master', array('barcode' => $barcode));  
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{  
			$data['msg'] = TRUE;
		} 
		return $data;
	} 
	
	public function get_data_master()
	{
		$this->db->select('bhp_master.*, bhp_satuanbarang.nama_satuan');
		$this->db->from('bhp_master');
		$this->db->join('bhp_satuanbarang','bhp_satuanbarang.kode_satuan = bhp_master.kode_satuan');
		// $this->db->limit(100);
		$this->db->order_by('bhp_master.nama_barang','ASC');
		$query = $this->db->get();
		$result	= $query->result(); 
		return $result;
	}
	
	public function autocomplate_barang()
	{
		$this->db->select('barcode as id, nama_barang as name, bhp_satuanbarang.nama_satuan');
		$this->db->from('bhp_master');
		$this->db->join('bhp_satuanbarang','bhp_satuanbarang.kode_satuan = bhp_master.kode_satuan');
		$this->db->order_by('nama_barang','ASC'); 
		$query = $this->db->get();
		return $query->result(); 
	}
	
	public function get_user(){
		$search = $this->input->post('request');
		$select = "SELECT user_id as id, user_name as name FROM users WHERE user_name LIKE '%".$search."%'";
		$query	= $this->db->query($select);
		return $query->result_array();
	}
	
	public function simpan_pengajuan()
	{
		$keterangan = $this->input->post('keterangan');
		$barcode 	= $this->input->post('rbarcode'); 
		$noPengajuan= $this->input->post('noPengajuan');
		$jumlah		= $this->input->post('rjumlah');
		$tglPengajuan	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPengajuan'));
		$max 		= count($barcode);
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$jmlTotal = 0;
		$insertPengajuanDet = "INSERT INTO bhp_pengajuandetail VALUES";
		
		for($i=0; $i<$max; $i++)
		{ 
			$idPengajuanDet = $this->_no_pengajuandet();
			$insertPengajuanDet .= "('".$idPengajuanDet."','".$noPengajuan."','".$barcode[$i]."',".$jumlah[$i].",'PENGAJUAN','-'),";
			$jmlTotal = $jmlTotal+$jumlah[$i];
		}
		
		$insertPengajuan = "INSERT INTO bhp_pengajuan VALUES('".$noPengajuan."','".$tglPengajuan."',".$jmlTotal.",'".$keterangan."','PENGAJUAN',null,".$userInput.",'".$tglInput."')";
		$insertPengajuanDet = rtrim($insertPengajuanDet, ','); 
		$status = "";
		try{ 
			$this->db->trans_begin(); 
			$this->db->query($insertPengajuan);  
			$this->db->query($insertPengajuanDet);  
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data;
	}
	
	public function get_pengajuan_user()
	{
		$userInput	= 66; //$this->session->userdata('userid');
		$this->db->limit(100);
		$this->db->where('user_pengaju',$userInput);
		$query = $this->db->get('bhp_pengajuan');
		return $query->result();
	}
	
	public function get_pengajuan_bhp()
	{
		$userInput	= 66; //$this->session->userdata('userid');
		$this->db->limit(100);
		// $this->db->where('status','PROSES');
		$query = $this->db->get('bhp_pengajuan');
		return $query->result();
	}	
	
	public function get_bhp_byno($noBhp)
	{  
		$this->db->select('bhp_pengajuan.kode_pengajuan, bhp_pengajuan.tgl_pengajuan, bhp_pengajuan.total_pengajuan, bhp_pengajuan.keterangan, bhp_pengajuan.status, bhp_pengajuan.user_pengaju, bhp_pengajuan.tgl_input, users.user_name, struktur.unit_kerja');
		$this->db->from('bhp_pengajuan'); 
		$this->db->join('users', 'bhp_pengajuan.user_pengaju = users.user_id');
		$this->db->join('struktur', 'users.id_unitkerja = struktur.id','left');
		$this->db->where('bhp_pengajuan.kode_pengajuan',$noBhp); 
		$query = $this->db->get();
		return $query->row();
	}
	
	public function get_detailbhp_byno($noBhp)
	{  
		$this->db->select('bhp_master.barcode, id_pengajuandet, nama_barang, jumlah, status, bhp_pengajuandetail.keterangan');
		$this->db->from('bhp_pengajuandetail');
		$this->db->join('bhp_master', 'bhp_master.barcode = bhp_pengajuandetail.barcode');
		$this->db->where('kode_pengajuan',$noBhp);
		$query	= $this->db->get();
		return $query->result();
	}
	
	public function get_datadetail_bhp($noBhp)
	{
		$dataDetail = $this->get_detailbhp_byno($noBhp);		
		$barcodeIn 	= $this->Libasset_model->array_toin_sql($dataDetail);
		$minTgl 	= $this->Libasset_model->get_tglmin_stok();
		$select = "
			SELECT barcode, nama_barang, jmlpengajuan , status, keterangan, id_pengajuandet, COALESCE(((jmlstok+jmltambah)-(jmldistribusi+jmlretur)), 0) AS stok 
			FROM 
			(
				SELECT PENGAJUAN.nama_barang, PENGAJUAN.barcode, PENGAJUAN.jumlah AS jmlpengajuan, PENGAJUAN.status, PENGAJUAN.keterangan, PENGAJUAN.id_pengajuandet, COALESCE(TBLSTOK.jmlstok,0) AS jmlstok, COALESCE(TBLTAMBAH.jmltambah,0) AS jmltambah, 
				COALESCE(TBLDISTRIBUSI.jmldistribusi,0) AS jmldistribusi, COALESCE(TBLRETUR.jmlretur,0) AS jmlretur FROM
				(
					SELECT
					bhp_pengajuandetail.id_pengajuandet,
					bhp_pengajuandetail.kode_pengajuan,
					bhp_pengajuandetail.barcode,
					bhp_pengajuandetail.jumlah,
					bhp_pengajuandetail.status,
					bhp_pengajuandetail.keterangan,
					bhp_master.nama_barang
					FROM
					bhp_pengajuandetail
					Inner Join bhp_master ON bhp_master.barcode = bhp_pengajuandetail.barcode 
					WHERE kode_pengajuan='".$noBhp."'
				) AS PENGAJUAN 
				LEFT JOIN 
				(
					SELECT
					Sum(bhp_stok.stok) AS jmlstok,
					bhp_stok.barcode
					FROM
					bhp_stok
					WHERE
					bhp_stok.tgl_input >=  '".$minTgl."' AND
					bhp_stok.barcode IN  (".$barcodeIn.") 
					GROUP BY
					bhp_stok.barcode
				) AS TBLSTOK ON TBLSTOK.barcode = PENGAJUAN.barcode
				LEFT JOIN 
				(
					SELECT 
					Sum(bhp_transaksi.jumlah) AS jmltambah, 
					bhp_transaksi.barcode
					FROM
					bhp_transaksi
					WHERE
					bhp_transaksi.tgl_transaksi >=  '".$minTgl."' AND
					bhp_transaksi.jenis_transaksi =  'PENAMBAHAN' AND
					bhp_transaksi.barcode IN  (".$barcodeIn.")
					GROUP BY 
					bhp_transaksi.barcode
				) AS TBLTAMBAH ON TBLTAMBAH.barcode = PENGAJUAN.barcode
				LEFT JOIN
				(
					SELECT 
					Sum(bhp_transaksi.jumlah) AS jmldistribusi, 
					bhp_transaksi.barcode
					FROM
					bhp_transaksi
					WHERE
					bhp_transaksi.tgl_transaksi >=  '".$minTgl."' AND
					bhp_transaksi.jenis_transaksi =  'DISTRIBUSI' AND
					bhp_transaksi.barcode IN  (".$barcodeIn.")
					GROUP BY 
					bhp_transaksi.barcode
				) TBLDISTRIBUSI ON TBLDISTRIBUSI.barcode = PENGAJUAN.barcode
				LEFT JOIN 
				(
					SELECT 
					Sum(bhp_transaksi.jumlah) AS jmlretur, 
					bhp_transaksi.barcode
					FROM
					bhp_transaksi
					WHERE
					bhp_transaksi.tgl_transaksi >=  '".$minTgl."' AND
					bhp_transaksi.jenis_transaksi =  'PENGEMBALIAN' AND
					bhp_transaksi.barcode IN  (".$barcodeIn.")
					GROUP BY 
					bhp_transaksi.barcode
				) AS TBLRETUR ON TBLRETUR.barcode = PENGAJUAN.barcode
			) AS STOK ";
		// echo "<pre>".$select; exit();
		$query	= $this->db->query($select);
		$result	= $query->result(); 
		return $result;
	}
	
	public function simpan_status()
	{
		$idDetail = $this->input->post('idDetail');
		$keterangan	= $this->input->post('keterangan'); 
		$status		= $this->input->post('status');  
		if($status=="PENGAJUAN")
		{ 
			$span = "label label-info arrowed-right arrowed-in";
		}
		
		if($status=="DITUNDA")
		{ 
			$span="label label-warning arrowed-in arrowed-in-right";
		}
		
		if($status=="DITOLAK")
		{ 
			$span="label label-important arrowed arrowed-right";
		}
		
		$update = array(
			'keterangan' => $keterangan,
			'status' => $status
		);
		// print_r($update); exit();
		$this->db->where('id_pengajuandet',$idDetail);
		$this->db->update('bhp_pengajuandetail', $update);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{  
			$data['msg'] = TRUE;
		}
		$data['status'] = $status;
		$data['span'] = $span;
		return $data;
	}
	
	public function get_jml_bybarcode($noPengajuan,$barcode){
		$this->db->select('jumlah');
		$this->db->from('bhp_pengajuandetail');
		$this->db->where('kode_pengajuan',$noPengajuan);
		$this->db->where('barcode',$barcode);
		$query	= $this->db->get();
		$result	= $query->row();
		return $result->jumlah;
	}
	
	public function simpan_distribusi(){
		$noPengajuan	= $this->input->post('noPengajuan'); 
		$barcode	= $this->input->post('rbarcode');
		$cekStatus	= $this->input->post('cekStatus'); 
		$max		= count($barcode);
		$tglTrans 	= date('Y-m-d');
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$insertTrans = "INSERT INTO bhp_transaksi VALUES";		
		$updateDet	 = "UPDATE bhp_pengajuandetail SET status= CASE ";  
		$updateDetIn = " END WHERE barcode IN(";  
		$cekIns = 0;
		for($i=0; $i<$max; $i++)
		{  
			$idTransaksi = $this->_no_transaksi();
			$jumlah 	 = $this->get_jml_bybarcode($noPengajuan,$barcode[$i]);
			
			$insertTrans .= "('".$idTransaksi."','".$barcode[$i]."','".$tglTrans."','DISTRIBUSI',".$jumlah.",'".$noPengajuan."','".$tglInput."',".$userInput."),"; 
			
			$updateDet 	.= "WHEN barcode='".$barcode[$i]."' THEN 'DISTRIBUSI' ";
			$updateDetIn.= "'".$barcode[$i]."',"; 
			$cekIns = $cekIns+1; 
		} 
		
		$update 	 = $updateDet.rtrim($updateDetIn, ',').") AND kode_pengajuan='".$noPengajuan."'" ; 
		
		if($cekStatus>0){
			$updateHeader= "UPDATE bhp_pengajuan SET status = 'DITUNDA' WHERE kode_pengajuan='".$noPengajuan."'";
		} else {
			$updateHeader= "UPDATE bhp_pengajuan SET status = 'DISTRIBUSI' WHERE kode_pengajuan='".$noPengajuan."'";
		}
		$insertTrans= rtrim($insertTrans, ',');   
		
		$status = "";
		try{ 
			$this->db->trans_begin();  
			$this->db->query($updateHeader);  
			if($cekIns>0)
			{
				$this->db->query($insertTrans);  
				$this->db->query($update);  
			}	
			 
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data; 
	} 
	
	public function cek_barcode($barcode)
	{
		$query = $this->db->query('SELECT * FROM bhp_master WHERE barcode="'.$barcode.'"');

		return $query->num_rows();
	}
	
	public function scan_tambah_brg()
	{ 
		$barcode	= $this->input->post('barcode');	
		$cekBarcode	= $this->cek_barcode($barcode);  
		$result = new stdClass();
		if($cekBarcode>0)
		{
			$this->db->select('barcode, nama_barang, isi_barang, nama_satuan');
			$this->db->from('bhp_master');
			$this->db->join('bhp_satuanbarang','bhp_satuanbarang.kode_satuan=bhp_master.kode_satuan');
			$this->db->where('barcode',$barcode);
			$query	= $this->db->get();
			$result	= $query->row(); 
		}
		$result->cek_barcode = $cekBarcode;
		return $result;
	}
	
	public function simpan_tbhbrg()
	{
		$barcode	= $this->input->post('tbarcode');
		$jumlah		= $this->input->post('tjumlah');
		$tglTrans 	= date('Y-m-d');
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		$noPenambahan = $this->_no_penambahan();
		$max = count($barcode);

 		
		$insertTrans = "INSERT INTO bhp_transaksi VALUES";
		
		for($i=0; $i<$max; $i++)
		{ 
			$idTransaksi = $this->_no_transaksi(); 
			$insertTrans .= "('".$idTransaksi."','".$barcode[$i]."','".$tglTrans."','PENAMBAHAN',".$jumlah[$i].",'".$noPenambahan."','".$tglInput."',".$userInput."),"; 
		}
		
		$insertTrans = rtrim($insertTrans, ','); 
		$status = "";
		try{ 
			$this->db->trans_begin();  
			$this->db->query($insertTrans);  
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data; 
	}
	
	public function get_data_stok(){
		$minTgl 	= $this->Libasset_model->get_tglmin_stok();
		$select = "
			SELECT STOKBHP.*, ((stokawal+jmlpenambahan+jmlpengembalian)-(jmldistribusi)) AS stokakhir
			FROM (
				SELECT
				bhp_master.barcode,
				bhp_master.nama_barang,
				COALESCE(bhp_stok.stok,0) AS stokawal,
				COALESCE(penambahan.jmlpenambahan, 0) AS jmlpenambahan,
				COALESCE(distribusi.jmldistribusi, 0) AS jmldistribusi,
				COALESCE(pengembalian.jmlpengembalian,0) AS jmlpengembalian
				FROM
				bhp_master
				Left Join bhp_stok ON bhp_master.barcode = bhp_stok.barcode
				Left Join 
				(
					SELECT
					Sum(bhp_transaksi.jumlah) AS jmlpenambahan,
					bhp_transaksi.barcode
					FROM
					bhp_transaksi
					WHERE
					bhp_transaksi.jenis_transaksi =  'PENAMBAHAN' AND 
					bhp_transaksi.tgl_transaksi >='".$minTgl."'
					GROUP BY
					bhp_transaksi.barcode
				) AS penambahan ON penambahan.barcode = bhp_master.barcode
				Left Join 
				(
					SELECT
					Sum(bhp_transaksi.jumlah) AS jmldistribusi,
					bhp_transaksi.barcode
					FROM
					bhp_transaksi
					WHERE
					bhp_transaksi.jenis_transaksi =  'DISTRIBUSI' AND 
					bhp_transaksi.tgl_transaksi >='".$minTgl."'
					GROUP BY
					bhp_transaksi.barcode
				) AS distribusi ON distribusi.barcode = bhp_master.barcode
				Left Join
				(
					SELECT
					Sum(bhp_transaksi.jumlah) AS jmlpengembalian,
					bhp_transaksi.barcode
					FROM
					bhp_transaksi
					WHERE
					bhp_transaksi.jenis_transaksi =  'PENGEMBALIAN' AND 
					bhp_transaksi.tgl_transaksi >='".$minTgl."'
					GROUP BY
					bhp_transaksi.barcode
				) AS pengembalian ON pengembalian.barcode = bhp_master.barcode
			) AS STOKBHP
		";
		
		$query = $this->db->query($select);
		$result	= $query->result();
		return $result;
	}
	
	public function scan_barcode_barang()
	{
		$barcode = $this->input->post('barcode');
		$cekBarcode	= $this->cek_barcode($barcode);  
		$result = new stdClass();
		
		
		$this->db->select('barcode,nama_barang,isi_barang,nama_satuan');
		$this->db->from('bhp_master');
		$this->db->join('bhp_satuanbarang','bhp_master.kode_satuan=bhp_satuanbarang.kode_satuan');
		$this->db->where('barcode',$barcode);
		$result = $this->db->get()->row(); 
		$result->cek_barcode = $cekBarcode;
		return $result;
	}
	
	public function simpan_stok_awal()
	{
		$barcode 	= $this->input->post('barcode'); 
		$stokAsli 	= $this->input->post('stokAsli');
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		$tglStokOpn	= $this->get_tgl_opname();
		$max	= count($barcode);
		
		$insertTemp 	= "INSERT INTO temp_bhpopname VALUES ";
		$updateStok	 	= "UPDATE temp_bhpopname SET stok_nyata= CASE ";  
		$updateIn 		= " END WHERE barcode IN("; 
	 		
		$is=0;
		$us=0;
		for($i=0; $i<$max; $i++)
		{
			$kode	= $userInput.$this->_kode_tempstokawal();		
			
			$cek = $this->cek_barcode_temp($barcode[$i]);
			if($cek>0){
				$updateStok .= "WHEN barcode='".$barcode[$i]."' THEN (stok_nyata+".$stokAsli[$i].") ";
				$updateIn 	.= "'".$barcode[$i]."',"; 
				$us=1;
			} else {
				$insertTemp .= "('".$kode."','".$tglStokOpn."','".$barcode[$i]."',0,'".$stokAsli[$i]."',0,'".$tglInput."',".$userInput."),"; 
				$is=1;
			}
		}
		
		$update 	= $updateStok.rtrim($updateIn, ',').")" ; 	
		// echo $update; exit();
		$insertTemp 	= rtrim($insertTemp, ',');  
		$status = "";
		try{ 
			$this->db->trans_begin();  
			if($is>0){
				$this->db->query($insertTemp);  
			}
			if($us>0){
				$this->db->query($update);  
			}
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data;
		
	}
	
	public function ver_stok_awal()
	{
		$this->db->select('temp_bhpopname.id_stokopname,temp_bhpopname.barcode,temp_bhpopname.stok_nyata,bhp_master.nama_barang, bhp_master.isi_barang, bhp_satuanbarang.nama_satuan');
		$this->db->from('temp_bhpopname');
		$this->db->join('bhp_master','bhp_master.barcode=temp_bhpopname.barcode');
		$this->db->join('bhp_satuanbarang','bhp_satuanbarang.kode_satuan=bhp_master.kode_satuan');
		$this->db->order_by('bhp_master.nama_barang','asc');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function ver_stok_opname()
	{
		$tglStokOpn = $this->get_tgl_minimal();
		$select = "
			SELECT queryend.barcode , bhp_master.nama_barang, bhp_master.isi_barang, queryend.stok_data, queryend.stok_nyata, queryend.selisih, queryend.keterangan,
			CASE WHEN queryend.keterangan ='' AND queryend.selisih=0 AND queryend.stok_data <> 0 THEN 'BLMSTOKOPNAME' ELSE '-' END AS ketstok
			FROM 
			(SELECT barcode,
			CASE WHEN keterangan <> '' THEN stok_data2 ELSE stok_data1 END AS stok_data,
			CASE WHEN keterangan <> '' THEN stok_nyata2 ELSE stok_nyata1 END AS stok_nyata,
			CASE WHEN keterangan <> '' THEN selisih2 ELSE selisih1 END AS selisih,
			keterangan 
			FROM 
			(
			SELECT barcode, 
			SUM(stok_data1) AS stok_data1, 
			SUM(stok_nyata1) AS stok_nyata1, 
			SUM(selisih1) AS selisih1, 
			SUM(stok_data2) AS stok_data2, 
			SUM(stok_nyata2) AS stok_nyata2,
			SUM(selisih2) AS selisih2,
			GROUP_CONCAT(keterangan) AS keterangan
			FROM 
			(
			SELECT stokdata.barcode, stokdata.stok AS stok_data1, 0 AS stok_nyata1, 0 AS selisih1, 0 AS stok_data2, 0 AS stok_nyata2, 0 AS selisih2, '' AS keterangan  FROM (
			SELECT barcode, (SUM(stokawal)+SUM(jmlpenambahan)-SUM(jmldistribusi)+SUM(jmlpengembalian)) AS stok FROM (
			SELECT
			bhp_stok.barcode,
			bhp_stok.stok as stokawal,
			0 as jmlpenambahan,
			0 as jmldistribusi,
			0 as jmlpengembalian
			FROM
			bhp_stok

			UNION  

			SELECT 
			bhp_transaksi.barcode,
			0 as stokawal,
			SUM(jumlah) as jmlpenambahan,
			0 as jmldistribusi,
			0 as jmlpengembalian
			FROM 
			bhp_transaksi
			WHERE
			bhp_transaksi.jenis_transaksi =  'PENAMBAHAN' AND 
			bhp_transaksi.tgl_transaksi >='".$tglStokOpn."'
			GROUP BY
			bhp_transaksi.barcode

			UNION  

			SELECT 
			bhp_transaksi.barcode,
			0 as stokawal,
			0 as jmlpenambahan,
			SUM(jumlah) as jmldistribusi,
			0 as jmlpengembalian
			FROM 
			bhp_transaksi
			WHERE
			bhp_transaksi.jenis_transaksi =  'DISTRIBUSI' AND 
			bhp_transaksi.tgl_transaksi >='".$tglStokOpn."'
			GROUP BY
			bhp_transaksi.barcode 

			UNION  

			SELECT 
			bhp_transaksi.barcode,
			0 as stokawal,
			0 as jmlpenambahan,
			0 as jmldistribusi,
			SUM(jumlah) as jmlpengembalian
			FROM 
			bhp_transaksi
			WHERE
			bhp_transaksi.jenis_transaksi =  'PENGEMBALIAN' AND 
			bhp_transaksi.tgl_transaksi >='".$tglStokOpn."'
			GROUP BY
			bhp_transaksi.barcode )
			AS stokawal
			GROUP BY barcode
			) AS stokdata
			
			UNION 

			SELECT barcode, 0 AS stok_data1, 0 AS stok_nyata1, 0 AS selisih1, stok_data AS stok_data2, stok_nyata AS stok_nyata2, selisih AS selisih2, keterangan FROM temp_bhpopname 
			) AS stoktemp
			GROUP BY barcode ) AS stokopname
			) AS queryend
			Inner Join bhp_master ON bhp_master.barcode = queryend.barcode 	
			ORDER BY 
			queryend.keterangan ASC, 
			queryend.stok_data>0 DESC
		";
		$query = $this->db->query($select);
		$result = $query->result();
		return $result;
	}
	
	public function tot_stok_opname($dtVerifikasi)
	{
		$data = array();
		$totalStok = 0;
		$totalStokOpn = 0;
		$totalSelisih = 0;
		foreach($dtVerifikasi as $res){
			$totalStok = $totalStok + $res->stok_data;
			$totalStokOpn = $totalStokOpn + $res->stok_nyata;
			$totalSelisih = $totalSelisih + $res->selisih;
		}
		$totalBarang = count($dtVerifikasi);
		$data['totalBarang']  = $totalBarang; 
		$data['totalStok'] 	  = $totalStok; 
		$data['totalStokOpn'] = $totalStokOpn; 
		$data['totalSelisih'] = $totalSelisih; 
		return $data;
	}
	
	public function tot_stok_awal($dtVerifikasi)
	{
		$total = 0;
		foreach($dtVerifikasi as $res){
			$total = $total + $res->stok_nyata;
		}
		return $total;
	}
	
	public function update_stok_awal()
	{
		$id		= $this->input->post('id');
		$stok	= $this->input->post('stok');
		$data = array(
			'stok_nyata' => $stok
		); 
		
		$this->db->trans_start();
		$this->db->where('id_stokopname',$id);
		$this->db->update('temp_bhpopname', $data);
		$this->db->trans_complete();
		
		if($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		
		return $data;
	}
	 
	public function delete_stok_awal()
	{
		$id		= $this->input->post('id'); 
		$this->db->delete('temp_bhpopname', array('id_stokopname' => $id));  
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{  
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function simpan_ver_stokawal()
	{
		$data = $this->ver_stok_awal();
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		$insertOpname	= "INSERT INTO bhp_stokopname VALUES ";
		$insertStok 	= "INSERT INTO bhp_stok VALUES ";
		foreach($data as $res)
		{
			$kodeStokOpn 	= $this->_kode_stokopname(); 
			// $kodeStok 		= $this->_kode_stok(); 
			$insertOpname  .= "('".$kodeStokOpn."','".$tglInput."','".$res->barcode."',0,'".$res->stok_nyata."',0,'".$tglInput."',".$userInput."),"; 
			$insertStok  .= "('".$res->barcode."','".$res->stok_nyata."','".$tglInput."',".$userInput."),"; 
		}
		
		$insertOpname 	= rtrim($insertOpname, ',');  
		$insertStok 	= rtrim($insertStok, ','); 
		$delete = "DELETE FROM temp_bhpopname";
		
		$status = "failed";
		try{ 
			$this->db->trans_begin(); 
			$this->db->query($insertOpname);    
			$this->db->query($insertStok);    
			$this->db->query($delete);    
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data;
	}
	
	public function cek_barcode_temp($barcode)
	{
		$select = "SELECT COUNT(barcode) AS cek FROM temp_bhpopname WHERE barcode='".$barcode."'";
		$query	= $this->db->query($select);
		$result	= $query->row();
		return $result->cek; 
	}
	
	public function scan_opname_brg()
	{
		$minTgl 	= $this->Libasset_model->get_tglmin_stok();
		$barcode 	=  $this->input->post('barcode');
		$cekBarcode	= $this->cek_barcode($barcode);  
		$result = new stdClass();
		if($cekBarcode>0)
		{ 
			$select = "
				SELECT STOKBHP.*, ((stokawal+jmlpenambahan+jmlpengembalian)-(jmldistribusi)) AS stokakhir
				FROM (
					SELECT
					bhp_master.barcode,
					bhp_master.nama_barang,
					bhp_master.isi_barang,
					COALESCE(bhp_stok.stok,0) AS stokawal,
					COALESCE(penambahan.jmlpenambahan, 0) AS jmlpenambahan,
					COALESCE(distribusi.jmldistribusi, 0) AS jmldistribusi,
					COALESCE(pengembalian.jmlpengembalian,0) AS jmlpengembalian
					FROM
					bhp_master
					Left Join bhp_stok ON bhp_master.barcode = bhp_stok.barcode
					Left Join 
					(
						SELECT
						Sum(bhp_transaksi.jumlah) AS jmlpenambahan,
						bhp_transaksi.barcode
						FROM
						bhp_transaksi
						WHERE
						bhp_transaksi.jenis_transaksi =  'PENAMBAHAN' AND 
						bhp_transaksi.tgl_transaksi >='".$minTgl."'
						GROUP BY
						bhp_transaksi.barcode
					) AS penambahan ON penambahan.barcode = bhp_master.barcode
					Left Join 
					(
						SELECT
						Sum(bhp_transaksi.jumlah) AS jmldistribusi,
						bhp_transaksi.barcode
						FROM
						bhp_transaksi
						WHERE
						bhp_transaksi.jenis_transaksi =  'DISTRIBUSI' AND 
						bhp_transaksi.tgl_transaksi >='".$minTgl."'
						GROUP BY
						bhp_transaksi.barcode
					) AS distribusi ON distribusi.barcode = bhp_master.barcode
					Left Join
					(
						SELECT
						Sum(bhp_transaksi.jumlah) AS jmlpengembalian,
						bhp_transaksi.barcode
						FROM
						bhp_transaksi
						WHERE
						bhp_transaksi.jenis_transaksi =  'PENGEMBALIAN' AND 
						bhp_transaksi.tgl_transaksi >='".$minTgl."'
						GROUP BY
						bhp_transaksi.barcode
					) AS pengembalian ON pengembalian.barcode = bhp_master.barcode
				) AS STOKBHP
				WHERE STOKBHP.barcode = '".$barcode."'
			";
			
			$query = $this->db->query($select);
			$result	= $query->row(); 
		}
		$result->cek_barcode = $cekBarcode;
		return $result;
	} 
	
	public function cek_tgl_opname()
	{ 
		$this->db->where('jns_stok_opname', 'STOKBHP');
		$this->db->where('status', 'aktif');
		$this->db->from('ta_tglstokopname');
		return $this->db->count_all_results();
	}
	
	public function get_tgl_opname(){
		$this->db->select_max('tgl_stok_opname');
		$this->db->from('ta_tglstokopname');
		$this->db->where('jns_stok_opname','STOKBHP');
		$this->db->where('status','aktif');
		$query	= $this->db->get();
		$result	= $query->row();
		return $result->tgl_stok_opname; 
		
	}
	
	public function get_tgl_minimal(){
		$minTgl 	= $this->Libasset_model->get_tglmin_stok();
		if(is_null($minTgl)){
			$this->db->select_min('tgl_transaksi','tgl');
			$query = $this->db->get('bhp_transaksi');
			$minTgl = $query->row()->tgl;
		}
		return $minTgl;
	}
	
	public function cek_barcode_stok($barcode){
		$select = "SELECT COUNT(barcode) AS cek FROM bhp_stok WHERE barcode='".$barcode."'";
		$query	= $this->db->query($select);
		$result	= $query->row();
		return $result->cek; 
	}
	
	public function simpan_stok_opname()
	{			
		$barcode 	= $this->input->post('barcode');
		$stokData 	= $this->input->post('stokData');
		$stokAsli 	= $this->input->post('stokAsli');
		$selisih	= $this->input->post('selisih');
		$keterangan	= $this->input->post('keterangan');
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		$tglStokOpn	= $this->get_tgl_opname();
		$max		= count($stokData);
		
		//tidak ada tanggal update di stok karena ketika stok dilakukan stok opname data bhp_stok di delete kemudian di insertkan data stok yang baru
		$insertOpname 	= "INSERT INTO temp_bhpopname VALUES ";
		$updateOpname	= "UPDATE temp_bhpopname SET ";
		$updStokData	= "stok_data = CASE ";  
		$updStokNyata	= ", stok_nyata = CASE ";  
		$updSelisih		= ", selisih = CASE ";  
		$updKeterangan	= ", keterangan = CASE ";  
		// $updateInStok	= " END ";
		// $updateInKet	= " END ";
		$whereUpdateIn	=" WHERE barcode IN(";  
		$is=0;
		$us=0;
		for($i=0; $i<$max; $i++)
		{
			$idTemp = $this->_kode_tempstokopname(); 
			
			$cek = $this->cek_stok_opnamebrg($barcode[$i]);
			if($cek>0){
				$updStokData 	.= "WHEN barcode='".$barcode[$i]."' THEN ".$stokData[$i]." ";
				$updStokNyata 	.= "WHEN barcode='".$barcode[$i]."' THEN ".$stokAsli[$i]." ";
				$updSelisih 	.= "WHEN barcode='".$barcode[$i]."' THEN ".$selisih[$i]." ";
				$updKeterangan 	.= "WHEN barcode='".$barcode[$i]."' THEN '".$keterangan[$i]."' ";
				
				$whereUpdateIn.= "'".$barcode[$i]."',"; 
				$us=1;
			} else {
				$insertOpname .= "('".$idTemp."','".$tglStokOpn."','".$barcode[$i]."','".$stokData[$i]."','".$stokAsli[$i]."','".$selisih[$i]."','".$keterangan[$i]."','".$tglInput."',".$userInput."),";  
				$is=1;
			}
		}
		
		$update 	= $updateOpname.$updStokData." END".$updStokNyata." END".$updSelisih." END".$updKeterangan." END".rtrim($whereUpdateIn, ',').")" ; 	
		
		$insertOpname 	= rtrim($insertOpname, ','); 
		$status = "";
		try{ 
			$this->db->trans_begin();  
			if($is>0){
				$this->db->query($insertOpname);  
			}
			if($us>0){
				$this->db->query($update);  
			}
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data;
	}
	
	public function cek_stok_opnamebrg($barcode)
	{
		$tglStokOpn	= $this->get_tgl_opname(); 
		$select = "SELECT COUNT(barcode) AS cek FROM temp_bhpopname WHERE barcode='".$barcode."' AND tgl_stokopname='".$tglStokOpn."'";
		$query	= $this->db->query($select);
		$result	= $query->row();
		return $result->cek; 
	}
	
	public function get_prevtgl_stokopname()
	{
		$tglStokOpn	= $this->get_tgl_opname(); 
		$select = "SELECT tgl_stok_opname FROM ta_tglstokopname WHERE tgl_stok_opname<'".$tglStokOpn."' AND jns_stok_opname='STOKBHP' ORDER BY tgl_stok_opname DESC LIMIT 1 "; 
		$query	= $this->db->query($select);
		$result	= $query->row();
		return $result->tgl_stok_opname;
	}
	
	
	public function scan_opname_axist()
	{
		$tglStokOpn	= $this->get_tgl_opname(); 
		$barcode = $this->input->post('barcode');
		$select = "SELECT
					bhp_master.nama_barang,
					bhp_master.isi_barang,
					temp_bhpopname.barcode,
					bhp_satuanbarang.nama_satuan,
					temp_bhpopname.stok_data,
					temp_bhpopname.stok_nyata,
					temp_bhpopname.selisih,
					temp_bhpopname.keterangan
					FROM
					temp_bhpopname
					Inner Join bhp_master ON temp_bhpopname.barcode = bhp_master.barcode
					Inner Join bhp_satuanbarang ON bhp_master.kode_satuan = bhp_satuanbarang.kode_satuan
					WHERE
					temp_bhpopname.barcode =  '".$barcode."'
					AND tgl_stokopname = '".$tglStokOpn."'"; 
		$query	= $this->db->query($select);
		$result	= $query->row();
		return $result;
	}
	
	public function get_stokblm_stokopname()
	{
		$tglStokOpn	= $this->get_tgl_opname(); 
		$tglPrev	= $this->get_prevtgl_stokopname();
		$select = "
		SELECT STOKBHP.*, ((STOKBHP.stok+jmlpenambahan+jmlpengembalian)-(jmldistribusi)) AS stokakhir
		FROM (
			SELECT bhp_stok.*,  
			COALESCE(penambahan.jmlpenambahan, 0) AS jmlpenambahan,
			COALESCE(distribusi.jmldistribusi, 0) AS jmldistribusi,
			COALESCE(pengembalian.jmlpengembalian,0) AS jmlpengembalian FROM (SELECT
			bhp_stok.barcode,
			bhp_stok.stok,
			bhp_master.nama_barang,
			bhp_master.isi_barang,
			bhp_satuanbarang.nama_satuan
			FROM
			bhp_stokopname
			Right Join bhp_stok ON bhp_stokopname.barcode = bhp_stok.barcode AND bhp_stokopname.tgl_stokopname = '".$tglStokOpn."'
			Inner Join bhp_master ON bhp_stok.barcode = bhp_master.barcode
			Inner Join bhp_satuanbarang ON bhp_master.kode_satuan = bhp_satuanbarang.kode_satuan
			WHERE
			bhp_stokopname.id_stokopname IS NULL) AS bhp_stok
			Left Join 
			(
				SELECT
				Sum(bhp_transaksi.jumlah) AS jmlpenambahan,
				bhp_transaksi.barcode
				FROM
				bhp_transaksi
				WHERE
				bhp_transaksi.jenis_transaksi =  'PENAMBAHAN' AND 
				bhp_transaksi.tgl_transaksi >='".$tglPrev."'
				GROUP BY
				bhp_transaksi.barcode
			) AS penambahan ON penambahan.barcode = bhp_stok.barcode
			Left Join 
			(
				SELECT
				Sum(bhp_transaksi.jumlah) AS jmldistribusi,
				bhp_transaksi.barcode
				FROM
				bhp_transaksi
				WHERE
				bhp_transaksi.jenis_transaksi =  'DISTRIBUSI' AND 
				bhp_transaksi.tgl_transaksi >='".$tglPrev."'
				GROUP BY
				bhp_transaksi.barcode
			) AS distribusi ON distribusi.barcode = bhp_stok.barcode
			Left Join
			(
				SELECT
				Sum(bhp_transaksi.jumlah) AS jmlpengembalian,
				bhp_transaksi.barcode
				FROM
				bhp_transaksi
				WHERE
				bhp_transaksi.jenis_transaksi =  'PENGEMBALIAN' AND 
				bhp_transaksi.tgl_transaksi >='".$tglPrev."'
				GROUP BY
				bhp_transaksi.barcode
			) AS pengembalian ON pengembalian.barcode = bhp_stok.barcode
		) AS STOKBHP
		";
		$query = $this->db->query($select);
		$result	= $query->result();
		return $result;
	}
	
	public function update_stok_opname()
	{
		$barcode 	= $this->input->post('barcode');
		$stokData	= $this->input->post('stokData');
		$stokNyata	= $this->input->post('stokNyata');
		$selisih	= $this->input->post('selisih');
		$keterangan	= $this->input->post('ket');
		
		$add = array(
			'stok_data' => $stokData, 
			'stok_nyata' => $stokNyata, 
			'selisih' => $selisih, 
			'keterangan' => $keterangan 
		);  
		
		$query1 	= $this->db->get_where('temp_bhpopname',array('barcode'=>$barcode));
		$cekbarcode = $query1->num_rows();
		if($cekbarcode>0)
		{
			
			$this->db->trans_start();
			$this->db->where('barcode',$barcode);
			$this->db->update('temp_bhpopname', $add);
			$this->db->trans_complete();
			
			if($this->db->trans_status() === FALSE)
			{
				$data['msg'] = FALSE;
			} 
			else 
			{
				$data['msg'] = TRUE;
			} 
		}
		else 
		{
			$idTemp = $this->_kode_tempstokopname(); 
			$tglStokOpn	= $this->get_tgl_opname();
			$add['id_stokopname'] = $idTemp;
			$add['tgl_stokopname'] = $tglStokOpn;
			$add['barcode'] = $barcode;
			$add['tgl_input'] = date('Y-m-d');
			$add['user_input'] = 66;
			
			$this->db->trans_start(); 
			$this->db->insert('temp_bhpopname', $add);
			$this->db->trans_complete();
			
			if($this->db->trans_status() === FALSE)
			{
				$data['msg'] = FALSE;
			} 
			else 
			{
				$data['msg'] = TRUE;
			} 
		}
		 
		return $data;
	}
	
	public function simpan_ver_stokopname()
	{
		// menonaktifkan tanggal stok opname
 		$this->db->select_max('id');
		$this->db->from('ta_tglstokopname');
		$this->db->where('jns_stok_opname','STOKBHP');
		$this->db->where('status','aktif');
		$query = $this->db->get();
		$result = $query->row();  
		//end menonaktifkan tanggal stok opname
		
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$query = $this->db->get('temp_bhpopname');
		$insOpname = "INSERT INTO bhp_stokopname VALUES ";
		$insStokAwal = "INSERT INTO bhp_stok VALUES ";
		foreach($query->result() as $stokopname){
			$kode = $this->_kode_stokopname();
			$tglStokOpn	= $this->get_tgl_opname();
			
			$insOpname .= "('".$kode."','".$tglStokOpn."',".$stokopname->barcode.",".$stokopname->stok_data.",".$stokopname->stok_nyata.",".$stokopname->selisih.",'".$stokopname->keterangan."','".$tglInput."',".$userInput."),"; 
			
			// $kodeStok 		= $this->_kode_stok(); 
			if($stokopname->stok_nyata>0){
				$insStokAwal .="('".$stokopname->barcode."',".$stokopname->stok_nyata.",'".$tglInput."',".$userInput."),";
			}
		}
		
		$delStokAwal = "DELETE FROM bhp_stok";
		$delTempOpn  = "DELETE FROM temp_bhpopname";
		$insOpname	 = rtrim($insOpname, ',');  
		$insStokAwal = rtrim($insStokAwal, ',');  
		$updateTgl = "UPDATE ta_tglstokopname SET status='non' WHERE id=".$result->id."";
		$status = "";
		try{ 
			$this->db->trans_begin();   
			$this->db->query($delStokAwal);   
			$this->db->query($insOpname);   
			$this->db->query($insStokAwal);   
			$this->db->query($delTempOpn); 
			$this->db->query($updateTgl); 
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data;
	}
	
	public function get_jenis_barang()
	{
		$kodeGroup = $this->input->post('kodeGroup');
		$this->db->select('kode_jenis,nama_jenis');
		// $this->db->get_where('bhp_kodemanual', array('kode_group'=>$kodeGroup));
		$query = $this->db->get_where('bhp_kodemanual', array('kode_group'=>$kodeGroup));
		$result = $query->result();
		return $result;
	}
	
	public function get_merk_barang()
	{
		$kodeGroup 	= $this->input->post('kodeGroup');
		$kodeJns 	= $this->input->post('kodeJns');
		$this->db->select('kode_merk,nama_merk'); 
		$query = $this->db->get_where('bhp_kodemanual', array('kode_group'=>$kodeGroup,'kode_jenis'=>$kodeJns));
		$result = $query->result();
		return $result;
	}
	
	public function get_maxbarcode_manual()
	{
		$kode = $this->input->post('kode');
		$tahun = date('y');
		$bulan = date('m');
		$likeBarcode = $kode.$tahun.$bulan;  
		
		$select = "SELECT count(barcode) as barcode, COALESCE(max(barcode),0) as maxbar FROM bhp_master WHERE barcode LIKE '".$likeBarcode."%'"; 
		
		$query = $this->db->query($select);
		$result = $query->row(); 
		// echo $result->maxbar;
		if(($result->barcode) > 0){ 
			//1020010011709001 
			$seq = (int)substr($result->maxbar,13,3)+1;
			$barcode = $likeBarcode.str_pad($seq, 3, "0", STR_PAD_LEFT); 
		} else { 
			$barcode = $likeBarcode."001";
		}   
		$data['barcode'] = $barcode;
		return $data;
	}
	
	public function data_tambah_barang()
	{
		$this->db->select('bhp_transaksi.id_transaksiphb, bhp_transaksi.barcode, bhp_master.nama_barang, bhp_master.isi_barang, bhp_satuanbarang.nama_satuan, bhp_master.isi_barang, bhp_transaksi.tgl_transaksi, bhp_transaksi.tgl_transaksi, bhp_transaksi.jumlah, bhp_transaksi.kode_pengajuan');
		$this->db->from('bhp_transaksi');
		$this->db->join('bhp_master','bhp_transaksi.barcode = bhp_master.barcode');
		$this->db->join('bhp_satuanbarang','bhp_master.kode_satuan = bhp_satuanbarang.kode_satuan');
		$this->db->where('bhp_transaksi.jenis_transaksi','PENAMBAHAN');		
		$this->db->order_by('bhp_transaksi.tgl_transaksi','DESC');
		$this->db->limit(1000); 
		// echo "<pre>". $this->db->get_compiled_select();
		// exit();
		$query	= $this->db->get(); 
		$result = $query->result();
		return $result;
	}
	
	public function update_tambah_barang()
	{
		$id	= $this->input->post('id');
		$jml= $this->input->post('jml'); 
		
		
		$update = array(
			'jumlah' => $jml
		);
		
		$this->db->trans_start();
		$this->db->where('id_transaksiphb',$id);
		$this->db->update('bhp_transaksi', $update);
		$this->db->trans_complete();
		
		if($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		
		return $data; 
	}
	
	public function data_distribusi_barang()
	{ 
		$select="
			SELECT
			bhp_pengajuan.kode_pengajuan,
			bhp_pengajuan.tgl_pengajuan,
			bhp_pengajuan.total_pengajuan,
			bhp_pengajuan.keterangan,
			bhp_pengajuan.status,
			bhp_transaksi.tgl_transaksi,
			Sum(bhp_transaksi.jumlah) AS total_distribusi,
			users.user_name
			FROM
			bhp_pengajuan
			Inner Join bhp_transaksi ON bhp_pengajuan.kode_pengajuan = bhp_transaksi.kode_pengajuan
			Inner Join users ON bhp_pengajuan.user_pengaju = users.user_id
			WHERE
			bhp_pengajuan.status =  'DISTRIBUSI'
			GROUP BY
			bhp_pengajuan.kode_pengajuan,
			bhp_pengajuan.tgl_pengajuan,
			bhp_pengajuan.total_pengajuan,
			bhp_pengajuan.keterangan,
			bhp_pengajuan.status,
			bhp_transaksi.tgl_transaksi,
			users.user_name
			ORDER BY tgl_transaksi DESC
			LIMIT 1000";
			
		$query = $this->db->query($select); 
		$result = $query->result();
		return $result;
	}
	
	public function simpan_status_terima()
	{
		$kodePeng	= $this->input->post('kodePeng');   
		$tglTerima	= date('Y-m-d');
		$update1 = array( 
			'status' => 'TERIMA',
			'tgl_penerimaan' => $tglTerima
		); 
		
		$update2 = array( 
			'status' => 'TERIMA'
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_pengajuan',$kodePeng);
		$this->db->update('bhp_pengajuan', $update1);
		
		$this->db->where('kode_pengajuan',$kodePeng);
		$this->db->update('bhp_pengajuandetail', $update2);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
 
		return $data;
	} 
	
	public function get_data_stokopn()
	{ 
		$tglStok	= $this->input->post('tglOpname'); 		 
		$select =" 
			SELECT
			bhp_stokopname.barcode,
			bhp_master.nama_barang,
			bhp_stokopname.stok_data,
			bhp_stokopname.stok_nyata,
			bhp_stokopname.selisih,
			bhp_stokopname.keterangan,
			bhp_stokopname.tgl_stokopname
			FROM
			bhp_stokopname
			Inner Join bhp_master ON bhp_stokopname.barcode = bhp_master.barcode
			WHERE bhp_stokopname.tgl_stokopname = '".$tglStok."'";
		$query	= $this->db->query($select);
		$result	= $query->result(); 
		return $result;
	}
	
	public function get_search_tglopn()
	{
		$this->db->where('jns_stok_opname', 'STOKBHP');
		$this->db->where('status', 'non');
		$this->db->from('ta_tglstokopname');
		
		$query 	= $this->db->get();
		$result = $query->result(); 
		return $result;
	}
}
?>