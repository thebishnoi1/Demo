<?php

function get_form_data_array($book)
{
	$name = explode(' ', $book->author_name);
	$first_name = $name[0];
	$last_name = '';
	foreach ($name as $key => $value) {
		if ($key != 0) {
			$last_name .= $value . ' ';
		}
	}
	/*echo "<pre>";
	print_r(htmlspecialchars($book->author_bio));
	$forms['bookcanyon'] = array(
		'settings' => array(
			'web' => 'bookcanyon.com',
			'display_name' => 'bookcanyon.com',
			'id' => 'bookcanyon',
		),
		array(
			'form-label' => 'First name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'vfb-11',
			'value' => $first_name,
			'required' => 1
		),
		array(
			'form-label' => 'Last name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'vfb-14',
			'value' => $last_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'vfb-33',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'vfb-89',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'ASIN ( Amazon ASIN )',
			'input' => 'input',
			'type' => 'text',
			'name' => 'vfb-32',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Link to your book',
			'input' => 'input',
			'type' => 'url',
			'name' => 'vfb-6',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'First Promo Date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'vfb-90',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Last Promo Date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'vfb-91',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Genre',
			'input' => 'input',
			'type' => 'text',
			'name' => 'vfb-15',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Tell us about your book ( 200 Words or less)',
			'input' => 'textarea',
			'name' => 'vfb-16',
			'value' => strip_tags($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Give us a Tagline',
			'note' => '(15 Words or less)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'vfb-17',
			'value' => $book->tags,
		),
		array(
			'input' => 'hidden',
			'name' => 'form_id',
			'value' => 1
		),
		array(
			'input' => 'hidden',
			'name' => '_vfb-secret',
			'value' => 'vfb-3'
		),
		array(
			'input' => 'hidden',
			'name' => 'vfb-3',
			'value' => 23
		),
		array(
			'input' => 'hidden',
			'name' => '_wp_http_referer',
			'value' => '/submitbook/'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://bookcanyon.com/submitbook/'
		),
		array(
			'input' => 'hidden',
			'name' => 'vfb-submit',
			'value' => 1
		)
	);*/

	// $forms['choosybookworm'] = array(
	// 	'settings' => array(
	// 		'web' => 'choosybookworm.com',
	// 		'display_name' => 'choosybookworm.com',
	// 		'id' => 'choosybookworm',
	// 	),
	// 	array(
	// 		'form-label' => 'First name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-183',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Last name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-189',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'vfb-186',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author Twitter',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-194',
	// 		'value' => '',
	// 	),
	// 	array(
	// 		'form-label' => 'Facebook Page',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-201',
	// 		'value' => $book->facebook_url,
	// 	),
	// 	array(
	// 		'form-label' => 'Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-195',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN ( Amazon ASIN )',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-193',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Number of Reviews',
	// 		'input' => 'input',
	// 		'type' => 'number',
	// 		'name' => 'vfb-196',
	// 		'value' => $book->reviews,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Average Review',
	// 		'note' => '(enter number, e.g. "4" for 4-stars)',
	// 		'input' => 'input',
	// 		'type' => 'number',
	// 		'name' => 'vfb-197',
	// 		'value' => $book->rating,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Normal Price',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-190',
	// 		'value' => $book->regular_price,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Discounted	Price',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-191',
	// 		'value' => '',
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'First Promo Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'vfb-192',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Last Promo Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'vfb-184',
	// 		'value' => date("m/d/Y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-199',
	// 		'value' => $book->genre,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Blurb',
	// 		'input' => 'textarea',
	// 		'name' => 'vfb-187',
	// 		'value' => strip_tags($book->book_description),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Any comments?',
	// 		'input' => 'textarea',
	// 		'name' => 'vfb-185',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'So happy you found us! How did you hear about us? ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'vfb-198',
	// 		'value' => '',
	// 	),

	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_id',
	// 		'value' => 8
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '_vfb-secret',
	// 		'value' => 'vfb-181'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'vfb-181',
	// 		'value' => 23
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'vfb-spam',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '_wp_http_referer',
	// 		'value' => '/authors/'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://choosybookworm.com/authors/'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'vfb-submit',
	// 		'value' => 1
	// 	)
	// );
	/***********************************************************/

// $forms['justfreeandbargainbooks'] = array(
// 		'settings' => array(
// 			'web' => 'justfreeandbargainbooks.com',
// 			'display_name' => 'justfreeandbargainbooks.com',
// 			'id' => 'justfreeandbargainbooks',
// 		),
// 		array(
// 			'form-label' => 'Name*',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g310-name',
// 			'value' => $first_name,
// 			'required' => 1
// 		),
	
// 		array(
// 			'form-label' => 'Email*',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'g310-email',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 			array(
// 			'form-label' => 'Book Title',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g310-booktitle',
// 			'value' => $book->book_title,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Author',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g310-author',
// 			'value' => $book->author_name,
// 			'required' => 1
// 		),

	
// 		array(
// 			'form-label' => 'Genre*',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g310-genre',
// 			'value' => '',
// 			'required' => 1
		
// 		),
	
		
// 		array(
// 			'form-label' => 'Date Promo Begins (Month/Day)* ',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'class' => 'datepicker',
// 			'name' => 'g310-datepromobeginsmonthday',
// 			'value' => date("m/d/Y", strtotime($book->start_date))
// 		),
// 			array(
// 			'form-label' => 'Amazon Link*',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g310-amazonlink',
// 			'value' => $book->amazon_url,
// 			'required' => 1
// 		),
		
// 		array(
// 			'form-label' => 'How Did You Hear About Us?* ',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g310-howdidyouhearaboutus',
// 			'value' => '',
// 			'required' => 1
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'contact-form-id',
// 			'value' => '310'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'action',
// 			'value' => 'grunion-contact-form'
// 		),
		
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'https://justfreeandbargainbooks.wordpress.com/authors-submissions/#contact-form-310'
// 		)
// 	);



/*
$forms['digital_ink'] = array(
		'settings' => array(
			'web' => 'The Digital Ink Spot',
			'display_name' => 'The Digital Ink Spot',
			'id' => 'digital_ink',
		),
	
		array(
			'form-label' => 'Author name *',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.2458667',
			'value' => $book->author_name,
			'required' => 1
		),
	
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000001',
			'value' => $book->book_title,
			'required' => 1
		),
				array(
			'form-label' => 'The dates of the promo *',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'entry.1000003',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),

		array(
			'form-label' => 'Author website ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000004',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Link to purchase book',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000009',
			'value' => $book->amazon_url,
			'required' => 1
		),
				array(
			'form-label' => 'Book website',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000009',
			'value' => $book->amazon_url
			
		),

				array(
			'form-label' => 'Twitter handle',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000010',
			'value' => '',
			'required' =>1
		),
						array(
			'form-label' => 'Youtube video book trailer link ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000007',
			'value' => '',
		),
		array(
			'form-label' => 'Please describe your book*',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000008',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
				
		array(
			'input' => 'hidden',
			'name'  => 'draftResponse',
			'value' => '[,,"-447345179118015159"] ',
		),
				array(
			'input' => 'hidden',
			'name'  => 'pageHistory',
			'value' => '0',
		),
		array(
			'input' => 'hidden',
			'name'  => 'fbzx',
			'value' => '-447345179118015159',
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1rtQyMeQ78Zex4McohTzZxx8GJkuJPJk2wyppgPHHb8I/formResponse?embedded=true'
		),

	);*/









	/******************** http://beezeebooks.com *******************/
/*
$forms['beezeebooks'] = array(
		'settings' => array(
			'web' => 'beezeebooks.com',
			'display_name' => 'beezeebooks.com',
			'id' => 'beezeebooks',
		),
		array(
			'form-label' => 'First name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-name',
			'value' => $first_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'your-email',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'text-173',
			'value' =>  $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Genre',
			'input' => 'input',
			'type' => 'text',
			'name' => 'text-645',
			'value' => $book->genre
		),
		array(
			'form-label' => 'Twitter Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'text-255',
			'value' => '',
			
		),
		array(
			'form-label' => 'Facebook Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'text-965',
			'value' => ''
		),
		array(
			'form-label' => 'Subject',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-subject',
			'value' => ''
		),
		
		
		array(
			'form-label' => 'Book Description and Authors Bio*',
			'input' => 'textarea',
			'name' => 'textarea-689',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7',
			'value' => '1213'
		),				
		array(
			'input' => 'hidden',
			'name' => '_wpcf7_version',
			'value' => '4.4.1'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7_locale',
			'value' => 'en_US'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7_unit_tag',
			'value' => 'wpcf7-f1213-p70-o1'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpnonce',
			'value' => '68e7efce5f'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://beezeebooks.com/book-promotion/#wpcf7-f1213-p70-o1'
		)
	);
	*/
/********************** 	bookreviewbuzz ***************/

$forms['bookreviewbuzz'] = array(
		'settings' => array(
			'web' => 'bookreviewbuzz.com',
			'display_name' => 'bookreviewbuzz.com',
			'id' => 'bookreviewbuzz',
		),
		array(
			'form-label' => 'Name *',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_7',
			'value' => $first_name,
			'required' => 1
		),
		array(
			'form-label' => 'Website',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_10',
			'value' => '',
			'required' => 1
		),
		array(
			'form-label' => 'Email Address *',
			'input' => 'input',
			'type' => 'email',
			'name' => 'ninja_forms_field_7',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_11',
			'value' =>  $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Author Name: *',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_12',
			'value' =>  $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'ISBN or ASIN Number*',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_13',
			'value' =>  $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Genre',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_14',
			'value' => $book->genre
		),
		array(
			'form-label' => 'Formats available for review.',
			'input' => 'input',
			'type' => 'text',
			'name' => 'ninja_forms_field_15',
			'value' => '',
			
		),
		array(
			'form-label' => 'Do you want us to handle the review request directly or would you prefer to handle all requests? If you want to handle all requests please list the contact information for reviewers to contact you. Email address, web address, facebook page, twitter, etc. *',
			'input' => 'textarea',
			
			'name' => 'ninja_forms_field_16',
			'value' => ''
		),
			
		
		array(
			'form-label' => 'Book Description*',
			'input' => 'input',
			'type' => 'textarea',
			'name' => 'ninja_forms_field_17',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => '_wpnonce',
			'value' => 'b9f1062775'
		),				
		array(
			'input' => 'hidden',
			'name' => '_wp_http_referer',
			'value' => 'http://bookreviewbuzz.com/our-services/add-your-book/'
		),
		array(
			'input' => 'hidden',
			'name' => '_ninja_forms_display_submit',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => '_form_id',
			'value' => '5'
		),
		array(
			'input' => 'hidden',
			'name' => '_4h27F',
			'value' => '_hp_name'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://bookreviewbuzz.com/thank-you/'
		)
	);
	
	
/********************** Digital Book Today***********/


	// $forms['digitalbooktoday'] = array(
	// 	'settings' => array(
	// 		'web' => 'digitalbooktoday.com',
	// 		'display_name' => 'digitalbooktoday.com',
	// 		'id' => 'digitalbooktoday',
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-authorfirstlastname',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-email',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-bookname',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Amazon Book Link (preferred) or ASIN*',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-amazonbooklinkpreferredorasin',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Current Amazon Rating and Number of Reviews (ex: 4.3 stars on 24 reviews). Both numbers must be included. Requirements: Fiction (18+ reviews, 4.0+ stars, 100+ pages). Non-Fiction (less than 100 pages: 60+ reviews, 4.2 stars). Non-Fiction (100+ pages, 40+ reviews, 4.0+ stars). Books that do not meet these guidelines can be listed with a $15 paid listing. Please see Option #13 on our promotions page. ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-currentamazonratingandnumberofreviewsex4-3starson24reviews-bothnumbersmustbeincluded-requirementsfiction18reviews4-0stars100pages-nonfictionlessthan100pages60reviews4-2stars-nonfiction100page',
	// 		'value' => $book->rating
			
	// 	),
	// 	array(
	// 		'form-label' => 'Date(s) of your KDP Select Free Days. (month/day/year or Perma-Free) Note: Many authors believe promoting a book for 2-3 days is more effective than a single day.',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-datesofyourkdpselectfreedays-monthdayyearorpermafreenotemanyauthorsbelievepromotingabookfor23daysismoreeffectivethanasingleday',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'Genre(s) of book',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-genresofbook',
	// 		'values' => $book->genre,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Just so we know : What is 4 + 1 = ? ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-justsoweknowyouarenotarobotwhatis42',
	// 		'values' => ''
			
	// 	),

	// 	array(
	// 		'form-label' => 'Any other info we need to know? OK to leave blank.',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-anyotherinfoweneedtoknowoktoleaveblank-saveyourtimepleasedonotaddabookdescription-wepullallinfofromamazon',
	// 		'values' => ''
		
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'contact-form-id',
	// 		'value' => '4962'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'action',
	// 		'value' => 'grunion-contact-form'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://digitalbooktoday.com/12-top-100-submit-your-free-book-to-be-included-on-this-list/#contact-form-4962'
	// 	)
	// );



	
/*$forms['freekindledeal'] = array(
		'settings' => array(
			'web' => 'freekindledeal.com',
			'display_name' => 'freekindledeal.com',
			'id' => 'freekindledeal',
		),
		array(
			'form-label' => 'Amazon ASIN#',
			'input' => 'input',
			'type' => 'text',
			'name' => 'field1',
			'value' => $book->asin,
			'required' => 1
		),
				array(
			// 'form-label' => 'Amazon ASIN#',
			'input' => 'input',
			'type' => 'hidden',
			'name' => 'action',
			'value' => 'formcraft_basic_form_submit',
			'required' => 1
		),
				array(
			// 'form-label' => 'Amazon ASIN#',
			'input' => 'input',
			'type' => 'hidden',
			'name' => 'id',
			'value' => 1,
			'required' => 1
		),



			

		
		array(
			'form-label' => 'First Date Free',
			'input' => 'input',
			'type' => 'text',
			'name' => 'field2',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			
		),

			array(
			'form-label' => 'How many days is your promotion?',
			'input' => 'select',
			'name' => 'field3',
			'values' => array(
				"1"  => "1",
				"2"  => "2",
				"3"  => "3",
				"4"  => "4",
				"5"  => "5",
				"6"  => "6"
			)
			
		),
		
		array(
			'form-label' => 'Promotional Notes',
			'input' => 'textarea',
			'name' => 'field4',
			'value' => strip_tags($book->book_description),
			'required' => 1
			
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'field5',
			'value' => $book->email,
			'required' => 1
		),
	
				array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://www.freekindledeal.com/wp-admin/admin-ajax.php'
		)
	);
	*/




/************* Bargain Booksy ***************/
	// $forms['bargainbooksy'] = array(
	// 	'settings' => array(
	// 		'web' => 'bargainbooksy.com',
	// 		'display_name' => 'bargainbooksy.com',
	// 		'id' => 'bargainbooksy',
	// 	),
	// 	array(
	// 		'form-label' => 'First name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[83]',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Last Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[84]',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'item_meta[85]',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Link (Amazon)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[86]',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Link (Nook)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[90]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Book Link (Apple)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[91]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[92]',
	// 		'value' => $book->genre
	// 	),
	// 	array(
	// 		'form-label' => 'Promotional price',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[93]',
	// 		'value' =>  $book->regular_price
	// 	),
	// 	array(
	// 		'form-label' => 'First Day your Book will be Discounted ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'item_meta[94]',
	// 		'value' => date("m/d/Y", strtotime($book->start_date))
	// 	),
	// 	array(
	// 		'form-label' => 'Last Day your Book will be Discounted ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[95]',
	// 		'class' => 'datepicker',
	// 		'value' => date("m/d/Y", strtotime($book->end_date))
	// 	),
		
	// 	array(
	// 		'form-label' => 'Please describe your book*',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[88]',
	// 		'value' => htmlspecialchars($book->book_description),
	// 		'required' => 1
	// 	),
				
	// 			array(
	// 		'input' => 'hidden',
	// 		'name' => 'item_key',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_action',
	// 		'value' => 'create'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_id',
	// 		'value' => '6'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_key',
	// 		'value' => 'bbksyeditorial'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_hide_fields_6',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_helpers_6',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'item_meta[0]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_submit_entry_6',
	// 		'value' => '5c6d6f423e'
	// 	),

	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '_wp_http_referer',
	// 		'value' => 'http://www.bargainbooksy.com/for-authors/'
	// 	),
				
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.bargainbooksy.com/for-authors/'
	// 	)
	// );
// 	$forms['ereaderiq'] = array(
//   'settings' => array(
//    'web' => 'ereaderiq',
//    'display_name' => 'ereaderiq',
//    'id' => 'ereaderiq',
//   ),
 
//   array(
//    'form-label' => 'Name',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'name',
//    'value' => $book->author_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Email',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'email',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'I am a(n)',
//    'input' => 'input',
//    'type' => 'select',
//    'name' => 'who',
//    'value' => 'Author',
//    'required' => 0
//   ),
   
//       array(
//    'form-label' => 'I have a',
//    'input' => 'input',
//    'type' => 'select',
//    'name' => 'why',
//    'value' => 'Other',
//    'required' => 0
//   ),
//   array(
//    'form-label' => 'Subject',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'subject',
//    'value' => 'Free Book Promotion Submission',
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Message',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'message',
//    'value' => 'Please submit my book:
// Book title: ' . $book->book_title . '
// ASIN:' . $book->asin . '
//  First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
//  Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!',
//    'required' => 1
//   ),

//     array(
//    'form-label' => '9 + 2 =',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'challenge',
//    'value' => '',
//    'required' =>1
//   ),
   
//   array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'http://www.ereaderiq.com/contact/'
//   ),

//  );







/**********************************zwooderprofile***************************/
// $forms['zwoodlebooks'] = array(
//   'settings' => array(
//    'web' => 'zwoodlebooks',
//    'display_name' => 'zwoodlebooks',
//    'id' => 'zwoodlebooks',
//   ),

//   array(
//    'form-label' => 'Your Name*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-yourname',
//    'value' => '',
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Your E-mail*',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'g225-youremail',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Website',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-website',
//    'value' => '',
//    'required' => 1
//   ),

//       array(
//    'form-label' => 'Author Name*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-authorname',
//    'value' => $book->author_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Twitter Handle or URL',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-twitterhandleorurl',
//    'value' => '',
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Link to your True Review Pledge Profile',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-linktoyourtruereviewpledgeprofilerequireddonotenteranyotherurlrequestswithlinkstoanyotherurlwillbedeleted',
//    'value' => $book->amazon_url,
//    'required' => 1
//   ),

//     array(
//    'form-label' => 'Dates, locations, and prices of deal ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-dateslocationsandpricesofdealifkindlecountdowndealprovidedetails',
//    'value' => '',
//    'required' =>0
//   ),
//       array(
//    'form-label' => 'Book Title*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-booktitle',
//    'value' => $book->book_title,
//   ),
//   array(
//    'form-label' => 'Genre*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-genre',
//    'value' => $book->genre,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'Where is the book offered? Exclusive to Kindle? If not, please put URLs to where it is available.',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g225-whereisthebookofferedexclusivetokindleifnotpleaseputurlstowhereitisavailable',
//    'value' => $book->amazon_url,
//    'required' => 1
//   ),
    
//   array(
//    'input' => 'hidden',
//    'name'  => 'contact-form-id',
//    'value' => '225',
//   ),
//     array(
//    'input' => 'hidden',
//    'name'  => 'action',
//    'value' => 'grunion-contact-form',
//   ),
 
//   array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'http://zwoodlebooks.com/authors-and-publishers/#contact-form-225'
//   ),

//  );
/**********************book circle******************************/
	// $forms['book-circle'] = array(
 //  'settings' => array(
 //   'web' => 'book-circle',
 //   'display_name' => 'book-circle',
 //   'id' => 'book-circle',
 //  ),
 

 //  array(
 //   'form-label' => 'Free',
 //   'input' => 'input',
 //   'type' => 'radio',
 //   'name' => 'input_21',
 //   'value' => 'Free|0',
 //   'required' => 1
 //  ),
 //  array(
 //   'form-label' => 'First name',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'name' => 'input_1',
 //   'value' => $book->author_name,
 //   'required' => 1
 //  ),
 //  array(
 //   'form-label' => 'Last name',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'name' => 'input_20',
 //   'value' => $book->author_name,
 //   'required' => 1
 //  ),
 //  array(
 //   'form-label' => 'Email',
 //   'input' => 'input',
 //   'type' => 'email',
 //   'name' => 'input_2',
 //   'value' => $book->email,
 //   'required' => 1
 //  ),
 //  array(
 //   'form-label' => 'Book Title',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'name' => 'input_3',
 //   'value' => $book->book_title,
 //   'required' => 1
 //  ),
 
 //      array(
 //   'form-label' => 'Link to Amazon Product Page',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'name' => 'input_4',
 //   'value' => $book->amazon_url,
 //   'required' => 1
 //  ),
 //  array(
 //   'form-label' => 'Twitter Username',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'name' => 'input_10',
 //   'value' => '',
 //   'required' => 0
 //  ),
 //    array(
 //   'form-label' => 'Genre*',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'name' => 'input_7',
 //   'value' => $book->genre,
 //   'required' => 1
 //  ),

 //     array(
 //   'form-label' => 'Promotion start date',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'class' => 'datepicker',
 //   'name' => 'input_5',
 //   'value' => date("m/d/Y", strtotime($book->start_date)),
 //   'required' => 1
 //  ),

 //    array(
 //   'form-label' => 'Promotion end date',
 //   'input' => 'input',
 //   'type' => 'text',
 //   'class' => 'datepicker',
 //   'name' => 'input_6',
 //   'value' => date("m/d/Y", strtotime($book->end_date)),
 //   'required' => 1
 //  ),

 //     array(
 //   'form-label' => 'Subscribe',
 //   'input' => 'input',
 //   'type' => 'checkbox',
 //   'name' => 'input_subscribe_me_mailpoet_lists',
 //   'value' => '1',
 //   'required' => 0
 //  ),


 //  array(
 //   'input' => 'hidden',
 //   'name'  => 'gforms_calendar_icon_input_7_5',
 //   'value' => 'http://www.book-circle.com/wp-content/plugins/gravityforms/images/calendar.png',
 //  ),
 //    array(
 //   'input' => 'hidden',
 //   'name'  => 'gforms_calendar_icon_input_7_6',
 //   'value' => 'http://www.book-circle.com/wp-content/plugins/gravityforms/images/calendar.png',
 //  ),
 //  array(
 //   'input' => 'hidden',
 //   'name'  => 'input_14.3',
 //   'value' => '1',
 //  ),
 //  array(
 //   'input' => 'hidden',
 //   'name'  => 'input_14.1',
 //   'value' => 'Product Name',
 //  ),
 //   array(
 //   'input' => 'hidden',
 //   'name'  => 'input_14.2',
 //   'value' => '$0.00',
 //  ),
 //    array(
 //   'input' => 'hidden',
 //   'name'  => 'input_12',
 //   'value' => '0',
 //  ),
  
 //     array(
 //   'input' => 'hidden',
 //   'name'  => 'gform_ajax',
 //   'value' => 'form_id=7&title=&description=&tabindex=1',
 //  ),
 //     array(
 //   'input' => 'hidden',
 //   'name'  => 'gform_submit',
 //   'value' => '7',
 //  ),
 //     array(
 //   'input' => 'hidden',
 //   'name'  => 'gform_unique_id',
 //   'value' => '',
 //  ),
 //     array(
 //   'input' => 'hidden',
 //   'name'  => 'state_7',
 //   'value' => '',
 //  ),
 //     array(
 //   'input' => 'hidden',
 //   'name'  => 'gform_target_page_number_7',
 //   'value' => '0',
 //  ),
 //     array(
 //   'input' => 'hidden',
 //   'name'  => 'gform_source_page_number_7',
 //   'value' => '0',
 //  ),

 //    array(
 //   'input' => 'hidden',
 //   'name'  => 'gform_field_values',
 //   'value' => '',
 //  ),

 //  array(
 //   'input' => 'hidden',
 //   'name' => 'form_url',
 //   'value' => 'http://www.book-circle.com/submit-free-kindle-ebook-listing/#gf_7'
 //  ),

 // );

/************* bookraid ***************/
	

	// $forms['bookraid'] = array(
	// 	'settings' => array(
	// 		'web' => 'bookraid.com',
	// 		'display_name' => 'bookraid.com(In progress)',
	// 		'id' => 'bookraid',
	// 	),
	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][title]',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][author_name]',
	// 		'value' => $book->author_name
	// 	),
	// 	array(
	// 		'form-label' => 'Category',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][category_id]',
	// 		'value' =>  $book->genre,
	// 		'required' => 1
	// 	),
	// 		array(
	// 		'form-label' => 'ASIN',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][asin]',
	// 		'value' => $book->asin
	// 	),
	// 	array(
	// 		'form-label' => 'Description',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][description]',
	// 		'value' => htmlspecialchars($book->book_description),
	// 		'required' => 1
	// 	),
		
		
	// 	array(
	// 		'form-label' => 'Link to Book on Amazon',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][amazon_url]',
	// 		'value' => $book->amazon_url
	// 	),
	
	// 	array(
	// 		'form-label' => 'iBooks URL (Optional)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][ibooks_url]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Google Play URL (Optional)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][google_play_url]',
	// 		'value' => ''
	// 	),
	// 		array(
	// 		'form-label' => 'Kobo URL (Optional)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][kobo_url]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Requested Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'partner[books_attributes][0][promotions_attributes][0][requested_date]',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 		array(
	// 		'form-label' => 'Current price',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][promotions_attributes][0][current_price]',
	// 		'value' => ''
	// 	),

	// 		array(
	// 		'form-label' => 'Sale Price (use 0 for free)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[books_attributes][0][promotions_attributes][0][sale_price]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Alternate Dates',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'partner[books_attributes][0][promotions_attributes][0][date_flexibility]',
	// 		'value' => date("m/d/Y", strtotime($book->end_date)),
			
	// 	),

	// 	array(
	// 		'form-label' => "Email (you'll sign in with this)",
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'partner[email]',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Full name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[name]',
	// 		'value' =>  $book->author_name,
			
	// 	),
	// 	array(
	// 		'form-label' => 'Password (minimum 8 characters)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[password]',
	// 		'value' => '',
			
	// 	),
	// 	array(
	// 		'form-label' => 'Password confirmation',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[password_confirmation]',
	// 		'value' => '',
			
	// 	),
	// 	array(
	// 		'form-label' => 'Subscribe to Partner Newsletter',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'partner[subscribe_me]',
	// 		'value' => '',
			
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'utf8',
	// 		'value' => '✓'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'authenticity_token',
	// 		'value' => 'Z1axPHwG8JH/Gb7VVZTiTgQCcFGcjXFP4b3ranfVf0XsHeJJKal9BiWKlsIbfFV/nov+Kmn3gJFYzJFMZ3ARUA=='
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'partner[subscribe_me]',
	// 		'value' => '0'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'https://bookraid.com/p/partners/'
	// 	)
	// );

