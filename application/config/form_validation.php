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



 )

 
 );

?>