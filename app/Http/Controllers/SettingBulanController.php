<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MSettingBulan;


class SettingBulanController extends Controller
{

	public function Generate($bulan, $tahun)
	{
		$data = MSettingBulan::where([
										 ['Bulan', '=', $bulan],
										 ['Tahun', '=', $tahun]
									])->first();

		if(empty($data)){
			$this->insert($bulan, $tahun);
		}
	}

    public function insert($bulan, $tahun)
    {
    	$ch = curl_init();
    	// set url 
		curl_setopt($ch, CURLOPT_URL, "https://kalenderindonesia.com/api/4zFFOETWzSDe/kalender/masehi/$tahun"); 

		//return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch); 

		$bulanstr = "";

		$totSabtu = 0;
		$totNonSabtu = 0;

		$totJamKerjaSabtu = 0;
		$totJamKerjaNonSabtu = 0;

		$totJamKerja = 0;

		$bulan = $bulan - 1;

		if($bulan < 10){
			$bulanstr = '0'.$bulan;
		}
		else{
			$bulanstr = "$bulan";
		}
	
		$array = json_decode($output, true);
		
		$count = 0;

		while(isset($array['Month'][$bulan]['Dates'][$count]['M'])){
			if ($array['Month'][$bulan]['Dates'][$count]['M'] >= "2019-$bulanstr-21"){
				if ($array['Month'][$bulan]['Dates'][$count]['M'] <= $array['Month'][$bulan]['LastDate']['M']){
					if($array['Month'][$bulan]['Dates'][$count]['W'] > 0){
						if(!empty($array['Month'][$bulan]['Dates'][$count]['Holiday'])){
							if (($array['Month'][$bulan]['Dates'][$count]['Holiday'][0]['Status']) == "1"){
								if(!empty($array['Month'][$bulan]['Dates'][$count]['Holiday'][0]['Country'])){
									if (($array['Month'][$bulan]['Dates'][$count]['Holiday'][0]['Country'][0]) != "id"){
										if (($array['Month'][$bulan]['Dates'][$count]['W'] <= 5)){
											$totNonSabtu = $totNonSabtu + 1;
										} else {
											$totSabtu = $totSabtu + 1;
										}
									}
								}
							}
						}
						else{
							if (($array['Month'][$bulan]['Dates'][$count]['W'] <= 5)){
								$totNonSabtu = $totNonSabtu + 1;
							} else {
								$totSabtu = $totSabtu + 1;
							}
						} 
					}
				}	
			}

			$count = $count + 1;
		}

		$bulan = $bulan + 1;
		$count = 0;

		if($bulan < 10){
			$bulanstr = '0'.$bulan;
		}
		else{
			$bulanstr = "$bulan";
		}

		while(isset($array['Month'][$bulan]['Dates'][$count]['M'])){
			if ($array['Month'][$bulan]['Dates'][$count]['M'] >= $array['Month'][$bulan]['FirstDate']['M']){
				if ($array['Month'][$bulan]['Dates'][$count]['M'] <= "2019-$bulanstr-20"){
					if($array['Month'][$bulan]['Dates'][$count]['W'] > 0){
						if(!empty($array['Month'][$bulan]['Dates'][$count]['Holiday'])){
							if (($array['Month'][$bulan]['Dates'][$count]['Holiday'][0]['Status']) == "1"){
								if(!empty($array['Month'][$bulan]['Dates'][$count]['Holiday'][0]['Country'])){
									if (($array['Month'][$bulan]['Dates'][$count]['Holiday'][0]['Country'][0]) != "id"){
										if (($array['Month'][$bulan]['Dates'][$count]['W'] <= 5)){
											$totNonSabtu = $totNonSabtu + 1;
										} else {
											$totSabtu = $totSabtu + 1;
										}
									}
								} 
							}
							else{
								if (($array['Month'][$bulan]['Dates'][$count]['W'] <= 5)){
									$totNonSabtu = $totNonSabtu + 1;
								} else {
									$totSabtu = $totSabtu + 1;
								}
							}
						}

						else{
							if (($array['Month'][$bulan]['Dates'][$count]['W'] <= 5)){
								$totNonSabtu = $totNonSabtu + 1;
							} else {
								$totSabtu = $totSabtu + 1;
							}
						} 
					}
				}	
			}
			$count = $count + 1;
		}
		
		$totJamKerjaSabtu = $totSabtu * 360;
		$totJamKerjaNonSabtu = $totNonSabtu * 480;
		$totJamKerja = $totJamKerjaSabtu + $totJamKerjaNonSabtu;

		 $data = MSettingBulan::create([
            'Bulan' => $bulan,
            'Tahun' => $tahun,
            'TotalKerjaNonSabtu' => $totNonSabtu,
            'TotalKerjaSabtu' => $totSabtu,
            'TotalLibur' => 0,
            'TotalLiburSabtu' => 0,
            'TotalJamKerja' => $totJamKerja
        ]);

		echo $data->Bulan.' sudah di generate';
    }
}
