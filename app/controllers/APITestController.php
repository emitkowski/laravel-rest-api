<?php


class APITestController extends BaseController {



    public function index()
    {


        /*********** Create Request **************/
        $curl = curl_init();

        // Set Params
        $params = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@doe.com',
            'address' =>  '123 Main Street',
            'address2' =>  'Apt 1',
            'city' =>  'Denver',
            'state' =>  'CO',
            'zip' => '90111',
            'phone' => '555-555-5555'
        );

        $params = '?' . http_build_query($params);

        // Set curl opts
        curl_setopt_array($curl, array(
            CURLOPT_HTTPHEADER => array(
                'x-api-key: o5Sp1HvhwVLI96IjdTqE6cfZR2RfWYyJ',
                'Content-Type: application/json'
            ),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://laravelapi/api/v1/customers' . $params

        ));

        $response = curl_exec($curl);
        print_r($response.'<br><br>');

        $customer = json_decode($response);
        $customer_id = $customer->customer->id;

        curl_close($curl);



        /*********** Update Request **************/
        $curl = curl_init();

        // Set Params
        $params = array(
            'first_name' => 'James',
            'last_name' => 'Tester',
            'email' => 'james@tester.com'
        );

        $params = '?' . http_build_query($params);

        // Set curl opts
        curl_setopt_array($curl, array(
            CURLOPT_HTTPHEADER => array(
                'x-api-key: o5Sp1HvhwVLI96IjdTqE6cfZR2RfWYyJ',
                'Content-Type: application/json'
            ),
            CURLOPT_CUSTOMREQUEST => 'PATCH',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://laravelapi/api/v1/customers/' . $customer_id . '/'. $params

        ));

        $response = curl_exec($curl);
        print_r($response.'<br><br>');
        curl_close($curl);






        /***********  Delete Request **************/
        $curl = curl_init();

        // Set curl opts
        curl_setopt_array($curl, array(
            CURLOPT_HTTPHEADER => array(
                'x-api-key: o5Sp1HvhwVLI96IjdTqE6cfZR2RfWYyJ',
                'Content-Type: application/json'
            ),
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://laravelapi/api/v1/customers/'. $customer_id

        ));


        $response = curl_exec($curl);
        print_r($response.'<br><br>');
        curl_close($curl);

    }

}