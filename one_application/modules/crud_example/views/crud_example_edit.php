<h2>Edit entry</h2>
<?php

echo validation_errors('<div class="error">','</div>'); 

echo form_open('crud_example/edit/' . $id);

$data = array(
    'id'  => $id
);
echo form_hidden($data);

// Form input settings
$data = array(
    'name'        => 'date',
    'id'          => 'date',
    'value'       => set_value('date', $date),
    'maxlength'   => '100',
    'size'        => '50',
    'readonly'    => 'readonly',
    );
// Render input "text" to form.
echo 'Date: '. form_input($data) . '<br />';

// Form input settings
if (!isset($title)) { $title = ''; }
$data = array(
    'name'        => 'title',
    'id'          => 'title',
    'value'       => set_value('title', $title),
    'maxlength'   => '100',
    'size'        => '50',
    'style'       => '',
    );
// Render input "text" to form.
echo 'Title: ' . form_input($data) . '<br />';

if(!isset($content)) { $content = ''; } 
$data = array(
    'name'        => 'content',
    'id'          => 'content',
    'value'       => set_value('content', $content),
    'rows'          => '4',
    'cols'        => '50',
    'style'       => '',
    );
// Render input "textarea" to form.
echo 'Content: <br />';
echo form_textarea($data) . '<br />';

// Render submit button to form
echo form_submit('submit', 'Update');

// Close the Form
echo form_close();
