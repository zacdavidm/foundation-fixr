<?php

function foundation_fixr_form_alter(&$form, &$form_state, $form_id) {

	// Search Block Fixes
  if (isset($form['#form_id']) && ($form['#form_id'] == 'search_block_form')) {
    $form['search_block_form']+=array(
    '#prefix'=>'<div class="row collapse"><div class="small-8 columns">',
    '#suffix'=>'</div>'
    );
    $form['actions']['submit']+=array(
    '#prefix'=>'<div class="small-4 columns">',
    '#suffix'=>'</div></div>'
    );
    $form['actions']['submit']['#attributes']['class'] = array('postfix', 'expand');
  }
  
  // Sexy submit buttons fix
  //reset form action buttons to secondary
  if (!empty($form['actions'])) {
    foreach($form['actions'] as &$action){
      if(isset($action['#type']) && ($action['#type']=='submit')){
        if(isset($action['#attributes']['class'])){
          $action['#attributes']['class'][] = 'secondary';
        }
        else{
          $action['#attributes']['class']=array();
          $action['#attributes']['class'][]='secondary';
        }
      }
    }
  }

  //remove secondary and radius class from submit action
  if (!empty($form['actions']) && !empty($form['actions']['submit'])) {
    $submit_classes=$form['actions']['submit']['#attributes']['class'];
    $submit_classes=array_diff($submit_classes, array('secondary','radius'));
    $form['actions']['submit']['#attributes']['class']=$submit_classes;
  }


  
}
