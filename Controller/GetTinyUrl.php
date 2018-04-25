<?php

/**
  * @category Controller
  * @author Vrushali Kumbhakarna
  * @since 24-04-2018
  * @purpose shorten url
  **/

namespace App\Http\Controllers\Common; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Common\GetTinyUrls as GetTinyUrlsModel;

class GetTinyUrl extends Controller
{
    /**
    * Constructor of class will be used for declarations as well as initialization
    * @author Vrushali Kumbhakarna
    * @since 24-04-2018
    * @param array $request
    */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
    * This function will be used to insert long url and short code into database and return short url
    * @author Vrushali Kumbhakarna
    * @since 24-04-2018
    * @return $response
    */
     public function insert()
     {       
        $_GetTinyUrlsModel = new GetTinyUrlsModel;
        $insert_data = [];
        $url = $this->request->input('url');
        if(isset($url) && !empty($url)){
            $short_code = substr(md5($url.mt_rand()),0,8);
            $insert_data['long_url']= $url;  
            $insert_data['short_url'] = "http://localhost:8088/s/?";
            $insert_data['shortcode'] = $short_code;
            $result = $_GetTinyUrlsModel->insertData($insert_data);
            $response = array(
                    'success' => true,
                    'status_code' => '200',
                    'data' => stripslashes("http://localhost:8088/s/?".$short_code)
                );                
            return response()->json($response);
        }              
    } 
   /**
    * This function will be used to get short url from view and return long url using database
    * @author Vrushali Kumbhakarna
    * @since 24-04-2018
    * @return $result
    */
    public function get()
	{
        $data = $this->request->all();
        $new_data = array_keys($data);  
        if(isset($new_data[0]) && !empty($new_data[0])){
            $_GetTinyUrlsModel = new GetTinyUrlsModel;
            $short_code = $new_data[0];
            $result = $_GetTinyUrlsModel->getData($short_code);            
            return redirect($result[0]->{'long_url'});
        }         
    } 
    
}

?>