/****************************   theereadercafe   *******************************/


	$forms['theereadercafe'] = array(
		'settings' => array(
			'web' => 'theereadercafe.com',
			'display_name' => 'theereadercafe.com',
			'id' => 'theereadercafe',
		),
	
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.753090951',
			'value' => $book->author_name
		),

		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.570084279',
			'value' => $book->email,
			'required' => 1
		),

			array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1464509009',
			'value' => $book->book_title,
			'required' => 1
		),

		array(
			'form-label' => 'Genre *',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1561674614',
			'value' =>  $book->genre,
			'required' => 1
		),

			array(
			'form-label' => 'Number of reviews *',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1005912519',
			'value' => '',
			'required' => 1
		),
			array(
			'form-label' => 'Amazon ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1403970107',
			'value' => $book->asin
		),
		array(
			'form-label' => 'Number of reviews *',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1005912519',
			'value' => '',
			'required' => 1
		),
				
		array(
			'form-label' => 'Date your free promotion begins *',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'entry.962586454',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
			
		array(
			'form-label' => 'Date your free promotion ends *',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'entry.949226932',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			
		),

	
		array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"-6634771154416794959"] '
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '-6634771154416794959'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1BLxXWpnqgpNyGCbblqdDYHj2A8TrJQf5c9FDbHjXh1w/formResponse?embedded=true'
		)
	);

/*********************** iloveebooks.com  ************************/


	// $forms['iloveebooks'] = array(
	// 	'settings' => array(
	// 		'web' => 'iloveebooks.com',
	// 		'display_name' => 'iloveebooks.com (in progress)',
	// 		'id' => 'iloveebooks',
	// 	),
	
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u892471531850343280[first]',
	// 		'value' => $book->author_name
	// 	),

	// 	array(
	// 		'form-label' => 'Author Last Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u892471531850343280[last]',
	// 		'value' => $book->last_name
	// 	),


	// 	array(
	// 		'form-label' => 'Author Email *',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => '_u862462987511948931',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),

	// 		array(
	// 		'form-label' => 'Book Title *',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u713720139192601811',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 		array(
	// 		'form-label' => 'Amazon ASIN',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u164709076728177312',
	// 		'value' => $book->asin
	// 	),

	// 	array(
	// 		'form-label' => 'Primary Genre *',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u995393663581452803',
	// 		'value' =>  $book->genre,
		
	// 	),

	// 		array(
	// 		'form-label' => 'Link to Book on Amazon *',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u632233461721808192',
	// 		'value' => $book->amazon_url,
			
	// 	),
		
	// 	array(
	// 		'form-label' => 'Number of days FREE *',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u902476867814112192',
	// 		'value' => '',
	// 		'required' => 1
	// 	),
				
	// 	array(
	// 		'form-label' => 'First Day Free',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => '_u745843257716463678',
	// 		'value' => '',
			
	// 		),
			
	// 	array(
	// 		'form-label' => 'Last Day Free',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => '_u615076289469063166',
	// 		'value' => ''
			
	// 	),

	
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_version',
	// 		'value' => '2'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'wsite_approved',
	// 		'value' => 'approved'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'ucfid',
	// 		'value' => '898533336848436057'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.iloveebooks.com/ajax/apps/formSubmitAjax.php'
	// 	)
	// );

/****************************** jungledealsandsteals.com  ******************************/


	// $forms['jungledealsandsteals'] = array(
	// 	'settings' => array(
	// 		'web' => 'jungledealsandsteals.com',
	// 		'display_name' => 'jungledealsandsteals.com (in progress)',
	// 		'id' => 'jungledealsandsteals',
	// 	),
	
	// 	array(
	// 		'form-label' => 'Author Name*',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_1',
	// 		'value' => $book->author_name
	// 	),

	// 	array(
	// 		'form-label' => 'Your Name (if not the author)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_2',
	// 		'value' => $book->first_name
	// 	),


	// 	array(
	// 		'form-label' => 'Email Address*',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'input_11',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),

	// 		array(
	// 		'form-label' => 'eBook Title *',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_4',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 		array(
	// 		'form-label' => 'Amazon Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_12',
	// 		'value' => $book->amazon_url
	// 	),

	// 	array(
	// 		'form-label' => 'Promotion start date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'input_13mk',
	// 		'value' => date("m/d/Y", strtotime($book->start_date))
			
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion end date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'input_14mk',
	// 		'value' => date("m/d/Y", strtotime($book->end_date))
			
	// 	),

	// 			array(
	// 		'form-label' => 'Promotion start date',
	// 		'input' => 'input',
	// 		'type' => 'hidden',
	// 		// 'class' => 'datepicker',
	// 		'name' => 'input_13[]',
	// 		'value' => '2'
			
	// 	),
	// 					array(
	// 		'form-label' => 'Promotion start date',
	// 		'input' => 'input',
	// 		'type' => 'hidden',
	// 		// 'class' => 'datepicker',
	// 		'name' => 'input_13[]',
	// 		'value' => '5'
			
	// 	),
	// 									array(
	// 		'form-label' => 'Promotion start date',
	// 		'input' => 'input',
	// 		'type' => 'hidden',
	// 		// 'class' => 'datepicker',
	// 		'name' => 'input_13[]',
	// 		'value' => '2015'
			
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion end date',
	// 		'input' => 'input',
	// 		'type' => 'hidden',
	// 		// 'class' => 'datepicker',
	// 		'name' => 'input_14[]',
	// 		'value' => ''
			
	// 	),

	// 	// array(
	// 	// 	'form-label' => 'Category*',
	// 	// 	'input' => 'input',
	// 	// 	'type' => 'text',
	// 	// 	'name' => 'input_9',
	// 	// 	'value' =>  $book->genre,
		
	// 	// ),
	// 	       array(
	// 		   'form-label' => 'Fiction',
	// 		   'input' => 'input',
	// 		   'type' => 'radio',
	// 		   'name' => 'input_9',
	// 		   'value' => 'Fiction',
	// 		   'required' =>1
	// 		  ),

	// 	      		       array(
	// 		   'form-label' => "Children's",
	// 		   'input' => 'input',
	// 		   'type' => 'radio',
	// 		   'name' => 'input_9',
	// 		   'value' => "Children's",
	// 		   'required' =>1
	// 		  ),

	// 	     		      		       array(
	// 		   'form-label' => 'Nonfiction',
	// 		   'input' => 'input',
	// 		   'type' => 'radio',
	// 		   'name' => 'input_9',
	// 		   'value' => "Nonfiction",
	// 		   'required' =>1
	// 		  ),

	// 		array(
	// 		'form-label' => 'Subcategory*',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_10',
	// 		'value' => $book->genre,
			
	// 	),
		
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'is_submit_1',
	// 		'value' => '1'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_submit',
	// 		'value' => '1'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_unique_id',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'WyJbXSIsIjhjNWE3ZjZkZjU2MzgxNTg3MzU3NjllYThiYmI3ZjU0Il0=',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_target_page_number_1',
	// 		'value' => '0'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_source_page_number_1',
	// 		'value' => '1'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_field_values',
	// 		'value' => ''
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://jungledealsandsteals.com/submit-your-kindle-freebie/'
	// 	)
	// );






	/************** EBOOK LISTER.NEt ************************/
	$forms['ebooklister'] = array(
		'settings' => array(
			'web' => 'ebooklister.net',
			'display_name' => 'ebooklister.net',
			'id' => 'ebooklister',
		),
		array(
			'form-label' => 'Enter the Listing title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'title',
			'value' => $book->book_title,
			'required' => 1
		), array(
			'form-label' => 'Enter the Listing author',
			'input' => 'input',
			'type' => 'text',
			'name' => 'author',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Enter Your Twitter Handle (@ is required)',
			'note' => 'Enter your Twitter Handle to get a shoutout on the day your listing is on eBookLister!',
			'input' => 'input',
			'type' => 'text',
			'name' => 'twitter',
			'value' => '',
			'required' => 0
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'submitter',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Enter the author URL:',
			'note' => 'Include the full \'http://\'',
			'input' => 'input',
			'type' => 'text',
			'name' => 'authorurl',
			'value' => $book->amazon_url,
			'required' => 0
		),
		array(
			'form-label' => 'Enter the Listing kindle asin',
			'input' => 'input',
			'type' => 'text',
			'name' => 'asin',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Select a Category',
			'input' => 'select',
			'values' => array(
				'0' => 'Please select category',
				'218' => 'Bios &amp; Memoirs',
				'223' => 'Childrens',
				'215' => 'Fantasy',
				'213' => 'Fiction',
				'214' => ' -- Childrens Fiction',
				'219' => ' -- Comedy/Humor',
				'217' => ' -- Contemporary',
				'224' => ' -- Historical',
				'211' => 'Horror',
				'221' => 'Humor',
				'210' => 'Mystery',
				'212' => 'Non-Fiction',
				'216' => ' -- Advice &amp; How-To',
				'226' => ' -- Recipe/Cookbooks',
				'204' => 'Romance',
				'207' => ' -- Contemporary',
				'205' => ' -- Historical',
				'227' => ' -- Mystery',
				'222' => ' -- Paranormal',
				'206' => ' -- Steamy',
				'208' => 'Science Fiction',
				'220' => 'Suspense',
				'228' => 'Thriller',
				'209' => 'Young Adult',
			),
			'name' => 'category'
		),
		array(
			'form-label' => 'Listing Type',
			'input' => 'select',
			'name' => 'list_type',
			'values' => array(
				"0"  => " Free / Perma-Free",
				"1"  => " Bargain / On Sale ($2.99 or less but not free)"
			),
			'required' => 1
		),
		array(
			'form-label' => '1st List Day',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'fd1',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => '2nd List Day',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'fd2',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 1 day')),
			'required' => 0
		),
		array(
			'form-label' => '3rd List Day',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'fd3',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 2 day')),
			'required' => 0
		), array(
			'form-label' => '4th List Day',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'fd4',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 3 day')),
			'required' => 0
		),
		array(
			'form-label' => 'Enter the Description of the book',
			'note' => 'Please be aware that we require email confirmation before your listing will be reviewed. Please watch for a confirmation email (and check the spam folder too). ',
			'input' => 'textarea',
			'name' => 'body',
			'value' => strip_tags($book->book_description),
			'required' => 1
		),
		array(
			'label' => ' You must agree to the
			<a href="http://www.ebooklister.net/page.php?p=2">Submittal Requirements</a>',
			'input' => 'checkbox',
			'name' => 'agree',
			'value' => 'yes',
			'selected' => 'checked',
		),
	
		array(
			'input' => 'hidden',
			'name' => 'imgsml',
			'value' => 'imgsml'
		),
		array(
			'input' => 'hidden',
			'name' => 'imglrg',
			'value' => 'imglrg'
		),
				array(
			'input' => 'hidden',
			'name' => 'update',
			// 'value' => 'imglrg'
		),
		
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://www.ebooklister.net/submit.php'
		)

	);
	
	
	/************* ARMADILLO BOOKS *************/
	// $forms['armadilloebooks'] = array(
	// 	'settings' => array(
	// 		'web' => 'armadilloebooks.com',
	// 		'display_name' => 'armadilloebooks.com',
	// 		'id' => 'armadilloebooks',
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field1',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'Field3',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),


	//array(
	// 		'form-label' => 'FREE! Subscribe to eBook Marketing News?',
	// 		'input' => 'input',
	// 		'type' => 'checkbox',
	// 		'name' => 'Field16',
	// 		'value' => '',
	// 		'required' => 0
	// 	),



	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field5',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'Amazon ASIN number',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field6',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	/*array(
	// 		'form-label' => 'Start Date',
	// 		'note' => 'Date format (mm/dd/yy)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 's1Date',
	// 		'value' => date("m/d/y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'End Date',
	// 		'note' => 'Date format (mm/dd/yy)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'e1Date',
	// 		'value' => date("m/d/y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),*/
	// 	array(
	// 		'form-label' => 'Start Date',
	// 		'note' => 'MM',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field12-1',
	// 		'value' => date("m", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Start Date',
	// 		'note' => 'DD',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field12-2',
	// 		'value' => date("d", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Start Date',
	// 		'note' => 'YYYY',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field12',
	// 		'value' => date("y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'End Date',
	// 		'note' => 'MM',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field14-1',
	// 		'value' =>date("m", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'End Date',
	// 		'note' => 'DD',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field14-2',
	// 		'value' => date("d", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'End Date',
	// 		'note' => 'YYYY',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field14',
	// 		'value' => date("y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Description',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field8',
	// 		'value' => htmlspecialchars($book->book_description),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author Bio',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'Field10',
	// 		'value' => htmlspecialchars($book->author_bio),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'idstamp',
	// 		'value' => 'DAqQ5qA3b9EBYlSEHkpwMYQuOzUW1DDlQCJrq2v0KFI='
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'comment',
	// 		'value' => ''
	// 	),
	
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'stats',
	// 		'value' => '{"errors":0,"startTime":0,"endTime":0,"referer":"http:\/\/www.armadilloebooks.com\/submit-free-ebooks\/"}'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'clickOrEnter',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'https://armadilloebooks.wufoo.com/embed/z1b413ic0l441yc/def/embedKey=z1b413ic0l441yc175606&entsource=wordpress&referrer=http%3Awuslashwuslashkindlepreneur.comwuslashlist-sites-promote-free-amazon-bookswuslash#public'
	// 	)
	// );

	/************* Pretty-Hot ***************/
	

	$forms['prettyhot'] = array(
		'settings' => array(
			'web' => 'pretty-hot.com',
			'display_name' => 'pretty-hot.com',
			'id' => 'prettyhot',
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_1',
			'value' => $book->book_title.' by '.$book->author_name,
			'required' => 1
		),

		array(
			'form-label' => 'Book Synopsis',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_2',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Author Bio',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_8',
			'value' => htmlspecialchars($book->author_bio),
			'required' => 1
		),
		array(
			'form-label' => 'Author Website',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6',
			'value' => ''
		),
		array(
			'form-label' => 'Link to Book on Amazon',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_10',
			'value' => $book->amazon_url
		),
		array(
			'form-label' => 'Twitter',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_11',
			'value' => ''
		),
		array(
			'form-label' => 'Facebook Fan Page',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_12',
			'value' => $book->facebook_url
		),
		array(
			'form-label' => 'Book Cover Image',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_9',
			'value' => $book->cover_img_url
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'input_4',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Category',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_17',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Genre & Other Keyword',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_13',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'input_14.1',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'input_14.2',
			'value' => 'No'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'input_15',
			'value' => 'No|0'
		),
		array(
			'form-label' => 'Requested Date For Publishing',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'input_16',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'state_1',
			'value' => 'WyJ7XCIxNVwiOltcImZjNjIyODRmNDhhMWI2YTc3YWM5NGFjNzIyNzUwNTU2XCIsXCI0M2I1YWZjYmE4MmE1N2I4MTJkNGYwMTAwZTFkNTNmN1wiXX0iLCJhMTY3ZTVkZmViMGM4ZGY3NGE2NjIyOTBhNTE2OTU1NiJd'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_1',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://pretty-hot.com/submit-your-book/'
		)
	);
	
		/************* FeedYourReader **************/
	// $forms['feedyourreader'] = array(
	// 	'settings' => array(
	// 		'web' => 'feedyourreader.com',
	// 		'display_name' => 'feedyourreader.com',
	// 		'id' => 'feedyourreader',
	// 	),
	// 	array(
	// 		'form-label' => 'Your name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'entry.1000000',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'entry.1000001',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'Link to your Book on Amazon *',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'entry.1000002',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'My Book fits into the following category.FAMILY FRIENDLY titles ONlY ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'entry.1000008',
	// 		'value' => '',
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'When will your book be FREE? NO DISCOUNTED BOOKS - FREEBIES ONLY *',
	// 		'note' => 'Date format(mm/dd/yy)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'cdate',
	// 		'value' => date("m/d/y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
		
	// /*	array(
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class'=>'dc2',
	// 		'name' => 'entry.285494196_day',
	// 		'value' =>date("d", strtotime($book->start_date))
	// 	),
	// 	array(
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class'=>'dc3',
	// 		'name' => 'entry.285494196_year',
	// 		'value' => date("y", strtotime($book->start_date))
	// 	),	*/
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'draftResponse',
	// 		'value' => '[,,"-8915651732793330956"]'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'pageHistory',
	// 		'value' => '0'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'fvv',
	// 		'value' => '0'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'fbzx',
	// 		'value' => '-8915651732793330956'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		// 'value' => 'https://docs.google.com/forms/d/1M1VoKP_Dx95-rSPu5DOG4upFUQN9rf9FCF9wRq-T2tU/formResponse?embedded=true'
	// 		'value' => 'https://docs.google.com/forms/d/1Q8HfLPzoX4T9thN2xU4x0SqCd-KqK6Kz2PPJtXz0J8E/formResponse?embedded=true'
	// 	)
	// );
	
	
	/************* FREEBOOK DUDE ***************/
	$forms['freebookdude'] = array(
		'settings' => array(
			'web' => 'freebookdude.com',
			'display_name' => 'freebookdude.com',
			'id' => 'freebookdude',
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.1000001',
			'value' => $book->email,
			'required' => 1
		),
		
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000002',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000000',
			'value' => $book->author_name,
			'required' => 1
		),

		array(
			'form-label' => 'Book URL',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000003',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Fiction/Non-Fiction ',
			'input' => 'select',
			'name' => 'entry.1000005',
			'values' => array(
				"Fiction" 	   => "Fiction",
				"Non-Fiction"  => "Non-Fiction"
			),
			'required' => 1
		),
		array(
			'form-label' => 'Genre(s)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000006',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Schedule a Guest Post',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000009',
			'value' => ''
		),
		array(
			'form-label' => 'First Date Free',
			'note' => 'Date format (mm/dd/yy)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'sDate',
			'value' => date("m/d/y", strtotime($book->start_date)),
			'required' => 1
		),
		/*array(
			'input' => 'input',
			'type' => 'text',
			'class'=>'dc2',
			'name' => 'entry.1000007_day',
			'value' => date("d", strtotime($book->start_date))
		),
		array(
			'input' => 'input',
			'type' => 'text',
			'class'=>'dc3',
			'name' => 'entry.1000007_year',
			'value' => date("y", strtotime($book->start_date))
		),*/
		array(
			'form-label' => 'Last Date Free',
			'note' => 'Date format (mm/dd/yy)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'eDate',
			'value' => date("m/d/y", strtotime($book->end_date)),
			'required' => 1
		),
	/*	array(
			'input' => 'input',
			'type' => 'text',
			'class'=>'dc2',
			'name' => 'entry.1000008_day',
			'value' => date("d", strtotime($book->end_date))
		),
		array(
			'input' => 'input',
			'type' => 'text',
			'class'=>'dc3',
			'name' => 'entry.1000008_year',
			'value' =>date("y", strtotime($book->end_date))
		),*/
				
		array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"-8373743754486989727"]'
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fvv',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '-8373743754486989727'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1DvFLYd9cxnEakJG22R2nn91EpjcQaml-7t0PoTZp2Ds/formResponse?embedded=true'

		)
	);
	
	
	// ************ frugal-freebies.com **************
	$forms['frugal-freebies'] = array(
		'settings' => array(
			'web' => 'frugal-freebies.com',
			'display_name' => 'frugal-freebies.com',
			'id' => 'frugal-freebies',
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry_993800238',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry_1000010',
			'value' => $book->asin,
			'required' => 1
		),
		
		array(
			'form-label' => 'Amazon link to free Kindle Book ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry_989783085',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'First Date to post your book:',
			'label' => 'MM',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry_1000006',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
				),
		// array(
		// 	'form-label' => 'Will your book be available for FREE on that date?',
		// 	'input' => 'input',
		// 	'name' => 'entry_free',
		// 	'type' => 'radio',
		// 	'values' => array(
		// 		"Free" 	   => "Free",
		// 		"NOT free"  => "No"
		// 	),
		// 	'required' => 1
		// ),
		// array(
		// 	'form-label' => 'Is your book Erotica?',
		// 	'input' => 'input',
		// 	'type' => 'radio',
		// 	'name' => 'entry_free',
		// 	'values' => array(
		// 		"Yes"  => "Yes",
		// 		"No"   => "No",
		// 	),
		// 	'required' => 1
		// ),
		array(
			'form-label' => 'Is your book Erotica?',
			'input' => 'select',
			'name' => 'entry_free',
			'values' => array(
				"Yes"  => "Yes",
				"No"  => "No",
				// "3"  => "3",
				// "4"  => "4",
				// "5"  => "5",
				// "6+"  => "6+"
			),
			'required' => 1
		),
		array(
			'form-label' => 'Comments',
			'input' => 'input',
			'type' => 'textarea',
			'name' => 'entry_1000013',
			'value' =>  htmlspecialchars($book->book_description)
		),
		
		array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"6757517262907179964"]'
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fvv',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '6757517262907179964'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1GjZj7ZPOfZBLKKZBqHLEBNFkapmOO4YhZXvO9MNsy_0/formResponse?embedded=true'
		)
	);


