<?php
/*
Title: Text Fields
Setting: piklist-demo-fields
Order: 10
*/

  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text_small'
    ,'label' => __('Text ~ small-text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 'Lorem'
    ,'attributes' => array(
      'class' => 'small-text'
    )
  ));
  
  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text'
    ,'label' => __('Text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 'Lorem'
  ));
  
  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text_regular'
    ,'label' => __('Text ~ regular-text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 'Lorem'
    ,'attributes' => array(
      'class' => 'regular-text'
    )
  ));
  
  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text_large'
    ,'label' => __('Text ~ large-text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 'Lorem'
    ,'attributes' => array(
      'class' => 'large-text'
    )
  ));
  
  piklist('field', array(
    'type' => 'number'
    ,'field' => 'number_small'
    ,'label' => __('Number ~ small-text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 3
    ,'attributes' => array(
      'class' => 'small-text'
    )
  ));
  
  piklist('field', array(
    'type' => 'textarea'
    ,'field' => 'textarea_large'
    ,'label' => __('Textarea ~ 10x50 ~ large-text code')
    ,'description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'attributes' => array(
      'rows' => 10
      ,'cols' => 50
      ,'class' => 'large-text code'
    )
  ));

  ?>