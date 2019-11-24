<html>
<head>
</head>
<body bgcolor="grey">

<table class="body-wrap" >
	<tbody><tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tbody><tr>
					<td>
						
						<h3 style="color:green">Welcome, Dear {{ $maildata['name'] }}</h3>
						
						
						<!-- A Real Hero (and a real human being) -->
						<!-- /hero -->
						
						<!-- Callout Panel -->
						<p class="callout">
						  We verify Your Account.Now you can create your password and vote to your favorite nominee.
							 <a href="{{ url('/voter/create-password/'.Crypt::encryptString($maildata['id'])) }}">Click Here»</a>
						</p><!-- /Callout Panel -->
					
												
						<br>
						<br>							
												
						<!-- social & contact -->
						<table class="social" width="100%">
							<tbody><tr>
								<td>
									
									<!--- column 1 -->
									
									<!--- column 2 -->
									<table align="left" class="column">
										<tbody><tr>
											<td>								
                                                 Website:<strong><a href="http://ovoting.triporbitz.com/">www.ovoting.triporbitz.com</a></strong>
                                                 </p>
                
											</td>
										</tr>
									</tbody></table><!-- /column 2 -->
									
									<span class="clear"></span>	
									
								</td>
							</tr>
						</tbody></table><!-- /social & contact -->
					
					
					</td>
				</tr>
			</tbody></table>
			</div>
									
		</td>
		<td></td>
	</tr>
</tbody></table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tbody><tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content">
				<table>
				<tbody><tr>
					<td align="center">
						<p>
							<a href="#">Terms</a> |
							<a href="#">Privacy</a> |
							<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
						</p>
					</td>
				</tr>
			</tbody></table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</tbody></table><!-- /FOOTER -->


</body>
</html>