/*****************************************************************/
	
	
// 	$forms['couponcrazymomblog'] = array(
// 		'settings' => array(
// 			'web' => 'couponcrazymomblog.com',
// 			'display_name' => 'couponcrazymomblog.com(in progress)',
// 			'id' => 'couponcrazymomblog',
// 		),
// 		array(
// 			'form-label' => 'Name',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g1732-name',
// 			'value' => $book->author_name,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Email',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'g1732-email',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Website',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g1732-website',
// 			'value' => '',
// 			'required' => 0
// 		),
// 		array(
// 			'form-label' => 'Message',
// 			'note' => 'If you are interested in promoting your company/products, and would like for me to feature a review and/or giveaway on my blog, please contact me via email couponcrazymomblog@gmail.com. Make sure you include a description of the product, and a link to your website. I consider all products big and small for review! Please note that I review only full size products, and not sample size products. A review is a great way to promote your product and get honest feedback.
// Products will be reviewed and posted within 2-3 weeks of receiving the product unless otherwise stated. If your review is time-sensitive let me know so that I may accommodate your request. Offering a giveaway with a review is highly recommended. When you offer a giveaway along with a review, your post will receive more traffic which means more exposure for your product and/or website. My giveaways generally run for 2 weeks. Please do not send giveaway prize to me. Sponsor is responsible for shipping the product to the giveaway winner and all of its’ related costs. Please note that all products sent will become the property of this blog, and will not be returned.',
// 			'input' => 'textarea',
// 			'name' => 'g1732-comment',
// 			'value' => 'My ebook ASIN:' . $book->asin.'

// Amazon url: '.$book->amazon_url.'

// Book description: '. strip_tags($book->book_description),
// 			'required' => 1
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'contact-form-id',
// 			'value' => '1732'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'action',
// 			'value' => 'grunion-contact-form'
// 		),
		
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'http://couponcrazymomblog.com/about/#contact-form-1732'
// 		)
// 	);

	/******************* ebookshabit *******************/
	$forms['ebookshabit'] = array(
		'settings' => array(
			'web' => 'ebookshabit.com',
			'display_name' => 'ebookshabit.com',
			'id' => 'ebookshabit',
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'emailcon',
			'name' => 'youremail',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'asin',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Promo Price',
			'input' => 'input',
			'type' => 'text',
			'name' => 'price',
			'value' => $book->regular_price,
			'required' => 1
		),
		array(
			'form-label' => 'Promotion start date',
			'note' => '(Make sure the start date is AFTER today.)',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'from',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Promotion end date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'to',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'form-label' => 'You\'ve Been Featured!',
			'note' => 'Yes, I want to be notified if my book is featured here on eBooksHabit.com,
as well as receive eBooks Habit updates and other book marketing tips!',
			'input' => 'label'
		),
		array(
			'label' => 'Yes, I want to be notified',
			'input' => 'checkbox',
			'name' => 'getemail',
			'value' => 'yes',
			'selected' => 'selected'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://ebookshabit.com/for-authors/'
		)
	);

	
	

// 	$forms['icravefreebies'] = array(
// 		'settings' => array(
// 			'web' => 'icravefreebies.com',
// 			'display_name' => 'icravefreebies.com',
// 			'id' => 'icravefreebies',
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'send_email_to',
// 			'value' => 'icravefreebies@gmail.com'
// 		),
// 		array(
// 			'form-label' => 'Email subject:',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'subject',
// 			'value' => 'Free eBook',
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Sent from:',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'send_email_from',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Email content:',
// 			'note' => 'Be sure to include the book description, the title, a link to the listing, and the date(s) of the promotion. The promotions are provided on a first-come, first-serve basis.',
// 			'input' => 'textarea',
// 			'name' => 'message',
// 			'value' => 'Please submit my book:
// Book title: ' . $book->book_title . '
// Author: ' . $book->author_name . '
// URL: ' . $book->amazon_url . '
// ASIN:' . $book->asin . '
// Promotion start date: ' . date("m/d/Y", strtotime($book->start_date)) . '
// Promotion end date: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!
// 			',
// 			'required' => 1
// 		)
// 	);

// 	$forms['freebies4mom'] = array(
// 		'settings' => array(
// 			'web' => 'freebies4mom.com',
// 			'display_name' => 'freebies4mom.com',
// 			'id' => 'freebies4mom',
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => '_wpcf7',
// 			'value' => '33626'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => '_wpcf7_version',
// 			'value' => '4.0.1'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => '_wpcf7_locale',
// 			'value' => ''
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => '_wpcf7_unit_tag',
// 			'value' => 'wpcf7-f33626-p3832-o1'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => '_wpnonce',
// 			'value' => 'a8c9ebade6'
// 		),

// 		array(
// 			'form-label' => 'Your name:',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'your-name',
// 			'value' => $book->author_name,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Your email',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'your-email',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Subject',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'your-subject',
// 			'value' => 'My eBook submission',
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Your message',
// 			'input' => 'textarea',
// 			'name' => 'your-message',
// 			'value' => 'Please submit my book:
// Book title: ' . $book->book_title . '
// Author: ' . $book->author_name . '
// URL: ' . $book->amazon_url . '
// ASIN:' . $book->asin . '
// Promotion start date: ' . date("m/d/Y", strtotime($book->start_date)) . '
// Promotion end date: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!
// 			',
// 			'required' => 1
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'quiz-208',
// 			'value' => 'green'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => '_wpcf7_quiz_answer_quiz-208',
// 			'value' => 'cd711d21db818ca6a8962bbaac7e1367'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'http://freebies4mom.com/contact/#wpcf7-f33626-p3832-o1'
// 		)
// 	);


/****************** NOT LIVE

	$forms['indiehousebooks'] = array(
		'settings' => array(
			'web' => 'indiehousebooks.com',
			'display_name' => 'indiehousebooks.com',
			'id' => 'indiehousebooks',
		),
		array(
			'input' => 'hidden',
			'name' => 'send_email_to',
			'value' => 'staff@indiehousebooks.com'
		),
		array(
			'form-label' => 'Email subject:',
			'note' => 'You should not change subject',
			'input' => 'input',
			'type' => 'text',
			'name' => 'subject',
			'value' => 'Free eBook',
			'required' => 1
		),
		array(
			'form-label' => 'Sent from:',
			'input' => 'input',
			'type' => 'email',
			'name' => 'send_email_from',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Email content:',
			'note' => 'Be sure to include the book description, the title, a link to the listing, and the date(s) of the promotion. The promotions are provided on a first-come, first-serve basis.',
			'input' => 'textarea',
			'name' => 'message',
			'value' => 'Please submit my book:
Book title: ' . $book->book_title . '
Author: ' . $book->author_name . '
URL: ' . $book->amazon_url . '
ASIN:' . $book->asin . '
Promotion start date: ' . date("m/d/Y", strtotime($book->start_date)) . '
Promotion end date: ' . date("m/d/Y", strtotime($book->end_date)) . '.
Thank you!
			',
			'required' => 1
		)
	);*/

	/********* It's write now **********/
	$forms['itswritenow'] = array(
		'settings' => array(
			'web' => 'itswritenow.com',
			'display_name' => 'itswritenow.com',
			'id' => 'itswritenow',
		),
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1388337837',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Contact Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.948508495',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1176772271',
			'value' => $book->book_title
		),
		array(
			'form-label' => 'ASIN number',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1943754209',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Link To Book On Amazon',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.828448684',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'First Date to post your free book',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'sDate',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'End date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'eDate',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"1832775225794651661"]'
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fvv',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '1832775225794651661'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1B-4bGs1Hnv9EQTeNct0jOa_XdPbtAlI4Jhl7966PWiM/formResponse?embedded=true'
		)

	);

	// $forms['kindlebookpromos-luckycinda'] = array(
	// 	'settings' => array(
	// 		'web' => 'kindlebookpromos.luckycinda.com',
	// 		'display_name' => 'kindlebookpromos.luckycinda.com',
	// 		'id' => 'kindlebookpromos-luckycinda',
	// 	),
	// 	array(
	// 		'form-label' => 'Your name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'q3_yourName',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Your Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'q4_yourEmail',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'q5_bookTitle',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'q6_asin',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'q7_genre',
	// 		'value' => $book->genre . ', ' . $book->sub_genre,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion dates',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'q8_promotionDates',
	// 		'value' => date("Y-m-d", strtotime($book->start_date)) . ' to ' . date("Y-m-d", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'simple_spc',
	// 		'value' => '42840901584961-42840901584961'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'website',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'formID',
	// 		'value' => '42840901584961'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://submit.jotformpro.com/submit/42840901584961/'
	// 	)

	// );

	// $forms['peoplereads'] = array(
	// 	'settings' => array(
	// 		'web' => 'peoplereads.com',
	// 		'display_name' => 'peoplereads.com',
	// 		'id' => 'peoplereads',
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'fw_human',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-4',
	// 		'value' => 'other'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-15',
	// 		'value' => 'FREEBIE Spotlight! Not Guaranteed. (Free option: posted to PeopleReads.com and may or may not be included in the Subscriber email).'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-16',
	// 		'value' => 'Daily Ebook Listing: Not Guaranteed. (Free option: posted to PeopleReads.com and may or may not be included in the Subscriber email).'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-17',
	// 		'value' => 'New Release Listing: Not Guaranteed. (Free option: posted to PeopleReads.com and may or may not be included in the Subscriber email)." id="w-form-524fb9050cf24e757e091a95-17-opt_1'
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-0',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-1',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author website/blog URL',
	// 		'input' => 'input',
	// 		'type' => 'url',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-2',
	// 		'value' => '',
	// 	),
	// 	array(
	// 		'form-label' => 'Twitter handle',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-3',
	// 		'value' => '',
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-6',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-5',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-8',
	// 		'value' => $book->genre,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Description',
	// 		'input' => 'textarea',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-9',
	// 		'value' => strip_tags($book->book_description),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Price',
	// 		'note' => 'List the price of your ebook. (It must be from FREE to $3.99)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-10',
	// 		'value' => '',
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion start date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-11',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion end date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-12',
	// 		'value' => date("m/d/Y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Are these dates flexible?',
	// 		'input' => 'select',
	// 		'values' => array(
	// 			'Yes' => 'Yes',
	// 			'No' => 'No',
	// 		),
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-13'
	// 	),

	// 	array(
	// 		'form-label' => 'Is there anything else PeopleReads should know?',
	// 		'input' => 'textarea',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-24',
	// 		'value' => '',
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'w-form-524fb9050cf24e757e091a95-25',
	// 		'value' => 'Yes, I agree.'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://members.webs.com/s/site_module/110830052/contact_form/524fb9050cf24e757e091a95'
	// 	),

	// );

	// $forms['bookpinning'] = array(
	// 	'settings' => array(
	// 		'web' => 'bookpinning.com',
	// 		'display_name' => 'bookpinning.com',
	// 		'id' => 'bookpinning',
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'sws',
	// 		'value' => 'home/save-book'
	// 	),

	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'is_book_day',
	// 		'value' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'author_name',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'name',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'select',
	// 		'values' => array(
	// 			'0' => 'Please select Genre',
	// 			'womens-fiction' => 'Women\'s Fiction',
	// 			'romance' => 'Romance',
	// 			'thriller-and-suspense' => 'Thriller &amp; Suspense',
	// 			'science-fiction' => 'Science Fiction',
	// 			'young-adult' => 'Young Adult',
	// 			'historical' => 'Historical',
	// 			'business' => 'Business',
	// 			'self-help' => 'Self Help',
	// 			'cooking' => 'Cooking',
	// 			'reference' => 'Reference',
	// 			'biography' => 'Biography',
	// 			'general-fiction' => 'General Fiction',
	// 		),
	// 		'name' => 'genre'
	// 	),

	// 	array(
	// 		'form-label' => 'Website URL',
	// 		'input' => 'input',
	// 		'type' => 'url',
	// 		'name' => 'website_url',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Paypal Email',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'paypal_email',
	// 		'value' => $book->paypal_email,
	// 		'required' => 0
	// 	),

	// 	array(
	// 		'form-label' => 'Book image',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'book_image',
	// 		'value' => $book->cover_img_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'submit',
	// 		'value' => 'Submit'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://bookpinning.com/?sws=home/submit-book'
	// 	),

	// );

	$forms['readingdeals'] = array(
		'settings' => array(
			'web' => 'readingdeals.com',
			'display_name' => 'readingdeals.com',
			'id' => 'readingdeals',
		),
		array(
			'input' => 'hidden',
			'name' => 'submission_type',
			'value' => 'free'
		),
		array(
			'form-label' => 'Qualifications',
			'input' => 'label',
		),
		array(
			'label' => 'I confirm my book has a minimum of 5 reviews &amp; 4.0 stars on Amazon.com',
			'input' => 'checkbox',
			'name' => 'minimumrating',
			'value' => '',
			'selected' => 'checked',
		),
		array(
			'label' => 'I confirm that my book does not contain graphic sexual content.',
			'input' => 'checkbox',
			'name' => 'not18plus',
			'value' => '1',
			'selected' => 'checked',
		),
		array(
			'label' => 'I confirm that my book will be free or discounted from the normal list price.',
			'input' => 'checkbox',
			'name' => 'discountedbook',
			'value' => '',
			'selected' => 'checked',
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'email',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'ASIN / Book Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'asin',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'title',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'author',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Quick Description',
			'note' => '50 words or less',
			'input' => 'textarea',
			'name' => 'description',
			'value' => strip_tags($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Normal Price',
			'note' => '(No "$")',
			'input' => 'input',
			'type' => 'number',
			'name' => 'price_current',
			'value' => 2,
			'required' => 1
		),
		array(
			'form-label' => 'Discounted	Price',
			'note' => '(No "$")',
			'input' => 'input',
			'type' => 'number',
			'name' => 'price_promo',
			'value' => 1,
			'required' => 1
		),
		array(
			'form-label' => 'Promotion start date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'date_promo_start',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Promotion end date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'date_promo_end',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Choose Best Genre',
			'input' => 'select',
			'values' => array(
				'35' => 'Please select genre',
				'35' => 'Childrens &amp; Middle Grade',
				'37' => 'Contemporary Fiction',
				'34' => 'Cooking &amp; Recipes',
				'28' => 'Mysteries, Thrillers &amp; Suspense',
				'32' => 'Nonfiction &amp; How-To',
				'33' => 'Religious &amp; Inspirational',
				'29' => 'Romance',
				'30' => 'Sci-Fi &amp; Fantasy',
				'31' => 'Teen &amp; Young Adult',
			),
			'name' => 'genre'
		),
		array(
			'form-label' => 'Amazon URL',
			'input' => 'input',
			'type' => 'url',
			'name' => 'link_amazon',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Nook URL',
			'input' => 'input',
			'type' => 'url',
			'name' => 'link_nook',
			'value' => '',
		),
		array(
			'form-label' => 'iTunes URL',
			'input' => 'input',
			'type' => 'url',
			'name' => 'link_itunes',
			'value' => '',
		),
		array(
			'form-label' => 'Kobo URL',
			'input' => 'input',
			'type' => 'url',
			'name' => 'link_kobo',
			'value' => '',
		),
		array(
			'form-label' => 'Smashwords URL',
			'input' => 'input',
			'type' => 'url',
			'name' => 'link_smashwords',
			'value' => '',
		),
		array(
			'label' => 'Subscribe to Author Mailing List?',
			'input' => 'checkbox',
			'name' => 'creator_notify',
			'value' => '1',
			'selected' => 'checked',
		),
		array(
			'input' => 'hidden',
			'name' => 'subscribe_rd',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://readingdeals.com/pages/submit-ebook/process.php'
		)

	);

// 	$forms['storyfinds'] = array(
// 		'settings' => array(
// 			'web' => 'storyfinds.com',
// 			'display_name' => 'storyfinds.com',
// 			'id' => 'storyfinds',
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'send_email_to',
// 			'value' => 'dsacrey@storyfinds.com'
// 		),
// 		array(
// 			'form-label' => 'Email subject:',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'subject',
// 			'value' => 'Book promotion',
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Sent from:',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'send_email_from',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Email content:',
// 			'note' => 'Please include: Promotion you\'re interested in , First & Last Author Name, Contact Email, Paypal Email, Book Title and link, Book Blurb (max 250 words), Book Excerpt (max 1,500 words) , Promotion Date preferences (1st and 2nd choice)',
// 			'input' => 'textarea',
// 			'name' => 'message',
// 			'value' => 'Please submit my book:
// Book title: ' . $book->book_title . '
// Author: ' . $book->author_name . '
// URL: ' . $book->amazon_url . '
// ASIN:' . $book->asin . '
// Promotion start date: ' . date("m/d/Y", strtotime($book->start_date)) . '
// Promotion end date: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Paypal Email:
// Contact Email:
// Thank you!
// 			',
// 			'required' => 1
// 		)
// 	);

// 	$forms['yourdailyebooks'] = array(
// 		'settings' => array(
// 			'web' => 'yourdailyebooks.com',
// 			'display_name' => 'yourdailyebooks.com',
// 			'id' => 'yourdailyebooks',
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'send_email_to',
// 			'value' => 'contact@yourdailyebooks.com'
// 		),
// 		array(
// 			'form-label' => 'Email subject:',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'subject',
// 			'value' => 'Book promotion',
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Sent from:',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'send_email_from',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Email content:',
// 			'note' => '',
// 			'input' => 'textarea',
// 			'name' => 'message',
// 			'value' => 'Please submit my book:
// Book title: ' . $book->book_title . '
// Author: ' . $book->author_name . '
// URL: ' . $book->amazon_url . '
// ASIN:' . $book->asin . '
// Promotion start date: ' . date("m/d/Y", strtotime($book->start_date)) . '
// Promotion end date: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!',
// 			'required' => 1
// 		)
// 	);

	// $forms['freebooks'] = array(
	// 	'settings' => array(
	// 		'web' => 'freebooks.com',
	// 		'display_name' => 'freebooks.com',
	// 		'id' => 'freebooks',
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN / Book Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'asin',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Promotion start date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'fromDate',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion end date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'toDate',
	// 		'value' => date("m/d/Y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'action',
	// 		'value' => 'confirm_book_info'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.freebooks.com/wp-admin/admin-ajax.php'
	// 	)

	// );

	/************* ereaderlove.com ************/
// 	$forms['ereaderlove'] = array(
// 		'settings' => array(
// 			'web' => 'ereaderlove.com',
// 			'display_name' => 'ereaderlove.com',
// 			'id' => 'ereaderlove',
// 		),
		
// 		array(
// 			'form-label' => 'First name',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'wdform_3_element_first2',
// 			'value' => $first_name,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Last name',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'wdform_3_element_last2',
// 			'value' => $last_name,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Email',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'wdform_4_element2',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Title Of Book',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'wdform_15_element2',
// 			'value' => $book->book_title
// 		),
// 		array(
// 			'form-label' => 'Link to Book',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'wdform_5_element2',
// 			'value' => $book->amazon_url
// 		),
// 		array(
// 			'form-label' => 'Details',
// 			'note' => 'If you are wanting to submit your free Kindle book, please send us a link to your book below.',
// 			'input' => 'textarea',
// 			'name' => 'wdform_23_element2',
// 			'value' => 'Please submit my book:
// Book title: ' . $book->book_title . '
// Author: ' . $book->author_name . '
// URL: ' . $book->amazon_url . '
// ASIN:' . $book->asin . '
// Promotion start date: ' . date("m/d/Y", strtotime($book->start_date)) . '
// Promotion end date: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!',
// 			'required' => 1
// 		),
		
// 		array(
// 			'label' => 'Send a copy of this message to yourself',
// 			'input' => 'checkbox',
// 			'name' => 'wdform_27_element2',
// 			'value' => 'yes',
// 			'selected' => 'selected'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'Itemid2',
// 			'value' => ''
// 		),array(
// 			'input' => 'hidden',
// 			'name' => 'counter2',
// 			'value' => '34'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'http://www.ereaderlove.com/contact-us-submit-a-book/'
// 		)
// 	);

	/**************** igniteyourbook.com **********************
	$forms['igniteyourbook'] = array(
		'settings' => array(
			'web' => 'igniteyourbook.com',
			'display_name' => 'igniteyourbook.com',
			'id' => 'igniteyourbook',
		),
		array(
			'form-label' => 'Author Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_3',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'input_8',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_1',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Synopsis:',
			'note' => '0 of 400 max characters',
			'input' => 'textarea',
			'name' => 'input_2',
			'value' => strip_tags($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Genre',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_9',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Book cover url',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6',
			'value' => $book->cover_img_url,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon URL',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_4',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Free Download Start Date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'input_12',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Free Download end Date',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'input_13',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_5',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '5'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'state_5',
			'value' => 'WyJhOjA6e30iLCJkODllMjYyNTA5ZjJkYzU0Zjg0ZTVkZDVmYjIxZjI2YiJd'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_5',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_5',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://igniteyourbook.com/submit-your-book/#gf_8'
		)

	);*/

/*****************bookangel.com******************/

$forms['bookangel'] = array(
  'settings' => array(
   'web' => 'bookangel.co.uk',
   'display_name' => 'bookangel.co.uk',
   'id' => 'bookangel',
  ),
  array(
   'form-label' => 'Your name',
   'input' => 'input',
   'type' => 'text',
   'name' => 'subname',
   'value' => $book->author_name,
   'required' => 1
  ),array(
   'form-label' => 'Email Address',
   'input' => 'input',
   'type' => 'email',
   'name' => ' ',
   'value' => $book->email,
   'required' => 1
  ),
  array(
   'form-label' => 'ASIN Number',
   'input' => 'input',
   'type' => 'text',
   'name' => 'asin',
   'value' => $book->asin,
   'required' => 1
  ),
  array(
   'form-label' => 'First Promo Date',
   'input' => 'input',
   'type' => 'text',
   'class' => 'datepicker',
   'name' => 'freefrom',
   'value' => '2016/05/04',
   'required' => 1
  ),
  array(
   'form-label' => 'Duration',
   'input' => 'select',
   //'type' => 'number',
   'name' => 'duration',
   'values' => array(
    '1' => '1 Day',
    '2' => '2 Day',
    '3' => '3 Day',
    '4' => '4 Day',
    '5' => '5 Day'
   ),
   'required' => 1
  ),
  array(
   'form-label' => 'Upcoming',
   'input' => 'select',
   'name' => 'upcoming',
   'values' => array(
    'Y' => 'Yes - Display in Upcoming Books',
    'N' => 'No  - Only display on Free Days'
   )
  ),
  array(
   'form-label' => 'Fiction Genre',
   'input' => 'select',
   'name' => 'fiction',
   'values' => array(
    '0' => 'Please select genre',
    '57' => 'Fiction - Action &amp; Adventure',
    '150' => 'Fiction - Anthologies',
    '357' => 'Fiction - Childrens',
    '217' => 'Fiction - Crime',
    '44' => 'Fiction - Drama',
    '20' => 'Fiction - Fantasy',
    '32' => 'Fiction - Historical',
    '39' => 'Fiction - Horror',
    '376' => 'Fiction - Literary fiction',
    '31' => 'Fiction - Mystery',
    '106' => 'Fiction - Poetry',
    '28' => 'Fiction - Romance',
    '96' => 'Fiction - Science Fiction',
    '34' => 'Fiction - Suspense',
    '320' => 'Fiction - Teen &amp; Young Adult',
    '29' => 'Fiction - Thrillers',
    '262' => 'Fiction - War &amp; Military',
    '108' => 'Fiction - Westerns',
    '263' => 'Fiction - Young Adult'

   )
  ),

  array(
   'form-label' => 'Non-Fiction Genre',
   'input' => 'select',
   'name' => 'nonfiction',
   'values' => array(
    '0' => 'Please select genre',
    '55' => 'Non Fiction - Art',
    '699' => 'Non Fiction - Business &amp; Investing',
    '739' => 'Non Fiction - Children',
    '292' => 'Non Fiction - Crafts &amp; Hobbies',
    '25' => 'Non Fiction - Food &amp; Drink',
    '27' => 'Non Fiction - Health',
    '532' => 'Non Fiction - History',
    '700' => 'Non Fiction - Home and Garden',
    '22' => 'Non Fiction - Humour',
    '698' => 'Non Fiction - Languages',
    '216' => 'Non Fiction - Memoirs &amp; Biography',
    '534' => 'Non Fiction - Other Non Fiction',
    '36' => 'Non Fiction - Relationships',
    '533' => 'Non Fiction - Religion',
    '531' => 'Non Fiction - Self Help',
    '696' => 'Non Fiction - Technology &amp; Computing',
    '697' => 'Non Fiction - Young Adult &amp; Teen'
   )
  ),
  array(
   'form-label' => 'Optional',
   'note' => 'Please check the boxes if these apply to your book:',
   'input' => 'label',
  ),
  
  array(
   'label' => 'In Kindle Unlimited)',
   'input' => 'checkbox',
   'name' => 'unlimited',
   'value' => 'true',
   'selected' => '',
  ),
  array(
   'label' => 'Available on Kobo ',
   'input' => 'checkbox',
   'name' => 'kobo',
   'value' => 'true',
   'selected' => '',
  ),
  array(
   'label' => 'Available on Nook ',
   'input' => 'checkbox',
   'name' => 'nook',
   'value' => 'true',
   'selected' => '',
  ),

  array(
   'label' => 'Author Acceptance',
   'input' => 'checkbox',
   'name' => 'accept',
   'value' => 'true',
   'selected' => '',
  ),
  array(
   'input' => 'hidden',
   'name' => 'form_url',
   'value' => 'http://bookangel.co.uk/submit-your-book/'
  ),
  
 );

	// $forms['bookangel'] = array(
	// 	'settings' => array(
	// 		'web' => 'bookangel.co.uk',
	// 		'display_name' => 'bookangel.co.uk',
	// 		'id' => 'bookangel',
	// 	),
	// 	array(
	// 		'form-label' => 'Your name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'subname',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),array(
	// 		'form-label' => 'Email Address',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'subemail',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN Number',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'asin',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'First Promo Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'freefrom',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Duration',
	// 		'input' => 'input',
	// 		'type' => 'number',
	// 		'name' => 'duration',
	// 		'value' => $book->days_free,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Upcoming',
	// 		'input' => 'select',
	// 		'name' => 'upcoming',
	// 		'values' => array(
	// 			'Y' => 'Yes - Display in Upcoming Books',
	// 			'N' => 'No  - Only display on Free Days'
	// 		)
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'select',
	// 		'name' => 'topic',
	// 		'values' => array(
	// 			'0' => 'Please select genre',
	// 			'57' => 'Fiction - Action &amp; Adventure',
	// 			'150' => 'Fiction - Anthologies',
	// 			'357' => 'Fiction - Children\'s',
	// 			'217' => 'Fiction - Crime',
	// 			'44' => 'Fiction - Drama',
	// 			'20' => 'Fiction - Fantasy',
	// 			'32' => 'Fiction - Historical',
	// 			'39' => 'Fiction - Horror',
	// 			'376' => 'Fiction - Literary fiction',
	// 			'31' => 'Fiction - Mystery',
	// 			'106' => 'Fiction - Poetry',
	// 			'28' => 'Fiction - Romance',
	// 			'96' => 'Fiction - Science Fiction',
	// 			'34' => 'Fiction - Suspense',
	// 			'320' => 'Fiction - Teen &amp; Young Adult',
	// 			'29' => 'Fiction - Thrillers',
	// 			'262' => 'Fiction - War &amp; Military',
	// 			'108' => 'Fiction - Westerns',
	// 			'263' => 'Fiction - Young Adult',

	// 			'55' => 'Non Fiction - Art',
	// 			'699' => 'Non Fiction - Business &amp; Investing',
	// 			'739' => 'Non Fiction - Children',
	// 			'292' => 'Non Fiction - Crafts &amp; Hobbies',
	// 			'25' => 'Non Fiction - Food &amp; Drink',
	// 			'27' => 'Non Fiction - Health',
	// 			'532' => 'Non Fiction - History',
	// 			'700' => 'Non Fiction - Home and Garden',
	// 			'22' => 'Non Fiction - Humour',
	// 			'698' => 'Non Fiction - Languages',
	// 			'216' => 'Non Fiction - Memoirs &amp; Biography',
	// 			'534' => 'Non Fiction - Other Non Fiction',
	// 			'36' => 'Non Fiction - Relationships',
	// 			'533' => 'Non Fiction - Religion',
	// 			'531' => 'Non Fiction - Self Help',
	// 			'696' => 'Non Fiction - Technology &amp; Computing',
	// 			'697' => 'Non Fiction - Young Adult &amp; Teen',
	// 		)
	// 	),
	// 	array(
	// 		'form-label' => 'Optional',
	// 		'note' => 'Please check the boxes if these apply to your book:',
	// 		'input' => 'label',
	// 	),
	// 	array(
	// 		'label' => 'English (UK)',
	// 		'input' => 'checkbox',
	// 		'name' => 'english',
	// 		'value' => 'true',
	// 		'selected' => '',
	// 	),
	// 	array(
	// 		'label' => 'In Kindle Unlimited)',
	// 		'input' => 'checkbox',
	// 		'name' => 'unlimited',
	// 		'value' => 'true',
	// 		'selected' => '',
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://bookangel.co.uk/submit-your-book/'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'getemailcon',
	// 		'value' => 'yes'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'submit',
	// 		'value' => 'Submit Details'
	// 	)
	// );

	/*$forms['ereaderperks'] = array(
		'settings' => array(
			'web' => 'ereaderperks.com',
			'display_name' => 'ereaderperks.com',
			'id' => 'ereaderperks',
		),
		array(
			'form-label' => 'Your Name (required)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-name',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Your Email (required)',
			'input' => 'input',
			'type' => 'email',
			'name' => 'your-email',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'book-title',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Book ID: (ASIN or ISBN)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'book-id',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Free dates',
			'input' => 'input',
			'type' => 'text',
			'name' => 'free-dates',
			'value' => date("Y-m-d", strtotime($book->start_date)) . ' to ' . date("Y-m-d", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Comments',
			'note' => '(Please include a SHORT description, ratings, plus awards/independent reviews, if applicable.)',
			'input' => 'textarea',
			'name' => 'your-message',
			'value' => 'Book description:
' . strip_tags($book->book_description).'

Rating of my book is: '.$book->rating.'

Thank you!',
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://www.ereaderperks.com/authors/#wpcf7-f14491-p31-o1'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7',
			'value' => '14491'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7_version',
			'value' => '3.9.3'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7_locale',
			'value' => 'en_US'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpcf7_unit_tag',
			'value' => 'wpcf7-f14491-p31-o1'
		),
		array(
			'input' => 'hidden',
			'name' => '_wpnonce',
			'value' => '818520c72f'
		),
	);*/


	

	
	/******************* eReaderNewsToday.com ***************/




$forms['ereadernewstoday'] = array(
    'settings' => array(
        'web' => 'ereadernewstoday.com',
        'display_name' => 'eReaderNewsToday.com',
        'id' => 'ereadernewstoday'
        ),
    array(
        'input' => 'hidden',
        'name'  => 'utf8',
        'value' => '✓'
        ),
    array(
        'input' => 'hidden',
        'name'  => 'authenticity_token',
            //todo random:
        'value' => '3AMx+AoAgs7JC7IQbhohK3zOEKT+segZ26/eN/Dmkvg='
        ),
    array(
        'form-label' => 'Your name',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[name]',
        'value' => $book->author_name,
        'required' => 1
        ),
    array(
        'form-label' => 'Your email',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[email]',
        'value' => $book->email,
        'required' => 1
        ),
    array(
        'form-label' => 'Book Title',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[title]',
        'value' => $book->book_title,
        'required' => 1
        ),
    array(
        'form-label' => 'Author name',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[author_name]',
        'value' => $book->author_name,
        'required' => 1
        ),        
    array(
        'form-label' => 'ASIN*',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[asin]',
        'value' => '',
        'required' => 1
        ),
    array(
        'form-label' => 'Regular price',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[rb_price]',
        'value' => $book->regular_price,
        'required' => 1
        ),
    array(
        'form-label' => 'Promotional price',
        'input' => 'select',
        'values' => array(
            '0.00' => '0.00',
            '0.99' => '0.99',
            '1.99' => '1.99',
            '2.99' => '2.99',
            ),
        'name' => 'author_book[pb_price]',
        'required' => 1
        ),
    array(
        'form-label' => 'Genre *',
        'input' => 'select',
        'name' => 'author_book[genres]',
        'values' => array(
            "Action and Adventure" => "Action and Adventure",
            "Apps" => "Apps",
            "Children and Middle Grade" => "Children and Middle Grade",
            "Christian Fiction" => "Christian Fiction",
            "Contemporary Fiction" => "Contemporary Fiction",
            "Contemporary Romance" => "Contemporary Romance",
            "Cooking" => "Cooking",
            "Fantasy" => "Fantasy",
            "Historical Fiction" => "Historical Fiction",
            "Historical Romance" => "Historical Romance",
            "Horror" => "Horror",
            "Humor" => "Humor",
            "Literary Fiction" => "Literary Fiction",
            "Memoirs and Biographies" => "Memoirs and Biographies",
            "Mystery" => "Mystery",
            "Non-Fiction" => "Non-Fiction",
            "Paranormal" => "Paranormal",
            "Religious" => "Religious",
            "Romance" => "Romance",
            "Romantic Comedy" => "Romantic Comedy",
            "Romantic Suspense" => "Romantic Suspense",
            "Science Fiction" => "Science Fiction",
            "Thriller and Suspense" => "Thriller and Suspense",
            "Womens Fiction" => "Womens Fiction",
            "Young Adult" => "Young Adult",
            ),
        'required' => 1
        ),
    array(
        'form-label' => 'Amazon star rating',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[amazon_star_rating]',
        'value' => $book->rating,
        'required' => 1
        ),
    array(
        'form-label' => 'Additional information',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[additional_information]',
        'value' => '',
        'required' => 1
        ),
    array(
        'input' => 'hidden',
        'name'  => 'author_book[retailers_attributes][0][retailer_name]',
        'value' => 'Apple iBooks'
        ),


    array(
        'form-label' => 'Apple ibooks',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[retailers_attributes][0][retailer_link]',
        'value' => '',
        'required' => 1
        ),
    array(
        'input' => 'hidden',
        'name'  => 'author_book[retailers_attributes][1][retailer_name]',
        'value' => 'Barnes &amp; Noble'
        ),
    array(
        'form-label' => 'Barnes &amp; noble',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[retailers_attributes][1][retailer_link]',
        'value' => '',
        'required' => 1
        ),
    array(
        'input' => 'hidden',
        'name'  => 'author_book[retailers_attributes][3][retailer_name]',
        'value' => 'Google'
        ),
    array(
        'form-label' => 'Kobo',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[retailers_attributes][3][retailer_link]',
        'value' => '',
        'required' => 1
        ),
    array(
        'input' => 'hidden',
        'name'  => 'author_book[retailers_attributes][2][retailer_name]',
        'value' => 'Kobo'
        ),
    array(
        'form-label' => 'Google',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[retailers_attributes][2][retailer_link]',
        'value' => '',
        'required' => 1
        ),
    array(
        'form-label' => 'Start date',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[preferred_start_date]',
        'value' => date("m/d/Y", strtotime($book->start_date)),
        'required' => 1
        ),
    array(
        'form-label' => 'End date',
        'input' => 'input',
        'type' => 'text',
        'name' => 'author_book[preferred_end_date]',
        'value' => date("m/d/Y", strtotime($book->end_date)),
        'required' => 1
        ),
    array(
        'input' => 'hidden',
        'name'  => 'author_book[flexible]',
        'value' => 'YES'
        ),    
    array(
        'input' => 'hidden',
        'name' => 'form_url',
        'value' => 'https://authors.ereadernewstoday.com/author_books'
        )
    );





		/*************** indiebookoftheday *****************/
	$forms['indiebookoftheday'] = array(
		'settings' => array(
			'web' => 'IndieBookOfTheDay',
			'display_name' => 'IndieBookOfTheDay',
			'id' => 'indiebookoftheday',
		),
		array(
			'input' => 'hidden',
			'name'  => 'id',
			'value' => '1',
		),
		array(
			'input' => 'hidden',
			'name'  => 'action',
			'value' => 'formcraft_submit',
		),
		array(
			'input' => 'hidden',
			'name'  => 'location_hidden__0_0_1000_',
			'value' => 'http://indiebookoftheday.com/authors/free-on-kindle-listing/',
		),
		array(
			'input' => 'hidden',
			'name'  => 'multi',
			'value' => 'true',
		),
		array(
			'input' => 'hidden',
			'name'  => 'Terms_check__1___field8',
			'value' => '10',
		),
		array(
			'input' => 'hidden',
			'name'  => 'title',
			'value' => 'Free on Kindle Listings',
		),

		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Author Name_text_alphabets_1_0_300_field0_FNAME',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Email_email_email_1___field1_false_replyto_m__notif',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Book Title_text__1_0_300_field2_',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Book ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Book ASIN_text__1_0_300_field3_',
			'value' => $book->asin,
			'required' => 1,
		),
		array(
			'form-label' => 'Amazon link',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Amazon Link_text__1_0_300_field4_',
			'value' => $book->amazon_url,
			'required' => 1,
		),
		array(
			'form-label' => 'Genre *',
			'input' => 'select',
			'name' => 'Book Genre_dropdown__1___field5',
			'values' => array(
				"Fiction"     => "Fiction",
				"Non Fiction" => "Non Fiction",
				"Children's"  => "Children's",
				"Erotica"     => "Erotica"
			),
			'required' => 1,
		),
		array(
			'form-label' => 'Promo start date',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Promo Start Date_date_date_1___field6',
			'value' => date("m-d-Y", strtotime($book->start_date)),
			'required' => 1,
		),
		array(
			'form-label' => 'Promo end date',
			'input' => 'input',
			'type' => 'text',
			'name' => 'Promo End Date_date_date_1___field7',
			'value' => date("m-d-Y", strtotime($book->end_date)),
			'required' => 1,
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://indiebookoftheday.com/wp-admin/admin-ajax.php',
//			'value' => 'http://dev.balkanoutsource.com/testpost.php',
		
		)
	);
