<?php
/**
 * Simply adds a contact into a chosen campaign within Get Reposnse using API v3.
 *
 * @copyright  2016 MobiusZero
 * @license    CC BY https://creativecommons.org/licenses/by/4.0/
 * @version    Alpha 0.0.1     
 * @since      Alpha 0.0.1
 */ 
class getResponseAPIActions {
	public $status = array();
	private $apiKey;
	private $apiURL;
	private $getRespCampaignName;
	private $getresponse360API_URL = "https://api3.getresponse360.com/v3";


	public function __construct($apiKey,$apiURL = "",$getRespCampaignName) {
		$this->apiKey = $apiKey;
		$this->apiURL = $apiURL;
		$this->getRespCampaignName = $getRespCampaignName;
	}

	private function getresponse360() {
		return new GetResponse($this->apiKey);
	}

	public function getresponse360_ping(){
		$getresponse360 = $this->getresponse360();
		if (!empty($this->apiURL)){
			$getresponse360->enterprise_domain = $this->apiURL;
		}
		$getresponse360->api_url = $this->getresponse360API_URL;
		return $getresponse360->ping();
	}

	public function getresponse360_AddContact($email,$sid,$firstname = "",$userIPAddress) {
		// Get Today's Date and set the timezone
		$date = new DateTime(null, new DateTimeZone("America/New_York"));
		$currentDate = $date->format('Y-m-d');
		// Create the array to find the custom fields to use for new contacts
		$newContact_CustomFieldSearch = array("source" => $sid, "signup_date" => $currentDate,"sign_up_date" => $currentDate);
		// Create the array to find the custom fields needed to update the contact 
		$updateContact_CustomFieldSearch = array("source" => $sid);

		$getresponse360 = $this->getresponse360();
		if (!empty($this->apiURL)){
			$getresponse360->enterprise_domain = $this->apiURL;
		}
		$getresponse360->api_url = $this->getresponse360API_URL;
	
		// Find the Campaign 	
		$getCampID = $getresponse360->getCampaigns(array(
			'query' => array(
				'name' => $findAcctCampaign
			), 
		));

		// Loop through the object $getCampID and then find the value for $findAcctCampaign
		foreach ($getCampID as $getCampIDKey => $getCampIDValue) {
			if ($getCampIDValue->name === $this->getRespCampaignName){
				$campID = $getCampIDValue->campaignId;
			}
		}

		// Get the custom field ID's 
		// This looks for the custom fields on the account with the associated API Key
		// Will return the following: 
		/*
		    {	
		        "customFieldId": "Vit",
		        "name": "ref"
		    }
		*/
		// This goes through the custom fields array and looks for the source and signup_date custom fields and saved the values in the respective variables.   
		$getAllCustomFields = $getresponse360->getCustomFields(array(
	        'fields' => 'name'
	    ));

		foreach ($getAllCustomFields as $cusFieldsKey => $cusFieldsValue) {
			
			foreach ($newContact_CustomFieldSearch as $key => $value) {
				if ($cusFieldsValue->name === $key){
				   $newCon_thecustomfields[] = array('customFieldId' => $cusFieldsValue->customFieldId,'value' => array($value));
				} 
			}

			foreach ($updateContact_CustomFieldSearch as $key => $value) {
				if ($cusFieldsValue->name === $key){
				   $updateCon_thecustomfields[] = array('customFieldId' => $cusFieldsValue->customFieldId,'value' => array($value));
				} 
			}
		}

		// Check if email address exists 
		$chkEmailResult = $getresponse360->getContacts(array(
			'query' => array(
				'campaignId' => $campID,
				'email' => $email
			),
			'fields' => 'name,email,ipAddress,campaign',
			'additionalFlags'=> 'exactMatch'
		));
		// print_r($chkEmailResult);
		// Loop though the object $chkEmailResult and check if the value for email. If email exists update the contact info else create the new contact. Note: API will return the object as 0 if the contact is new and if the contact exists then it will send back the callback array of the contact.
		if (!empty(count(get_object_vars($chkEmailResult)))) {
			foreach ($chkEmailResult as $chkEmailResultKey => $chkEmailResultValue) {
				// If the firstname is set and the database has a blank name update it or the input first name has "Friend" but the input has a different name for the contact record then update it. 
				if ($chkEmailResultValue->name === "") {
					$updateContact = $getresponse360->updateContact($chkEmailResultValue->contactId,array(
						'name' => $firstname,
						'ipAddress' => $userIPAddress,
						'dayOfCycle' => 0,
						'customFieldValues' => $updateCon_thecustomfields
					));
				
				} elseif ($chkEmailResultValue->name === "Friend" && $firstname !== "Friend") {
					$updateContact = $getresponse360->updateContact($chkEmailResultValue->contactId,array(
						'name' => $firstname,
						'ipAddress' => $userIPAddress,
						'dayOfCycle' => 0,
						'customFieldValues' => $updateCon_thecustomfields
					));
				
				} else {
					$updateContact = $getresponse360->updateContact($chkEmailResultValue->contactId,array(
						'ipAddress' => $userIPAddress,
						'dayOfCycle' => 0,
						'customFieldValues' => $updateCon_thecustomfields
					));
				}
				
			}
			$this->status = $updateContact;
		} else {
			// Create a new contact if contact does not exist in the campaign 
			$newContact = $getresponse360->addContact(array(
				'name' => $firstname,
				'email' => $email,
				'dayOfCycle' => 0,
				'campaign' => array(
				 	'campaignId' => $campID
				),
				'ipAddress' => $userIPAddress, 
				'customFieldValues' => $newCon_thecustomfields
			));
			$this->status = $newContact;

			if (stripos("Cannot add contact that is blacklisted",$newContact->message) !== false) {
				$this->status = "Contact Blacklisted";
			}
		}
	
	}

	public function __destruct(){
		print_r($this->status);
	}
}
	