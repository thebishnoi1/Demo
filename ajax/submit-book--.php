<?php
include '../../../../wp-load.php';

if (!is_user_logged_in()) {
	die("You are not loged in into the Wordpress!");
}

function book_submited($book_id, $form_id)
{
	global $wpdb;

	$table_name = $wpdb->prefix . BSP_BST_BOOK_URL;

	$fields = array(
		'book_id' => $book_id,
		'url' => $form_id
	);

	$wpdb->insert($table_name, $fields);
}

function post_to_url($data = 0)
{
	if ($data == 0){
		$post_data = $_POST;
	} else {
		$post_data = $data;
	}

	$fields = array();
	foreach ($post_data as $key => $value) {
		// exclude post data that are not used in form on submission website
		if (($key != 'form_url') && ($key != 'submission_to') && ($key != 'book_id') && $key != 'cacheavoid') {

			// We need to make sure that, if we are sending string like @TwitterNick
			//       to tell the CURL that it's not a file by adding empty character...
			// WARNING: works only for Linux server !
			if( is_string($value) && substr($value,0,1)=='@' && substr($value, 1,1)!='/'){
				$value = sprintf("\0%s", $value);
			}

			$fields[$key] = $value;
		}
	}

	$url = $post_data['form_url'];
	
	$result = _post($url, $fields);
	return $result;
}

function _post($url,$data, $header = 0)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, $header);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	$result = curl_exec($ch);
	//Log every _POST:
	bsp_bst_logv2('curl_log', "URL: $url , data= ".print_r($data,1)." \n\n============\n\n");

	// Check if there is any error on curl call
	if(curl_errno($ch)){
		bsp_bst_logv2('curl_error', 'Error submitting on ' . $url . 
		  "\n - CURL error: " . curl_error($ch) . 
		  "\n - CURL response: " . $result
		  ."\n - POST data:".print_r($data,1));
	}

	if($header == true){
		//$result = curl_getinfo($ch);
	}

	
	curl_close($ch);


	return $result;
}