/*******************************The Digital Ink Spot*****************************************/
// $forms['digital_ink'] = array(
// 		'settings' => array(
// 			'web' => 'The Digital Ink Spot',
// 			'display_name' => 'The Digital Ink Spot',
// 			'id' => 'digital_ink',
// 		),
// 		// array(
// 		// 	'input' => 'hidden',
// 		// 	'name' => 'fw_human',
// 		// 	'value' => ''
// 		// ),
// 		// array(
// 		// 	'input' => 'hidden',
// 		// 	'name' => 'w-form-524fb9050cf24e757e091a95-4',
// 		// 	'value' => 'other'
// 		// ),
// 		// array(
// 		// 	'input' => 'hidden',
// 		// 	'name' => 'w-form-524fb9050cf24e757e091a95-15',
// 		// 	'value' => 'FREEBIE Spotlight! Not Guaranteed. (Free option: posted to PeopleReads.com and may or may not be included in the Subscriber email).'
// 		// ),
// 		// array(
// 		// 	'input' => 'hidden',
// 		// 	'name' => 'w-form-524fb9050cf24e757e091a95-16',
// 		// 	'value' => 'Daily Ebook Listing: Not Guaranteed. (Free option: posted to PeopleReads.com and may or may not be included in the Subscriber email).'
// 		// ),
// 		// array(
// 		// 	'input' => 'hidden',
// 		// 	'name' => 'w-form-524fb9050cf24e757e091a95-17',
// 		// 	'value' => 'New Release Listing: Not Guaranteed. (Free option: posted to PeopleReads.com and may or may not be included in the Subscriber email)." id="w-form-524fb9050cf24e757e091a95-17-opt_1'
// 		// ),
// 		array(
// 			'form-label' => 'Author name',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.2458667',
// 			'value' => $book->author_name,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Email',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'w-form-524fb9050cf24e757e091a95-1',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Book Title',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000001',
// 			'value' => $book->book_title,
// 			'required' => 1
// 		),
// 				array(
// 			'form-label' => 'Promotion start date',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'class' => 'datepicker',
// 			'name' => 'entry.1000003',
// 			'value' => date("m/d/Y", strtotime($book->start_date)),
// 			'required' => 1
// 		),

// 						array(
// 			'form-label' => 'Author website ',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000004',
// 			'value' => $book->amazon_url,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Link to purchase book',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000009',
// 			'value' => $book->amazon_url,
// 			'required' => 1
// 		),
// 				array(
// 			'form-label' => 'Book website',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000009',
// 			'value' => $book->amazon_url,
// 			'required' => 1
// 		),

// 				array(
// 			'form-label' => 'Twitter handle',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000010',
// 			'value' => '',
// 			'required' =>1
// 		),
// 						array(
// 			'form-label' => 'Youtube video book trailer link ',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000007',
// 			'value' => '',
// 		),
// 		array(
// 			'form-label' => 'Please describe your book*',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'entry.1000008',
// 			'value' => htmlspecialchars($book->book_description),
// 			'required' => 1
// 		),
				
// 		array(
// 			'input' => 'hidden',
// 			'name'  => 'pageHistory',
// 			'value' => '0',
// 		),
// 				array(
// 			'input' => 'hidden',
// 			'name'  => 'fvv',
// 			'value' => '0',
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name'  => 'fbzx',
// 			'value' => '-1117670053754893903',
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name'  => 'draftResponse',
// 			'value' => "[,,'-1117670053754893903']",
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'https://docs.google.com/forms/d/1rtQyMeQ78Zex4McohTzZxx8GJkuJPJk2wyppgPHHb8I/formResponse?embedded=true'
// 		),

// 	);

/*******************************www.frugal-freebies.com*****************************************/

// $forms['frugal-freebies'] = array(
//   'settings' => array(
//    'web' => 'frugal-freebies',
//    'display_name' => 'frugal-freebies',
//    'id' => 'frugal-freebies',
//   ),

//   array(
//    'form-label' => 'Book title ',
//    'input' => 'input',
//    'type' => 'textarea',

//    'name' => 'entry.1000008',
//    'value' => $book->book_title,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'ASIN',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.1000010',
//    'value' => $book->asin,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Amazon link',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.1000007',
//    'value' => $book->amazon_url,
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'First start date',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'entry.1000006_year',
//    'value' => date("m/d/Y", strtotime($book->start_date)),
//    'required' => 1
//   ),

//       array(
//    'form-label' => 'Will your book be available for FREE on that date',
//    'input' => 'input',
//    'type' => 'checkbox',
//    'name' => 'entry.1314149070',
//    'value' => ' ',
//    // 'required' => 1
//   ),
//   array(
//    'form-label' => 'Is your book Erotica?',
//    'input' => 'input',
//    'type' => 'checkbox',
//    'name' => 'entry.1000014',
//    'value' => '',
//    // 'required' => 1
//   ),
//     array(
//    'form-label' => 'Comments',
//    'input' => 'input',
//    'type' => 'textarea',
//    'name' => 'entry.1000013',
//    'value' => htmlspecialchars($book->book_description),
//    'required' => 1
//   ),

       
//   array(
//    'input' => 'hidden',
//    'name'  => 'draftResponse',
//    'value' => "[,,'-6410913622053381390']",
//   ),
//     array(
//    'input' => 'hidden',
//    'name'  => 'pageHistory',
//    'value' => '0',
//   ),
//   array(
//    'input' => 'hidden',
//    'name'  => 'fvv',
//    'value' => '0',
//   ),
//   array(
//    'input' => 'hidden',
//    'name'  => 'fbzx',
//    'value' => '-6410913622053381390',
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'https://docs.google.com/forms/d/1GjZj7ZPOfZBLKKZBqHLEBNFkapmOO4YhZXvO9MNsy_0/formResponse?embedded=true'
//   ),

