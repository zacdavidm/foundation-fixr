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
  
}
