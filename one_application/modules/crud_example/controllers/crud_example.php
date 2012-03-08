<?php

/**
  * This is an EXAMPLE of how one can use the CRUD model.
  * This is not meant to be used in a production environment!
  * There is little to no validation/sanitation done here.  It is not
  * meant to be a fully functional system, just highlight some of the
  * usages of the CRUD model in an every day application.
  *
  * BEFORE YOU USE THIS:
  * Before you use this example you must already have CI setup and install
  * on a web server AND you must have a working connection to a database
  * already setup for CI.  CI must be configured to connect to this database
  * and a database needs to exist. (it should be an empty database to prevent
  * destruction of data.)
  */

/**
 * crud_example 
 * 
 * @uses CI_Controller
 * @package CRUD 
 * @copyright Copyright (c) 2011, Matthew Craig
 * @author Matthew Craig <matt@taggedzi.com> 
 */
class Crud_example extends MX_Controller
{
    
    /**
     * __construct 
     * 
     * @access protected
     * @return void
     */
    function __construct()
    {
        parent::__construct();
        // Just in case the Database is not called in the config
        $this->load->database();
        
        // Load the URL helper so redirects work.
        $this->load->helper('url');

        // this is used for the CRUD
        $this->load->model('crud');
        $this->crud->use_table('crud_example');
        
        // Enable the output profiler so you can see the db queries run.
        $this->output->enable_profiler(TRUE);
    }

    /**
     * build_table 
     * 
     * This method builds a table in the database for the example code.
     *
     * @access private
     * @return void
     */
    private function build_table()
    {
        $this->load->dbforge();
        // Build the field types
        $fields = array(
                'id' => array(
                    'type' => 'INT', 
                    'constraint' => 12, 
                    'unsigned' => TRUE, 
                    'auto_increment' => TRUE), 
                'date' => array(
                    'type' => 'INT', 
                    'constraint' => 12, 
                    'null' => FALSE, 
                    'unsigned' => TRUE), 
                'title' => array(
                    'type' => 'VARCHAR', 
                    'constraint' => '100', 
                    'null' => FALSE), 
                'content' => array(
                    'type' => 'TEXT', 
                    'null' => TRUE));
        // Assemble all the fields
        $this->dbforge->add_field($fields, TRUE);
        // This creates the pirmary key of fileID
        $this->dbforge->add_key('id', TRUE);
        // This creates the speicified table with the IF NOT EXIST parameter
        $this->dbforge->create_table('crud_example');
        redirect('crud_example/index/');
    }

    /**
     * _unique_title 
     * 
     * This is a callback function for the form validation library. It checks
     * to make sure that a title is unique before saving a NEW entry.
     *
     * @param string $new_title 
     * @access public
     * @return boolean
     */
    public function _unique_title($new_title = '')
    {
        // set the search criteria
        $criteria = array('title' => $new_title);
        // Check to see if the criteria is unique.
        if($this->crud->is_entry_unique($criteria)) 
        {
            return TRUE;
        }
        else 
        {
            $this->form_validation->set_message('_unique_title', 'The title you have chosen is already used.');
            return FALSE;
        }
    }

    /**
     * _unique_title_edit 
     * 
     * This is a callback function for the form validation library.  It tests
     * to see if an edited title is unique.
     *
     * @param string $new_title 
     * @access public
     * @return void
     */
    public function _unique_title_edit($new_title = '')
    {
        // the "id" is added via a hidden field in the form
        // this is used to prevent it failing because of its original name, by 
        // excluding itself from the search.
        $id = $this->input->post('id');

        // Set the search criteria
        $criteria = array('id !=' => $id, 'title' => $new_title);

        // Test to see if it is unique.
        if($this->crud->is_entry_unique($criteria)) 
        {
            return TRUE;
        }
        else 
        {
            $this->form_validation->set_message('_unique_title_edit', 'The title you have chosen is already used.');
            return FALSE;
        }
    }

    
    /**
     * index  
     * 
     * This is the "main" page for the crud example.
     *
     * @param int $page 
     * @access public
     * @return void
     */
    public function index($page = 0)
    {
        // See if we need to "install" the table
        if (!$this->db->table_exists('crud_example'))
        {
            $this->build_table(); 
        }

        // Example on using pagination with CRUD
        $this->load->library('pagination');
        $config['base_url']   = site_url('crud_example/index/') ;
        $config['total_rows'] = $this->crud->count_all();
        $config['per_page']   = '4';    // if you change this you must also change the crud call below.
        $this->pagination->initialize($config); 
        $display['pagination'] = $this->pagination->create_links();

        // Get the list of Items from the DB
        $criteria = array('id !=' => 0);    // Any entry that has an ID not equal to zero. 
        $order_by = array('id' => 'ASC');   // order by id asscending
        $query = $this->crud->retrieve($criteria, 4, $page, $order_by);

        // Handle the results like any other CI Database query.
        if ($query->num_rows() > 0) 
        {
            // Build a basic table with the data using CI's table class.
            $this->load->library('table');
            $tmpl = array(
                        'row_start' => '<tr class="odd">',
                        'row_alt_start' => '<tr class="even">');
            $this->table->set_template($tmpl);
            $this->table->set_heading('ID','Date','Title','Options'); 

            // add each of the results to the table
            foreach($query->result() as $entry)
            {
                $this->table->add_row(
                        $entry->id, 
                        date('r', $entry->date), 
                        $entry->title, 
                        anchor('crud_example/edit/'.$entry->id,'Edit') . ' | ' . anchor('crud_example/delete/'.$entry->id,'Delete') . 
                        ' | ' . anchor('crud_example/display/'.$entry->title, 'View'));
            }

            // Build the visible content.
            $display['content'] = $this->table->generate();
        }
        else 
        {
            // There is no content tell the user to build some.
            $display['content'] = 'The table is empty. Please add some content.';
        }

        // Display the final results.
        $this->load->view('crud_example', $display);
    }

