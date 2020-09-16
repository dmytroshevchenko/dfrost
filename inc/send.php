<?php


add_action('wp_ajax_send_form' , 'send_form');
add_action('wp_ajax_nopriv_send_form','send_form');
function send_form(){

	$name = $_POST['your_name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$form_type = $_POST['form_type'];
	$form_title = $_POST['form_title'];


	$uploadedfile = $_FILES['cv_file'];
	$upload_overrides = array( 'test_form' => false );
	$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

  $attachments = array( $movefile[ 'file' ] );
	$headers = 'From: Site DFROST <no-reply@dfrost.com>' . "\r\n";
	$email_message = $form_title . "\nName: ". $name ."\nEmail: ". $email;

	if($message){
		$email_message .= "\nMessage: ". $message;
	}

	$subject = $form_title;
	//$admin_email = get_bloginfo('admin_email');
	$admin_email = get_filed('email_send','option');
	wp_mail($admin_email, $subject, $email_message, $headers, $attachments);

	wp_send_json_success( array(
			'success'   => 1
		)
	);

}



add_action('wp_ajax_subscribe_form' , 'subscribe_form');
add_action('wp_ajax_nopriv_subscribe_form','subscribe_form');
function subscribe_form(){

	$email = $_POST['email'];

	if (is_email($email) !== false) {
		$url = 'https://us8.api.mailchimp.com/3.0/lists/fe0c83ff76/members/';

		$fields = [
			'email_address' => $email,
			'status' => 'subscribed',
		];


		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields) );
		curl_setopt($ch,CURLOPT_USERPWD, 'anystring:63932915edc27a698d6672086573f14b-us8');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);


		wp_send_json_success( array(
				'success'   => 1
			)
		);
	} else {
		wp_send_json_success( array(
				'success'   => 0
			)
		);
	}

}

?>
