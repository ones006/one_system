<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Copyright (c) 2011, Matthew Craig
All rights reserved.

This license is a legal agreement between you and Matthew Craig for the use 
of this Validation Class (the "Software"). By obtaining the Software you 
agree to comply with the terms and conditions of this license.

Permitted Use

You are permitted to use, copy, modify, and distribute the Software and its 
documentation, with or without modification, for any purpose, provided that 
the following conditions are met:

   1. A copy of this license agreement must be included with the distribution.
   2. Redistributions of source code must retain the above copyright notice 
        in all source code files.
   3. Redistributions in binary form must reproduce the above copyright notice 
        in the documentation and/or other materials provided with the 
        distribution.
   4. Any files that have been modified must carry notices stating the nature 
        of the change and the names of those who changed them.
   5. Products derived from the Software must include an acknowledgment that 
        they are derived from the "Software" in their documentation and/or 
        other materials provided with the distribution.

Indemnity

You agree to indemnify and hold harmless the authors of the Software and any 
contributors for any direct, indirect, incidental, or consequential 
third-party claims, actions or suits, as well as any related expenses, 
liabilities, damages, settlements or fees arising from your use or misuse of 
the Software, or a violation of any terms of this license.

Disclaimer of Warranty

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR 
IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE, 
NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.

Limitations of Liability

YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE. 
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE 
FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION 
WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE 
APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING 
BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF 
DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
*/

/**
 * Crud 
 * 
 * @uses CI_Model
 * @package CRUD for Codeigniter 
 * @copyright Copyright (c) 2011, Matthew Craig
 * @author Matthew Craig <matt@taggedzi.com> 
 */
class Crud extends CI_Model {

    /**
     *  VERIFY_FIELD_NAMES
     *
     *  This toggles the verification of field names before 
     *  data is run through the database. (Set to FALSE to disable) 
     *
     *  @var boolean
     */
    const VERIFY_FIELD_NAMES = TRUE;
    
    /**
     * table_name 
     * 
     * @var string 
     * @access private
     */
    private $table_name;

    /**
     * failed_field  
     * 
     * @var string
     * @access public
     */
    var $failed_field;

    /**
     * field_list  
     * 
     * @var array
     * @access private
     */
    private $field_list;

    /**
     * __construct 
     * 
     * @access protected
     * @return void
     */
    function __construct() 
    {
        // Call the parent Model
        parent::__construct();
        
        // Load the Database Module REQUIRED for this to work.
        $this->load->database();

        // Do not change these they are simply class variables to use by methods.
        $this->table_name   = ''; // Name of the DB to use
        $this->failed_field = ''; // Name of any field that did not seem to be legitimate
        $this->field_list   = ''; // List of field names.
        
        // Logging
        log_message('debug', 'Model: Crud; Initialized.');
    }

    /**
     * use_table
     *
     * This function is required inorder to select a table Before anything else.
     *
     * @param	string		$table_name	The name of the table to select for crud operations
     * @access  public
     * @return	boolean		True if successful / False on failure
     */
    public function use_table($table_name = '') 
    {
        // Verify a table name was passed
        if (!empty($table_name)) 
        {
            // check to see if the table exists
            if ($this->db->table_exists($table_name)) 
            {

                // if table exists... set it as a variable
                $this->table_name = $table_name;

                // This is used to confirm field entries. Only ask if used... save a db query and system resources.
                if (self::VERIFY_FIELD_NAMES) 
                {
                    $this->field_list = $this->db->list_fields($this->table_name);
                }

                log_message('debug', 'Model: Crud; Method: use_table($table_name); Table "' . $table_name . '" selected.');
                return TRUE;
            } 
            else 
            {
                // if table name does not exist...
                log_message('error', 'Model: Crud; Method: use_table($table_name); Specified table does not exist.');
                return FALSE;
            }
        } 
        else 
        {
            // if they did not pass a table name
            log_message('error', 'Model: Crud; Method: use_table($table_name); Paramater not set.');
            return FALSE;
        }
    }

    /**
     * confirm_keys
     *
     * This method checks to ensure that keys used in array are actually fields
     * in the database table.
     *
     * @param   array   $data_array     This is a keyed array who's keys are supposed to be database field names.
     * @access  public
     * @return  boolean True if all fields passed / False if fields failed.
     */
    private function confirm_keys($data_array = '') 
    {
        // make sure the table has been selected.
        if (empty($this->table_name)) 
        {
            log_message('error', 'Model: Crud; Method:confirm_keys($data_array); Required to use_table before using functions.');
            return FALSE;
        }

        // Verify an array has been sent
        if (is_array($data_array)) 
        {
            // Go through each item
            foreach ($data_array as $potential_field => $value) 
            {
                // Check to see if the potential is in the list of known field names
                if (!in_array($potential_field, $this->field_list)) 
                {
                    // if not in the array... log the error if debug says so
                    log_message('debug', 'Model: Crud; Method: confirm_keys($data_array); Value "' . $potential_field . '" not a table field.');
                    // save the name of the failed field
                    $this->failed_field = $potential_field;
                    return FALSE;
                }
            }
            // If we made it here all fields must be true...
            return TRUE;
        } 
        else 
        {
            // log the error that data_array was not an array
            log_message('error', 'Model: Crud; Method: confirm_keys($data_array); Parameter not set.');
        }
    }

