<?php
	$place = $model->office_place;
	$village = $model->office_village ? ', '.$model->office_village : '';
	$district = $model->office_district ? ', '.$model->office_district : '';
	$city = $model->city->city_name ? ', '.$model->city->city_name : '';
	$province = $model->province->province_name ? ', '.$model->province->province_name : '';
	$zipcode = $model->office_zipcode ? ' '.$model->office_zipcode : '';
	$country = $model->country->country_name ? '<span class="highlight">'.$model->country->country_name.'</span>' : '';
?>
<p><i class="fa fa-map-marker"></i><?php echo $place.$village.$district.$city.$province.$zipcode;?> <?php echo $country;?></p>
<p><i class="fa fa-envelope"></i> <a off_address="" href="mailto:<?php echo $model->office_email?>" title="<?php echo $model->office_email?>"><?php echo $model->office_email?></a></p>
<p><i class="fa fa-phone"></i> <?php echo $model->office_phone;?></p>
