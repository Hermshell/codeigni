<?php
	
// application/controllers/Produits.php
	
 
	
defined('BASEPATH') OR exit('No direct script access allowed');
	
 
	
class Produits extends CI_Controller 
	
{
	
 //Fonction Liste
	
    public function liste()  //La fonction public liste contient un select sur tous les éléments de la table produits ils sont ensuite envoyés à la vue liste qui les affiche sous forme de tableau
	
    {

        //$this->load->database();
        $this->load->model('produits_model');
        $aListe= $this->produits_model->liste();
        $aView["liste_produits"]=$aListe;
        $this->load->view('liste', $aView);
	
    }

    //Fonction Ajout

    public function ajout()
    {
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('upload');
    
        $this->load->model('produits_model');
        $increment=$this->produits_model->increment();

        
       
        
           
       
        if($this->input->post())
        {
          $data=$this->input->post();

          $config['overwrite']=true;

          $config['upload_path'] = './assets/images/'; // chemin où sera stocké le fichier
	
          $config['file_name'] = $increment[0]->max; // nom du fichier final
        
          $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)

          $this->upload->initialize($config);

          $this->form_validation->run('ajout');
                                 

          if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('pro_photo'))
          {
           $this->load->model('produits_model');
          
            $aView["categories"] = $this->produits_model->categories();
            
            $errors = $this->upload->display_errors();    
	
 
	
            // on réaffiche la vue du formulaire en passant les erreurs 
         
            $aView["errors"] = $errors;
         
        
          
                     $this->load->view('ajout', $aView);
              }
              else
              {
                    
           
                
                  $this->load->model('produits_model');
                  $this->produits_model->insert();
                  redirect("produits/liste");  
                
              
          }
        
      }
        else{
          $this->load->model('produits_model');
          
          $aView["categories"] = $this->produits_model->categories();
               $this->load->view('ajout',$aView);
            }
    }



   //Fonction Modif    
    public function modif($id)
    {
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('upload');
      
      
        


        if($this->input->post()) //Si le formulaire est posté
      {

        $config['overwrite']=TRUE;

        $config['upload_path'] = './assets/images/'; // chemin où sera stocké le fichier
	
        $config['file_name'] = $id; // nom du fichier final
      
        $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)

        

        $this->upload->initialize($config);
        
        
        
        
        $this->form_validation->run('ajout'); //On lance la validation de formulaire sur le formulaire modif
                                 

        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('pro_photo')) //Si elle renvoie false
        {
          $this->load->database(); //On charge la base de données
  
          $this->load->model('produits_model');
          
            $aView["categories"] = $this->produits_model->categories();

        
            $aView["produits"]=$this->produits_model->produits($id);
        
        
        
        $this->load->view('modif', $aView);
        $errors = $this->upload->display_errors();    
           
        }
             
        
        
        else{//Si les données passent la vérification
                $data=$this->input->post(); //On stocke les résultats du POST dans une variable
        
                if($data['pro_bloque']==0)  //Si pro_bloque est définie sur Non 
                {
                  $data['pro_bloque']=null;//On lui attribue null
                }

                $extension=$this->upload->data('file_ext');
               $data['pro_photo']=substr($extension,1);



               $this->load->model('produits_model');
               $this->produits_model->update($id);
  
                redirect('produits/liste');
               }


              }
      

      else{ //Si les données ne sont pas postés
    
       
        $this->load->model('produits_model');
          
        $aView["categories"] = $this->produits_model->categories();

    
        $aView["produits"]=$this->produits_model->produits($id);
        $this->load->view('modif',$aView);



          }


    }

    //Fonction Suppression


    public function delete($pro_id) //La fonction delete récupère l'id du détail, on le place en paramètre de la fonction pour qu'il puisse le récupérer
{

 
  $this->load->model('produits_model');
  $this->produits_model->delete($pro_id);
  redirect('produits/liste');

}


//Fonction détails
 
public function detail($id)
{
  $this->load->helper('form');
  $this->load->database();
  $this->load->helper('url');


  $this->load->database();
	
  $liste = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", $id);

  $model["produits"] = $liste->row(); // première ligne du résultat

  $this->load->view('detail', $model);


}


public function ajoutePanier() //ajoute un produit au panier
	
{
	
        $data=$this->input->post();
	
        $this->load->model('produits_model');
        $aView['liste_produits']= $this->produits_model->liste();

        if ($this->session->panier == null) // création du panier s'il n'existe pas
	
        {
	
            $this->session->panier = array();
	
            $tab=$this->session->panier;
	
            //On ajoute le produit
	
            array_push($tab,$data); // Empile un ou plusieurs éléments à la fin d'un tableau
	
            $this->session->panier = $tab;
	
            $this->liste();
	
        }
      
	
        else //si le panier existe
	
        {
	
            $tab=$this->session->panier;
	
            $idProduit=$this->input->post('pro_id');
	
            $sortie = false;
	
            foreach ($tab as $produit) //on cherche si le produit existe déjà dans le panier
	
            {
	
                if ($produit['pro_id'] == $idProduit)
	
                {
	
                    $sortie = true;
	
                }
	
            }
	
            if ($sortie) //si le produit existe déjà, l'utilisateur est averti
	
            {
	
                echo '<div class="alert alert-danger">Ce produit est déjà dans le panier.</div>';
	
                $this->liste();
	
            }
          
	
            else 
	
            { //sinon le produit est ajouté dans le panier
	
                array_push($tab,$data);
	
                $this->session->panier = $tab;
                $this->liste();
	
            }
	
        }
      
}


public function qteplus($id)
	
{
	
    $tab = $this->session->panier;
	
    $temp = array();
	
 
	
    for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit
	
    {
	
        if ($tab[$i]['pro_id'] !== $id)
	
        {
	
            array_push($temp, $tab[$i]);
	
        }
	
        else
	
        {
	
            $tab[$i]['pro_qte']++;
	
            array_push($temp, $tab[$i]);
	
        }
	
    }
    $tab = $temp;
	
    unset($temp);
	
    $this->session->panier=$tab;
	
    $this->liste();
    
  }
    public function qtemoins($id)
	
{
	
    $tab = $this->session->panier;
	
    $temp = array();
	
 
	
    for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit
	
    {
	
        if ($tab[$i]['pro_id'] !== $id)
	
        {
	
            array_push($temp, $tab[$i]);
	
        }
    
     else if($tab[$i]['pro_qte']<=0)
     {
       $this->effaceProduit($tab[$i]['pro_id']);
     }  
     

        else
	
        {
	
            $tab[$i]['pro_qte']--;
	
            array_push($temp, $tab[$i]);
	
        }
	
    }
	
 
	
    $tab = $temp;
	
    unset($temp);
	
    $this->session->panier=$tab;
	
    $this->liste();
	
}

public function effaceProduit($id)
	
{
	
    $tab = $this->session->panier;
	
    $temp = array(); //création d'un tableau temporaire vide
	
 
	
    for ($i=0; $i<count($tab); $i++) //on cherche dans le panier les produits à ne pas supprimer
	
    {
	
        if ($tab[$i]['pro_id'] !== $id)
	
        {
	
             array_push($temp, $tab[$i]); // ces produits sont ajoutés dans le tableau temporaire
	
        }
	
    }
	
 
	
   $tab = $temp;
	
   unset($temp);
	
   $this->session->panier = $tab; // le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
	
 
	
   $this->liste();
	
}


public function efface()
	
{
	
    $this->session->panier = array();
	
    $this->liste();
	
}

public function panier()
{
    $this->load->view('panier');
}
	
}