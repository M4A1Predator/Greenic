<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Product_shipment extends MY_Model{
        
        public $table = 'product_shipment';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_product_shipment_by_project_id($project_id, $result_type='object'){
            /*
             *  Get shipment methods by project id
             *
             *  @param  int project id
             *
             */
            
            // Get shipment methods
            // Set where
            $where_assoc = array();
            $where_assoc['product_shipment_project_id'] = $project_id;
            // Set join
            $join_shipment = $this->CI->gnc_query->get_join_table_assoc($this->Shipment->table, 'shipment.shipment_id = product_shipment.product_shipment_shipment_id');
            $join_arr = [$join_shipment];
            
            // Get shipment
            $shipments = $this->get_filter('*', $where_assoc, $join_arr, null, null, null, $result_type);
            
            return $shipments;
        }
        
        function edit_product_shipment($project_id, $shipment_arr){
            $where_assoc = array();
            $where_assoc['product_shipment_project_id'] = $project_id;
            
            // Clear shipments
            $this->CI->db->trans_start();
            $this->remove($where_assoc);
            
            // Commit if shipment is none
            if(!$shipment_arr){
                $this->CI->db->trans_commit();
                return TRUE;
            }
            
            // Add new shipments
            $shipment_data_arr = array();
            foreach($shipment_arr as $shipment_id){
                $shipment_data_arr[] = array(
                                'product_shipment_project_id' => $project_id,
                                'product_shipment_shipment_id' => $shipment_id
                            );
            }
            
            $result = $this->add_multiple($shipment_data_arr);
            
            if(!$result){
                $this->CI->db->trans_rollback();
                return FALSE;
            }
            
            $this->CI->db->trans_commit();
            return TRUE;
            
        }
        
    }