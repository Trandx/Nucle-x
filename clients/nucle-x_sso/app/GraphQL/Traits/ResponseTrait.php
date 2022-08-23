<?php


namespace App\GraphQL\Traits;

use Illuminate\Http\Response;

    /**
     * this trait is creating to manage somes Errors
     */
    trait ResponseTrait
    {
        /**
         *
         * @param string $__typename the name of response data type
         * @param bool $status the response status
         * @param int $code the response status code
         * @param  $data the response datas
         * @return array
         **/
        public function success(String $__typename, $data,Int $code = Response::HTTP_OK, Bool $status = true): Array
        {
            $resp["__typename"] = $__typename;
            $resp["status"] = $status;
            $resp["code"] = $code;
            $resp["data"] = $data;

            return $resp;
        }


         /**
         *
         * @param string $__typename the name of response data type
         * @param bool $status the response status
         * @param int $code the response status code
         * @param  $message the response message
         * @return array
         **/

        public function errors(String $__typename, $message,Int $code = Response::HTTP_NOT_FOUND, Bool $status = false):Array{

            // $args = func_get_args();

            // foreach ($args as $key => $value) {
            //    $resp[$key] = $value;
            // }

            $resp["__typename"] = $__typename;
            $resp["status"] = $status;
            $resp["code"] = $code;
            $resp["message"] = $message;

            return $resp;


        }


    }
