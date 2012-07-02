<?php
/*
Title: Field Templates <span class="piklist-title-right">Order 70</span>
Post Type: piklist_demo
Order: 70
Priority: high
Collapse: true
*/

  piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'template'
    ,'label' => __('Text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 'Lorem'
    ,'template' => 'piklist_demo'
    ,'columns' => 12
    ,'position' => 'start'
  ));
  
  piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'template_add_more'
    ,'add_more' => true
    ,'label' => __('Text')
    ,'description' => __('ipsum dolor sit amet, consectetur adipiscing elit.')
    ,'value' => 'Lorem'
    ,'template' => 'piklist_demo'
    ,'columns' => 8
    ,'position' => 'end'
  ));

  piklist('shared/meta-field-welcome', array(
    'location' => __FILE__
  ));
  
?>


