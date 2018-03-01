<?php

namespace app\models;

use Yii;
use linslin\yii2\curl;

require_once '../vendor/coderockr/php-query/src/phpQuery.php';

class Parsing
{

	public function curlGet($url)
	{
		$cookiefile = $_SERVER['DOCUMENT_ROOT'] . '/temp/cookie.txt';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		$html = curl_exec($ch);
		curl_close($ch);
		return $html;

	}


	public static function parser()
	{

		$html = self::curlGet('https://news.yandex.ru/');
		\phpQuery::newDocument($html);

	
		//Складываем в массив ссылки для парсинга
		
		$links = pq('h2 a');
		$hrefs = [];
		$i = 0;
		foreach ($links as $link) {
			$i++;
			if ( $i > 10 ) break;
			$hrefs[] = pq($link)->attr('href');
		}

	
		//Парсинг по ссылкам
		
		$i=0;
		foreach ($hrefs as $href) {
			$i++;
			$html = self::curlGet('https://news.yandex.ru' . $href);
			//echo '<hr>' . $href . '<br>';
			\phpQuery::newDocument($html);
			$img = pq('.link.link_theme_black.story-media__link.i-bem > img')->attr('src');
			//echo $img . '<br>';
			$title = pq('h1')->text();
			//echo $title . '<br>';
			$description = pq('.doc__text')->text();
			//echo $text . '<br>';
			$pubdate = pq('.story.story_noimage.story_view_widget.story_active > .story__info > .story__date')->text();
			$pubdate = preg_replace("/[^0-9:]/", '', $pubdate);
			//echo $pubdate . '<hr>';


			Yii::$app->db->createCommand()->update('article', [
			    'image' => $img,
			    'title' => $title, 
			    'description' => $description,
			    'pubdate' => $pubdate,
			], [
				'id' => $i ])->execute();
		}

		//Подчищаем память

		\phpQuery::unloadDocuments();
		unset($html);	
	}


}