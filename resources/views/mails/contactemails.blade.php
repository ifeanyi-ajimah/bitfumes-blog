<!DOCTYPE html>
<html lang="en">

  <head>
  </head>
  <body>
  	<h3 style="color:red">Hello Guys. You have a message from the contact form</h3>

 <p><strong>Subject Name: </strong> {{$request->name}}</p>
<p><strong>From : </strong> {{$request->email}}</p>
<p><strong> Message:</strong> {{$request->message}}  </p>

  </body>
  </html>

