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
	
	 // echo "<pre>"; print_r($fields);
	$result = _post($url, $fields);
	 //print_r($result);
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
		$result = curl_getinfo($ch);
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

	// mail($to, $subject, $message, $headers);


if(@mail($to, $subject, $message, $headers))
{
  echo "Mail Sent Successfully";

	book_submited($_POST['book_id'], $_POST['submission_to']);
	echo 1;
}else{
  echo "Mail Not Sent";

	book_submited($_POST['book_id'], $_POST['submission_to']);
	echo 2;
}


	// book_submited($_POST['book_id'], $_POST['submission_to']);
	// echo 1;
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

	if ($check === false) {
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

}

if ($submission_to == 'ereaderiq') {
print_r($_POST);
	$result = post_to_url();

print_r($result);
	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

}

if ($submission_to == 'zwoodlebooks') {
print_r($_POST);
	$result = post_to_url();

print_r($result);
	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

}
	else if ($submission_to == 'thereadingsofa') {

		$result = post_to_url();
		print_r($_POST);
	print_r($result);
		if (!empty($result)) {
			$error = 1;
		} else {
			$success = 1;
		}

	}
	else if ($submission_to == 'newfreekindlebooks') {

		$result = post_to_url();
	// 	print_r($_POST);

	// print_r($result);


		if (empty($result)) {
			$error = 1;
		} else {
			$success = 1;
		}

	}
		else if ($submission_to == 'book-circle') {
$data=$_POST;
$data['input_14.3']=$_POST['input_14_3'];
$data['input_14.1']=$_POST['input_14_1'];
$data['input_14.2']=$_POST['input_14_2'];

		$result = post_to_url($data);
	//	print_r($_POST);
	print_r($result);
		if (!empty($result)) {
			$error = 1;
		} else {
			$success = 1;
		}

	}

	else if ($submission_to == 'bookraid') {
			
			$result = post_to_url();
			print_r($result);
			exit();
			// $check = strpos($result, "Thanks so much. We have recorded your response and we will be reviewing it shortly.");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}

	else if ($submission_to == 'theereadercafe') {
			
			$result = post_to_url();
			//print_r($result);
			//exit();
			 $check = strpos($result, "Thanks for submitting your Freebie Promo!");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}


		else if ($submission_to == 'justfreeandbargainbooks') {
			
			$result = post_to_url();
			print_r($result);
			exit();
			 $check = strpos($result, "We hope to hear from you soon");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}
			else if ($submission_to == 'digital_ink') {
			
			$result = post_to_url();
			// print_r($result);
			// exit();
			 $check = strpos($result, "Your response has been recorded and if complete");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}

		else if ($submission_to == 'beezeebooks') {
			
			$result = post_to_url();
			// print_r($result);
			// exit();
			 $check = strpos($result, "Your message was sent successfully");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}

			else if ($submission_to == 'bookreviewbuzz') {
			
			$result = post_to_url();
			// print_r($result);
			// exit();
			 $check = strpos($result, "Thank you for placing an order to have your book listed for review on our website");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}

	// 			else if ($submission_to == 'digitalbooktoday') {
			
	// 		$result = post_to_url();
	// 		print_r($result);
	// 		exit();
	// 		 $check = strpos($result, "Message Sent");

	// 		if ($check == true) {
	// 			$success = 1;
	// 		} else {
	// 			$error = 1;

	// 		}

	// }

					else if ($submission_to == 'freekindledeal') {
			
			$result = post_to_url();
			// print_r($result);
			// exit();
			 $check = strpos($result, "Message Sent");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}

	// 	else if ($submission_to == 'bargainbooksy') {
	// 		$data=$_POST;
	// 		// $data['item_meta[83]']=$data['item_meta'][83];
	// 		// $data['item_meta[84]']=$data['item_meta'][84];
	// 		// $data['item_meta[85]']=$data['item_meta'][85];
	// 		// $data['item_meta[86]']=$data['item_meta'][86];
	// 		// $data['item_meta[88]']=$data['item_meta'][88];
	// 		// $data['item_meta[90]']=$data['item_meta'][90];
	// 		// $data['item_meta[91]']=$data['item_meta'][91];
	// 		// $data['item_meta[92]']=$data['item_meta'][92];
	// 		// $data['item_meta[93]']=$data['item_meta'][93];
	// 		// $data['item_meta[94]']=$data['item_meta'][94];
	// 		// $data['item_meta[95]']=$data['item_meta'][95];
	// 		// $data['item_meta[0]']=$data['item_meta'][0];
	// 		$result = post_to_url($data);
	// 		// print_r($_POST);
	// 		// print_r($result);
	// 		// exit();
	// 		$check = strpos($result, 'Thank you for submitting your book');

	// 					if ($check == true) {
	// 			$success = 1;
	// 		} else {
	// 			$error = 1;

	// 		}

	// }

	// message :Your message was sent successfully. Thanks.
	// 	else if ($submission_to == 'iloveebooks') {
			
	// 		$result = post_to_url();
	// 		//print_r($result);
	// 		//exit();
	// 		 $check = strpos($result, "Thanks so much. We have recorded your response and we will be reviewing it shortly.");

	// 		if ($check == true) {
	// 			$success = 1;
	// 		} else {
	// 			$error = 1;

	// 		}

	// }
			else if ($submission_to == 'jungledealsandsteals') {
			$data=$_POST;
			$stDate = explode('/',$data['input_13mk']);
			$enDate = explode('/',$data['input_14mk']);
			// $data['input_13[]']=$stDate[0];
			// $data['input_14[]']=array();
			// array_push($data['input_13'], $stDate[0]);
			// array_push($data['input_13'], $stDate[1]);
			// array_push($data['input_13'], $stDate[2]);
			// array_push($data['input_14'], $stDate[0]);
			// array_push($data['input_14'], $stDate[1]);
			// array_push($data['input_14'], $stDate[2]);
			$data['input_13[]']='2';
			$data['input_13[]']='3';
			$data['input_13[]']='2015';
			// $data['input_13[]']=$stDate[1];
			// $data['input_13[]']=$stDate[2];
			// $data['input_14[]']=$enDate[0];
			// $data['input_14[]']=$enDate[1];
			// $data['input_14[]']=$enDate[2];
			// unset($data['input_13mk']);
			// unset($data['input_14mk']);
			print_r($data);

			$result = post_to_url($data);
			print_r($result);
			exit();
			// $check = strpos($result, "Thanks so much. We have recorded your response and we will be reviewing it shortly.");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}
		else if ($submission_to == 'bookdealhunter') {
			
			$result = post_to_url();
			$check = strpos($result, "Thanks so much. We have recorded your response and we will be reviewing it shortly.");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}
	else if ($submission_to == 'bargainbooksy') {
			$data=$_POST;
			$data['item_meta[83]']=$data['item_meta'][83];
			$data['item_meta[84]']=$data['item_meta'][84];
			$data['item_meta[85]']=$data['item_meta'][85];
			$data['item_meta[86]']=$data['item_meta'][86];
			$data['item_meta[88]']=$data['item_meta'][88];
			$data['item_meta[90]']=$data['item_meta'][90];
			$data['item_meta[91]']=$data['item_meta'][91];
			$data['item_meta[92]']=$data['item_meta'][92];
			$data['item_meta[93]']=$data['item_meta'][93];
			$data['item_meta[94]']=$data['item_meta'][94];
			$data['item_meta[95]']=$data['item_meta'][95];
			$data['item_meta[0]']=$data['item_meta'][0];
			$result = post_to_url($data);
			/*print_r($_POST);
			print_r($result);
			exit();*/
			$check = strpos($result, 'Thank you for submitting your book');

						if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}
		else if ($submission_to == 'kornerkonnection') {
			
			$result = post_to_url();
			// print_r($_POST);
			// print_r($result);
			if (empty($result)) {
		$success = 1;
	} else {
		$error = 1;
	}


	}
	else if ($submission_to == 'bookgorilla') {
			
			$result = post_to_url();
		// 	print_r($_POST);
		// 	print_r($result);
	 // // print_r($result);
		// 	exit();
			$check = strpos($result, 'Thank you for your submission');

						if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}


	}

		else if ($submission_to == 'freebooksy') {
			$data=$_POST;
			// echo $_POST['item_meta'][88];
			// print_r($data);
$data['item_meta[88]']= $_POST['item_meta'][88];
$data['item_meta[100]']= $_POST['item_meta'][100];
$data['item_meta[101]']= $_POST['item_meta'][101];
$data['item_meta[86]']= $_POST['item_meta'][86];
$data['item_meta[87]']= $_POST['item_meta'][87];
$data['item_meta[88]']= $_POST['item_meta'][88];
$data['item_meta[89]']= $_POST['item_meta'][89];
$data['item_meta[93]']= $_POST['item_meta'][93];
$data['item_meta[94]']=$_POST['item_meta'][94];
$data['item_meta[96]']=$_POST['item_meta'][96];
$data['item_meta[97]']=$_POST['item_meta'][97];
$data['item_meta[99]']=$_POST['item_meta'][99];
			
			$result = post_to_url($data);
			print_r($_POST);
			print_r($result);
			exit();
	 // print_r($result);
			$check = strpos($result, 'Thank you for submitting your book');

						if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}


	}
	// 	else if ($submission_to == 'digitalbooktoday') {
			
	// 		$result = post_to_url();
	// 		print_r($_POST);
	// 		print_r($result);
	//  // print_r($result);
	// 		$check = strpos($result, 'Message Sent');

	// 					if ($check == true) {
	// 			$success = 1;
	// 		} else {
	// 			$error = 1;

	// 		}


	// }


		else if ($submission_to == 'frugal-freebies') {
			$data=$_POST;

		$data['entry_993800238']=substr($data['entry_993800238'], 0, 7);
// echo "string";
			//echo $data['entry_1000006_year']; 
			//echo "string";
			$stDate = explode('/',$data['entry_1000006']);
	// print_r($stDate);
	
	// $data['entry.1000006_month'] = $stDate[0];
	// $data['entry.1000006_day'] = $stDate[1];
	// $data['entry.1000006_year'] = $stDate[2];
	// $data['entry.1000010'] =$data['entry_1000010'];
	// $data['entry.1000007'] =$data['entry_1000007'];
	// $data['entry.1000013'] =$data['entry_1000013'];
	// $data['entry.1000008'] =$data['entry_1000008'];
	// $data['entry.1314149070'] ='free';
	// $data['entry.1000014'] ='No';

	$data['entry.993800238'] =$data['entry_993800238'];
	$data['entry.709104602'] =$data['entry_1000010'];
	$data['entry.989783085'] =$data['entry_989783085'];


		
	$data['entry.1433481471_month'] = $stDate[0];
	$data['entry.1433481471_day'] = $stDate[1];
	$data['entry.1433481471_year'] = $stDate[2];

	// $data['entry.989783085'] =$data['entry_1000013'];
	$data['entry.1069794338'] =$data['entry_free'];
	// $data['entry.1069794338'] ='No';


			 // print_r($data);
			$result = post_to_url($data);

			// print_r($data);
		 // print_r($result);
			// exit();
			$check = strpos($result, 'Thanks! Your response has been recorded');

						if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}



	else if ($submission_to == 'ereadergirl') {
			
			$result = post_to_url();
			$check = strpos($result, 'Thanks for contacting us! We will get in touch with you shortly.');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

	}
	
	else if ($submission_to == 'bookpreviewclub') {
			
			$result = post_to_url();
			print_r($result);
			exit();
				$check = strpos($result, 'Book submission complete.');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

	}


	else if ($submission_to == 'booktour') {
			
			$result = post_to_url();
			//print_r($result);
			//exit();
				$check = strpos($result, 'We reserve the right to reject any book or author.');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

	}


	else if ($submission_to == 'writerowned') {			
			$result = post_to_url();
			$check = strpos($result, 'class="errorheader"');

			if ($check === false) {
				$success = 1;
			} else {
				$error = 1;

			}
	}
	else if ($submission_to == 'ilovebooks') {			
			$result = post_to_url();
			$check = strpos($result, 'Thanks for your submission.');

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}
	}
	else if ($submission_to == 'digitalbooktoday') {			
			$result = post_to_url();
			$check = strpos($result, "error");

			//print_r($_POST);
// print_r($result);

			if ($check == false) {
				$success = 1;
			} else {
				$error = 1;

			}
	}
	else if ($submission_to == 'themidlist') {
			
			$result = post_to_url();
			$check = strpos($result, 'class="errorheader"');

			if ($check === false) {
				$success = 1;
			} else {
				$error = 1;

			}

	}
	else if ($submission_to == 'jungledeals') {
			$data = $_POST;
	//print_r($data['inpu']);
	$stDate = explode('/',$data['input_111']);
	// /print_r($stDate);
	$stDate2 = explode('/',$data['input_121']);
	
	// $data['input_13'] = array();
	// $data['input_14'] = array();
	// $data['input_14'] = array();
	$data['input_13[]'] = '12';
	$data['mkkk'] = '12';
	// array_push($data['input_13'], $stDate[0]);
	// array_push($data['input_13'], $stDate[1]);
	// array_push($data['input_13'], $stDate[2]);
	// array_push($data['input_14'], $stDate2[0]);
	// array_push($data['input_14'], $stDate2[1]);
	// array_push($data['input_14'], $stDate2[2]);

		//	print_r($data);
			$result = post_to_url($data);
			print_r($result);
			$check = strpos($result, "Thank you for submitting your ebook!");

			if ($check == true) {
				$success = 1;
			} else {
				$error = 1;

			}

	}
	else if ($submission_to == 'armadilloebooks') {
	$data = $_POST;
	print_r($_POST['Field12']);
	// print_r($_POST['Field12']);
	$startdate=$_POST['Field12'];
	$enddate=$_POST['Field14'];
	
	$stDate = explode('/',$data['Field12']);
	$data['Field12-1']=$stDate[0];
	$data['Field12-2']=$stDate[1];
	$data['Field12']=$stDate[2];
	// $stDate[1]
	// $stDate[2]
	// /print_r($stDate);
	$stDate2 = explode('/',$data['Field14']);
		$data['Field14-1']=$stDate2[0];
	$data['Field14-2']=$stDate2[1];
	$data['Field14']=$stDate2[2];
	// $data['Field1']=$_POST['Field1'];
	// $data['Field3']=$_POST['Field3'];
	// $data['Field5']=$_POST['Field5'];
	// $data['Field6']=$_POST['Field6'];
	// $data['Field117']=$_POST['Field117'];
	// $data['entry.1480075355']=$_POST['entry_1480075355'];
	// $data['entry.1909622892']=$_POST['entry_1909622892'];
	// $data['entry.70032961']=$_POST['entry_70032961'];
	// $data['entry.1355322367']=$_POST['entry_1355322367'];
	// $data['entry.886968909']=$_POST['entry_886968909'];
	// $data['entry.1455864165']=$_POST['entry_1455864165'];
	// $data['entry.1216609629']=$_POST['entry_1216609629'];
	// $data['entry.1114205243']=$_POST['entry_1114205243'];

	
	
	
	$result = post_to_url($data);
	// print_r($data);
	// print_r($result);
	$check = strpos($result, 'Thank you for submitting your ebook promotion details!');
	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}
	else if ($submission_to == 'kindlevenue') {

	$result = post_to_url();

	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'freebooksy') {

	$result = post_to_url();
	$check = strpos($result, 'Thank you for submitting your book.');
	//print_r($_POST);
	//print_r($result);
	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

}else if ($submission_to == 'awesomegang') {

	$result = post_to_url();
	//print_r($result);

	$check = strpos($result, 'Thank you for submitting your book information. You will get an email shortly with your information to double check for accuracy.');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}	else if ($submission_to == 'ebookasaurus') {

	$result = post_to_url();
	//print_r($_POST);
	//print_r($result);
	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

}else if ($submission_to == 'ebooklister') {
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
	// print_r($result);
	$check = strpos($result, 'Warning');
	// var_dump($check);
	if ($check == true) {
		// $error = 1;
echo "This listing is already scheduled to be listed today or in the future. Please check your email for our confirmation of submittal.
Please note that no data has been collected from this submittal.";
	} else {
		$success = 1;
	}

}



	else if ($submission_to == 'bookloversheaven') {

	$result = post_to_url();
	$check = strpos($result, 'Thanks for contacting us! We will get in touch with you shortly.');
	//print_r($_POST);
	//print_r($result);
	if (!empty($result)) {
		$error = 1;
	} else {
		$success = 1;
	}

}	else if ($submission_to == 'ebookstamp') {
	$data = $_POST;
	
	$stDate = explode('/',$data['pDate']);
	
	$data['MMERGE18[month]'] = $stDate[0];
	$data['MMERGE18[day]'] = $stDate[1];
	$data['MMERGE18[year]'] = $stDate[2];
	
	
	$result = post_to_url($data);
	// print_r($result);
	$check = strpos($result, 'Almost finished');
	$check2 = strpos($result, 'already subscribed to list Ebookstamp.com');
	$check3 = strpos($result, 'Too many subscribe attempts for this email address');

	if ($check == true) {
		$success = 1;
	} 
	elseif($check2==true)
	{
		echo $data['EMAIL']." already subscribed to list Ebookstamp.com, Please update your profile ";
	}
		elseif($check3==true)
	{
		echo $data['EMAIL']." Too many subscribe attempts for this email address. Please try again in about 5 minutes. ";
	}
	else{
		$error = 1;

	}

}	else if ($submission_to == 'kindlenews') {
	$data=$_POST;
	$data['input_30']=substr($data['input_30'], 0,120);
	$result = post_to_url($data);
// print_r($_POST);
	// print_r($result);
	// exit();
	$check = strpos($result, 'Thanks for contacting us! We will get in touch with you shortly.');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}
}
else if ($submission_to == 'readfree') {
	$data=$_POST;
	$data['entry.904268240']=$_POST['entry_904268240'];
	$data['entry.1106501010']=$_POST['entry_1106501010'];
	$data['entry.785737396']=$_POST['entry_785737396'];
	$data['entry.1372048827']=$_POST['entry_1372048827'];
	$data['entry.308183536']=$_POST['entry_308183536'];
	$data['entry.1480075355']=$_POST['entry_1480075355'];
	$data['entry.1909622892']=$_POST['entry_1909622892'];
	$data['entry.70032961']=$_POST['entry_70032961'];
	$data['entry.1355322367']=$_POST['entry_1355322367'];
	$data['entry.886968909']=$_POST['entry_886968909'];
	$data['entry.1455864165']=$_POST['entry_1455864165'];
	$data['entry.1216609629']=$_POST['entry_1216609629'];
	$data['entry.1114205243']=$_POST['entry_1114205243'];


  

  //      array(
  //  'form-label' => ' I have emailed a copy of my book cover to bookcovers@readfree.ly',
  //  'input' => 'input',
  //  'type' => 'text',
  //  'name' => 'entry_1114205243',
  //  'value' => '',
  
  // ),




	$result = post_to_url($data);
// print_r($_POST);
// 	print_r($result);
// 	exit();
	$check = strpos($result, 'Thank you for using Read Freely. Please remember to email a copy of your book cover');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}
}
else if ($submission_to == 'slashedreads') {

	$result = post_to_url();
	$check = strpos($result, 'Submission was successful');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} 	else if ($submission_to == 'couponcrazymomblog') {
	$result = post_to_url();
	print_r($result);
	$check = strpos($result, 'CT Coupon Crazy Mommy');
	if ($check == true) {
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
	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'ereaderlove') {
	$result = post_to_url();
	//print_r($result);
	$check = strpos($result, 'Thank you for contacting us');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'faithfulreads') {
	$result = post_to_url();
	//print_r($result);
	$check = strpos($result, 'Your response has been recorded.');

		if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'digital_ink') {
	$result = post_to_url();
	// print_r($result);
	$check = strpos($result, 'Your response has been recorded.');

		if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}

}




