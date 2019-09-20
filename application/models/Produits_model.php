	
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
    class Produits_model extends CI_Model
        
    {
        
      public function liste()
      {
        $this->load->database();
	
        $requete = $this->db->query("SELECT * FROM produits");
   
        $aProduits = $requete->result();  
   

   
        return $aProduits;            

      }


      public function increment()
      {
        $this->load->database();
        $results=$this->db->query("SELECT AUTO_INCREMENT as max FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'jarditou' AND TABLE_NAME = 'produits';"); //Requête  pour l'obtention du maximum d'id suivant
        $max_id=$results->result(); 

        return $max_id;

      }

      public function categories()
      {


        $this->load->database();
  
            $results2=$this->db->query("SELECT cat_nom, cat_id FROM categories");
            
            $aListe2= $results2->result();

            return $aListe2;
      }


      public function insert()
      {
        $data=$this->input->post();
        $this->load->database();

        $extension=$this->upload->data('file_ext');
     
   
        if($data['pro_bloque']==0)
         {
           $data['pro_bloque']=null;
         }

        $data['pro_photo']=substr($extension,1);
          
               
        $this->db->insert('produits', $data);

      }


      public function produits($id)
      {
        $this->load->database();
        $results= $this->db->query("SELECT * FROM produits WHERE pro_id= ?", $id); //On réeffectue le select des infos produits
        $produits=$results->row();//On stocke le résultat dans un tableau associatif

        return $produits;


      }


      public function update($id)
      { 

        $data=$this->input->post();
        $this->load->database();
        $where=$this->db->where('pro_id', $id); //Mettre le where dans une variables
        $this->db->update('produits', $data, $where); //On effectue une requête update en incluant après les données du formulaire le where



      }


      public function delete($pro_id)
      {
        $this->load->database();
        $where=$this->db->where('pro_id', $pro_id); //Mettre le where dans une variables
        $this->db->delete('produits', $where);
      }
        
    }       