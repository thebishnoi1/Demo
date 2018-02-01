<?php

require_once '../include/amazon.php';

if (isset($_POST['asin'])) {
	$asin = $_POST['asin'];
} else if (isset($_GET['asin'])) {
	$asin = $_GET['asin'];
}
// error_reporting(0);
if (isset($asin)) {
	$amazon = new Amazon();

	$parameters = array(
		"region" => "com",
		"AssociateTag" => 'affiliateTag',
		"Condition" => 'All',
		"Operation" => "ItemSearch",
		'ResponseGroup'=>'Large',
		"SearchIndex" => "Books",
		"Keywords" => $asin
	);

	$query = $amazon->getSignedUrl($parameters);
	$response = simplexml_load_file($query);

	if($response->Items->TotalResults > 0){

		foreach ($response->Items->Item as $item) {

			$autors = "";
			$descriptionPreparation = $item->EditorialReviews;
			$autorsPreparation = $item->ItemAttributes->Author;

			foreach ($descriptionPreparation as $descrip) {
				$description = $descrip->EditorialReview->Content;
			}

			foreach ($autorsPreparation as $autor) {
				$autors .= $autor . ',';
			}
			$autors = substr_replace($autors, "", -1);


			// Geting Amazon iFrame link
			$iframe_url = $item->CustomerReviews->IFrameURL;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_COOKIESESSION, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_URL, $iframe_url);
			$iframe_contents = curl_exec($ch);
			curl_close($ch);

			$review = "";
			$rating = "";

			$iframe_contents_array = explode('<span class="crAvgStars"', $iframe_contents);
			$rating_span_content = explode('</span>', $iframe_contents_array[1]);
			$rating_span_array = explode(' ', $rating_span_content[0]);

			foreach ($rating_span_array as $value) {
				if(strpos($value, 'title') !== false){
					$rating = substr($value, 7);
					break;
				}
			}

			$review_span_content = explode('</span>', $rating_span_content[1]);
			$review_link_text = explode('>', $review_span_content[0]);
			$review_link_array = explode(' ', $review_link_text[1]);
			$review = $review_link_array[0];

			$data = array(
				'author_name' => $autors,
				'book_title' => $item->ItemAttributes->Title,
				'amazon_url' => "http://www.amazon.com/gp/product/" . $asin,
				'book_description' => $description,
				'book_image' => '<img src="' . $item->LargeImage->URL . '" />',
				'book_image_url' => ''. $item->LargeImage->URL . '',
				'rating' => $rating,
				'reviews' => $review
			);

		}
		echo json_encode($data);
	} else {

   /*     $data=$query; 
		echo json_encode($data);*/

		
		echo 0;
	}
} else {
	echo 0;
}