//  );
















	/*************** theereadercafe ***************/
	$forms['theereadercafe'] = array(
		'settings' => array(
			'web' => 'TheeReaderCafe',
			'display_name' => 'TheeReaderCafe',
			'id' => 'theereadercafe',
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1BLxXWpnqgpNyGCbblqdDYHj2A8TrJQf5c9FDbHjXh1w/formResponse?embedded=true',
		),

		array(
			'input' => 'hidden',
			'name'  => 'pageHistory',
			'value' => '0',
		),
		array(
			'input' => 'hidden',
			'name'  => 'fbzx',
			'value' => '-6515597110957460396',
		),
		array(
			'input' => 'hidden',
			'name'  => 'draftResponse',
			'value' => '[,,"-6515597110957460396"]',
		),

		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.753090951',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'E-mail',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.570084279',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1464509009',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Genre',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1561674614',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Number of reviews',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1005912519',
			'value' => $book->reviews,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1403970107',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Date your free promotion begins',
			'note' => "Please submit your request at least 3 days prior to your book's freebie date",
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.962586454',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Date your free promotion begins',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.949226932',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),


		/////////////

	);
	
	
	//////////////////// NEW BOOKS ////////////////////////////
	
	/* Digital Book Today */
	// $forms['digitalbooktoday'] = array(
	// 	'settings' => array(
	// 		'web' => 'digitalbooktoday.com',
	// 		'display_name' => 'digitalbooktoday.com',
	// 		'id' => 'digitalbooktoday',
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-authorfirstlastname',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-email',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-bookname',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Amazon Book Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-amazonbooklinkpreferredorasin',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Current Amazon Rating and Number of Reviews (ex: 4.3 stars on 24 reviews). Both numbers must be included. Requirements: Fiction (18+ reviews, 4.0+ stars, 100+ pages). Non-Fiction (less than 100 pages: 60+ reviews, 4.2 stars). Non-Fiction (100+ pages, 40+ reviews, 4.0+ stars). Books that do not meet these guidelines can be listed with a $15 paid listing. Please see Option #13 on our promotions page. ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-currentamazonratingandnumberofreviewsex4-3starson24reviews-bothnumbersmustbeincluded-requirementsfiction18reviews4-0stars100pages-nonfictionlessthan100pages60reviews4-2stars-nonfiction100page',
	// 		'value' => $book->rating,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Date(s) of your KDP Select Free Days. (month/day/year or Perma-Free) Note: Many authors believe promoting a book for 2-3 days is more effective than a single day.',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-datesofyourkdpselectfreedays-monthdayyearorpermafreenotemanyauthorsbelievepromotingabookfor23daysismoreeffectivethanasingleday',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'Genre(s) of book',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-genresofbook',
	// 		'values' => $book->genre,
	// 		'required' => 1
	// 	),

		//array(
	// 		'form-label' => 'Just so we know : What is 4 + 1 = ? ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-justsoweknowyouarenotarobotwhatis41',
	// 		'values' => '',
	// 		'required' => 1
	// 	),

		//array(
	// 		'form-label' => 'Any other info we need to know? OK to leave blank.',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'g4962-anyotherinfoweneedtoknowoktoleaveblank-saveyourtimepleasedonotaddabookdescription-wepullallinfofromamazon',
	// 		'values' => '',
	// 		'required' => 0
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'contact-form-id',
	// 		'value' => '4962'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'action',
	// 		'value' => 'grunion-contact-form'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://digitalbooktoday.com/12-top-100-submit-your-free-book-to-be-included-on-this-list/#contact-form-4962'
	// 	)
	// );
	
	// The Reading Sofa (404 error)
	// $forms['thereadingsofa'] = array(
	// 	'settings' => array(
	// 		'web' => 'thereadingsofa.com',
	// 		'display_name' => 'thereadingsofa.com',
	// 		'id' => 'thereadingsofa',
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000486867444',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479413070',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479413069',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Amazon Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479413072',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN Number ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479435384',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'ISBN Number ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000480410676',
	// 		'value' => $book->asin
	// 	),
	// 	array(
	// 		'form-label' => 'Goodreads Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479426053',
	// 		'value' => $book->goodreads_url
	// 	),
		
	// 	array(
	// 		'form-label' => 'B&N Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479413147',
	// 		'values' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Kobo Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479426051',
	// 		'values' => ''
	// 	),
		
	// 	array(
	// 		'form-label' => 'I-Books Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'elm-00000000-0000-0000-0000-000479426052',
	// 		'values' => ''
	// 	),
		
	// 	array(
	// 		'form-label' => 'Start date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '00000000-0000-0000-0000-000479434797',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1,
	// 	),
	// 	array(
	// 		'form-label' => 'End date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'dp-range-00000000-0000-0000-0000-000479434797',
	// 		'value' => date("m/d/Y", strtotime($book->end_date)),
	// 		'required' => 1,
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'cb-00000000-0000-0000-0000-000487734736',
	// 		'value' => 'None - Just check my book for free posting'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.thereadingsofa.com/authors.html'
	// 	)
	// );
	
	
	
	/* I Love Books */
	$forms['ilovebooks'] = array(
		'settings' => array(
			'web' => 'iloveebooks.com',
			'display_name' => 'I Love Books',
			'id' => 'ilovebooks',
		),
		array(
			'form-label' => 'Author First name',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u892471531850343280[first]',
			'value' => $first_name,
			'required' => 1
		),
		array(
			'form-label' => 'Author Last name',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u892471531850343280[last]',
			'value' => $last_name,
			'required' => 1
		),
		array(
			'form-label' => 'Author Email',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u862462987511948931',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book title',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u713720139192601811',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u164709076728177312',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Primary Genre',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u995393663581452803',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Link To Book on Amazon',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u632233461721808192',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Number Of Days Free',
			'input' => 'select',
			'name' => '_u902476867814112192',
			'values' => array(
				"1"  => "1",
				"2"  => "2",
				"3"  => "3",
				"4"  => "4",
				"5"  => "5",
				"6+"  => "6+"
			),
			'required' => 1
		),
		array(
			'form-label' => 'First Day Free',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u745843257716463678',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Last Day Free',
			'input' => 'input',
			'type' => 'text',
			'name' => '_u615076289469063166',
			'value' =>  date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_version',
			'value' => '2'
		),
		array(
			'input' => 'hidden',
			'name' => 'wsite_approved',
			'value' => 'weebly'
		),
		array(
			'input' => 'hidden',
			'name' => 'ucfid',
			'value' => '898533336848436057'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://www.iloveebooks.com/ajax/apps/formSubmitAjax.php'
		)
	);
	
	/************** Writer Owned ***************/
	// $forms['writerowned'] = array(
	// 	'settings' => array(
	// 		'web' => 'writerowned.com',
	// 		'display_name' => 'writerowned.com',
	// 		'id' => 'writerowned',
	// 	),
	// 	array(
	// 		'form-label' => 'Book title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u289832081268152815',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'First name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u998218111722523443[first]',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Last name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u998218111722523443[last]',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author Twitter Handle',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u393275324280424059',
	// 		'value' => '',
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'ASIN/ISBN',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u238769791692717872',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u282479979835110487',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Date Of Free Promo',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '_u709695460989808451',
	// 		'value' => date("m-d-Y", strtotime($book->start_date)) . ' to ' . date("m-d-Y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
	
	// 	array(
	// 		'form-label' => 'Did you follow us on Twitter?',
	// 		'input' => 'select',
	// 		'name' => '_u291783559260908425',
	// 		'values' => array(
	// 			"Yes"  => "Yes",
	// 			"No"  => "No"
	// 		),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_version',
	// 		'value' => '2'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'wsite_approved',
	// 		'value' => 'weebly'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'ucfid',
	// 		'value' => '488705827941909328'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.writerowned.com/ajax/apps/formSubmitAjax.php'
	// 	)
	// );

	
	/* The Midlist(Not Possible because of more then 1 form) 
	$forms['themidlist'] = array(
		'settings' => array(
			'web' => 'themidlist.com',
			'display_name' => 'themidlist.com',
			'id' => 'themidlist',
		),
		array(
			'form-label' => 'Book title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'title',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'author',
			'value' => $book->author_name,
			'required' => 1
		),
		
		array(
			'form-label' => 'Select Genre',
			'input' => 'select',
			'name' => 'genre',
			'values' => array(
				"1"  => "Contemporary Fiction",
				"2"  => "Erotica",
				"3"  => "Fantasy",
				"4"  => "Memoir",
				"5"  => "Mystery/Thriller",
				"6" => "Nonfiction",
				"7"  => "Paranormal",
				"8"  => "Romance",
				"9"  => "Science Fiction",
				"10" => "Young/New Adult",
				"11" => "Other"
			),
			'required' => 1
		),
		
		array(
			'form-label' => 'Author Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'email',
			'value' => $book->email,
			'required' => 1
		),
		
		array(
			'form-label' => 'Your Role',
			'input' => 'input',
			'type' => 'text',
			'name' => 'role',
			'value' => ''
		),
	
		array(
			'label' => 'I agree to The Midlist Promotions Terms and Conditions.
',
			'input' => 'checkbox',
			'name' => 'terms',
			'value' => 'yes',
			'selected' => 'selected',
		),	
		array(
			'input' => 'hidden',
			'name' => '_token',
			'value' => 'uWRjp84CIlHhepZWz7T8GwHrJ6icuanIxsOWdOlm'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://www.themidlist.com/submit/start'
		)
	
	);*/

	
	
	/* Jungle Deals & Steals */
	// $forms['jungledeals'] = array(
	// 	'settings' => array(
	// 		'web' => 'jungledealsandsteals.com',
	// 		'display_name' => 'jungledealsandsteals.com',
	// 		'id' => 'gform_1',
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_1',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Your name(if not the author)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_2',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Email Address',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_11',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'eBook title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_4',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Amazon Link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_12',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion Start Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_13[]',
	// 		'value' => date("m/d/Y", strtotime($book->start_date)),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion End Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_14[]',
	// 		'value' =>  date("m/d/Y", strtotime($book->end_date)),
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'Category',
	// 		'input' => 'input',
	// 		'name' => 'input_9',
	//		'type' => 'radio',
	// 		'values' => array(
	// 			"Fiction"  => "Fiction",
	// 			"Children"  => "Children's",
	// 			"Non-Fiction"  => "Non-Fiction"
	// 		),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Subcategory',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'input_10',
	// 		'value' =>  $book->sub_genre,
	// 		'required' => 1
	// 	),
	//				
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'is_submit_1',
	// 		'value' => '1'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_submit',
	// 		'value' => '1'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_unique_id',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'state_1',
	// 		'value' => 'WyJbXSIsIjhjNWE3ZjZkZjU2MzgxNTg3MzU3NjllYThiYmI3ZjU0Il0='
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_target_page_number_1',
	// 		'value' => '0'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_source_page_number_1',
	// 		'value' => '1'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'gform_field_values',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// // 		'value' => 'http://jungledealsandsteals.com/submit-your-kindle-freebie/'
	// // 	)
	// // );
	
	/* Book Deal Hunter */
	$forms['bookdealhunter'] = array(
		'settings' => array(
			'web' => 'bookdealhunter.com',
			'display_name' => 'bookdealhunter.com',
			'id' => 'bookdealhunter',
		),
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000003',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Author Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000006',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000004',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000005',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Book Category',
			'input' => 'select',
			'name' => 'entry.1000007',
			'values' => array(
				"Action & Adventure"  			=> "Action & Adventure",
				"Advice & How-to"    			=> "Advice & How-to",
				"Biographies & Memoirs"         => "Biographies & Memoirs",
				"Business"  					=> "Business",
				"Children's Books"  			=> "Children's Books",
				"Christian Fiction"  			=> "Christian Fiction",
				"Contemporary Fiction"  		=> "Contemporary Fiction",
				"Erotica"  			=> "Erotica",
				"Fantasy"  			=> "Fantasy",
				"Historical"  			=> "Historical",
				"Horror"  			=> "Horror",
				"Humor"  			=> "Humor",
				"Literary Fiction"  			=> "Literary Fiction",
				"Mystery"  			=> "Mystery",
				"Nonfiction"  			=> "Nonfiction",
				"Paranormal"  			=> "Paranormal",
				"Romance"  			=> "Romance",
				"Science Fiction"  			=> "Science Fiction",
				"Suspense"  			=> "Suspense",
				"Thriller"  			=> "Thriller"
			),
			'required' => 1
		),
	
		array(
			'form-label' => 'Is this Book Specifically for Kids',
			'input' => 'select',
			'name' => 'entry.1000008',
			'values' => array(
				"Yes"  => "Yes",
				"No"  => "No"
			),
			'required' => 1
		),
		
		array(
			'form-label' => 'First Day Free',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000000',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Last Day Free',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000001',
			'value' =>  date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
			array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"7982724059933559612"]'
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fvv',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '7982724059933559612'
		),
			
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1SUypTJTyb1hiq4gzENxm9_lwh2a30R9UGf4rilwzkak/formResponse?embedded=true'
		)
	
	);
	/************* kornerkonnection ***************/
	// 	$forms['kornerkonnection'] = array(
	// 	'settings' => array(
	// 		'web' => 'kornerkonnection.com',
	// 		'display_name' => 'kornerkonnection.com',
	// 		'id' => 'kornerkonnection',
	// 	),
	// 			array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'focus_post',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'book_title',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),
	// 		array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'focus_post',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'email_address',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'smashwords',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'smashwords',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => '10-digit ASIN for Amazon.com',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'asin_us',
	// 		'value' => $book->asin
	// 	),
	// 	array(
	// 		'form-label' => '10-digit ASIN for Amazon.co.uk',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'asin_uk',
	// 		'value' => $book->asin
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.kornerkonnection.com/index.html/contact-us-process.php'
	// 	)
	// );

	 $forms['kornerkonnection'] = array(
  'settings' => array(
   'web' => 'kornerkonnection',
   'display_name' => 'kornerkonnection',
   'id' => 'kornerkonnection',
  ),
  array(
  'input' => 'hidden',
  'name' => 'posting_to',
   'value' => 'ebookkornerkafe'
  ),
  array(
   'input' => 'hidden',
   'name' => 'page_title',
   'value' => 'Ebook Korner Kafé'
   ),
  array(
   'input' => 'hidden',
   'name' => 'tracking_id',
   'value' => 'kindkorn'
   ),
  
  array(
   'form-label' => 'Focus Title',
   'input' => 'input',
   'type' => 'text',
   'name' => 'focus_post',
   'value' => $book->facebook_url,
   'required' => 1
  ),
  array(
   'form-label' => 'DATE of the Focus Post you Liked & Shared (REQUIRED For Authors)',
   'input' => 'input',
   'type' => 'text',
   'class' => 'datepicker',
   'name' => 'focus_post_date',
   'value' => date("m/d/Y", strtotime($book->start_date)),
   'required' => 1
  ),
  array(
   'form-label' => 'Author Name',
   'input' => 'input',
   'type' => 'text',
   'name' => 'author_name',
   'value' => $book->author_name,
   'required' => 1
  ),
        array(
   'form-label' => 'Book Title *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'book_title',
   'value' => $book->book_title,
   'required' => 1
  ),
    array(
   'form-label' => 'Synopsis',
   'input' => 'input',
   'type' => 'text',
   
   'name' => 'synopsis',
   'value' => htmlspecialchars($book->book_description),
   'required' => 0
  ),

      array(
   'form-label' => '10-digit ASIN for Amazon.com',
   'input' => 'input',
   'type' => 'text',
   'name' => 'asin_us',
   'value' => $book->asin,
   'required' => 1
  ),
  array(
   'form-label' => '10-digit ASIN for Amazon.co.uk',
   'input' => 'input',
   'type' => 'text',
   'name' => 'asin_uk',
   'value' => $book->asin,
   'required' => 1
  ),
    array(
   'form-label' => 'Smashwords Link',
   'input' => 'input',
   'type' => 'text',
   'name' => 'smashwords',
   'value' => '',
   // 'required' => 1
  ),

    array(
   'form-label' => 'New Release',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'listing_type',
   'value' => 'New Release',
   'required' =>1
  ),
       array(
   'form-label' => 'Pre-Order',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'listing_type',
   'value' => 'Pre-Order',
   'required' =>1
  ),
      array(
   'form-label' => 'On Sale',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'listing_type',
   'value' => 'On Sale',
   'required' =>1
  ),
      array(
   'form-label' => 'Free',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'listing_type',
   'value' => 'Free',
   'required' =>1
  ),
          array(
   'form-label' => 'Kindle Countdown Deal',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'listing_type',
   'value' => 'Kindle Countdown Deal',
   'required' =>1
  ),
              array(
   'form-label' => 'Regular',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'listing_type',
   'value' => 'Regular',
   'required' =>1,
			'selected' => 'checked',

  ),
    array(
   'form-label' => 'Free Date',
   'input' => 'input',
   'type' => 'text',
   'class' => 'datepicker',
   'name' => 'info',
   'value' => date("d/m/Y", strtotime($book->start_date)),
   'required' => 1
  ),

      array(
   'form-label' => 'Email Address',
   'input' => 'input',
   'type' => 'text',
   'name' => 'email_address',
   'value' => $book->email,
  ),
  array(
   'form-label' => "Reader's Name",
   'input' => 'input',
   'type' => 'text',
   'name' => 'reader_name',
   'value' => $book->author_name,
 
  ),
     array(
   'form-label' => 'Why Are You Suggesting This Book?',
   'input' => 'input',
   'type' => 'textarea',
   'name' => 'why_suggested',
   'value' => '',
 
  ),
  
  array(
   'input' => 'hidden',
   'name' => 'form_url',
   'value' => 'http://kornerkonnection.com/contact-us-process.php'
  ),

 );
/************************bookgorilla.com****************************/
$forms['bookgorilla'] = array(
  'settings' => array(
   'web' => 'bookgorilla.com',
   'display_name' => 'bookgorilla.com',
   'id' => 'bookgorilla',
  ),

  array(
   'form-label' => 'Contact Name/Your Name *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.285293757',
   'value' => $book->author_name,
   'required' => 1
  ),
  array(
   'form-label' => 'Email Address*',
   'input' => 'input',
   'type' => 'email',
   'name' => 'entry.1060823552',
   'value' => $book->email,
   'required' => 1
  ),
  array(
   'form-label' => 'Other Email Address ',
   'input' => 'input',
   'type' => 'email',
   'name' => 'entry.990364906',
   'value' => $book->email,
   'required' => 0
  ),
    array(
   'form-label' => 'ASIN *',
   'input' => 'input',
   'type' => 'text',
     'name' => 'entry.1062903714',
   'value' => $book->asin,
   'required' => 1
  ),

      array(
   'form-label' => 'Title *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.563496075',
   'value' => $book->book_title,
   'required' => 1
  ),
  array(
   'form-label' => "Author's Name ",
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.2087445572',
   'value' => $book->author_name,
   'required' => 1
  ),
    array(
   'form-label' => 'Genre(s) *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.891416880',
   'value' => $book->genre,
   'required' => 1
  ),

    array(
   'form-label' => 'Preferred Date for Your Promotiom',
   'input' => 'input',
   'type' => 'text',
   'class' => 'datepicker',
   'name' => 'entry.1403166377',
   'value' => date("m/d/Y", strtotime($book->start_date)),
   'required' =>1
  ),
      array(
   'form-label' => 'On the above-specified date only',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'entry.516636577',
   'value' => 'On the above-specified date only',
			'selected' => 'checked',

  ),
      array(
   'form-label' => 'On the first available date beginning with the above-specified date',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'entry.516636577',
   'value' => 'On the first available date beginning with the above-specified date',
  ),
      array(
   'form-label' => 'On the next available date beginning three days after your sign-up',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'entry.516636577',
   'value' => 'On the next available date beginning three days after your sign-up',
  ),
  array(
   'form-label' => "Your Book's Regular Everyday Price on Kindle ",
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.639240734',
   'value' => $book->regular_price,
   'required' => 1
  ),
    
 array(
   'form-label' => 'Your Promotional or "Deal" Price for This Promotion *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.1490995937',
   'value' => $book->regular_price,
   'required' => 1
  ),
   array(
   'form-label' => 'Date Range for Your Promotional or "Deal" Price for This Promotion *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.649349327',
   'value' => $book->regular_price,
   'required' => 1
  ),
   array(
   'form-label' => 'Estimated Cost of This Promotion *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'entry.111427827',
   'value' => $book->regular_price,
   'required' => 1
  ),
   array(
   'form-label' => 'No, I do not wish to submit my title for designation as a Starred Title.',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'entry.1830921396',
   'value' => 'No, I do not wish to submit my title for designation as a Starred Title.',
   'required' => 1
  ),

      array(
   'form-label' => 'Yes, I wish to submit my title for inclusion as a Starred Title. I understand that if my title is selected as a Starred Title, I will be invoiced for an additional amount of $100, and my book will be included among the first 12 titles in each email in which it is included.',
   'input' => 'input',
   'type' => 'radio',
   'name' => 'entry.1830921396',
   'value' => 'Yes, I wish to submit my title for inclusion as a Starred Title. I understand that if my title is selected as a Starred Title, I will be invoiced for an additional amount of $100, and my book will be included among the first 12 titles in each email in which it is included.',
   'required' => 1
  ),

  array(
   'input' => 'hidden',
   'name'  => 'draftResponse',
   'value' => '[,,"-6045980637446313002"]',
  ),
    array(
   'input' => 'hidden',
   'name'  => 'pageHistory',
   'value' => '0',
  ),
  array(
   'input' => 'hidden',
   'name'  => 'fvv',
   'value' => '0',
  ),
  array(
   'input' => 'hidden',
   'name'  => 'fbzx',
   'value' => "-6045980637446313002",
  ),
  array(
   'input' => 'hidden',
   'name' => 'form_url',
   'value' => 'https://docs.google.com/forms/d/1rLt9JrCSNmbAYWb1_H4dBGaIN8lYxWcQc3EUJXNRtPA/formResponse?embedded=true'
  ),

 );


/******************************Digitalboooktoday*******************************************/

// $forms['digitalbooktoday'] = array(
//   'settings' => array(
//    'web' => 'The digitalbooktoday',
//    'display_name' => 'digitalbooktoday',
//    'id' => 'digitalbooktoday',
//   ),
//   array(
//    'form-label' => 'Author First & Last Name*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-authorfirstlastname',
//    'value' => $book->author_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Email*',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'g4962-email',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Book Name',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-bookname',
//    'value' => $book->book_title,
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Promotion start date',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'entry.1000003',
//    'value' => date("m/d/Y", strtotime($book->start_date)),
//    'required' => 1
//   ),

//       array(
//    'form-label' => 'Amazon Book Link (preferred) or ASIN',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-amazonbooklinkpreferredorasin',
//    'value' => $book->asin,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Current Amazon Rating and Number of Reviews',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-currentamazonratingandnumberofreviewsex4-3starson24reviews-bothnumbersmustbeincluded-requirementsfiction18reviews4-0stars100pages-nonfictionlessthan100pages60reviews4-2stars-nonfiction100page',
//    'value' => '',
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Date(s) of your KDP Select Free Days.',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-datesofyourkdpselectfreedays-monthdayyearorpermafreepleaseindicateifyourbookispermafree-weschedulepermafreebooks4xoverthecourseof4months',
//    'value' => '',
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Genre(s) of book*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-genresofbook',
//    'value' => $book->genre,
//    'required' =>1
//   ),
//       array(
//    'form-label' => 'Just so we know you are not a robot -- What is 4 + 1 = ? ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-justsoweknowyouarenotarobotwhatis41',
//    'value' => 5,
//   ),
//   array(
//    'form-label' => 'Any other info we need to know?',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'g4962-anyotherinfoweneedtoknowoktoleaveblank-saveyourtimepleasedonotaddabookdescription-wepullallinfofromamazon',
//    'value' =>'',
//    'required' => 1
//   ),
    
//   array(
//    'input' => 'hidden',
//    'name'  => 'contact-form-id',
//    'value' => '4962',
//   ),
//     array(
//    'input' => 'hidden',
//    'name'  => 'action',
//    'value' => 'grunion-contact-form',
//   ),
  
//   array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'http://digitalbooktoday.com/12-top-100-submit-your-free-book-to-be-included-on-this-list/#contact-form-4962'
//   ),

//  );

$forms['digitalbooktoday'] = array(
 'settings' => array(
  'web' => 'The digitalbooktoday',
  'display_name' => 'digitalbooktoday',
  'id' => 'digitalbooktoday',
 ),
 array(
  'form-label' => 'Author First & Last Name*',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-authorfirstlastname',
  'value' => $book->author_name,
  'required' => 1
 ),
 array(
  'form-label' => 'Email*',
  'input' => 'input',
  'type' => 'email',
  'name' => 'g4962-email',
  'value' => $book->email,
  'required' => 1
 ),
 array(
  'form-label' => 'Book Name',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-bookname',
  'value' => $book->book_title,
  'required' => 1
 ),

 array(
  'form-label' => 'Amazon Book Link (preferred) or ASIN',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-amazonbooklinkpreferredorasin',
  'value' => '',
  'required' => 1
 ),

 array(
  'form-label' => 'Current Amazon Rating and Number of Reviews',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-currentamazonratingandnumberofreviewsex4-3starson24reviews-bothnumbersmustbeincluded-requirementsfiction18reviews4-0stars100pages-nonfictionlessthan100pages60reviews4-2stars-nonfiction100page',
  'value' => '',
  'required' => 1
 ),

   array(
  'form-label' => 'Date(s) of your KDP Select Free Days.',
  'input' => 'input',
  'type' => 'text',
  'class' => 'datepicker',
  'name' => 'g4962-datesofyourkdpselectfreedays-monthdayyearorpermafreepleaseindicateifyourbookispermafree-weschedulepermafreebooks4xoverthecourseof4months',
  'value' => date("m/d/Y", strtotime($book->start_date)),
  'required' => 1
 ),
 
   array(
  'form-label' => 'Genre(s) of book*',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-genresofbook',
  'value' => $book->genre,
  'required' =>1
 ),
     array(
  'form-label' => 'Just so we know you are not a robot -- What is 4 + 5 = ? ',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-justsoweknowyouarenotarobotwhatis45',
  'value' =>'9',
 ),
 array(
  'form-label' => 'Any other info we need to know?',
  'input' => 'input',
  'type' => 'text',
  'name' => 'g4962-anyotherinfoweneedtoknowoktoleaveblank-saveyourtimepleasedonotaddabookdescription-wepullallinfofromamazon',
  'value' =>'',
  'required' => 1
 ),
   
 array(
  'input' => 'hidden',
  'name'  => 'contact-form-id',
  'value' => '4962',
 ),
   array(
  'input' => 'hidden',
  'name'  => 'action',
  'value' => 'grunion-contact-form',
 ),
 
 array(
  'input' => 'hidden',
  'name' => 'form_url',
  'value' => 'http://digitalbooktoday.com/join-our-team/12-top-100-submit-your-free-book-to-be-included-on-this-list/#contact-form-4962'
 ),

);


	/*******************************************/
	/************* Bargain Booksy ***************/
	// $forms['bargainbooksy'] = array(
	// 	'settings' => array(
	// 		'web' => 'bargainbooksy.com',
	// 		'display_name' => 'bargainbooksy.com',
	// 		'id' => 'bargainbooksy',
	// 	),
	// 	array(
	// 		'form-label' => 'First name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[83]',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Last Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[84]',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'item_meta[85]',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Link (Amazon)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[86]',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Link (Nook)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[90]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Book Link (Apple)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[91]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[92]',
	// 		'value' => $book->genre
	// 	),
	// 	array(
	// 		'form-label' => 'Promotional price',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[93]',
	// 		'value' =>  $book->regular_price
	// 	),
	// 	array(
	// 		'form-label' => 'First Day your Book will be Discounted ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'item_meta[94]',
	// 		'value' => date("m/d/Y", strtotime($book->start_date))
	// 	),
	// 	array(
	// 		'form-label' => 'Last Day your Book will be Discounted ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[95]',
	// 		'class' => 'datepicker',
	// 		'value' => date("m/d/Y", strtotime($book->end_date))
	// 	),
		
	// 	array(
	// 		'form-label' => 'Please describe your book*',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[88]',
	// 		'value' => htmlspecialchars($book->book_description),
	// 		'required' => 1
	// 	),
				
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_action',
	// 		'value' => 'create'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_id',
	// 		'value' => '6'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_key',
	// 		'value' => 'bbksyeditorial'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_submit_entry_6',
	// 		'value' => '86a7abe42f'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '_wp_http_referer',
	// 		'value' => 'http://www.bargainbooksy.com/for-authors/'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'item_key',
	// 		'value' => ''
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.bargainbooksy.com/for-authors/'
	// 	)
	// );







