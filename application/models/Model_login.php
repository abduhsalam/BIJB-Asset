<?php
	class Model_login extends CI_Model
	{
		
		public function check_login()
		{
					$this->db->where("user_login",$this->input->post("username"));
					$this->db->select("user_id,user_name,status, id_struktur, id_unitkerja, user_avatar, group_concat(tree_menu.akses_menu) as menu, group_concat(distinct(menu.akses_menu)) as akses_menu, struktur.direktorat as direktorat, struktur.unit_kerja as unitkerja, users.status_atasan as status_atasan ");
					$this->db->where("user_password",sha1($this->input->post("username").$this->input->post("password")));
					$this->db->from('users');
					$this->db->join('user_menu','users.user_id=user_menu.id_user','inner');
					$this->db->join('tree_menu','tree_menu.id=user_menu.id_treemenu');
					$this->db->join('menu','menu.id=tree_menu.id_menu');
					//$this->db->join('struktur_back','struktur_back.id = users.id_unitkerja');
					$this->db->join('struktur', 'struktur.id=users.id_unitkerja');
					$this->db->group_by("user_name,user_id,status");
					//$this->db->join('tree_menu','tree_menu.id=user_menu.id_usermenu');
					
			$query	= $this->db->get();
			
			if($query->num_rows() > 0)
			{
				return $query->row();
			}else
			{
				return false;
			}
		}
		
		public function get_status_menu()
		{
			$this->db->select('group_concat(tree_menu.akses_menu) as menu');
			$this->db->from('users');
			$this->db->join('user_menu','users.user_id=user_menu.id_user','inner');
			$this->db->join('tree_menu','user_menu.akses_menu_status=tree_menu.id');
			$this->db->where("user_login",$this->input->post("username"));
			$this->db->where("user_password",sha1($this->input->post("username").$this->input->post("password")));
			$this->db->group_by("user_name");
			
			return $this->db->get()->row();
		}
		
		public function get_login_by($id)
		{
					$this->db->select("user_id,user_name, group_concat(tree_menu.id) as menu, group_concat(distinct(menu.akses_menu)) as akses_menu ");
					$this->db->from('users');
					$this->db->join('user_menu','users.user_id=user_menu.id_user','inner');
					$this->db->join('tree_menu','tree_menu.id=user_menu.id_treemenu');
					$this->db->join('menu','menu.id=tree_menu.id_menu');
					$this->db->where('user_id',$id);
					$this->db->group_by("user_name");
					//$this->db->join('tree_menu','tree_menu.id=user_menu.id_usermenu');
					
			return $this->db->get()->row();
		}
	}
?>