    /**
     * create 
     *
     * This function creates an entry based on $data_in
     *
     * @param   array    $data_in       A keyed array of criteria key = field name, value = value
     * @access  public
     * @return  boolean  True if successful / False if not
     */
    public function create($data_in = '') 
    {
        // Verify they input an array of data on insert
        if (is_array($data_in)) 
        {
            // Make sure they have already set the table
            if (!empty($this->table_name)) 
            {
                $this->db->from($this->table_name);
            } 
            else 
            {
                log_message('error', 'Model: Crud; Method: create($data_in); Required to select_table before using functions.');
                return FALSE;
            }

            // If requested, make sure the keys match the fields
            if (self::VERIFY_FIELD_NAMES) 
            {
                if (!$this->confirm_keys($data_in)) 
                {
                    log_message('error', 'Model: Crud; Method: create($data_in); Key in array does not match field name in database.');
                    return FALSE;
                }
            }

            // insert the data!
            if ($this->db->insert($this->table_name, $data_in) !== FALSE) 
            {
                log_message('debug', 'Model: Crud; Method: create($data_in); Data successfully inserted.');
                return TRUE;
            } 
            else 
            {
                log_message('error', 'Model: Crud; Method: create($data_in); Unable to insert data.');
                return FALSE;
            }
        } 
        else 
        {
            log_message('error', 'Model: Crud; Method: create($data_in); Paramater not set.');
            return FALSE;
        }
    }

    /**
     * retrieve
     *
     * This function retrieves a series of db entries based on criteria.
     *
     * @param   array   $criteria       A keyed array of criteria key = field name, value = value, key may also contain comparators (=, !=, >, etc..)
     * @param   int     $limit          The max number of entries to grab (0 = no limit)
     * @param   int     $offset         What record number to start grabbing (useful for pagination)
     * @param   array   $order          A keyed array of "order commands" telling how to sort key = field name, value = direction (asc, desc, random)
     * @access  public
     * @return  mixed   Return Object of results on success, Boolean False on failure
     */
    public function retrieve($criteria = '', $limit = 0, $offset = 0, $order = '') 
    {
        // verify the table we are drawing from has been set.
        if (!empty($this->table_name)) 
        {
            $this->db->from($this->table_name);
        } 
        else 
        {
            // If the table has not been set... we cannot
            log_message('error', 'Model: Crud; Method: retrieve($criteria, $limit, $offset, $order); Required to select_table before using functions.');
            return FALSE;
        }

        // Verify an array has been passed.
        if (is_array($criteria)) 
        {

            if (is_array($order)) 
            {
                foreach ($order as $order_by => $direction) 
                {
                    $this->db->order_by($order_by, $direction);
                }
                unset($order_by, $direction);
            }

            if (!empty($limit)) 
            {
                if (!empty($offset)) 
                {
                    $this->db->limit($limit, $offset);
                } 
                else 
                {
                    $this->db->limit($limit);
                }
            }

            $this->db->where($criteria);
            return $this->db->get();

        } 
        else 
        {
            log_message('error', 'Model: Crud; Method: retrieve($criteria, $limit, $offset, $order); Required parameter not set.');
            return FALSE;
        }
    }

    /**
     * update
     *
     * This function updates entries that meet the listed criteria with the input data.
     *
     * @param   array   $criteria    A keyed array with the criteria for selecting what entries to edit.
     * @param   array   $data_in     A keyed array with the data to insert (key = db field name, value = value to insert)
     * @param   int     $limit       The max number of entries to grab (0 = no limit)
     * @param   int     $offset      What record number to start grabbing (useful for pagination)
     * @param   array   $order       A keyed array of "order commands" telling how to sort key = field name, value = direction (asc, desc, random)
     * @access  public
     * @return  mixed   Return Object of results on success, Boolean False on failure
     */
    public function update($criteria = '', $data_in = '', $limit = 0, $offset = 0, $order = '') 
    {
        // verify the table we are drawing from has been set.
        if (empty($this->table_name)) 
        {
            // If the table has not been set... we cannot
            log_message('error', 'Model: Crud; Method:  update ($criteria, $data_in); Required to select_table before using functions.');
            return FALSE;
        }

        if (is_array($criteria) && is_array($data_in)) 
        {
            // if an order has been specified... use it.
            if (is_array($order)) 
            {
                foreach ($order as $order_by => $direction) 
                {
                    $this->db->order_by($order_by, $direction);
                }
                unset($order_by, $direction);
            }

            // if a limit has been placed enforce it...
            if (!empty($limit)) 
            {
                // if an offset has been placed... enforce it.
                if (!empty($offest)) 
                {
                    $this->db->limit($limit, $offest);
                } 
                else 
                {
                    $this->db->limit($limit);
                }
            }

            // If requested, make sure the keys match the fields
            if (self::VERIFY_FIELD_NAMES) 
            {
                if (!$this->confirm_keys($data_in)) 
                {
                    log_message('error', 'Model: Crud; Method:  update ($criteria, $data_in); Key in array does not match field name in database.');
                    return FALSE;
                }
            }

            // Set the Criteria
            $this->db->where($criteria);
            // Returns false on problem, or object on success.
            return $this->db->update($this->table_name, $data_in);
        } 
        else 
        {
            log_message('error', 'Model: Crud; Method: update ($criteria, $data_in); Required parameter not set.');
            return FALSE;
        }
    }

