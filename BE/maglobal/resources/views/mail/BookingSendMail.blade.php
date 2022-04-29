@component('mail::message')

Congratulations on your successful online appointment booking

Your appointment information is as follows

First name: {{$firstname}} 

Last name: {{$lastname}}

Email: {{$email}}      

Phone number: {{$phone}}

Account number: {{$accountNumber}}

Location: Expert Nails and Beauty – North York

1699 Jane St, North York, ON, M9N 2S3

Day: {{$dateOrder}}                           
 
Time: {{$timeOrder}}

Get support here [Contact Us]({{url('/contact')}})

You get 15% off on bill (10% off following the benefit of member + 5% off through booking online)

After members use the service, they will receive an email asking for a review (You have the right to submit or not to give a review).

For each good review and high star will get 5% off on next bill (note: each account can only be assessed once)

Have a nice day!


@endcomponent