<?php
function DB($table,$pk='id'){
    return new class($table,$pk) extends mysqli{
        private $table,$pk;
        public function __construct($table,$pk)
        {
            parent::__construct('localhost','root','','catering');
            $this->table=$table;
            $this->pk=$pk;
            
        }
        public function save(array|object $data,$id=null){
            $sql="insert into $this->table set ";
            $wh="";
            if($id){
                $sql="update $this->table set ";
                $wh="where $this->pk=$id";
            }
            foreach($data as $colname=>$value){
                $sql.="$colname='$value',";
            }
            echo $sql=substr($sql,0,-1).$wh;//, htane k liye
            if($this->query($sql)){
                return $id??$this->insert_id;
            }
        }
        public function all($cols="*",$order=""){ //this query all data in database attech in form menu
            if(!$order){
                $order="$this->pk desc";
            }
            $sql="select $cols from $this->table order by $order";
            return $this->query($sql)?->fetch_all(MYSQLI_ASSOC);
        }
        public function find($id,$cols="*"){//this function use for all data fill during edit menu
           
            $sql="select $cols from $this->table where $this->pk=$id";
            return $this->query($sql)?->fetch_assoc();
        }
        public function delete($ids){
            $sql="delete from $this->table where $this->pk in($ids)";
            return $this->query($sql);
        }
    };
}

?>