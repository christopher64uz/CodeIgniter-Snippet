<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Custom_LT
 *
 */

class Biz_event extends CI_Model
{
	private $table_event 	= 'biz_event'; // venue table
	private $table_position = 'biz_event_position'; // venue table


	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
	}

	/**
	 * make event staff roster public
	 * @param makePublic boolean
	 * @param event_id INT
	 * @param companycode INT
	 * @return boolean TRUE/FALSE
	 *
	 */
	function make_event_roster_public($CompanyCode,$event_id,$makePublic)
	{
		$this->db->where('biz_id', $CompanyCode);
		$this->db->where('unique_id', $event_id);
		$this->db->set('is_roster_public', $makePublic);
		if($this->db->update( $this->table_event)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	/**
	 * @param CompanyCode int
	 * @param event_id int
	 * @return object query->row
	 */
	function get_position_filled_percent($CompanyCode,$event_id)
	{

		$this->db->select('event_id, SUM(event_position_number_filled)/SUM(event_position_number_req) * 100 as percent');
		$this->db->where('biz_id',$CompanyCode);
		$this->db->where('event_id',$event_id);
		$this->db->group_by('event_id');
		$query = $this->db->get( $this->table_position);
		$row = $query->row();
		if ($query->num_rows() == 1) return $row->percent;
		return 'NODATA';

	}

	/**
	 * @param CompanyCode int
	 * @param start unix timestamp
	 * @param end unix timestamp 
	 *
	 * @return object query->result
	 */
	function get_calendar_view($CompanyCode,$start,$end)
	{
		$base_url = base_url();
		$this->db->select('unique_id as id, event_name as title,event_start_unix as start,event_end_unix as end,CONCAT("'.$base_url.'biz/calendar/edit/",unique_id ) as url');
		$this->db->where('biz_id', $CompanyCode);
		$this->db->order_by('event_start_unix', 'asc');
		$query = $this->db->get($this->table_event);
		if ($query->num_rows() > 0) return $query->result();
		return null;
	}


	/**
	 * Get event details
	 * @param CompanyCode INT
	 * @param event_unique_id INT
	 * @return object query->row
	 *
	 */
	function get_event_detail($event_unique_id,$CompanyCode)
	{
		$this->db->where('biz_id', $CompanyCode);
		$this->db->where('unique_id', $event_unique_id);
		$this->db->order_by('event_name', 'asc');
		$query = $this->db->get($this->table_event);
		if ($query->num_rows() == 1) return $query->row();
		return null;
	}

	/**
	 * Get event details with CompanyCode
	 * @param CompanyCode INT
	 * @param event_unique_id INT
	 * @return object query->row
	 *
	 */
	function get_event_detail_CompanyCode($event_unique_id)
	{
		$this->db->where('unique_id', $event_unique_id);
		$this->db->select('biz_id');
		$query = $this->db->get($this->table_event);
		if ($query->num_rows() == 1) return $query->row();
		return null;
	}

	/**
	 * Get details/venue/uniform info
	 * @param CompanyCode INT
	 * @param event_unique_id INT
	 * @return object query->row
	 *
	 */
	function get_event_venue_uniform_detail($event_unique_id,$CompanyCode,$position_id,$event_position_unique_id)
	{
		$sql = "SELECT t1.event_name,t3.staff_position_name,t2.event_position_start_unix,t2.event_position_end_unix,t4.staff_uniform_name,t1.event_description,t5.venue_name,t5.venue_street_no,t5.venue_address1,t5.venue_address2,t5.venue_city,t5.venue_region,t5.venue_postal,t5.venue_special_directions,t1.attachmentURL,t1.is_roster_public,t1.unique_id as 'event_id',t1.biz_id,t2.event_position_number_req,t2.event_position_number_filled,t1.customer_id
				FROM biz_event as t1 JOIN (biz_event_position as t2, biz_staff_position as t3, biz_staff_uniform as t4,biz_venue as t5)
				ON (t1.biz_id = t2.biz_id AND t1.unique_id = t2.event_id AND t2.position_id = t3.staff_position_id AND t2.biz_id = t3.biz_id AND t1.biz_id = t4.biz_id AND t1.event_staff_uniform = t4.staff_uniform_id AND t1.biz_id = t5.biz_id AND t1.event_venue = t5.unique_id)
				WHERE t1.biz_id='$CompanyCode' AND t1.unique_id='$event_unique_id' AND t2.position_id='$position_id' AND t2.unique_id='$event_position_unique_id'";

		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) return $query->result_array();
		return null;
	}

	/**
	 * Get details/venue/uniform basic info
	 * @param CompanyCode INT
	 * @param event_unique_id INT
	 * @return object query->row
	 *
	 */
	function get_event_venue_uniform_basic($event_unique_id,$CompanyCode)
	{
		$sql = "SELECT t1.event_number, t1.event_name,t1.event_start_unix, t1.event_end_unix, t4.staff_uniform_name,t1.event_description,t5.venue_name,t5.venue_street_no,t5.venue_address1,t5.venue_address2,t5.venue_city,t5.venue_region,t5.venue_postal,t5.venue_special_directions,t1.attachmentURL,t1.is_roster_public,t1.unique_id as 'event_id',t1.biz_id
				FROM biz_event as t1 JOIN (biz_staff_uniform as t4,biz_venue as t5)
				ON (t1.biz_id = t5.biz_id AND t1.event_venue = t5.unique_id AND t1.biz_id = t4.biz_id AND t1.event_staff_uniform = t4.staff_uniform_id)
				WHERE t1.biz_id='$CompanyCode' AND t1.unique_id='$event_unique_id'";

		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) return $query->result_array();
		return null;
	}

	/**
	 * Get event list by companycode
	 * @param CompanyCode INT
	 * @param filter_date UNIX datetime
	 * @return object query->result
	 *
	 */
	function get_event_list($CompanyCode,$filter_date)
	{
		$this->db->select('biz_event.unique_id, biz_event.event_name, biz_event.event_start_unix, biz_event.event_end_unix, biz_venue.venue_name');
		$this->db->where($this->table_event.'.biz_id', $CompanyCode);
		$this->db->where('event_start_unix >'.$filter_date);
		$this->db->order_by('event_start_unix', 'asc');
		$this->db->join('biz_venue', $this->table_event.'.biz_id = biz_venue.biz_id AND '.$this->table_event.'.event_venue = biz_venue.unique_id');
		$query = $this->db->get($this->table_event,25);
		if ($query->num_rows() > 0) return $query->result();
		return null;
	}

	/**
	 * Get event list by companycode & range
	 * @param CompanyCode INT
	 * @param filter_date UNIX datetime
	 * @return object query->result
	 *
	 */
	function get_event_range($CompanyCode,$filter_begin_date,$filter_end_date)
	{
		$this->db->select('biz_event.unique_id, biz_event.event_name, biz_event.event_start_unix, biz_event.event_end_unix, biz_venue.venue_name');
		$this->db->where($this->table_event.'.biz_id', $CompanyCode);
		$this->db->where('event_start_unix >='.$filter_begin_date);
		$this->db->where('event_start_unix <='.$filter_end_date);
		$this->db->order_by('event_start_unix', 'asc');
		$this->db->join('biz_venue', $this->table_event.'.biz_id = biz_venue.biz_id AND '.$this->table_event.'.event_venue = biz_venue.unique_id');
		$query = $this->db->get($this->table_event);
		if ($query->num_rows() > 0) return $query->result();
		return null;
	}

	/**
	 * Is event in Company Code?
	 * @param CompanyCode INT
	 * @param event_unique_id INT
	 * @return object query->result
	 *
	 */
	function is_event_in_company($event_unique_id,$CompanyCode)
	{
		$this->db->where('biz_id', $CompanyCode);
		$this->db->where('unique_id', $event_unique_id);
		$query = $this->db->get($this->table_event);
		if ($query->num_rows() == 1) return TRUE;
		return FALSE;
	}


	/**
	 * add_event_details
	 * @param columns ARRAY
	 * 
	 * @return boolean TRUE/FALSE
	 *
	 */
	function add_event_detail($columns)
	{
		if ($this->db->insert($this->table_event, $columns)) {
			$event_unique_id = $this->db->insert_id();
			return $event_unique_id;
		}
		return NULL;
	}

	/**
	 * Validate if event has staff assigned child
	 * @param CompanyCode INT
	 * @param event_unique_id INT
	 * @return boolean TRUE/FALSE 
	 *
	 */
	function event_has_staff_assigned($CompanyCode,$event_unique_id)
	{
		$this->db->where('biz_id', $CompanyCode);
		$this->db->where('event_id', $event_unique_id);
		$query = $this->db->get('biz_event_request');
		if($query->num_rows() > 0) return TRUE;
		return FALSE;
	}

	/**
	 * delete event details
	 * @param event_unique_id INT
	 * @param CompanyCode INT
	 * @return boolean TRUE/FALSE
	 *
	 */
	function delete_event($event_unique_id,$CompanyCode)
	{
		$this->db->where('biz_id',$CompanyCode);
		$this->db->where('unique_id', $event_unique_id);
		$this->db->delete($this->table_event);
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}


}
/* End of file Biz_event.php */