$forms['bargainbooksy'] = array(
            'settings' => array(
                'web' => 'bargainbooksy.com',
                'display_name' => 'bargainbooksy.com',
                'id' => 'bargainbooksy',
                ),
            array(
                'input' => 'hidden',
                'name' => 'frm_action',
                'value' => 'create'
                ),
            array(
                'input' => 'hidden',
                'name' => 'form_id',
                'value' => '6'
                ),
            array(
                'input' => 'hidden',
                'name' => 'frm_hide_fields_6',
                'value' => ''
                ),
            array(
                'input' => 'hidden',
                'name' => 'form_key',
                'value' => 'bbksyeditorial'
                ),
            array(
                'input' => 'hidden',
                'name' => 'item_meta[0]',
                'value' => ''
                ),
            array(
                'input' => 'hidden',
                'name' => 'frm_submit_entry_6',
                'value' => '101362a0b0'
                ),
            array(
                'input' => 'hidden',
                'name' => '_wp_http_referer',
                'value' => '/for-authors/'
                ),
            array(
                'form-label' => 'First name',
                'input' => 'input',
                'type' => 'text',
                'name' => 'item_meta[83]',
                'value' => $first_name,
                'required' => 1
                ),
            array(
                'form-label' => 'Last Name',
                'input' => 'input',
                'type' => 'text',
                'name' => 'item_meta[84]',
                'value' => $last_name,
                'required' => 1
                ),
            array(
                'form-label' => 'Email',
                'input' => 'input',
                'type' => 'email',
                'name' => 'item_meta[85]',
                'value' => $book->email,
                'required' => 1
                ),
            array(
                'form-label' => 'Book Link (Amazon)',
                'input' => 'input',
                'type' => 'url',
                'name' => 'item_meta[86]',
                'value' => $book->amazon_url,
                'required' => 1
                ),
            array(
                'form-label' => 'Book Link (Nook)',
                'input' => 'input',
                'type' => 'url',
                'name' => 'item_meta[90]',
                'value' => ''
                ),
            array(
                'form-label' => 'Book Link (Apple)',
                'input' => 'input',
                'type' => 'url',
                'name' => 'item_meta[91]',
                'value' => ''
                ),
            // array(
            //     'form-label' => 'Genre',
            //     'input' => 'input',
            //     'type' => 'text',
            //     'name' => 'item_meta[92]',
            //     'value' => $book->genre
            //     ),
             array(
                 'form-label' => 'Genre',
               'input' => 'select',
               'type' => 'select',
               'name' => 'item_meta[92]',
               'values' => array(
                'Romance'=>'Romance',
                'Mystery / Thriller'=>'Mystery / Thriller',
                'Fantasy / Paranormal'=>'Fantasy / Paranormal',
                'Non Fiction'=>'Non Fiction',
                'Fiction'=>'Fiction',
                'Science Fiction'=>'Science Fiction',
                'Literary Fiction'=>'Literary Fiction',
                '  Young Adult'=>'  Young Adult',
                'Children'=>'Children',
                'Horror'=>'Horror',
                'Religion / Spirituality'=>'Religion / Spirituality',
                'Erotica'=>'Erotica',
                ),
                ),
            array(
                'form-label' => 'Promotional price',
                'input' => 'input',
                'type' => 'text',
                'name' => 'item_meta[93]',
                'value' =>  $book->regular_price
                ),
            array(
                'form-label' => 'First Day your Book will be Discounted ',
                'input' => 'input',
                'type' => 'text',
                'class' => 'datepicker',
                'name' => 'item_meta[94]',
                'value' => date("m/d/Y", strtotime($book->start_date))
                ),
            array(
                'form-label' => 'Last Day your Book will be Discounted ',
                'input' => 'input',
                'type' => 'text',
                'name' => 'item_meta[95]',
                'class' => 'datepicker',
                'value' => date("m/d/Y", strtotime($book->end_date))
                ),
            array(
                'form-label' => 'Please describe your book*',
                'input' => 'input',
                'type' => 'text',
                'name' => 'item_meta[88]',
                'value' => htmlspecialchars($book->book_description),
                'required' => 1
                ),
            array(
                'input' => 'hidden',
                'name' => 'item_meta[102]',
                'value' => 'Bargain Booksy Editorial Submissions'
                ),
            array(
                'input' => 'hidden',
                'name' => 'item_meta[103]',
                'value' => ''
                ),
            array(
                'input' => 'hidden',
                'name' => 'item_meta[104]',
                'value' => ''
                ),
            array(
                'input' => 'hidden',
                'name' => 'item_meta[105]',
                'value' => ''
                ),
            array(
                'input' => 'hidden',
                'name' => 'item_key',
                'value' => ''
                ),    
            array(
                'input' => 'hidden',
                'name' => 'form_url',
                'value' => 'https://www.bargainbooksy.com/for-authors/'
                )
            );

	/****************readfree*************/

// 	$forms['readfree'] = array(
//   'settings' => array(
//    'web' => 'readfree.ly',
//    'display_name' => 'readfree.ly(in progress)',
//    'id' => 'readfree',
//   ),
//   array(
//    'form-label' => 'Book Title',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.904268240',
//    'value' => $book->book_title,
//    'required' => 1
//   ),
//   array(
//    'form-label' => "Author's Name ",
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.1106501010',
//    'value' => $first_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Blurb',
//    'input' => 'textarea',
//      'name' => 'entry.785737396',
//    'value' =>strip_tags($book->book_description),
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Genre ',
   
//    'input' => 'select',
//    'name' => 'entry.1372048827',
//      'values' => array(
// 				"Children"  => "Children",
// 				"Comedy"  => "Comedy",
// 				"Erotica"  => "Erotica",
// 				"Fantasy"  => "Fantasy",
// 				"Horror"  => "Horror",
// 				"Literary"  => "Literary"
// 			),
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Amazon link (or ASIN)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.308183536',
//    'value' => $book->amazon_url,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Old price (on Amazon.com)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.1480075355',
//    'value' => '',
//    'required' => 1
//   ),
 
//   array(
//    'form-label' => 'First day of the discount',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'entry_1909622892',
//    'value' => date("m/d/Y", strtotime($book->start_date)),
//     'required' => 1
//   ),
//     array(
//    'form-label' => 'New (discounted) price *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.70032961',
//    'value' => '',
//     'required' => 1
  
//   ),
//   array(
//    'form-label' => 'Final day of the discount',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'entry.1355322367',
//    'value' => date("m/d/Y", strtotime($book->end_date))

//   ),
//       array(
//    'form-label' => 'What is your Twitter handle?',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.886968909',
//    'value' => ''
  
//   ),
//       array(
//    'form-label' => "Your website (if you've got a link to ours)",
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.1455864165',
//    'value' => ''
  
//   ),
//        array(
//    'form-label' => 'Your email address *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'entry.1216609629',
//    'value' => $book->email,
//    'required' => 1
  
//   ),
//        array(
//    'form-label' => ' I have emailed a copy of my book cover to bookcovers@readfree.ly',
//    'input' => 'input',
//    'type' => 'checkbox',
//    'name' => 'entry.1114205243',
//    'value' => '',
  
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'draftResponse',
//    'value' => '[,,"4633919838684443273"]
// '
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'pageHistory',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'fbzx',
//    'value' => ''
//   ),
// array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'https://docs.google.com/forms/d/1j4SaEbydgYcCCiT6BL75gjnDfqLhSI6F7NQ6LJLE8iw/formResponse?embedded=true'
//   )

//  );

/****************armelidosbooks******************/

// $forms['armadilloebooks'] = array(
//   'settings' => array(
//    'web' => 'armadilloebooks',
//    'display_name' => 'armadilloebooks',
//    'id' => 'armadilloebooks',
//   ),
//   array(
//    'form-label' => 'Author Name *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field1',
//    'value' => $first_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Email *',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'Field3',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Book Title *',
//    'input' => 'text',
//      'name' => 'Field5',
//    'value' =>$book->book_title,
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Amazon link (or ASIN)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field6',
//    'value' => $book->asin,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'eBookBooster Special: Submit this eBook to 45+ Sites for only $35? (Optional) ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field117',
//    'value' => ''
   
//   ),

  
//   array(
//    'form-label' => 'Start Date of Promotion ',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'Field12-1',
//    'value' => date("m/d/Y", strtotime($book->start_date))
//   ),

//   array(
//    'form-label' => 'End Date of Promotion *',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'Field14-1',
//    'value' => date("m/d/Y", strtotime($book->end_date))
//   ),
  
//       array(
//    'form-label' => 'Book Description (300 Words or Less) *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field8',
//    'value' => '',
  
//   ),
//        array(
//    'form-label' => 'Author Bio *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field10',
//    'value' => '',
  
//   ),
//        array(
//    'form-label' => 'FREE! Subscribe to eBook Marketing News? Receive free tips, tricks and news on how to market your ebooks!',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field16',
//    'value' => '',
  
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'comment',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'idstamp',
//    'value' => 'xkSR4KBaGnm68O5fJIgdMOd1dX57f5zGqOG7EN5mOho='
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'stats',
//    'value' => ''
//   ),

//    array(
//    'input' => 'hidden',
//    'name' => 'clickOrEnter',
//    'value' => ''
//   ),
// array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'https://armadilloebooks.wufoo.com/embed/z1b413ic0l441yc/def/embedKey=z1b413ic0l441yc399236&entsource=wordpress&referrer=http%3Awuslashwuslashwww.armadilloebooks.comwuslash#public'
//   )

//  );

// $forms['armadilloebooks'] = array(
//   'settings' => array(
//    'web' => 'armadilloebooks',
//    'display_name' => 'armadilloebooks',
//    'id' => 'armadilloebooks',
//   ),
//   array(
//    'form-label' => 'Author Name *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field1',
//    'value' => $first_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Email *',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'Field3',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Book Title *',
//    'input' => 'text',
//      'name' => 'Field5',
//    'value' =>$book->book_title,
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Amazon link (or ASIN)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field6',
//    'value' => $book->asin,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'eBookBooster Special: Submit this eBook to 45+ Sites for only $35? (Optional) ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field117',
//    'value' => ''
   
//   ),

  
//   array(
//    'form-label' => 'Start Date of Promotion ',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'Field12-1',
//    'value' => date("m/d/Y", strtotime($book->start_date))
//   ),

//   array(
//    'form-label' => 'End Date of Promotion *',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'Field14-1',
//    'value' => date("m/d/Y", strtotime($book->end_date))
//   ),
  
//       array(
//    'form-label' => 'Book Description (300 Words or Less) *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field8',
//    'value' => '',
  
//   ),
//        array(
//    'form-label' => 'Author Bio *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field10',
//    'value' => '',
  
//   ),
//        array(
//    'form-label' => 'FREE! Subscribe to eBook Marketing News? Receive free tips, tricks and news on how to market your ebooks!',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field16',
//    'value' => '',
  
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'comment',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'idstamp',
//    'value' => 'xkSR4KBaGnm68O5fJIgdMOd1dX57f5zGqOG7EN5mOho='
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'stats',
//    'value' => ''
//   ),

//    array(
//    'input' => 'hidden',
//    'name' => 'clickOrEnter',
//    'value' => ''
//   ),
// array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'https://armadilloebooks.wufoo.com/embed/z1b413ic0l441yc/def/embedKey=z1b413ic0l441yc399236&entsource=wordpress&referrer=http%3Awuslashwuslashwww.armadilloebooks.comwuslash#public'
//   )

//  );





// $forms['armadilloebooks'] = array(
//   'settings' => array(
//    'web' => 'armadilloebooks',
//    'display_name' => 'armadilloebooks',
//    'id' => 'armadilloebooks',
//   ),
//   array(
//    'form-label' => 'Author Name *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field1',
//    'value' => $first_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Email *',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'Field3',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Book Title *',
//   'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field5',
//    'value' =>$book->book_title,
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Amazon link (or ASIN)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field6',
//    'value' => $book->asin,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'eBookBooster Special: Submit this eBook to 45+ Sites for only $35? (Optional) ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'Field117',
//    'value' => ''
   
//   ),

  
//   array(
//    'form-label' => 'Start Date of Promotion ',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'Field12-1',
//    'value' => date("m/d/Y", strtotime($book->start_date))
//   ),

//   array(
//    'form-label' => 'End Date of Promotion *',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'Field14-1',
//    'value' => date("m/d/Y", strtotime($book->end_date))
//   ),
  
//       array(
//    'form-label' => 'Book Description (300 Words or Less) *',
//    'input' => 'textarea',
//    // 'type' => 'textarea',
//    'name' => 'Field8',
//    'value' => htmlspecialchars($book->book_description),
  
//   ),
//        array(
//    'form-label' => 'Author Bio *',
//    'input' => 'textarea',
//    // 'type' => 'textarea',
//    'name' => 'Field10',
//    'value' => htmlspecialchars($book->author_bio),
  
//   ),
//        array(
//    'form-label' => 'FREE! Subscribe to eBook Marketing News? Receive free tips, tricks and news on how to market your ebooks!',
// 			'input' => 'input',
// 			'type' => 'checkbox',
//    'name' => 'Field16',
//    'value' => '',
  
//   ),
//     array(
//    'input' => 'hidden',
//    'name' => 'currentPage',
//    'value' => '2K2PqE51e76DDmP4jZB8yJCirP4FGzDjWWftaDwuslashYcN0='
//   ),
//   array(
//    'input' => 'hidden',
//    'type' => 'textarea',
//    'name' => 'comment',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'idstamp',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'stats',
//    'value' => ''
//   ),

//    array(
//    'input' => 'hidden',
//    'name' => 'clickOrEnter',
//    'value' => 'click'
//   ),
// array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'https://armadilloebooks.wufoo.com/embed/z1b413ic0l441yc/def/embedKey=z1b413ic0l441yc399236&entsource=wordpress&referrer=http%3Awuslashwuslashwww.armadilloebooks.comwuslash#public'
//   )

//  );












/*****************bookpreviewclub******************/

// $forms['bookpreviewclub'] = array(
//   'settings' => array(
//    'web' => 'bookpreviewclub.com',
//    'display_name' => 'bookpreviewclub.com(in progress)',
//    'id' => 'bookpreviewclub',
//   ),
//   array(
//    'form-label' => 'Author First Name *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q1_fullName[first]',
//    'value' => $first_name,
//    'required' => 1
//   ),
//     array(
//    'form-label' => 'Last Name *',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q1_fullName[last]',
//    'value' => $last_name,
//    'required' => 1
//   ),
//      array(
//    'form-label' => 'Pen Name*',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q26_penName',
//    'value' => '',
  
//   ),
//     array(
//    'form-label' => 'Book Title *',
//    'input' => 'text',
//      'name' => 'q3_bookTitle3',
//    'value' =>$book->book_title,
//    'required' => 1
//   ),
//     array(
//    'form-label' => ' ASIN)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q4_asin',
//    'value' => $book->asin,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'Email *',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'q5_email',
//    'value' => $book->email,
//    'required' => 1
//   ),
//    array(
//   'form-label' => 'I am the Author',
//   'input' => 'input',
//   // 'name' => 'q6_iAm',
//   'type' => 'hidden',
//   // 'value' => "Yes",
//   // 'required' => 1
//  ),
//  array(
//   'form-label' => 'Yes',
//   'input' => 'input',
//   'name' => 'q6_iAm',
//   'type' => 'radio',
//   'value' => "Yes",
//   'required' => 1
//  ),
//   array(
//   'form-label' => 'No',
//   'input' => 'input',
//   'name' => 'q6_iAm',
//   'type' => 'radio',
//   'value' => "No",
//   'required' => 1
//  ),
//     array(
//       'form-label' => 'Book Rating',
//       'input' => 'select',
//       'name' => 'q7_bookRating',
//       'values' => array(
//         "C-Children"  => "C-Children",
//         "G-General Audience"  => "G-General Audience",
//         "PG-Parental Guidance"  => "PG-Parental Guidance",
//         "R-Restricted (for audiences 17 and older)"  => "R-Restricted (for audiences 17 and older)",
//         // "3"  => "3",
//         // "4"  => "4",
//         // "5"  => "5",
//         // "6+"  => "6+"
//       ),
//       'required' => 1
//     ),
//     array(
//       'form-label' => 'Category',
//       'input' => 'select',
//       'name' => 'q8_category',
//       'values' => array(
//         "Fiction"  => "Fiction",
//         "Non-Fiction"  => "Non-Fiction",
//         // "PG-Parental Guidance"  => "PG-Parental Guidance",
//         // "R-Restricted (for audiences 17 and older)"  => "R-Restricted (for audiences 17 and older)",
//         // "3"  => "3",
//         // "4"  => "4",
//         // "5"  => "5",
//         // "6+"  => "6+"
//       ),
//       'required' => 1
//     ),
  
//   // array(
//   //  'form-label' => 'I am the Author  ',
//   //  'input' => 'input',
//   //  'type' => 'text',
//   //  'name' => 'q6_iAm',
//   //  'value' => ''
   
//   // ),
//   // array(
//   //  'form-label' => 'Book Rating',
//   //  'input' => 'input',
//   //  'type' => 'text',
//   //  'name' => 'q7_bookRating',
//   //  'value' => '',
//   //   'required' => 1
  
//   // ),
  

  
//   //   array(
//   //  'form-label' => 'Category ',
//   //  'input' => 'input',
//   //  'type' => 'text',
//   //  'name' => 'q8_category',
//   //  'value' => '',
//   //   'required' => 1
  
//   // ),

//    array(
//    'form-label' => 'Genre 1  ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q9_genre1',
//    'value' => '',
//     'required' => 1
  
//   ),
//      array(
//    'form-label' => 'Genre 2  ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q10_genre2',
//    'value' => ''   
  
//   ),
//      array(
//    'form-label' => 'Genre 3',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q11_genre3',
//    'value' => '' 
   
  
//   ),
//      array(
//    'form-label' => 'Link to purchase or download your book',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q12_linkTo12',
//    'value' => ''     
//   ),

//     array(
//    'form-label' => 'Start Date of Promotion ',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'q13_promoStart',
//    'value' => date("m/d/Y", strtotime($book->start_date))
//   ),

//   array(
//    'form-label' => 'End Date of Promotion *',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'q14_promoEnd',
//    'value' => date("m/d/Y", strtotime($book->end_date))
//   ),

//       array(
//       'form-label' => 'Type of Promotion',
//       'input' => 'select',
//       'name' => 'q28_typeOf28',
//       'values' => array(
//         "FREE"  => "FREE",
//         "$.99"  => "$.99",
//         "$1.99"  => "$1.99",
//         "$2.99"  => "$2.99",
//         "$3.99"  => "$3.99",
//         "$4.99"  => "$4.99",
//         "Other"  => "$4.99",
//         // "3"  => "3",
//         // "4"  => "4",
//         // "5"  => "5",
//         // "6+"  => "6+"
//       ),
//       'required' => 1
//     ),
//   //    array(
//   //  'form-label' => 'Type of Promotion',
//   //  'input' => 'input',
//   //  'type' => 'text',
//   //  'name' => 'q28_typeOf28',
//   //  'value' => ''
  
//   // ),
//       array(
//    'form-label' => 'Author Website URL',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q16_authorWebsite',
//    'value' => ''   
  
//   ),
//       array(
//    'form-label' => 'Type of Promotion',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q28_typeOf28',
//    'value' => ''   
  
//   ),
//       array(
//    'form-label' => 'Facebook URL',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q17_facebookUrl',
//    'value' => '' 
  
//   ),
//       array(
//    'form-label' => ' Twitter URL ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q18_twitterUrl',
//    'value' => ''  
  
//   ),
//       array(
//    'form-label' => ' Google+ URL ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q19_googleUrl',
//    'value' => ''  
  
//   ),
//         array(
//    'form-label' => 'Goodreads URL',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q20_goodreadsUrl',
//    'value' => ''  
  
//   ),
//       array(
//    'form-label' => 'Author Blog',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q22_authorBlog',
//    'value' => ''  
  
//   ),
//       array(
//    'form-label' => 'Promo Code',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'q24_promoCode',
//    'value' => ''
  
//   ),
//    array(
//    'form-label' => "Enter the message as it's shown ",
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'captcha',
//    'value' => ''
  
//   ),

//   array(
//    'input' => 'hidden',
//    'name' => 'captcha_id',
//    'value' => ''
//   ),
//     array(
//    'input' => 'hidden',
//    'name' => 'website',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'simple_spc',
//    'value' => '53035668235154-53035668235154'
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'event_id',
//    'value' => ''
//   ),

//    array(
//    'input' => 'hidden',
//    'name' => 'formID',
//    'value' => '53035668235154'
//   ),
// array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'https://submit.jotform.us/submit/53035668235154/'
//   )