    /**
     * delete
     *
     * This function deletes entries based on criteria input.
     * 
     * @param   array   $criteria     A keyed array with the critera for selecting what entries to delete.
     * @param   int     $limit        The max number of entries to grab (0 = no limit)
     * @param   int     $offset       What record number to start grabbing (useful for pagination)
     * @param   array   $order        A keyed array of "order commands" telling how to sort key = field name, value = direction (asc, desc, random)
     * @access  public
     * @return  mixed   Return Object of resutls on success, Boolean False on failure
     */
    public function delete($criteria = '', $limit = 0, $offset = 0, $order = '') 
    {
        // verify the table we are drawing from has been set.
        if (empty($this->table_name)) 
        {
            // If the table has not been set... we cannot
            log_message('error', 'Model: Crud; Method:  delete ($criteria, $limit, $offset, $order); Required to select_table before using functions.');
            return FALSE;
        }

        if (is_array($criteria)) 
        {

            // if an order has been specified... use it.
            if (is_array($order)) 
            {
                foreach ($order as $order_by => $direction) 
                {
                    $this->db->order_by($order_by, $direction);
                }
                unset($order_by, $direction);
            }

            // if a limit has been placed enforce it...
            if (!empty($limit)) 
            {
                // if an offset has been placed... enforce it.
                if (!empty($offset)) 
                {
                    $this->db->limit($limit, $offset);
                } 
                else 
                {
                    $this->db->limit($limit);
                }
            }

            // If requested, make sure the keys match the fields
            if (self::VERIFY_FIELD_NAMES) 
            {
                if (!$this->confirm_keys($criteria)) 
                {
                    log_message('error', 'Model: Crud; Method:  delete ($criteria, $limit, $offset, $order); Key in array does not match field name in database.');
                    return FALSE;
                }
            }

            // Set the Criteria
            $this->db->where($criteria);

            // Returns false on problem, or object on success.
            return $this->db->delete($this->table_name);
        } 
        else 
        {
            log_message('error', 'Model: Crud; Method: delete ($criteria, $limit, $offset, $order); Required parameter not set.');
            return FALSE;
        }
    }

    /**
     * function count_all()
     *
     * This function simply counts ALL entries in the selected DB.
     *
     * @access  public
     * @return  Mixed   Return Integer of resutls on success, Boolean False on failure
     */
    public function count_all() 
    {
        // verify the table we are drawing from has been set.
        if (empty($this->table_name)) 
        {
            // If the table has not been set... we cannot
            log_message('error', 'Model: Crud; Method: count(); Required to select_table before using functions.');
            return FALSE;
        }
        return $this->db->count_all($this->table_name);
    }

    /**
     * count_results
     *
     * This function simply counts ALL entries in the selected DB with a given criteria.
     *
     * @param   array   $criteria    A keyed array with the critera for selecting what entries to edit.
     * @access  public
     * @return  Mixed   Return Integer of resutls on success, Boolean False on failure
     */
    public function count_results($criteria) 
    {
        // verify the table we are drawing from has been set.
        if (empty($this->table_name)) 
        {
            // If the table has not been set... we cannot
            log_message('error', 'Model: Crud; Method: count_results($criteria); Required to select_table before using functions.');
            return FALSE;
        }

        $this->db->where($criteria);
        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }

    /**
     * is_entry_unique
     *
     * This function checks to see if an entry exists in the database matching the given criteria.
     *
     * @param   array   $criteria    A keyed array with the critera for selecting what entries to edit.
     * @access  public
     * @return  boolean Return Boolean TRUE if no match was found (aka it is unique). FALSE if a match is found (aka it is not unique)
     */
    public function is_entry_unique($criteria = '') 
    {
        // verify the table we are drawing from has been set.
        if (empty($this->table_name)) 
        {
            // If the table has not been set... we cannot
            log_message('error', 'Model: Crud; Method: is_entry_unique($criteria); Required to select_table before using functions.');
            return FALSE;
        }

        $result = $this->retrieve($criteria);
        
        if ($result !== FALSE) 
        {
            if ($result->num_rows() > 0) 
            {
                return FALSE;
            } 
            else 
            {
                return TRUE;
            }
        } 
        else 
        {
            log_message('debug', 'Model: Crud; Method: is_entry_unique($criteria); Error in retrieving criteria.');
            return FALSE;
        }
    }
}

/* End of file crud.php */
/* Location: ./system/application/models/crud.php */
