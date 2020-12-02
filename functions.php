<?php

	const BASE_API = 'http://localhost:8080/';


	if($_POST['type'] == 'create' ){

		print_r( $_POST); 
		$empID = create( $_POST['source'] , $_POST['type'] );
		header("Location: " . 'http://localhost/ETMSFrontEnd/' .$_POST['source']. '/all.php'); 
		exit();

	}elseif($_POST['type'] == 'update' ){

		update( $_POST['source'] , $_POST['type'] , $_POST['id'] );
		header("Location: " . 'http://localhost/ETMSFrontEnd/' .$_POST['source']. '/all.php'); 
		exit();

	}elseif($_POST['type'] == 'delete'){

		delete( $_POST['source'] , $_POST['type'] , $_POST['id'] );
		header("Location: " . 'http://localhost/ETMSFrontEnd/' .$_POST['source']. '/all.php'); 
		exit();
	}

	function create($source, $type){

		$source = $source;
		$type = $type;
		$url = BASE_API . $source . '/' . $type;

		$post_data = $_POST ;
		$post_data_json = json_encode($post_data);

		$retuns = post_curl($url, $post_data_json);
		$returns_arr = json_decode($retuns);

	}

	function update($source, $type, $id){

		$source = $source;
		$type = $type;
		$id = $id;
		$url = BASE_API . $source . '/' . $type . '/' . $id;

		$post_data = $_POST ;
		$post_data_json = json_encode($post_data);

		put_curl($url, $post_data_json);

	}

	function delete($source, $type, $id){

		$source = $source;
		$type = $type;
		$id = $id;
		$url = BASE_API . $source . '/' . $type . '/' . $id;

		echo "delete ";

	print_r($url);
		$post_data = $_POST ;
		$post_data_json = json_encode($post_data);

		delete_curl($url, $post_data_json); 	

	}

	function post_curl($url, $post_data_json){
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_json);

		//So that curl_exec returns the contents of the cURL; rather than echoing it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

		//execute post
		$result = curl_exec($ch);
		curl_close($ch);
	}

	function put_curl($url, $post_data_json){
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		// curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		// curl_setopt($ch, CURLOPT_HEADER, TRUE);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data_json) );

		//So that curl_exec returns the contents of the cURL; rather than echoing it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

		//execute post
		$result = curl_exec($ch);
		curl_close($ch);
	}

	function delete_curl( $url, $post_data_json){
		$ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $result = curl_exec($ch);
	    $result = json_decode($result);
	    curl_close($ch);

	}