//  );
	/************* Book Preview Club ***************/
	// $forms['bookpreviewclub'] = array(
	// 	'settings' => array(
	// 		'web' => 'bookpreviewclub.com',
	// 		'display_name' => 'bookpreviewclub.com',
	// 		'id' => 'bookpreviewclub',
	// 	),
	// 	array(
	// 		'form-label' => 'First name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '1_element_first16',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'Last Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '1_element_last16',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book Title',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '3_element16',
	// 		'value' => $book->book_title,
	// 		'required' => 1
	// 	),
	// 	/*array(
	// 		'form-label' => 'ASIN'
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '5_element16',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Email'
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => '6_element16',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	*/
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '5_element16',
	// 		'value' => $book->asin
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '6_element16',
	// 		'value' => $book->email
	// 	),
	// 	array(
	// 		'form-label' => 'I am the Author',
	// 		'input' => 'select',
	// 		'name' => '8_element16',
	// 		'values' => array(
	// 			"Yes"  => "Yes",
	// 			"No"  => "No"
	// 		),
	// 		'required' => 1
	// 	),
	
	// 	array(
	// 		'form-label' => 'Category',
	// 		'input' => 'select',
	// 		'name' => '17_element16',
	// 		'values' => array(
	// 			"Fiction"  => "Fiction",
	// 			"Non Fiction"  => "Non Fiction"
	// 		),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Genre1',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '18_element16',
	// 		'value' =>$book->genre,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Genre2',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '19_element16',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Genre3',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '20_element16',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Amazon link',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '14_element16',
	// 		'value' =>  $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion Start Date:',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => '38_element16',
	// 		'value' => date("Y-m-d", strtotime($book->start_date))
	// 	),
	// 	array(
	// 		'form-label' => 'Promotion End Date:',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '39_element16',
	// 		'class' => 'datepicker',
	// 		'value' => date("Y-m-d", strtotime($book->end_date))
	// 	),
		
	// 	array(
	// 		'form-label' => 'Specify Type of Promo',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '41_element16',
	// 		'value' =>''
	// 	),
	// 	array(
	// 		'form-label' => 'Author Website URL',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '24_element16',
	// 		'value' =>''
	// 	),
	// 	array(
	// 		'form-label' => 'Facebook URL',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '25_element16',
	// 		'value' => $book->facebook_url
	// 	),
	// 	array(
	// 		'form-label' => 'Twitter URL',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '26_element16',
	// 		'value' =>''
	// 	),
	// 	array(
	// 		'form-label' => 'Google+ URL',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '28_element16',
	// 		'value' =>''
	// 	),
	// 	array(
	// 		'form-label' => 'GoodReads URL',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '30_element16',
	// 		'value' =>''
	// 	),
	// 	array(
	// 		'form-label' => 'Author Blog',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '32_element16',
	// 		'value' =>''
	// 	),
	// 	array(
	// 		'form-label' => 'Promo Code',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => '36_element16',
	// 		'value' =>''
	// 	),
			
	//     array(
	// 		'input' => 'hidden',
	// 		'name' => '16_element16',
	// 		'value' => 'PG - Parental Guidance'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'counter16',
	// 		'value' => '45'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'Itemid16',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '11_type16',
	// 		'value' => 'type_submit_reset'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://bookpreviewclub.com/thank-you-free/'
	// 	)
	// );
	
	
	/************* ereadergirl ***************/
	$forms['ereadergirl'] = array(
		'settings' => array(
			'web' => 'ereadergirl.com',
			'display_name' => 'ereadergirl.com',
			'id' => 'ereadergirl',
		),
		array(
			'form-label' => 'Author name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_1',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'input_3',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'EBook Link (Amazon)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_5',
			'value' => $book->amazon_url,
			'required' => 1
		),
		
		array(
			'form-label' => 'Ebook ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6',
			'value' => $book->asin
		),
				
		array(
			'input' => 'hidden',
			'name' => 'input_4',
			'value' => 'Free'
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'state_1',
			'value' => 'WyJbXSIsIjg4YjgyYWFkNjllN2VlYTEwOGVkYzAyZmIyZTM3M2UyIl0='
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_1',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://ereadergirl.com/submit-your-ebook/'
		)
	);
	
	/************* ebooksaddict ***************/
	$forms['ebooksaddict'] = array(
		'settings' => array(
			'web' => 'ebooksaddict.com',
			'display_name' => 'ebooksaddict.com',
			'id' => 'ebooksaddict',
		),
		array(
			'form-label' => 'Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'clean_contact_from_name',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Your e-mail address',
			'input' => 'input',
			'type' => 'email',
			'name' => 'clean_contact_from_email',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Subject',
			'input' => 'input',
			'type' => 'text',
			'name' => 'clean_contact_subject',
			'value' => 'Free Book Promotion Submission',
			'required' => 1
		),
		
		array(
			'form-label' => 'Message',
			'input' => 'input',
			'type' => 'text',
			'name' => 'clean_contact_body',
			'value' =>'Please submit my book:
Book title: ' . $book->book_title . '
ASIN:' . $book->asin . '
 First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
 Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
Thank you!',
			'required' => 1
		),
			
		array(
			'input' => 'hidden',
			'name' => 'clean_contact_token',
			'value' => 'cc'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://ebooksaddict.com/submissions/'
		)
	);


	/************* ebooksaddict ***************/
	$forms['efreebooks'] = array(
		'settings' => array(
			'web' => 'efreebooks.org',
			'display_name' => 'efreebooks.org',
			'id' => 'efreebooks',
		),
		array(
			'form-label' => 'Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000000',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Your e-mail address',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.1000001',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Subject',
			'input' => 'input',
			'type' => 'text',
			'name' => 'clean_contact_subject',
			'value' => 'Free Book Promotion Submission',
			'required' => 1
		),
		
		array(
			'form-label' => 'Details of query',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000004',
			'value' =>'Please submit my book:
Book title: ' . $book->book_title . '
ASIN:' . $book->asin . '
 First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
 Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
Thank you!',
			'required' => 1
		),
			
					array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'draftResponse',
			'value' =>"[,,'602716078386492111']",
			// 'required' => 1
		),	
								array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'pageHistory',
			'value' =>0,
			// 'required' => 1
		),	
											array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'fvv',
			'value' =>0,
			// 'required' => 1
		),	

													array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'fbzx',
			'value' =>602716078386492111,
			// 'required' => 1
		),	


		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1i_7XjlCWf40nbUdhxhMFSuSmq0gKDc9T5D9K5G4szk8/formResponse?embedded=true'
		)

	);


	/************* dealseekingmom ***************/
	$forms['dealseekingmom'] = array(
		'settings' => array(
			'web' => 'dealseekingmom.com',
			'display_name' => 'dealseekingmom.com',
			'id' => 'dealseekingmom',
		),
		array(
			// 'form-label' => 'Subject',
			'input' => 'hidden',
			// 'type' => 'hidden',
			'name' => '_wpcf7',
			'value' => 1,
			// 'required' => 1
		),
		array(
			// 'form-label' => 'Subject',
			'input' => 'hidden',
			// 'type' => 'hidden',
			'name' => '_wpcf7_version',
			'value' => '2.4.3',
			'required' => 1
		),
		array(
			// 'form-label' => 'Subject',
			'input' => 'hidden',
			// 'type' => 'hidden',
			'name' => '_wpcf7_unit_tag',
			'value' => 'wpcf7-f1-p1692-o1',
			// 'required' => 1
		),
		array(
			'form-label' => 'Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-name',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Your e-mail address',
			'input' => 'input',
			'type' => 'email',
			'name' => 'your-email',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Subject',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-subject',
			'value' => 'Free Book Promotion Submission',
			'required' => 1
		),
		
		array(
			'form-label' => 'Message',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-message',
			'value' =>'Please submit my book:
Book title: ' . $book->book_title . '
ASIN:' . $book->asin . '
 First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
 Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
Thank you!',
			'required' => 1
		),
			
		// array(
		// 	'input' => 'hidden',
		// 	'name' => 'clean_contact_token',
		// 	'value' => 'cc'
		// ),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://dealseekingmom.com/about/contact'
		)
	);

	/************* dealseekingmom ***************/

// 	$forms['freestufftimes'] = array(
// 		'settings' => array(
// 			'web' => 'freestufftimes.com',
// 			'display_name' => 'freestufftimes.com',
// 			'id' => 'freestufftimes',
// 		),

// 		array(
// 			'form-label' => 'Name',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g2402-name',
// 			'value' => $book->author_name,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Your e-mail address',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'g2402-email',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		array(
// 			'form-label' => 'Link',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g2402-website',
// 			'value' => $book->amazon_url,
// 			'required' => 1
// 		),
		
// 		array(
// 			'form-label' => 'Message',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g2402-comment',
// 			'value' =>'Please submit my book:
// Book title: ' . $book->book_title . '
// ASIN:' . $book->asin . '
//  First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
//  Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!',
// 			'required' => 1
// 		),
			
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'contact-form-id',
// 			'value' => 2402
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'action',
// 			'value' => 'grunion-contact-for'
// 		),
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'http://www.freestufftimes.com/about-the-site#contact-form-2402'
// 		)
// 	);



	/************* freeebooksblog ***************/

	$forms['freeebooksblog'] = array(
		'settings' => array(
			'web' => 'freeebooksblog.com',
			'display_name' => 'freeebooksblog.com',
			'id' => 'freeebooksblog',
		),
		array(
			'form-label' => 'Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-name',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Your e-mail address',
			'input' => 'input',
			'type' => 'email',
			'name' => 'your-email',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Subject',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-subject',
			'value' => 'Free Book Promotion Submission',
			'required' => 1
		),
		array(
			'form-label' => 'Message',
			'input' => 'input',
			'type' => 'text',
			'name' => 'your-message',
			'value' =>'Please submit my book:
Book title: ' . $book->book_title . '
ASIN:' . $book->asin . '
 First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
 Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
Thank you!',
			'required' => 1
		),
		array(
			// 'input' => 'input',
			'input' => 'hidden',
			'name' => '_wpcf7',
			'value' => 3213,
			),
		array(
			// 'input' => 'input',
			'input' => 'hidden',
			'name' => '_wpcf7_version',
			'value' => '4.2.2',
			),
		array(
			// 'input' => 'input',
			'input' => 'hidden',
			'name' => '_wpcf7_locale',
			'value' => '',
			),
		array(
			// 'input' => 'input',
			'input' => 'hidden',
			'name' => '_wpcf7_unit_tag',
			'value' => 'wpcf7-f3213-p3214-o1',
			),
		array(
			// 'input' => 'input',
			'input' => 'hidden',
			'name' => '_wpnonce',
			'value' => 'ec67fee9f9',
			),
			
		// array(
		// 	'input' => 'hidden',
		// 	'name' => 'clean_contact_token',
		// 	'value' => 'cc'
		// ),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://www.freeebooksblog.com/contact/'
		)
	);





/************* free-kindle-books-4u ***************/

// 	$forms['free-kindle-books-4u'] = array(
// 		'settings' => array(
// 			'web' => 'free-kindle-books-4u.com',
// 			'display_name' => 'free-kindle-books-4u.com',
// 			'id' => 'free-kindle-books-4u',
// 		),
// 		// array(
// 		// 	'form-label' => 'Name',
// 		// 	'input' => 'input',
// 		// 	'type' => 'text',
// 		// 	'name' => 'g178-name',
// 		// 	'value' => $book->author_name,
// 		// 	// 'required' => 1
// 		// ),
// 		array(
// 			// 'form-label' => 'Subject',
// 			'input' => 'input',
// 			'type' => 'hidden',
// 			'name' => 'contact-form-id',
// 			'value' => 178,
// 			// 'required' => 1
// 		),
// 		array(
// 			// 'form-label' => 'Subject',
// 			'input' => 'input',
// 			'type' => 'hidden',
// 			'name' => 'action',
// 			'value' => 'grunion-contact-form',
// 			// 'required' => 1
// 		),
// 				array(
// 			// 'form-label' => 'Subject',
// 			'input' => 'input',
// 			'type' => 'hidden',
// 			'name' => '_wpcf7_locale',
// 			'value' => '',
// 			// 'required' => 1
// 		),
// 				array(
// 			'form-label' => 'Name',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g178-name123',
// 			'value' => $book->author_name,
// 			// 'required' => 1
// 		),

// 		// array(
// 		// 	// 'form-label' => 'Subject',
// 		// 	'input' => 'input',
// 		// 	'type' => 'hidden',
// 		// 	'name' => '_wpcf7_unit_tag',
// 		// 	'value' => 'wpcf7-f3213-p3214-o1',
// 		// 	// 'required' => 1
// 		// ),
// 		// array(
// 		// 	// 'form-label' => 'Subject',
// 		// 	'input' => 'input',
// 		// 	'type' => 'hidden',
// 		// 	'name' => '_wpnonce',
// 		// 	'value' => 'ec67fee9f9',
// 		// 	// 'required' => 1
// 		// ),
// 		// array(
// 		// 	'form-label' => 'Name',
// 		// 	'input' => 'input',
// 		// 	'type' => 'text',
// 		// 	'name' => 'g178-name',
// 		// 	'value' => $book->author_name,
// 		// 	'required' => 1
// 		// ),
// 		array(
// 			'form-label' => 'Your e-mail address',
// 			'input' => 'input',
// 			'type' => 'email',
// 			'name' => 'g178-email',
// 			'value' => $book->email,
// 			'required' => 1
// 		),
// 		// array(
// 		// 	'form-label' => 'Subject',
// 		// 	'input' => 'input',
// 		// 	'type' => 'text',
// 		// 	'name' => 'your-subject',
// 		// 	'value' => 'Free Book Promotion Submission',
// 		// 	'required' => 1
// 		// ),
		
// 		array(
// 			'form-label' => 'Message',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'g178-comment',
// 			'value' =>'Please submit my book:
// Book title: ' . $book->book_title . '
// ASIN:' . $book->asin . '
//  First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
//  Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!',
// 			'required' => 1
// 		),
			
// 		// array(
// 		// 	'input' => 'hidden',
// 		// 	'name' => 'clean_contact_token',
// 		// 	'value' => 'cc'
// 		// ),
		
// 		array(
// 			'input' => 'hidden',
// 			'name' => 'form_url',
// 			'value' => 'http://www.free-kindle-books-4u.com/contact'
// 		)
// 	);


/*************************************freebies4mom***********************************************/

	$forms['freebies4mom'] = array(
		'settings' => array(
			'web' => 'freebies4mom.com',
			'display_name' => 'freebies4mom.com',
			'id' => 'freebies4mom',
		),
		array(
			'form-label' => 'Title',
			'input' => 'input',
			'type' => 'hidden',
			'name' => 'entry.1000003',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000004',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Link',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000011',
			'value' => $book->amazon_url,
			'required' => 1
		),
			array(
			'form-label' => 'Price',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000012',
			'value' => $book->regular_price,
			'required' => 1
		),
		array(
			'form-label' => 'Romance',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Romance',
			// 'selected' => 'checked',
		),
				array(
			'form-label' => 'Historical Romance',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Historical Romance',
			// 'selected' => 'checked',
		),
				array(
			'form-label' => 'Paranormal Romance',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Paranormal Romance',
			// 'selected' => 'checked',
		),
						array(
			'form-label' => 'Romantic Suspense',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Romantic Suspense',
			// 'selected' => 'checked',
		),
		array(
			'form-label' => 'Adventure',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Adventure',
			// 'selected' => 'checked',
		),
				array(
			'form-label' => 'Personal Finance',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Personal Finance',
			// 'selected' => 'checked',
		),
						array(
			'form-label' => 'Do-It-Yourself',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Do-It-Yourself',
			// 'selected' => 'checked',
		),
		// 				array(
		// 	'form-label' => 'Do-It-Yourself',
		// 	'input' => 'checkbox',
		// 	'name' => 'entry.1000014',
		// 	'value' => 'Do-It-Yourself',
		// 	// 'selected' => 'checked',
		// ),
								array(
			'form-label' => 'Classic',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Classic',
			// 'selected' => 'checked',
		),
							array(
			'form-label' => 'Science Fiction',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Science Fiction',
			// 'selected' => 'checked',
		),
								array(
			'form-label' => 'Mystery',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Mystery',
			// 'selected' => 'checked',
		),
										array(
			'form-label' => 'Childrens Picture Book',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Childrens Picture Book',
			// 'selected' => 'checked',
		),
									array(
			'form-label' => 'Young Adult',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Young Adult',
			// 'selected' => 'checked',
		),
											array(
			'form-label' => 'Other',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000014',
			'value' => 'Other',
			// 'selected' => 'checked',
		),
		array(
			'form-label' => 'When does the free eBook promotion begin?',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.2911074',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),												
		array(
			'form-label' => 'WWhen this free eBook promotion end?',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000001',
			'value' =>date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),	

				array(
			'form-label' => 'Genre(s)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1000006',
			'value' => $book->genre,
			'required' => 1
		),
				array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.1000009',
			'value' =>$book->email,
			'required' => 1
		),	
			array(
			'form-label' => 'I am the author',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000010',
			'value' => 'I am the author',
			// 'selected' => 'checked',
		),
			array(
			'form-label' => 'I am the publisher',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000010',
			'value' => 'I am the publisher',
			// 'selected' => 'checked',
		),
				array(
			'form-label' => 'I am the media representative',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.1000010',
			'value' => 'I am the media representative',
			// 'selected' => 'checked',
		),
					array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'draftResponse',
			'value' =>"[,,'1456614911480349609']",
			// 'required' => 1
		),	
								array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'pageHistory',
			'value' =>0,
			// 'required' => 1
		),	
											array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'fvv',
			'value' =>0,
			// 'required' => 1
		),	

													array(
			// 'form-label' => 'draftResponse',
			'input' => 'hidden',
			'type' => 'text',
			'name' => 'fbzx',
			'value' =>1456614911480349609,
			// 'required' => 1
		),	



// 		array(
// 			'form-label' => 'Subject',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'your-subject',
// 			'value' => 'Free Book Promotion Submission',
// 			'required' => 1
// 		),
		
// 		array(
// 			'form-label' => 'Message',
// 			'input' => 'input',
// 			'type' => 'text',
// 			'name' => 'your-message',
// 			'value' =>'Please submit my book:
// Book title: ' . $book->book_title . '
// ASIN:' . $book->asin . '
//  First Free Day: ' . date("m/d/Y", strtotime($book->start_date)) . '
//  Last Free Day: ' . date("m/d/Y", strtotime($book->end_date)) . '.
// Thank you!',
// 			'required' => 1
// 		),
			
		// array(
		// 	'input' => 'hidden',
		// 	'name' => 'clean_contact_token',
		// 	'value' => 'cc'
		// ),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1K7I22_L64AdxS_oYj7-emPm9gMZWX4zgIY_Y7FyM048/formResponse?embedded=true'
		)
	);

/********************eriotcaeveryday*********************************/

// $forms['eroticaeveryday'] = array(
//   'settings' => array(
//    'web' => 'eroticaeveryday.com',
//    'display_name' => 'eroticaeveryday.com',
//    'id' => 'eroticaeveryday',
//   ),
//     array(
//    'input' => 'hidden',
//   'name' => '_sub_confirm',
//    'value' => 'yes'
//  ),

//    array(
//    'input' => 'hidden',
//   'name' => 'acctid',
//    'value' => 'v3lh3jrazpzapeir'
//  ),
//   array(
//      'input' => 'input',
//    'type' => 'hidden',
//    'name' => 'formid',
//    'value' => 1161828,
  
//   ),
//   array(
//      'input' => 'input',
//    'type' => 'hidden',
//    'name' => 'required_vars',
//    'value' => 'name,email,field-49b8ac185bbbc42,field-5ce9fddd74d03e2,field-b8fdd1d591949b6,field-5e41e5a000306ed,field-33a835dc32ca232,field-a91d3568c09785c',
  
//   ),
  
 
//   array(
//    'form-label' => 'Name',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'name',
//    'value' => $book->author_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'email',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'email',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Your Book Title',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'field-49b8ac185bbbc42',
//    'value' => $book->book_title,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'Your Book Sub-Title',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'field-779b14148433663',
//    'value' => $book->book_title,
//    'required' => 1
//   ),

//   array(
//    'form-label' => 'Amazon link',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'field-5ce9fddd74d03e2',
//    'value' =>  $book->amazon_url,
//    'required' => 1
//   ),

//     array(
//    'form-label' => 'ASIN',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'field-b8fdd1d591949b6',
//    'value' =>   $book->asin,
//    'required' => 1
//   ),

//    array(
//    'form-label' => 'What genre is your book?',
//    'input' => 'select',
//    // 'type' => 'select',

//    'name' => 'field-5e41e5a000306ed',
//    		'values' => array(
// 				"Erotica"  => "Erotica",
// 				"Anthologies"  => "Anthologies",
// 				"Asian"  => "Asian",
// 				"BDSM"  => "BDSM",
// 				"Fetish"  => "Fetish",
// 				"Gay"  => "Gay",
// 				"Lesbian"  => "Lesbian",
// 				"Paranormal"  => "Paranormal",
// 				"Romance"  => "Romance",
// 				"Sci-Fi/Fantasy"  => "Sci-Fi/Fantasy",

// 			),
//    //'value' =>  $book->genre,
//     ),


//     array(
//    // 'form-label' => 'ASIN',
//    'input' => 'input',
//    'type' => 'hidden',
//    'name' => 'afterurl',
//    'value' =>  'http://authormarketingclub.com/members/premium-membership/',
//    // 'required' => 1
//   ),

  
//   array(
//    'form-label' => 'Tell the reader about your book',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'field-33a835dc32ca232',
//    'value' =>htmlspecialchars($book->book_description),
//    'required' => 1
//   ),

//     array(
//    'form-label' => 'What date will your book be free?',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'field-a91d3568c09785c',
//    'value' =>date("m/d/Y", strtotime($book->start_date)),
//    'required' => 1
//   ),

  
//   array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'http://www.freedback.com/mail.php'
//   )
//  );





/*************************************/
$forms['christianbookreaders'] = array(
  'settings' => array(
   'web' => 'christianbookreaders.com',
   'display_name' => 'christianbookreaders.com',
   'id' => 'christianbookreaders',
  ),

      array(
   'input' => 'hidden',
  'name' => '_sub_confirm',
   'value' => 'yes'
 ),
     array(
   'input' => 'hidden',
  'name' => 'acctid',
   'value' => 'v3lh3jrazpzapeir'
 ),
  
  array(
     'input' => 'input',
   'type' => 'hidden',
   'name' => 'formid',
   'value' => '1174804',
  
  ),
 
 
  array(
   'form-label' => 'Name',
   'input' => 'input',
   'type' => 'text',
   'name' => 'name',
   'value' => $book->author_name,
   'required' => 1
  ),
  array(
   'form-label' => 'email',
   'input' => 'input',
   'type' => 'email',
   'name' => 'email',
   'value' => $book->email,
   'required' => 1
  ),
  array(
   'form-label' => 'Your Book Title',
   'input' => 'input',
   'type' => 'text',
   'name' => 'field-cf2930c56d72276',
   'value' => $book->book_title,
   'required' => 1
  ),

  array(
   'form-label' => 'Your Book Sub-Title',
   'input' => 'input',
   'type' => 'text',
   'name' => 'field-8873c7fdec5e3ba',
   'value' => $book->book_title,
   'required' => 1
  ),

  array(
   'form-label' => 'Amazon link',
   'input' => 'input',
   'type' => 'text',
   'name' => 'field-8fb77b85a70881f',
   'value' =>  $book->amazon_url,
   'required' => 1
  ),

   array(
   'form-label' => 'What is your Amazon ASIN or ISBN ',
   'input' => 'input',
   'type' => 'text',
   'name' => 'field-f187e5d91f85d91',
   'value' =>  $book->asin,
   'required' => 1
  ),

   array(
   'form-label' => 'What genre is your book?',
   'input' => 'select',
   'type' => 'select',
   'name' => 'field-d75902fdbdecff8',
   'values' => array(
   	'Bibles'=>'Bibles',
   	'Catholic'=>'Catholic',
   	'Church'=>'Church',
   	'Education'=>'Education',
   	'Fiction'=>'Fiction',
   	'Sunday School'=>'Sunday School',
   	'VBS'=>'VBS',
   	),
    ),
  
  array(
   'form-label' => 'Tell the reader about your book',
   'input' => 'input',
   'type' => 'text',
   'name' => 'field-a6c77a955d5407a',
   'value' =>htmlspecialchars($book->book_description),
   'required' => 1
  ),

    array(
   'form-label' => 'What date will your book be free?',
   'input' => 'input',
   'type' => 'text',
   'name' => 'field-c30a8463ea34f3b',
   'value' =>date("m/d/Y", strtotime($book->start_date)),
   'required' => 1
  ),
   
    array(
   // 'form-label' => 'ASIN',
   'input' => 'input',
   'type' => 'hidden',
   'name' => 'afterurl',
   'value' =>  'http://authormarketingclub.com/members/premium-membership/',
   // 'required' => 1
  ),

  array(
   'input' => 'hidden',
   'name' => 'form_url',
   'value' => 'http://www.freedback.com/mail.php'
  )
 );























	
	/************* faithfulreads.com **************/
	$forms['faithfulreads'] = array(
		'settings' => array(
			'web' => 'faithfulreads.com',
			'display_name' => 'faithfulreads.com',
			'id' => 'faithfulreads',
		),
		array(
			'form-label' => 'Author Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.863736926',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'E-mail address',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.60853348',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1554901524',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon ASIN ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1355405979',
			'value' => $book->asin,
			'required' => 1
		),
		
		array(
			'form-label' => 'Date your free promotion begins ',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'entry.974416591',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Date your free promotion ends',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'entry.796650033',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Genre ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.85013907',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"6065041808970513909"]'
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fvv',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '6065041808970513909'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1ofrmdIwB2XJYzZv-LfezihsesWj20O-8DAk31SAsDzM/formResponse?embedded=true'
		)
	);
	
	
	/************ freebooksy.com ************/
	// $forms['freebooksy'] = array(
	// 	'settings' => array(
	// 		'web' => 'freebooksy.com',
	// 		'display_name' => 'freebooksy.com',
	// 		'id' => 'freebooksy',
	// 	),
	// 	array(
	// 		'form-label' => 'Author First Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[86]',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Author Last Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[87]',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'E-mail address',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'item_meta[88]',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Link to Book (Amazon)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[93]',
	// 		'value' => $book->amazon_url,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Link to Book (Nook)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[94]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Link to Book (Apple)',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[89]',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'form-label' => 'Genre',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[99]',
	// 		'value' => 'Non Fiction'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'item_meta[100]',
	// 		'value' => 'No'
	// 	),
	// 	array(
	// 		'form-label' => 'What is the first day your book becomes free? ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'item_meta[97]',
	// 		'value' => date("m/d/Y", strtotime($book->start_date))
	// 	),
	// 	array(
	// 		'form-label' => 'What is the last day your book will be free? ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'item_meta[96]',
	// 		'value' => date("m/d/Y", strtotime($book->end_date))
	// 	),
	// 	array(
	// 		'form-label' => 'Book Description ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'item_meta[101]',
	// 		'value' => htmlspecialchars($book->book_description),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'item_key',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_action',
	// 		'value' => 'create'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_id',
	// 		'value' => '7'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_key',
	// 		'value' => 'fbsyeditorial'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'frm_submit_entry_7',
	// 		'value' => '08828fe7f2'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => '_wp_http_referer',
	// 		'value' => '/editorial-submissions/'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://www.freebooksy.com/editorial-submissions/'
	// 	)
	// );

