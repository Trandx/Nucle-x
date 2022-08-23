<?php
    namespace App\GraphQL\Queries\Traits;
/**
 * By Trandx
 *
 * this methods help us to paginate data
 */
trait PaginateTrait
{
    public function paginate($page = 1, $limit = 2, $query){

        (!$page && $page<=0)?$page =1: false;

        (!$limit && $limit<=0)?$limit =15: false;

        $total = $query->count();

        $pages = ceil($total/$limit);

        $totalPerPage = ($limit >= $total)? $total: ( ($page < $pages)?$limit:($total-($pages-1)*$limit) );

        $datas["pagination"] = [
            "count" => $total,
            "total" => $totalPerPage,
            "perPage" => $limit,
            "lastPage" => $pages,
            "firstPage" => 1,
            "currentPage" => $page,
            "hasMorePage" => ($page<$pages)?true:false,
        ];

    // }
        $datas["data"] = $query->skip(($page-1)*$limit)->take($limit)->get();

        return $datas;
    }
}
