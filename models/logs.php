<?php

class DB_logs extends DB_Model
{
    var $table = 'logs';
    
    function filter($user_id, $date, $log_level, $message, $start_id, $limit=50)
    {
        $where = array();
        
        if($user_id > 0)
            $where['user_id'] = $user_id;
        
        if($date != '')
            $where[] = "timestamp LIKE '".$date."%'";
            
        if($log_level != '')
            $where['log_level'] = $log_level;
            
        if($message != '')
            $where[] = "message LIKE '%".$message."%'";
            
        if($start_id > 0)
            $where[] = "id < '".$start_id."'";
            
        return $this->sql->SQL_Select($this->table, '*', $where, 'id DESC', $limit);
    }
}