else if ($submission_to == 'ebooksaddict') {
	$result = post_to_url();
	//print_r($result);

	$check = strpos($result, 'Thank you.  Message sent!');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}else if ($submission_to == 'dealseekingmom') {
	$result = post_to_url();
	// print_r($result);

	$check = strpos($result, 'Your message was sent successfully');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}else if ($submission_to == 'freeebooksblog') {
	$result = post_to_url();
	// print_r($result);

	$check = strpos($result, 'Your message was sent successfully');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}
else if ($submission_to == 'freestufftimes') {
	$result = post_to_url();
	print_r($result);

	$check = strpos($result, 'Message Sent');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}


else if ($submission_to == 'free-kindle-books-4u') {

		$data = $_POST;
	
	// Change post data to match destination form.
	$data['g178-name'] = $data['g178-name123'];
	 print_r($data);

	// $data['w-form-524fb9050cf24e757e091a95-12'] = date("Y-m-d", strtotime($data['w-form-524fb9050cf24e757e091a95-12']));
	$result = post_to_url($data);
	 print_r($result);
echo "string";
	$check = strpos($result, 'Message Sent');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}else if ($submission_to == 'readingdeals') {
	$data = $_POST;

	if ($data['genre'] == '0') {
		echo 'You need to select genre!';
		return;
	}
	// print_r($_POST);
	$result = post_to_url($data);
// print_r($result);
// echo "string";
// exit();
	if (empty($result)) {
		$success = 1;
	} else {
		$error = 1;
	}

} /* else if ($submission_to == 'bookpraiser') {

	if( ! empty($_POST['vfb-173']) && substr($_POST['vfb-173'],0,1)=='@'){
		echo 'Please, exclude @ char from the twitter handle field!';
		return ;
	}

	$result = post_to_url();

	$check = strpos($result, 'Your form was successfully submitted');
	if ($check !== false) {
		$success = 1;
	} else {
		$error = 1;
	}

} */else if ($submission_to == 'bookangel') {
	$data = $_POST;

	if ($data['topic'] == '0') {
		echo 'You need to select genre!';
		return;
	}
	
	// Change post data to match destination form.
	$data['freefrom'] = date("Y/m/d", strtotime($data['freefrom']));
	
	$result = post_to_url($data);
// print_r($result);
// exit();
	$check = strpos($result, 'Thank you, your book has been successfully submitted.');
	if ($check == true || $result==" ") {
		$success = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'ebookshabit') {

	$result = post_to_url();
	// print_r($result);
	$check = strpos($result, 'ALMOST DONE');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
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
	$check = strpos($result, 'Thank you!');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'freebies4mom') {
	
	$result = post_to_url();
	// print_r($result);
	$check = strpos($result, 'Your response has been recorded.');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

}
else if ($submission_to == 'efreebooks') {
$data=$_POST;
$data['entry.1000000']=$_POST['entry_1000000'];	
$data['entry.1000001']=$_POST['entry_1000001'];	
$data['entry.1000004']=$_POST['entry_1000004'];	
// $data['']=$_POST[''];	
	$result = post_to_url($data);
 // print_r($result);
	$check = strpos($result, 'Your response has been recorded');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} 



else if ($submission_to == 'eroticaeveryday') {
	
	$result = post_to_url();
	// print_r($result);
	$check = strpos($result, 'Thank you for your submission');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} 
else if ($submission_to == 'christianbookreaders') {
	
	$result = post_to_url();
	// print_r($result);
	$check = strpos($result, 'Thank you for your submission');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} 



 else if ($submission_to == 'igniteyourbook') {
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
		$success = 1;
	} else {
		$error = 1;
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

	$check = strpos($result, 'Your book has been submitted successfully.');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if ($submission_to == 'ereaderperks') {

	$data = $_POST;

	$data['_wpcf7_is_ajax_call'] = 1;

	$result = post_to_url($data);
	$check = strpos($result, 'Your message was sent successfully');
	//
	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if ($submission_to == 'kindlebookpromos-luckycinda') {
	$result = post_to_url();
	// print_r($result);
	// exit();
	$check = strpos($result, 'Thank You! Your Submission has been received.');
	$check2=strpos($result, 'Form over quota');
// print_r($result);
	if ($check == true) {
		$success = 1;
	} 
	// else{
		if(strpos($result, 'Form over quota'))
		{

			echo "This form has passed it's allocated quota
and cannot be used at the moment.

Try contacting the owner of this form. ";
		}
	// }
		if($check == false && $check2==false)
		{
			$error=1;
		}	
} 
// else if ($submission_to == 'ebooklister') {
// 	$data = $_POST;

// 	if ($data['category'] == '0') {
// 		echo 'You need to select Category!';
// 		return;
// 	}

// 	if( ! empty($data['twitter']) && substr($data['twitter'],0,1)!='@'){
// 		echo 'Include @ in the twitter handle field';
// 		return ;
// 	}
// 	$data['twitter'] = urlencode($data['twitter']); // @ at the begining means a file upload so we need to encode @ character.

// 	$result = post_to_url($data);
// 	print_r($result);
// 	$check = strpos($result, 'Thank You!');
// 	if ($check === false) {
// 		$error = 1;
// 	} else {
// 		$success = 1;
// 	}

// } 

else if ($submission_to == 'freebookdude') {
	$data = $_POST;
	
	$startDate = explode('/',$data['sDate']);
	$lastDate  = explode('/',$data['eDate']);
	
	$data['entry.1000007_month'] = $startDate[0];
	$data['entry.1000007_day'] = $startDate[1];
	$data['entry.1000007_year'] = $startDate[2];
	
	$data['entry.1000008_month'] = $lastDate[0];
	$data['entry.1000008_day'] = $lastDate[1];
	$data['entry.1000008_year'] = $lastDate[2];
	
	$result = post_to_url($data);
	// print_r($data);
	// print_r($result);
	$check = strpos($result, 'Your response has been recorded.');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;

	}

} else if ($submission_to == 'feedyourreader') {
	$data = $_POST;
	$getDate = explode('/',$data['cdate']);
	//print_r($getDate[0]);
	$data['entry.285494196_month'] = $getDate[0];
	$data['entry.285494196_day']   = $getDate[1];
	$data['entry.285494196_year']  = $getDate[2];
	
	$result = post_to_url($data);
	// print_r($data);
	// print_r($result);
	$check = strpos($result, 'Your response has been recorded.');

	if ($check == true) {
		$success  = 1;
	} else {
		$error = 1;
	}

}	else if ($submission_to == 'kindlebook') {
	$data = $_POST;
	$startDate = explode('/',$data['sDate']);
	$lastDate  = explode('/',$data['lDate']);
	
	$data['q9_day19[month]'] = $startDate[0];
	$data['q9_day19[day]'] = $startDate[1];
	$data['q9_day19[year]'] = $startDate[2];
	
	$data['q10_lastDay10[month]'] = $lastDate[0];
	$data['q10_lastDay10[day]'] = $lastDate[1];
	$data['q10_lastDay10[year]'] = $lastDate[2];
	
	$result = post_to_url($data);
	//print_r($result);
	$check = strpos($result, "Your FREEBIE ALERT submission has been received");

	// print_r($_POST);
	// print_r($result);

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;

	}
}
// } else if ($submission_to == 'frugal-freebies') {
// 	$data = $_POST;

// 	// Change post data to match destination form.
// 	$data['entry_1000006'] = date('Y-m-d', strtotime($data['entry_1000006']));
	
// 	$result = post_to_url($data);
// 	$check = strpos($result, 'Thanks! Your response has been recorded');
	
// 	if ($check == true) {
// 		$success = 1;
// 	} else {
// 		$error = 1;
// 	}

// }
 else if ($submission_to == 'prettyhot') {
	$data = $_POST;

	if ($data['input_1_17'] == '0') {
		echo 'You need to select Category!';
		return;
	}

	$result = post_to_url($data);
	// print_r($result);
	$check = strpos($result, 'Thank you for submitting your book information. You will get an email shortly with your information to double check for accuracy.');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;

	}
	

} else if ($submission_to == 'itswritenow') {
	$data = $_POST;
	
	// Change post data to match destination form.
	//$data['entry_563265773'] = date('Y-m-d', strtotime($data['entry_563265773']));
	//$data['entry_1690722124'] = date('Y-m-d', strtotime($data['entry_1690722124']));
	$startDate = explode('/',$data['sDate']);
	$lastDate  = explode('/',$data['eDate']);
	
	$data['entry.1374796089_month'] = $startDate[0];
	$data['entry.1374796089_day'] = $startDate[1];
	$data['entry.1374796089_year'] = $startDate[2];
	
	$data['entry.945309800_month'] = $lastDate[0];
	$data['entry.945309800_day'] = $lastDate[1];
	$data['entry.945309800_year'] = $lastDate[2];

	$result = post_to_url($data);
	
	$check = strpos($result, 'Thank-you for your free book submission to itsWriteNow. We will do our best to feature your book promotion.');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;

	}

} 
else if ($submission_to == 'iloveebooks') { //NO
	$data = $_POST;

	$result = post_to_url($data);

	// echo $result;
	//  exit();
	$check = strpos($result, 'Thanks for your submission.');

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;

	}

} 
else if ($submission_to == 'ohfb') {
	
	$result = post_to_url();
	$check = strpos($result, 'Thanks for the notice!');
	//print_r($result);
	//print_r($check);
	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;

	}

} else if ($submission_to == 'freebooks') {

	$result = post_to_url();
	$check = strpos($result, 'Your promotion has been added for review and will appear on the promotion page shortly.');

	if ($check ==true) {
		$error = 1;
	} else {
		$success = 1;
	}

} else if($submission_to == 'ereadernewstoday'){

$data=$_POST;

$data_new=array();



/*$data1['authenticity_token']="JuSudTFGiGjL+9HHehIP/50G2uIiaTIpRvCMySXqvLQ=";
$data1['author_book[additional_information]']="data";
$data1['author_book[amazon_star_rating]']="50";
$data1['author_book[asin]']="1230";
$data1['author_book[author_name]']="krishna";
$data1['author_book[email]']="umeshkrishna88@gmail.com";
$data1['author_book[flexible]']="Yes";
$data1['author_book[genres]']="Romance";
$data1['author_book[name]']="umesh";
$data1['author_book[price]']="2.99";
$data1['author_book[preferred_end_date]']="11/27/2016";
$data1['author_book[preferred_start_date]']="11/01/2016";
$data1['author_book[rb_price]']="20";
$data1['author_book[pb_price]']="20";
$data1['author_book[retailers_attributes][0][retailer_link]']="https://authors.ereadernewstoday.com/author_books/new";
$data1['author_book[retailers_attributes][0][retailer_name]']="Apple iBooks";
$data1['author_book[retailers_attributes][1][retailer_link]']="https://authors.ereadernewstoday.com/author_books/new";
$data1['author_book[retailers_attributes][1][retailer_name]']="Barnes & Noble";
$data1['author_book[retailers_attributes][2][retailer_link]']="https://authors.ereadernewstoday.com/author_books/new";
$data1['author_book[retailers_attributes][2][retailer_name]']="Google";
$data1['author_book[retailers_attributes][3][retailer_link]']="https://authors.ereadernewstoday.com/author_books/new";
$data1['author_book[retailers_attributes][3][retailer_name]']="Kobo";
$data1['author_book[title]']="krishna";
$data1['button']="data";
$data1['form_url']="https://authors.ereadernewstoday.com//author_books";
$data1['utf8']="✓";*/


/*echo $_POST['author_book']['additional_information'];
echo $_POST['author_book']['amazon_star_rating'];

echo $_POST['author_book']['retailers_attributes'][0]['retailer_link'];
echo $_POST['author_book']['retailers_attributes'][0]['retailer_name'];


print_r($_POST);*/

/*echo "<pre>";
print_r($_POST);*/

// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";



$data_new['authenticity_token']=$_POST['authenticity_token'];
$data_new['author_book[additional_information]']=$_POST['author_book']['additional_information'];
$data_new['author_book[amazon_star_rating]']=$_POST['author_book']['amazon_star_rating'];
$data_new['author_book[asin]']=$_POST['author_book']['asin'];
$data_new['author_book[author_name]']=$_POST['author_book']['author_name'];
$data_new['author_book[email]']=$_POST['author_book']['email'];
$data_new['author_book[flexible]']=$_POST['author_book']['flexible'];
$data_new['author_book[genres]']=$_POST['author_book']['genres'];
$data_new['author_book[name]']=$_POST['author_book']['name'];
$data_new['author_book[price]']=$_POST['author_book']['price'];
$data_new['author_book[preferred_end_date]']=$_POST['author_book']['preferred_end_date'];
$data_new['author_book[preferred_start_date]']=$_POST['author_book']['preferred_start_date'];
$data_new['author_book[rb_price]']=$_POST['author_book']['rb_price'];
$data_new['author_book[pb_price]']=$_POST['author_book']['pb_price'];
$data_new['author_book[retailers_attributes][0][retailer_link]']=$_POST['author_book']['retailers_attributes'][0]['retailer_link'];
$data_new['author_book[retailers_attributes][0][retailer_name]']= $_POST['author_book']['retailers_attributes'][0]['retailer_name'];
$data_new['author_book[retailers_attributes][1][retailer_link]']=$_POST['author_book']['retailers_attributes'][1]['retailer_link'];;
$data_new['author_book[retailers_attributes][1][retailer_name]']= $_POST['author_book']['retailers_attributes'][1]['retailer_name'];
$data_new['author_book[retailers_attributes][2][retailer_link]']=$_POST['author_book']['retailers_attributes'][2]['retailer_link'];
$data_new['author_book[retailers_attributes][2][retailer_name]']= $_POST['author_book']['retailers_attributes'][2]['retailer_name'];
$data_new['author_book[retailers_attributes][3][retailer_link]']=$_POST['author_book']['retailers_attributes'][3]['retailer_link'];
$data_new['author_book[retailers_attributes][3][retailer_name]']= $_POST['author_book']['retailers_attributes'][3]['retailer_name'];
$data_new['author_book[title]']=$_POST['author_book']['title'];
$data_new['button']="data";
$data_new['form_url']="https://authors.ereadernewstoday.com//author_books";
$data_new['utf8']=$_POST['utf8'];





/*print_r($data_new);*/
$result = post_to_url($data_new);


	$check = strpos($result, 'You are being');
	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}
} else if($submission_to == 'indiebookoftheday'){
	$result = post_to_url();



	/*$check = strpos($result, '"sent":"true"');

	if ($check === false) {
		$error = 1;
	} else {
		$success = 1;
	}*/

	$check = strpos($result, '"sent":"true"');
	//print_r($result);
	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}

} else if($submission_to == 'theereadercafe'){
	
	// Check start date and make sure it's 3 days prior to promotion begins
	if( strtotime($_POST['entry_962586454']) - time() <= (3 * 24 * 60 * 60)){
		echo "Please submit your request at least 3 days prior to your book's freebie date. ";
		return 1;
	}

	$result = post_to_url();

	$check = strpos($result, "Thanks for submitting your Freebie Promo!");

	if ($check == true) {
		$success = 1;
	} else {
		$error = 1;
	}
} else {
	echo 'There is still no script for this form!';
	return;
}

if ($error === 1) {
	//echo 'Error, please check your form and try again';
	echo "\nError submiting form! Please be sure to fill out the form correctly and try again"
			. "\nPlease contact us at steve@bestsellerpublishing.org if the problem keeps occurring and "
			.'we will fix this as soon as possible. An E-Mail has already been sent to the Admin.';

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