if (isset($_POST['send_email_to'])) {

	$to = $_POST['send_email_to'];

	$from = $_POST['send_email_from'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	///var_dump($_POST);
	$headers = "From: " . $from . " \r\n
		Reply-To: " . $from . " \r\n
		X-Mailer: PHP/" . phpversion();

	mail($to, $subject, $message, $headers);
	book_submited($_POST['book_id'], $_POST['submission_to']);
	echo 1;
	return;
}


$error = null;
$success = null;
$result = null;

if (isset($_POST['submission_to'])) {
	$submission_to = $_POST['submission_to'];
} else {
	echo 'Missing "submission_to" field';
	return;
}

/*if ($submission_to == 'bookcanyon') {
	
	$data = $_POST;
	
	// Change post data to match destination form.
	$data['vfb-90'] = date("Y/m/d", strtotime($data['vfb-90']));
	$data['vfb-91'] = date("Y/m/d", strtotime($data['vfb-91']));
	
	$result = post_to_url($data);

	$check = strpos($result, 'Your form was successfully submitted.');

	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else*/ if ($submission_to == 'choosybookworm') {

	$result = post_to_url();

	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'kindlevenue') {

	$result = post_to_url();

	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'slashedreads') {
	$data = $_POST;
	$result = post_to_url($data);
	$check = strpos($result, 'Submission was successful');
	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'couponcrazymomblog') {
	$result = post_to_url();
	$check = strpos($result, 'form-error-message');
	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'peoplereads') {
	$data = $_POST;
	
	// Change post data to match destination form.
	$data['w-form-524fb9050cf24e757e091a95-11'] = date("Y-m-d", strtotime($data['w-form-524fb9050cf24e757e091a95-11']));
	$data['w-form-524fb9050cf24e757e091a95-12'] = date("Y-m-d", strtotime($data['w-form-524fb9050cf24e757e091a95-12']));
	
	$result = post_to_url($data);
	$check = strpos($result, '"success":true');
	if ($check !== false) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'ereaderlove') {
	$result = post_to_url();
	$check = strpos($result, 'Message Sent Successfully');
	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'readingdeals') {
	$data = $_POST;

	if ($data['genre'] == '0') {
		echo 'You need to select genre!';
		return;
	}

	$result = post_to_url($data);

	if (empty($result)) {
		$success = 1;
	} else {
		$error = 1;
	}

}  else if ($submission_to == 'bookpraiser') {

	if( ! empty($_POST['vfb-173']) && substr($_POST['vfb-173'],0,1)=='@'){
		echo 'Please, exclude @ char from the twitter handle field!';
		return ;
	}

	$result = post_to_url();
	$check = strpos($result, 'Your form was successfully submitted');
	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'bookangel') {
	$data = $_POST;

	if ($data['topic'] == '0') {
		echo 'You need to select genre!';
		return;
	}
	
	// Change post data to match destination form.
	$data['freefrom'] = date("Y/m/d", strtotime($data['freefrom']));
	
	$result = post_to_url($data);

	$check = strpos($result, 'Thank you, your book has been successfully submitted.');
	if ($check !== false) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'ebookshabit') {

	$result = post_to_url();
	$check = strpos($result, 'ALMOST DONE - You need to check your email!');
	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'contentmo') {
	$data = $_POST;
	
	// Change post data to match destination form.
	$data['entry_1250366329'] = date("Y-m-d", strtotime($data['entry_1250366329']));
	$data['entry_160883077'] = date("Y-m-d", strtotime($data['entry_160883077']));

	if( substr($data['entry_601322070'],0,1) == '@'){
		echo "ERROR: Please exclude @ character from the twitter handle field.";
		return ;
	}

	//var_dump($data);
	//return 1;
	
	$result = post_to_url($data);
	$check = strpos($result, 'Your request has been recorded. Thank you from ContentMo');

	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'freebies4mom') {
	
	$result = post_to_url();
	
	$check = strpos($result, 'Your message was sent successfully');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'igniteyourbook') {
	$data = $_POST;

	$content = file_get_contents($data['input_6'] );

	//Store in the filesystem.
	$fp = fopen('img.jpg', "w");
	fwrite($fp, $content);
	fclose($fp);
	$data['input_6'] = '@'.realpath('./img.jpg');

	$result = post_to_url($data);
	
	// Delete temp file
	unlink('img.jpg');

	if (empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'lovelybookpromotions') {
	$data = $_POST;

	if(!isset($data['input_11'])) {
		echo 'You need to select one or more genres!';
		return;
	}

	$content = file_get_contents($data['input_5'] );

	//Store in the filesystem.
	$fp = fopen('img.jpg', "w");
	fwrite($fp, $content);
	fclose($fp);
	$data['input_5'] = '@'.realpath('./img.jpg');

	$result = post_to_url($data);
	
	// Delete temp file
	unlink('img.jpg');

	$check = strpos($result, 'There was a problem with your submission.');

	if ($check !== false) {

		if( strpos($result,"we have already received the maximum") !== FALSE ){
			echo 'There was a problem with your submission. '
				.'Response: "Sorry, we have already received the maximum amount of submissions for this date.'
				. 'Pick another date or order a Guaranteed Freebie Promotion for only $4.00."';
		}
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'bookpinning') {
	$data = $_POST;

	if ($data['genre'] == '0') {
		echo 'You need to select genre!';
		return;
	}

	$content = file_get_contents($data['book_image'] );

	//Store in the filesystem.
	$fp = fopen('img.jpg', "w");
	fwrite($fp, $content);
	fclose($fp);
	$data['book_image'] = '@'.realpath('./img.jpg');

	$result = post_to_url($data);
	
	// Delete temp file
	unlink('img.jpg');
	
	$check = strpos($result, 'status=submitted');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'ereaderperks') {

	$data = $_POST;

	$data['_wpcf7_is_ajax_call'] = 1;

	$result = post_to_url($data);
	$check = strpos($result, 'Your message was sent successfully');
	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'kindlebookpromos-luckycinda') {
	$result = post_to_url();
	$check = strpos($result, 'Thank You! Your Submission has been received.');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'ebooklister') {
	$data = $_POST;

	if ($data['category'] == '0') {
		echo 'You need to select Category!';
		return;
	}

	if( ! empty($data['twitter']) && substr($data['twitter'],0,1)!='@'){
		echo 'Include @ in the twitter handle field';
		return ;
	}
	$data['twitter'] = urlencode($data['twitter']); // @ at the begining means a file upload so we need to encode @ character.

	$result = post_to_url($data);
	$check = strpos($result, '<h2>Warning!</h2>');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'freebookdude') {
	
	$result = post_to_url();
	$check = strpos($result, 'class="errorheader"');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'feedyourreader') {
	
	$result = post_to_url();
	$check = strpos($result, 'class="errorheader"');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'frugal-freebies') {
	$data = $_POST;

	// Change post data to match destination form.
	$data['entry_1000006'] = date('Y-m-d', strtotime($data['entry_1000006']));
	
	$result = post_to_url($data);

	$check = strpos($result, 'Thanks! Your response has been recorded');
	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'pretty_hot') {
	$data = $_POST;

	if ($data['input_17'] == '0') {
		echo 'You need to select Category!';
		return;
	}

	$result = post_to_url($data);
	$check = strpos($result, 'Thank you for submitting your book information');

	if ($check !== false) {
		$error = 1;
	} else {
		$success = 1;

	}

} else if ($submission_to == 'itswritenow') {
	$data = $_POST;
	
	// Change post data to match destination form.
	$data['entry_563265773'] = date('Y-m-d', strtotime($data['entry_563265773']));
	$data['entry_1690722124'] = date('Y-m-d', strtotime($data['entry_1690722124']));
	
	$result = post_to_url($data);

	$check = strpos($result, 'Thank-you for your free book submission to itsWriteNow.');

	if ($check !== false) {
		$success = 1;
	} else {
		$error = 1;

	}

} else if ($submission_to == 'iloveebooks') { //NO
	$data = $_POST;

	$result = post_to_url($data);

	//echo $result; exit;
	$check = strpos($result, 'Thank-you for your free book submission to itsWriteNow.');

	if ($check !== false) {
		$success = 1;
	} else {
		$error = 1;

	}

} else if ($submission_to == 'ohfb') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'freebooks') {

	$result = post_to_url();
	$check = strpos($result, 'Your promotion has been added for review and will appear on the promotion page shortly.');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if($submission_to == 'ereadernewstoday'){

//$post = "ac=on&p=1&pr[]=0&pr[]=1&a[]=3&a[]=4&pl=on&sp[]=3&ct[]=3&s=1&o=0&pp=3&sortBy=date";
	$url = $_POST['form_url'];
	
	// Manualy generate post string:
	$str_post = "";
	foreach ($_POST as $k => $v)
	{
		if( is_array($v)){
			foreach($v as $k1 => $v1)
			{
				$v1 = urlencode($v1);
				$str_post .= $k . "[" . $k1 . "]=" . $v1 . "&";
			}
		} else {
			if( $k != 'authenticity_token'){
				continue;
			}
			$v = urlencode($v);
			$str_post .= $k . "=" . $v . "&";
		}
	}
	$str_post = substr($str_post, 0,-1); // remove last &
//var_dump($str_post);
//return 1;
	$result = _post($url, $str_post);
//var_dump($result);

	$check = strpos($result, 'ou are being');
	
	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}
} else if($submission_to == 'indiebookoftheday'){
	$result = post_to_url();
	$check = strpos($result, '"sent":"true"');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if($submission_to == 'theereadercafe'){
	
	// Check start date and make sure it's 3 days prior to promotion begins
	if( strtotime($_POST['entry_962586454']) - time() <= (3 * 24 * 60 * 60)){
		echo "Please submit your request at least 3 days prior to your book's freebie date. ";
		return 1;
	}

	$result = post_to_url();

	$check = strpos($result, "Thanks for submitting");

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}
}
 ////////////////////////////// New Websites //////////////////////
	else if ($submission_to == 'digitalbooktoday') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'thereadingsofa') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'ilovebooks') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'writerowned') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'themidlist') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'jungledeals') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'bestebooksfree') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'bookdealhunter') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}
else if ($submission_to == 'armadilloebooks') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}else if ($submission_to == 'freebooksy') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks For Your Free Book Submission');

	if ($check === false) {
		$success = 1;
	} else {
		$error = 1;
	}
}
	else {
	echo 'There is still no script for this form!';
	return;
}

if ($error === 1) {
	//echo 'Error, please check your form and try again';
	//print_r($result);
	echo "\nError submiting form!"
			. "\nPlease contact us at rob@bestsellerpublishing.org and "
			.'we will fix this as soon as possible.';

	$headers = "From: no-reply@bestsellerpublishing.org\r\n";
	$headers .= "Reply-To: trivudin@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


	$message = "Hi webmaster at bestsellerpublishing.com<br><br>
		An error occured when user tryed to submit book on website: <b>$submission_to</b><br><br>
		RESPONSE: " . htmlentities($result) . "<br><br><hr>Please check and fix this.";

	mail('trivudin@gmail.com, steve@bestsellerpublishing.org', "[Book Submission Tool ERROR]", $message, $headers);

} else if ($success === 1) {
	book_submited($_POST['book_id'], $_POST['submission_to']);
	echo 1;
}