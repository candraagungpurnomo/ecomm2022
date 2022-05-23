<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shipping_model extends CI_Model{
    Private $API_KEY = "a868f02b0acee22c5cd0b64a4922aa69";

    public function getAllProvince(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->API_KEY"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
       
    }

    public function getKabKota($prov_id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$prov_id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: $this->API_KEY"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
        //   echo $response;
        }
       
        echo "<option selected>-- Pilih Kab/kota --</option>";
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
            echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['type'].' '.$data['rajaongkir']['results'][$i]['city_name']."</option>";
        }
    }


    public function getOngkir($destinationCity,$courier){
        $origin_city = 399;
        $weight = 2000;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$origin_city."&destination=".$destinationCity."&weight=".$weight."&courier=".$courier,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->API_KEY"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //  echo $response;
        }

        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results'][0]['costs']); $i++) {

            echo '<input type="radio" name="ongkir" value="'.$data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'].'" id=" '.$data['rajaongkir']['results'][0]['costs'][$i]['service'].' ">';
			echo '<label for=" '.$data['rajaongkir']['results'][0]['costs'][$i]['service'].' " class="card col-12 flex-row justify-content-between">';
            echo     '<span>';
            echo '<div id="sexpedisi">' .strtoupper($data['rajaongkir']['results'][0]['code']).' - '.$data['rajaongkir']['results'][0]['costs'][$i]['service'].'</div>';
            echo '<div id="setd">' .$data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd'];
            if($courier!="pos"){echo "HARI";}
            echo '</div>';
            echo     '</span>';
			echo     '<span>Rp. '.number_format($data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value']).'</span>';
			echo '</label>';
        }
    }

    public function getOngkirInfo($destinationCity,$courier){
        $origin_city = 399;
        $weight = 2000;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$origin_city."&destination=".$destinationCity."&weight=".$weight."&courier=".$courier,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->API_KEY"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }

    }

}
?>