<?php
$config=array(
 'inscription'=>array(
   array(
           'field'=>'cli_login',
           'label'=>'identifiant',
           'rules'=>array(
            'required',
            'regex_match[/^[a-zA-Z0-9_]{3,16}$/]',
            'unique',
            'htmlspecialchars'
 ),
   'errors'=>array(
             'required'=>'Veuillez remplir le champ %s',
             'regex_match'=>'La saisie du champ %s est invalide.',
             'unique'=>"L'identifiant rentré est déjà utilisé"
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
)


));