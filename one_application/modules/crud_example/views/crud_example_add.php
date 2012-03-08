<h2>Add new entry</h2>
<?php

echo validation_errors('<div class="error">','</div>'); 

echo form_open('crud_example/add');
// Form input settings
$data = array(
    'name'        => 'title',
    'id'          => 'title',
    'value'       => set_value('title', ''),
    'maxlength'   => '100',
    'size'        => '50',
    'style'       => '',
    );
// Render input "text" to form.
echo 'Title: ' . form_input($data) . '<br />';

$data = array(
    'name'        => 'content',
    'id'          => 'content',
    'value'       => set_value('content', ''),
    'rows'          => '4',
    'cols'        => '50',
    'style'       => '',
    );
// Render input "textarea" to form.
echo 'Content: <br />';
echo form_textarea($data) . '<br />';

// Render submit button to form
echo form_submit('submit', 'Add');

// Close the Form
echo form_close();
