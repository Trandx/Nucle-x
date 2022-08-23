<?

use Illuminate\Support\Facades\DB;

/**
 * Queries class
 */
class Queries extends DB
{
    public function __construct(){
        $this->query="";
    }

    public $query;

    private function stringnify_array_value(Array $arr){
        $str = "";

       foreach ($arr as $value) {
           $str .="$value,";
       }

        $str = substr($str,0,-1);

        return $str;
    }

    function search_into_array_column($tb, String $column, mixed $value){

        $this->query = "SELECT * FROM $tb";

        if(gettype($value) == "array"){

            $i = 1;
            $length = count($value);

            foreach ($value as  $val) {

                $this->query .= "WHERE $column::text LIKE '%$val%' ";

                $this->query .= ($length > $i)?" AND":"";
            }

        }else{
            $this->query .= " WHERE $column::text LIKE '%$value%';";
        }

        return $this;
    }

    public function get(mixed $column = null){

        if($column){

            if(is_array($column)){

                $column = $this->stringnify_array_value($column);

            }

            $this->query = "WITH x as ($this->query) SELECT $column name FROM x";

        }

       return DB::select($this->query);
    }

}
