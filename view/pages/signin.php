<div class="container mt-5">	
	<div class="row mt-5 pt-3">	

		<div class="mx-auto my-3 col-sm-5 col-xs-12 col-md-5 LBOX p-5 " >
			<div class="row " >
				<div class="col-sm-12 col-xs-12 col-md-12">
					<h1 class="text-center">შესვლა</h1>
					<br>
					<label class="">ელ-ფოსტა</label>
					<input class="form-control INP" name="email" placeholder="ელ-ფოსტა"/>
					<label class="">პაროლი</label>
					<input class="form-control INP" name="password" type="password" placeholder="პაროლი"/>
					<div class="checkbox-custom">
						<input type="checkbox" id="checkbox4">
						<label for="checkbox4" class="">დამახსოვრება</label>
						&nbsp;|&nbsp;&nbsp;&nbsp;<label class=" CP"><a href="/<?=$L?>/recovery">დამავიწყდა პაროლი</a></label>	
					</div>	
							
					
					<button type="submit" class="btn btn-success sin mt-3">შესვლა</button><br>
					<a class="btn btn-primary mt-3" href="/<?=$L?>/registerindividual">რეგისტრცია</a>
		<div class="fb-login-button d-none" data-max-rows="1" data-scope="email,contact_email,public_profile" scope="email" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>
				</div>
			</div>
		</div>
	</div>
</div>