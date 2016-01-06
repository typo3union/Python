jQuery(document).ready(function () {
    
    
  $(".notUserForm").validate({
			rules: {
                                'tx_voucher_voucher[notUserForm][gender]' : "required",
				'tx_voucher_voucher[notUserForm][firstname]': "required",
				'tx_voucher_voucher[notUserForm][lastname]': "required",
				
				'tx_voucher_voucher[notUserForm][password]': {
					required: true
					
				},
				'tx_voucher_voucher[notUserForm][repeatpassword]': {
					required: true,
					equalTo: "#password"
				},
				'tx_voucher_voucher[notUserForm][email]': {
					required: true,
					email: true
				},
				'tx_voucher_voucher[notUserForm][zip]': "required",					
				
				
			},
			messages: {
				'tx_voucher_voucher[notUserForm][gender]': "Bitte Wert eingeben.",
                                'tx_voucher_voucher[notUserForm][firstname]': "Bitte Wert eingeben.",
                                'tx_voucher_voucher[notUserForm][lastname]': "Bitte Wert eingeben.",
                                'tx_voucher_voucher[notUserForm][password]': "Bitte Wert eingeben.",
                                'tx_voucher_voucher[notUserForm][repeatpassword]': {
					required: "Bitte Wert eingeben.",
					equalTo: "Bitte geben Sie das gleiche Passwort wie oben."
				},
                                'tx_voucher_voucher[notUserForm][email]': "Geben Sie eine g&uuml;ltige Mailadresse ein!",
                                'tx_voucher_voucher[notUserForm][zip]': "Bitte Wert eingeben."
				
				
				
			}
		});

    
});