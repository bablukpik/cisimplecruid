<?php
 
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by user_id
     */
    function get_user($user_id)
    {
        return $this->db->get_where('user',array('user_id'=>$user_id))->row_array();
    }
    
    /*
     * Get all user
     */
    function get_all_user()
    {
        return $this->db->get('user')->result_array();
    }
    
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        $response = $this->db->update('user',$params);
        if($response)
        {
            return "user updated successfully";
        }
        else
        {
            return "Error occuring while updating user";
        }
    }
    
    /*
     * function to delete user
     */
    function delete_user($user_id)
    {
        $response = $this->db->delete('user',array('user_id'=>$user_id));
        if($response)
        {
            return "user deleted successfully";
        }
        else
        {
            return "Error occuring while deleting user";
        }
    }
}
