<?php
namespace themes\blueclean\components;

use Yii;
use yii\helpers\Html;
use ommu\core\models\CoreZoneCity;
use ommu\core\models\CoreZoneProvince;
use ommu\core\models\CoreZoneCountry;

class Footer extends \yii\base\Widget
{
	public $address;
	public $email;
	public $phone;
	public $siteName = 'Your Company';

	public function init()
	{
		if(!$this->address)
			$this->address = 'Pandes 1 RT.04 Wonokromo, Pleret, Bantul, D.I Yogyakarta Indonesia';

		if(!$this->email)
			$this->email = 'theme@ommu.id';

		if(!$this->phone)
			$this->phone = '(+62) 811-2540-432';
	}

	public function getAdressStatus($address): bool
	{
		if($address['place'] || $address['village'] || $address['city'] || $address['province'] || $address['country'] || $address['zipcode'])
			return true;

		return false;
	}

	public function getAdressMeta($address)
	{
		if($address['city'])
			$address['city'] = CoreZoneCity::getInfo($address['city'], 'city_name');
		if($address['province'])
			$address['province'] = CoreZoneProvince::getInfo($address['province'], 'province_name');
		if($address['country'])
			$address['country'] = CoreZoneCountry::getInfo($address['country'], 'country_name');

		return join(', ', $address);
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$office_address = unserialize(Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_address'])));
			$office_contact = unserialize(Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_contact'])));

			$this->address = $this->getAdressStatus($office_address) ? $this->getAdressMeta($office_address) : '';
			$this->email = $office_contact['email'] ? Yii::$app->formatter->asEmail($office_contact['email']) : '';
			$this->phone = $office_contact['phone'] ? $office_contact['phone'] : '';

			$copyright = unserialize(Yii::$app->setting->get(join('_', [Yii::$app->id, 'copyright'])));
			$this->siteName = Html::a($copyright['name'], $copyright['url'] ? $copyright['url'] : ['/site/index'], ['title'=>$copyright['name']]);
		}

		return $this->render('footer', [
			'isDemoTheme' => $isDemoTheme,
		]);
	}
}