    /**
     * add 
     * 
     * This method is used to ADD a new entry to the database using CRUD.
     *
     * @access public
     * @return void
     */
    public function add()
    {
        // Load Helpers as needed.
        $this->load->helper(array('form', 'url'));
        // Load Libraries as needed.
        $this->load->library('form_validation');
        
        // Rules Here
        $this->form_validation->set_rules('title', 'Title', 'required|max_length[100]|alpha_dash|callback__unique_title');
        $this->form_validation->set_rules('content', 'Content', 'required|min_length[3]');
        
        // Check to see if form passed validation rules
        if ($this->form_validation->run() == FALSE)
        {
            // Load the form as a var 
            $display['content'] = $this->load->view('crud_example_add', '', TRUE);

            // Display the page
            $this->load->view('crud_example', $display);
        } 
        else
        {
            // If the form passed validation
            $database = array(
                    'date'    => time(),
                    'title'   => $this->input->post('title'),
                    'content' => $this->input->post('content')
                    );
            $this->crud->create($database);
            // Return to the index.
            redirect('crud_example/index');
        }
    }

    /**
     * edit 
     * 
     * This method is used to edit an existing entry from the database
     * using CRUD.
     *
     * @param int $id 
     * @access public
     * @return void
     */
    public function edit($id = 0)
    {
        // Basic sanity check... make sure id is an integer.
        settype($id, 'integer');

        // Load Helpers as needed.
        $this->load->helper(array('form', 'url'));
        // Load Libraries as needed.
        $this->load->library('form_validation');
        
        // Check to see if this was submitted...
        if($this->input->post('submit') !== FALSE)
        {
            // Rules Here
            $this->form_validation->set_rules('id', 'ID', 'required|is_natural_no_zero');
            $this->form_validation->set_rules('title', 'Title', 'required|max_length[100]|callback__unique_title_edit');
            $this->form_validation->set_rules('content', 'Content', 'required|min_length[3]');
            
            // Check to see if form passed validation rules
            if ($this->form_validation->run() == FALSE)
            {
                // Load the form
                $form['id'] = $id;
                $form['date'] = $this->input->post('date');
                $display['content'] = $this->load->view('crud_example_edit',$form, TRUE);
                $this->load->view('crud_example', $display);
            } else    {

                // If the form passed validation
                $criteria = array('id' => $this->input->post('id'));

                // Setup the data to be "edited" for the entry.
                $database = array(
                                'title' => $this->input->post('title'),
                                'content' => $this->input->post('content')
                            );

                // Run the update... MAKE SURE you set the limit, or it is possible to 
                // update more than one entry at a time. (This may be desired at times,
                // but not in this case.
                $this->crud->update($criteria, $database, 1); // limit the update to 1 entry.

                // We are done updating, return to the index.
                redirect('crud_example/index/');
            }
        }
        else
        {
            // This is our first time through...

            // Setup the criteria to get the entry we want to edit.
            $criteria = array('id' => $id);

            // run the query.
            $query = $this->crud->retrieve($criteria, 1);  // get the id with a limit of 1

            // process the query like a normal CI Query.
            if ($query->num_rows() > 0) {
                $row             = $query->row();
                $form['id']      = $row->id;
                $form['date']    = date('r',$row->date);
                $form['title']   = $row->title;
                $form['content'] = $row->content;

                // Save the form as "content"
                $display['content'] = $this->load->view('crud_example_edit', $form, TRUE);
            } 
            else 
            {
                // if we couldn't find the id... tell them there was a problem.
                $display['content'] = 'We were unable to locate the page you indicated to edit.';
            }

            // Display the final output.
            $this->load->view('crud_example',$display);
        }
    }

    /**
     * delete 
     * 
     * This method deletes an entry from the database.
     *
     * NOTE: You should NEVER setup a delete function like this on a production
     * environment.  This is susceptible to several forms of attack. This is 
     * a demonstration of how to use crud... not how to secure your server.
     *
     * @param int $id 
     * @access public
     * @return void
     */
    public function delete($id = 0)
    {
        // Basic Sanity Check.  Make sure ID is at least an integer.
        settype($id, 'integer');

        // Setup the critieria used to delete.
        $criteria = array('id' => $id);

        // Delete the entry... MAKE SURE you set a LIMIT, or it can delete more than one entry.
        $this->crud->delete($criteria, 1);  // Limit the deletion to 1 Entry

        // We are done deleting, redirect to the index.
        redirect('crud_example/index/');
    }

    /**
     * display 
     * 
     * This method is a quick and dirty way to retrieve data for display using CRUD.
     * Normally you would want to perform some type of validation/sanitation on the input.
     * However this is a demonstration of how to use CRUD not how to secure your server.
     * 
     * @param string $title 
     * @access public
     * @return void
     */
    public function display($title = '')
    {
        // Setup the criteria
        $criteria = array('title' => $title);

        // Perform the Query
        $query = $this->crud->retrieve($criteria, 1);
        
        // Process the results.
        if ($query->num_rows() > 0) {
            $entry = $query->row_array();
            $display['date'] = date('r', $entry['date']);
            $display['title'] = $entry['title'];
            $display['content'] = $entry['content'];
        } 
        else
        {
            $display['date'] = date('r');
            $display['title'] = 'Post not found';
            $display['content'] = 'We were unable to locate the post you requested.';
        }

        // Display the data.
        $this->load->view('crud_example_display', $display);
    }
}

/* End of file crud_example.php */
/* Location: ./system/application/controllers/crud_example.php */
