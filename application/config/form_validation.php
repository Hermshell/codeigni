<?php
$config=array(
 'ajout'=>array(
   array(
           'field'=>'pro_ref',
           'label'=>'référence',
           'rules'=>array(
            'required',
            'regex_match[/^[A-Z-a-z-0-9-_]+$/]',
            'htmlspecialchars'
 ),
   'errors'=>array(
             'required'=>'Veuillez remplir le champ %s',
             'regex_match'=>'La saisie du champ %s est invalide.'
   )
   

   ),

   array(
          'field'=>'pro_libelle',
          'label'=>'nom',
          'rules'=>array(
            'required',
            'regex_match[/^[A-Z-a-z-0-9-êéèà ]+$/]',
            'htmlspecialchars'


   ),
   'errors'=>array(
             'required'=>'Veuillez remplir le champ %s',
             'regex_match'=>'La saisie du champ %s est invalide.'
   )
   

   ),
  
   array(
          'field'=>'pro_description',
          'label'=>'description',
          'rules'=>array(
            'required',
            'regex_match[/^[A-Z-a-z---\'-,.éèêàâôù ]+$/]',
            'htmlspecialchars'


   ),
   'errors'=>array(
             'required'=>'Veuillez remplir le champ %s',
             'regex_match'=>'La saisie du champ %s est invalide.'
   )
   





   ),

   array(
          'field'=>'pro_prix',
          'label'=>'prix',
          'rules'=>array(
            'required',
            'regex_match[/^[0-9-.]+$/]',
            'htmlspecialchars'


   ),
   'errors'=>array(
             'required'=>'Veuillez remplir le champ %s',
             'regex_match'=>'La saisie du champ %s est invalide.'
   )
   


  

   ),

   array(
          'field'=>'pro_stock',
          'label'=>'stock',
          'rules'=>array(
                  'required',
                  'regex_match[/^[0-9-.]+$/]',
                  'htmlspecialchars'
          ),
          'errors'=> array(
                  'required'=> 'Veuillez remplir le champ %s.',
                  'regex_match'=>'La saisie du champ %s est invalide.'

          )



          ),

   array(
         'field'=>'pro_couleur',
         'label'=>'couleur',
         'rules'=>array(
                  'required',
                  'regex_match[/^[A-Z-a-z--]+$/]',
                  'htmlspecialchars'


         ),
         'errors'=>array(
                   'required'=>'Veuillez remplir le champ %s',
                   'regex_match'=>'La saisie du champ %s est invalide.'
         )
         


         ),


         
 
 
 
 
         
         
         
         
      ),
         'inscription'=>array(
            array(
                    'field'=>'cli_login',
                    'label'=>'identifiant',
                    'rules'=>array(
                     'required',
                     'regex_match[/^[a-zA-Z0-9_]{3,16}$/]',
                     'is_unique[client.cli_login]',
                     'htmlspecialchars'
          ),
            'errors'=>array(
                      'required'=>'Veuillez remplir le champ %s',
                      'regex_match'=>'La saisie du champ %s est invalide.',
                      'is_unique'=>"L'identifiant rentré est déjà utilisé"
            )
            ),
         
            array(
             'field'=>'cli_mdp',
             'label'=>'Mot de passe',
             'rules'=>array(
              'required',
              'regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-+!*$@%_\w]{8,15})$/]',
              'htmlspecialchars'
         ),
         'errors'=>array(
               'required'=>'Veuillez remplir le champ %s',
               'regex_match'=>'La saisie du champ %s est invalide.',
         )
         ),
         
         
         array(
          'field'=>'conf_mdp',
          'label'=>'Confirmation mot de passe',
          'rules'=>array(
           'required',
           'regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-+!*$@%_\w]{8,15})$/]',
           "matches[cli_mdp]",
           'htmlspecialchars'
      ),
      'errors'=>array(
            'required'=>'Veuillez confirmer votre mot de passe',
            'regex_match'=>'La confirmation du mot de passe est invalide.',
            "matches"=>'Veuillez rentrer exactement le même mot de passe.'
      )
      ),
      
),
       
         'connexion'=>array(
            array(
             'field'=>'cli_login',
             'label'=>'Login',
             'rules'=>array(
              'required',
              'regex_match[/^[a-zA-Z0-9_]{3,16}$/]',
              'htmlspecialchars'
         ),
         'errors'=>array(
               'required'=>'Veuillez renseigner votre login',
               'regex_match'=>'Login non valide',
         )
         ),
         
     
         array(
             'field'=>'cli_mdp',
             'label'=>'mot de passe',
             'rules'=>array(
              'required',
              'regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-+!*$@%_\w]{8,15})$/]',
              'htmlspecialchars'
         ),
         'errors'=>array(
               'required'=>'Veuillez renseigner votre mot de passe',
               'regex_match'=>'Mot de passe non valide',
         )
         ),
            )
 
 );

?>