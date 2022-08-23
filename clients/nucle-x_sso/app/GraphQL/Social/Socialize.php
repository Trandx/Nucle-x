<?php

namespace App\GraphQL\Social;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use stdClass;

/**
 * Google Authenticated Class
 * @param token token of  first googgle chech page
 * @param social_type
 * @param uri redirection url
 */
class Socialize extends Http
{

    public function __construct(String $social_type, String $token )
    {
        $this->token = $token;
        $this->socialName = $social_type;
        $this->social = config("services.socialize.".$social_type);


        $this->run();


    }

    private $token;

    public $data;

    public $refresh;

    public $expires_in;

    private $social;

    private $socialName;

    private function checkSocialTypeList(){

        if(!in_array($this->socialName, array_keys(config("services.socialize")))){

            $this->data = "$this->socialName is not declareted in a config services";

            return false;

        }else{

            $this->data = [
                "client_id" => $this->social["client_id"],
                "client_secret" =>  $this->social["client_secret"],
            ];

        }
    }

    private function getToken($refresh=false){

        // if (!$refresh) {
        //     $this->data = [
        //         "code" => $this->token ,
        //         "refresh_token" => $this->refresh,
        //         "grant_type" => "refresh_token",
        //     ];

        // } else {


        // }

        $this->data = array_merge(
            $this->data,
            [
                "code" => $this->token ,
                "redirect_uri" => $this->social["redirect"], //oauth2.example.com/code&

            ]);

        if(strtolower($this->socialName) == "google"){

            $this->data["grant_type"] = "authorization_code";

        }



        $this->data = Http::asForm()->post($this->social["token_url"], $this->data);

        //$this->data = Http::post($this->social["token_url"], $this->data);
        //access_token expires_in refresh_token scope token_type


        return $this;
    }

    private function getUserInfo(){

        // $this->data = Http::withHeaders([
        //     "Authorization" => "Bearer ".$this->data['access_token'],
        // ])->get(env("GOOGLE_URL_USERINFO"));

        if($this->socialName == "facebook"){
            $param = [
                "fields" => "id,name,email,picture,first_name,last_name,middle_name,name_format,short_name",
            ];
        }

        $this->data = Http::withToken($this->data['access_token'])->get($this->social["userinfo_url"], $param??null);

        return $this;
    }

    private function refreshToken($refresh){

        $this->refresh = $refresh;

        $this->getToken(true);

        return $this;
    }

    private function run(){

        if(!$this->checkSocialTypeList()){

            $this->getToken();

            if($this->data->successful()){

                //$this->refresh = $this->data->body()["refresh_token"]??null;

                //$this->expires_in = $this->data->body()["expires_in"]??null;

                $this->getUserInfo();
            }
        }

    }

    public function data(){

        return $this->data;

    }

    public function authenticated(){

        if(method_exists($this->data, "successful") and $this->data->successful()){

            return true;

        }else{
            return false;
        }

    }

    public function error(){
        return $this->data;
    }

    public function status(){

        if(method_exists($this->data, "status") and $this->data->status()){

            return $this->data->status();

           }else{
               return Response::HTTP_BAD_GATEWAY;
           }

    }

    public function body(){
        return  $this->data->body();
    }

    public function json(){
        return  $this->data->json();
    }

    public function object(){
        return  $this->data->object() ;
    }

    private function formateData(){

        $data = $this->object();

        $filed_keys = [
            "social_id",
            "pseudo" ,
            "email",
            "first_name" ,
            "last_name",
            "avatar" ,
        ];

        $filed_vals =  [
            substr($this->socialName, 0,2)."_".$data->id,
            $data->name,
            $data->email??"",
        ];

        if(strtolower($this->socialName) == "google"){
            $filed_vals =  array_merge($filed_vals, [
                $data->given_name,
                $data->family_name,
                $data->picture,
            ]);
        }elseif (strtolower($this->socialName) == "facebook") {

            $filed_vals = array_merge($filed_vals, [
                $data->first_name,
                $data->last_name,
                $data->picture->data->url,
            ]);
        }

        return (object)array_combine($filed_keys,$filed_vals);
    }

    public function user()
    {

      return  $this->authenticated()? $this->formateData(): false;
    }

    public function getpseudo(){
        return $this->formateData()->pseudo;
    }

    public function getFirstName(){
        return $this->formateData()->first_name;
    }

    public function getLastName(){
        return $this->formateData()->last_name;
    }

    public function getEmail(){
        return $this->formateData()->email;
    }

    public function getAvatar(){
        return $this->formateData()->avatar;
    }

    public function getSocialId(){
        return $this->formateData()->social_id ;
    }


}

