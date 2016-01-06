jQuery(document).ready(function () {
    
    
     $("#notUserForm").validate({
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
				'tx_voucher_voucher[notUserForm][gender]': "Please Enter Value.",
                                'tx_voucher_voucher[notUserForm][firstname]': "Please Enter Value.",
                                'tx_voucher_voucher[notUserForm][lastname]': "Please Enter Value.",
                                'tx_voucher_voucher[notUserForm][password]': "Please Enter Value.",
                                'tx_voucher_voucher[notUserForm][repeatpassword]': {
					required: "Please Enter Value.",
					equalTo: "Please enter the same password as above."
				},
                                'tx_voucher_voucher[notUserForm][email]': "Enter a valid email address !",
                                'tx_voucher_voucher[notUserForm][zip]': "Please Enter Value."
				
				
				
			}
		});

    
});