// 	$forms['freebooksy'] = array(
//   'settings' => array(
//    'web' => 'freebooksy.com',
//    'display_name' => 'freebooksy.com',
//    'id' => 'freebooksy',
//   ),
//   array(
//    'form-label' => 'Author First Name',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[86]',
//    'value' => $first_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Author Last Name',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[87]',
//    'value' => $last_name,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'E-mail address',
//    'input' => 'input',
//    'type' => 'email',
//    'name' => 'item_meta[88]',
//    'value' => $book->email,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Link to Book (Amazon)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[93]',
//    'value' => $book->amazon_url,
//    'required' => 1
//   ),
//   array(
//    'form-label' => 'Link to Book (Nook)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[94]',
//    'value' => ''
//   ),
//   array(
//    'form-label' => 'Link to Book (Apple)',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[89]',
//    'value' => ''
//   ),
//   array(
//    'form-label' => 'Genre',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[99]',
//    'value' => 'Non Fiction'
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'item_meta[100]',
//    'value' => 'No'
//   ),
//   array(
//    'form-label' => 'What is the first day your book becomes free? ',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'item_meta[97]',
//    'value' => date("m/d/Y", strtotime($book->start_date))
//   ),
//   array(
//    'form-label' => 'What is the last day your book will be free? ',
//    'input' => 'input',
//    'type' => 'text',
//    'class' => 'datepicker',
//    'name' => 'item_meta[96]',
//    'value' => date("m/d/Y", strtotime($book->end_date))
//   ),
//   array(
//    'form-label' => 'Book Description ',
//    'input' => 'input',
//    'type' => 'text',
//    'name' => 'item_meta[101]',
//    'value' => htmlspecialchars($book->book_description),
//    'required' => 1
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'item_key',
//    'value' => ''
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'frm_action',
//    'value' => 'create'
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'form_id',
//    'value' => '7'
//   ),

// array(
//    'input' => 'hidden',
//    'name' => 'frm_hide_fields_7',
//    'value' => ''
//   ),
// array(
//    'input' => 'hidden',
//    'name' => 'frm_helpers_7',
//    'value' => ''
//   ),

//   array(
//    'input' => 'hidden',
//    'name' => 'item_meta[0]',
//    'value' => ''
//   ),

//    array(
//    'input' => 'hidden',
//    'name' => 'form_key',
//    'value' => 'fbsyeditorial'
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'frm_submit_entry_7',
//    'value' => '08828fe7f2'
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => '_wp_http_referer',
//    'value' => 'http://www.freebooksy.com/editorial-submissions/'
//   ),
//   array(
//    'input' => 'hidden',
//    'name' => 'form_url',
//    'value' => 'http://www.freebooksy.com/editorial-submissions/'
//   )
//  );


			
			/************* ohfb.com **************/
	// $forms['ohfb'] = array(
	// 	'settings' => array(
	// 		'web' => 'ohfb.com',
	// 		'display_name' => 'ohfb.com',
	// 		'id' => 'ohfb',
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'subject',
	// 		'value' => 'Free book heads up'
	// 	),
	// 	array(
	// 		'form-label' => 'Your Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'name',
	// 		'value' => $book->author_name,
	// 		'required' => 1
	// 	),

	// 	array(
	// 		'form-label' => 'E-mail address',
	// 		'input' => 'input',
	// 		'type' => 'email',
	// 		'name' => 'email',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'ASIN/Book Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'asin',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
		
	// 	array(
	// 		'form-label' => 'Promotion Start Date',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'class' => 'datepicker',
	// 		'name' => 'date',
	// 		'value' => date("m/d/Y", strtotime($book->start_date))
	// 	),
	// 	array(
	// 		'form-label' => 'Additional Feedback ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'comments',
	// 		'value' => '',
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'verify',
	// 		'value' => '4'
	// 	),
		
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'https://ohfb.com/author-free-kindle-book-submission.php'
	// 	)
	// );
	/************* awesomegang.com **************/
	$forms['awesomegang'] = array(
		'settings' => array(
			'web' => 'awesomegang.com',
			'display_name' => 'awesomegang.com',
			'id' => 'awesomegang',
		),
		array(
			'form-label' => 'Title of Book',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_1',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Book Synopsis',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_2',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Author Bio',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_8',
			'value' => htmlspecialchars($book->author_bio),
			'required' => 1
		),
		array(
			'form-label' => 'Author Website ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6',
			'value' => '',
			'required' => 1

		),
		array(
			'form-label' => 'Link To Book On Amazon',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_10',
			'value' => $book->amazon_url,
			'required' => 1

		),
		array(
			'form-label' => 'Twitter',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_11',
			'value' => '',
			'required' => 1

		),
		array(
			'form-label' => 'Facebook Fan page',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_12',
			'value' => ''
		),
		array(
			'form-label' => 'Book Cover image',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_9',
			'value' => $book->cover_img_url,
			'required' => 1

		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_4',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Genre ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_13',
			'value' => $book->genre,
			'required' => 1
		),
		array(
			'form-label' => 'Requested Date for Publishing ',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_16',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 1 day')),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'input_14.1',
			'value' => 'No'
		),
		array(
			'input' => 'hidden',
			'name' => 'input_15',
			'value' => 'No|0'
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_7',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '7'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'state_7',
			'value' => 'WyJ7XCIxNVwiOltcImIzYmYzNTFhYjNkMzg0MGY3ZTNlMGRiOGI5MDUwMzczXCIsXCJlYWMyZjQ5MjEzMWNlYjk5NTAzYWI2YTljOGMyZWMwOVwiXX0iLCI4Y2YxZjBmNDVlMDg4MzIxY2QyMGJiMTk4NDdlYTUwYiJd'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_7',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_7',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://awesomegang.com/submit-your-book/'
		)
	);





	/***************************newfreekindlebooks*******************************/

$forms['newfreekindlebooks'] = array(
  'settings' => array(
   'web' => 'newfreekindlebooks',
   'display_name' => 'newfreekindlebooks',
   'id' => 'newfreekindlebooks',
  ),
 
 
  array(
   'form-label' => 'Book Title',
   'input' => 'input',
   'type' => 'text',
   'name' => 'vfb-5',
   'value' => $book->book_title,
   'required' => 1
  ),
 
      array(
   'form-label' => 'Link to Book *',
   'input' => 'input',
   'type' => 'text',
   'name' => 'vfb-13',
   'value' => $book->amazon_url,
   'required' => 1
  ),

   array(
   'form-label' => 'Genre*',
   'input' => 'input',
   'type' => 'text',
   'name' => 'vfb-22',
   'value' => $book->genre,
   'required' => 1
  ),

  array(
   'form-label' => 'Tell Me About Your Book *',
   'input' => 'input',
   'type' => 'textarea',
   'name' => 'vfb-17',
   'value' => htmlspecialchars($book->book_description),
   'required' => 0
  ),
   

     array(
   'form-label' => 'Promotion start date',
   'input' => 'input',
   'type' => 'text',
   'class' => 'datepicker',
   'name' => 'vfb-9',
   'value' => date("m/d/Y", strtotime($book->start_date)),
   'required' => 1
  ),

    array(
   'form-label' => 'Promotion end date',
   'input' => 'input',
   'type' => 'text',
   'class' => 'datepicker',
   'name' => 'vfb-10',
   'value' => date("m/d/Y", strtotime($book->end_date)),
   'required' => 1
  ),
       array(
   'form-label' => 'Price*',
   'input' => 'input',
   'type' => 'text',
   'name' => 'vfb-21',
   'value' => $book->regular_price,
   'required' => 1
  ),

     array(
   'form-label' => 'email',
   'input' => 'input',
   'type' => 'email',
   'name' => 'vfb-16',
   'value' => $book->email,
   'required' => 1
  ),

     array(
   'form-label' => 'Author Website ',
   'input' => 'input',
   'type' => 'text',
   'name' => 'vfb-45',
   'value' => '',
   'required' => 0
  ),

          array(

   'input' => 'hidden',
    'name' => '_vfb-secret',
   'value' => 'vfb-3',
   // 'required' => 0
  ),

    array(
   'form-label' => 'Please enter any two digits* Example: 12',
   'input' => 'input',
   'type' => 'text',
   'name' => 'vfb-3',
   'value' => '13',
   'required' => 1
  ),

  // array(
  //  'input' => 'hidden',
  //  'name'  => '_vfb-secret',
  //  'value' => 'vfb-3',
  // ),
    array(
   'input' => 'hidden',
   'name'  => '_wp_http_referer',
   'value' => 'http://newfreekindlebooks.com/authors/',
  ),
        array(
   'input' => 'hidden',
   'name'  => 'vfb-submit',
   'value' => 'http://newfreekindlebooks.com/authors/',
  ),
  array(
   'input' => 'hidden',
   'name'  => 'form_id',
   'value' => '1',
  ),
 
  array(
   'input' => 'hidden',
   'name' => 'form_url',
   'value' => 'http://newfreekindlebooks.com/authors/'
  ),

 );





	/************* The Kindle book review **************/
	$forms['kindlebook'] = array(
		'settings' => array(
			'web' => 'kindlebook',
			'display_name' => 'kindlebook',
			'id' => 'kindlebook',
		),
		array(
			'form-label' => 'Author First Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'q4_authorsFull[first]',
			'value' => $first_name,
			'required' => 1
		),
		array(
			'form-label' => 'Author last Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'q4_authorsFull[last]',
			'value' => $last_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'q5_contactEmail',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'q7_bookTitle',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon Link',
			'input' => 'input',
			'type' => 'text',
			'name' => 'q8_amazonLink8',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Twitter',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_11',
			'value' => ''
		),	
		array(
			'form-label' => 'Day 1 of Amazon Free Promotion',
			'input' => 'input',
			'type' => 'text',
			'name' => 'sDate',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 1 day')),
			'required' => 1
		),
		array(
			'form-label' => 'Last Day of my Amazon Free Day',
			'input' => 'input',
			'type' => 'text',
			'name' => 'lDate',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'q14_paymentOptions[][id]',
			'value' => '1004'
		),
		array(
			'input' => 'hidden',
			'name' => 'simple_spc',
			'value' => '21078469493969-21078469493969'
		),
		array(
			'input' => 'hidden',
			'name' => 'event_id',
			'value' => '1442478376083_21078469493969_wIJtH41'
		),
		array(
			'input' => 'hidden',
			'name' => 'formID',
			'value' => '21078469493969'
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://submit.jotformpro.com/submit/21078469493969/'
		)
	);
	
	
	/************* EbookStamp *************/
	// $forms['ebookstamp'] = array(
	// 	'settings' => array(
	// 		'web' => 'ebookstamp',
	// 		'display_name' => 'ebookstamp',
	// 		'id' => 'ebookstamp',
	// 	),
		
	// 	array(
	// 		'form-label' => 'Email',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'EMAIL',
	// 		'value' => $book->email,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'First Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'FNAME',
	// 		'value' => $first_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Last Name',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'LNAME',
	// 		'value' => $last_name,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Book ASIN',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'MMERGE3',
	// 		'value' => $book->asin,
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'form-label' => 'Anything you want to tell us',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'MMERGE16',
	// 		'value' => ''
	// 	),	
	// 	array(
	// 		'form-label' => 'When shall we promote your book? ',
	// 		'input' => 'input',
	// 		'type' => 'text',
	// 		'name' => 'pDate',
	// 		'value' => date("m/d/Y", strtotime($book->start_date . ' + 1 day')),
	// 		'required' => 1
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'group[15105][1]',
	// 		'value' => '1'
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'b_2e3b23cbf1bddcf2519af3630_186c6dc71a',
	// 		'value' => ''
	// 	),
	// 	array(
	// 		'input' => 'hidden',
	// 		'name' => 'form_url',
	// 		'value' => 'http://ebookstamp.us9.list-manage.com/subscribe/post?u=2e3b23cbf1bddcf2519af3630&id=186c6dc71a'
	// 	)
	// );
	
	/************* Christian Kindle News *************/
	$forms['kindlenews'] = array(
		'settings' => array(
			'web' => 'kindlenews',
			'display_name' => 'kindlenews',
			'id' => 'kindlenews',
		),
		
		array(
			'form-label' => 'Title of the Kindle Ebook',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_25',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Original Price',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_10',
			'value' => $book->regular_price,
			'required' => 1
		),
		array(
			'form-label' => 'Promo Start Date',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_28',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 1 day')),
			'required' => 1
		),
		array(
			'form-label' => 'Promo End Date',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_29',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		/*array(
			'form-label' => 'How Many Days Will Your eBook be Free?',
			'type' => 'select',
			'name' => 'input_8',
			'values'=>array(
				"One Day"  => "One Day",
				"Two Days"  =>"Two Days",
				"Three Days"  => "Three Days",
				"Four Days"  =>"Four Days",
				"Five Days"  =>"Five Days"
				),
			'required' => 1
		),*/
		array(
			'form-label' => 'Book Description',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_26',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Blurb',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_30',
			'value' => htmlspecialchars($book->book_description),
			'required' => 1
		),
		array(
			'form-label' => 'Link to Book on Amazon',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_31',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Author First Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_12',
			'value' => $first_name,
			'required' => 1
		),
		array(
			'form-label' => 'Author Last Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_13',
			'value' => $last_name,
			'required' => 1
		),
		array(
			'form-label' => 'Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'input_8',
			'value'=>'One Day'
		),
		array(
			'input' => 'hidden',
			'name' => 'input_11',
			'value'=>'Non-Fiction'
		),
		array(
			'input' => 'hidden',
			'name' => 'input_15',
			'value' => 'No|0'
		),
		array(
			'input' => 'hidden',
			'name' => 'input_subscribe_me_mailpoet_lists',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_ajax',
			'value' => 'form_id=2&title=&description=&tabindex=1'
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_2',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '2'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => '57161571d0a22'
		),
		array(
			'input' => 'hidden',
			'name' => 'state_2',
			'value' => 'WyJ7XCIxNVwiOltcImVhZjc5M2Q4N2U2ZTFiMDllY2M0MGJkODA4Yzk5YmZiXCIsXCJlOGJmNTQ2ZjY3OTBkOWRlZjcyMjBhMzU3ODdjMzljNlwiXX0iLCI4NmZkOWQyYzg3NTVlNWI1YjFkOWZkZmI2ODE2Nzk5ZiJd'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_2',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_2',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://christiankindlenews.com/submit-free-christian-ebook-deal/#gf_2'
		)
	);

		/************************ ***** Book Tour ************/

	/*$forms['booktour'] = array(
		'settings' => array(
			'web' => 'booktour.com',
			'display_name' => 'booktour.com',
			'id' => 'booktour',
		),

		array(
			'form-label' => 'Twitter',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1912085888',
			'value' => ''		

		),
		array(
			'form-label' => 'What is your preferred listing date? (MM/DD/YYYY)',
			'input' => 'input',
			'type' => 'text',
			'class' => 'datepicker',
			'name' => 'entry.593432642',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Author Full Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1875619850',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Correspondence Email',
			'input' => 'input',
			'type' => 'email',
			'name' => 'entry.1393471431',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.1631148286',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Link to Book (Amazon)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.709245798',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Smashwords Link',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.2062324035',
			'value' => ''
		),
			array(
			'form-label' => 'Genre(s)',
			'input' => 'input',
			'type' => 'text',
			'name' => 'entry.141412632',
			'value' => $book->genre,
			'required' => 1
		),
		
			array(
			'form-label' => 'Rating (G, PG, PG-13 etc.) *',
			'input' => 'input',
			'name' => 'entry.637999522',
			'type' => 'text',
			'values' => '',
			'required' => 1
			
		),

		array(
		'form-label' => 'Yes, I have read and understood',
			'input' => 'input',
			'type' => 'checkbox',
			'name' => 'entry.456503744',
			'value' => 'Yes, I have read and understood',
			// 'selected' => 'checked',
		),
		
		
	
		array(
			'input' => 'hidden',
			'name' => 'draftResponse',
			'value' => '[,,"1080564951424389453"] '
		),
		array(
			'input' => 'hidden',
			'name' => 'frm_action',
			'value' => 'create'
		),
		array(
			'input' => 'hidden',
			'name' => 'pageHistory',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'fbzx',
			'value' => '1080564951424389453'
		),
		
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'https://docs.google.com/forms/d/1L82zYr8sJBTchnUni79XcT8MH2Aw-SyBTUPmOxrPeig/formResponse'
		)
	);
*/



	/************* bookloversheaven.com **************/
	/*$forms['bookloversheaven'] = array(
		'settings' => array(
			'web' => 'bookloversheaven.com',
			'display_name' => 'bookloversheaven.com',
			'id' => 'bookloversheaven',
		),
		array(
			'form-label' => 'Submitter Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_1',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Submitter Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_37',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_4',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Author Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_22',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Regular Price of Book',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_23',
			'value' => $book->regular_price,
			'required' => 1
		),
		array(
			'form-label' => 'Special price of the book for this promotion?',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_2',
			'value' => '',
			'required' => 1
		),
		
		array(
			'form-label' => 'This book has a rating over 4.0*',
			'type' => 'select',
			'name' => 'input_9',
			'values' => array(
				"Yes"  => "Yes",
				"No"  => "No"
			),
			'required' => 1
		),
		array(
			'form-label' => 'This book has greater than 10 reviews*',
			'type' => 'select',
			'name' => 'input_10',
			'values' => array(
				"Yes"  => "Yes",
				"No"  => "No"
			),
			'required' => 1
		),
		array(
			'form-label' => 'What is the genre of your book?*',
			'type' => 'select',
			'name' => 'input_7.7',
			'value' => '15'
		),
		array(
			'form-label' => 'Cover Image',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_8',
			'value' => $book->cover_img_url,
			'required' => 1
		),
		array(
			'form-label' => 'Please Provide a description of your book in 1 paragraph*',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_5',
			'value' => $book->book_description,
			'required' => 1
		),
		array(
			'form-label' => 'Where can we buy your book? List one location Amazon, etc.*',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_33',
			'value' => 'Amazon',
			'required' => 1
		),
		array(
			'form-label' => 'Please provide the link for where to buy your book*',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_25',
			'value' => $book->amazon_url,
			'required' => 1
		),
		array(
			'form-label' => 'Date of special - 1st choice*',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_19',
			'class' => 'datepicker',
			'value' => date("m/d/Y", strtotime($book->start_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Date of special - 2nd choice',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_20',
			'class' => 'datepicker',
			'value' =>''
		),
		
		array(
			'input' => 'hidden',
			'name' => 'input_38.1',
			'value' => 'Yes'
		),
		array(
			'form-label' => 'Notes',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_21',
			'value' =>''
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'state_1',
			'value' => 'WyJbXSIsIjE2MjdjMzA2YTJjZGI3ODBmY2EzOTdmMjdkZTc2NTQ4Il0='
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_1',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://bookloversheaven.com/author-information-form/'
		)
	);*/
	
	
	/************* ebookasaurus.com(not possible because of cover image) *************
	$forms['ebookasaurus'] = array(
		'settings' => array(
			'web' => 'ebookasaurus.com',
			'display_name' => 'ebookasaurus.com',
			'id' => 'ebookasaurus',
		),
		array(
			'form-label' => 'Author Name',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_15',
			'value' => $book->author_name,
			'required' => 1
		),
		array(
			'form-label' => 'Author Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Confirm Email',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_6_2',
			'value' => $book->email,
			'required' => 1
		),
		array(
			'form-label' => 'Amazon ASIN',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_8',
			'value' => $book->asin,
			'required' => 1
		),
		array(
			'form-label' => 'Book Title',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_1',
			'value' => $book->book_title,
			'required' => 1
		),
		array(
			'form-label' => 'Book Synopsis',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_16',
			'value' =>htmlspecialchars($book->book_description)
		),
		array(
			'form-label' => 'Book Cover',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_2',
			'value' => 'https://www.google.co.in/search?q=book+images&biw=1280&bih=907&tbm=isch&tbo=u&source=univ&sa=X&sqi=2&ved=0CBsQsARqFQoTCJel3b2YgMgCFYJWjgodb8cASQ#imgrc=gHCSu5EwAieA3M%3A',
			'required' => 1
		),
		
		array(
			'form-label' => 'Start Date',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_3',
			'value' => date("m/d/Y", strtotime($book->start_date . ' + 1 day')),
			'required' => 1
		),
		array(
			'form-label' => 'End Date',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_4',
			'value' => date("m/d/Y", strtotime($book->end_date)),
			'required' => 1
		),
		array(
			'form-label' => 'Main Genre',
			'type' => 'select',
			'name' => 'input_10',
			'values' => array(
				"11"  => "Children's Books",
				"14"  => "- Ages 9-12",
				"13"  => "- Ages Under 9",
				"12"  => "- Children's Books (General)",
				"15"  => "- Young Adult",
				"3"  => "-Fiction",
				"8"  => "- Christian Fiction",
				"10"  => "- Erotica",
				"7"  => "- Fantasy",
				"9"  => "- Horror",
				"5"  => "- Mystery",
				"4"  => "- Romance",
				"6"  => "- Science Fiction",
				"16"  => "Non-Fiction",
				"18"  => "- Business",
				"17"  => "- Non-Fiction",
				"19"  => "- Reference",
			),
			'required' => 1
		),
		array(
			'form-label' => 'Sales Price',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_13',
			'value' => '',
			'required' => 1
		),
		array(
			'form-label' => 'Original Price',
			'input' => 'input',
			'type' => 'text',
			'name' => 'input_14',
			'value' => '',
			'required' => 1
		),
		array(
			'input' => 'hidden',
			'name' => 'input_9.1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'is_submit_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_submit',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_unique_id',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'state_1',
			'value' => 'WyJbXSIsIjllMzRkMWI4MWNmMWMzY2ZlZGIwNTA1OWQ5YzczYjY4Il0='
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_target_page_number_1',
			'value' => '0'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_source_page_number_1',
			'value' => '1'
		),
		array(
			'input' => 'hidden',
			'name' => 'gform_field_values',
			'value' => ''
		),
		array(
			'input' => 'hidden',
			'name' => 'form_url',
			'value' => 'http://ebookasaurus.com/free-book-listing'
		)
	);*/
	
	return $forms;
}
?>
<style>
.dc3 {
  left: 100px;
  top: -152px;
  width: 5% !important;
}
.dc2 {
  left: 50px;
  position: absolute;
  top: -76px;
  width: 5% !important;
}
.dc1 {
  position: absolute;
  width: 5% !important;
}
.popup-content p {
  position: relative;
}
</style>
