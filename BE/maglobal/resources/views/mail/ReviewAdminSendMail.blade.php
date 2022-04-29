@component('mail::message')

    # customer information submits reviews!
	
	    Customer name: {{$name}}

		Email: {{$email}}

		Account number: {{$accountNumber}}

		Star rating: {{$rate}}

		Review content: {{$content}}
		
		Do you agree to post on your website review and on google my business? Yes/ No

@endcomponent
