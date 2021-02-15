<?php 
class Users_model extends CI_model{
	public function __construct()
    {
      parent::__construct();
     
    }
    public function articleList($limit , $offset){
	  $q =$this->db->select()
			-> from('article')
            ->limit($limit, $offset)
			-> get();
			return $q->result();
		}
		public function num_rows(){
        $q = $this->db->select()
                ->from('article')
                ->get();
        return $q->num_rows();
    } 

}
?>


