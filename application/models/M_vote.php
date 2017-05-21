<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vote extends CI_Model 
{	
    function __construct()
	{	
        parent::__construct();
	}

    function insertVoteTanya($data)
    {
        $this->db->query("insert into vote_pertanyaan (id_user,id_pertanyaan,value_vote) values(?,?,?)",
		 array(
            $data['id_user'],
            $data['id_pertanyaan'],
            $data['value']
         ));
		
		// menghapus variabel dari memory
		unset($data);
    }

    function insertVoteJawaban($data)
    {
        $this->db->query("insert into vote_jawaban (id_user,id_jawaban,value_vote) values(?,?,?)",
		 array(
            $data['id_user'],
            $data['id_jawaban'],
            $data['value'],
         ));
		
		// menghapus variabel dari memory
		unset($data);
    }

    function getVoteTanya($data)
    {
        $query = $this->db->query("select *, sum(value_vote) from vote_pertanyaan where id_pertanyaan = ?",
			array($data['id_pertanyaan']));
			
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($data);	
    }

    function getVoteTanyaById($data)
    {
        $query = $this->db->query("select value_vote from vote_pertanyaan where id_pertanyaan = ? and id_user = ?",
			array(
                $data['id_pertanyaan'],
                $data['id_user']
            ));	

            return $query;
            
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($data);	
    }

    function getVoteJawab($data)
    {
        $query = $this->db->query("select *, sum(value_vote) from vote_jawaban where id_jawaban = ?",
			array($data['id_jawaban']));
			
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($data);	
    }
    function getVoteJawabanById($data)
    {
        $query = $this->db->query("select value_vote  as nilai from vote_jawaban where id_jawaban = ? and id_user = ?",
			array(
                $data['id_jawaban'],
                $data['id_user']
            ));	

        return $query;
            
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($data);	
    }

    function updateVoteTanya($data)
    {
        $this->db->query("update vote_pertanyaan set value_vote = ? where id_pertanyaan =? and id_user =?",
		 array(
            $data['value'],
            $data['id_pertanyaan'],
            $data['id_user']
         ));
		
		// menghapus variabel dari memory
		unset($data);
    }

    function updateVoteJawaban($data)
    {
        $this->db->query("update vote_jawaban set value_vote = ? where id_jawaban =? and id_user = ?",
		 array(
            $data['value'],
            $data['id_jawaban'],
            $data['id_user']
         ));
		// menghapus variabel dari memory
		unset($data);
    }
}