<div class="container">	
<div class="row">	
	<div class="col-md-5 col-12 col-md-5 LBOX py-4 px-5" >
		<div class="row" >
				<div class="col-md-12 text-center mb-2">
					<h2 class="text-center">რეგისტაცია</h2>
				</div>
				<div class="col-md-6 my-3 text-center">
					<a class="py-3 px-2 d-block w-100" href="/<?=$L ?>/registerindividual">ფიზიკური</a>
				</div>
				<div class="col-md-6 my-3 text-center">
					<a class="bg-light  d-block w-100 py-3 px-2" href="/<?=$L ?>/registercorporate">იურიდიული</a>
				</div>
			<div class="col-md-12 col-xs-12 col-md-12 mt-1">
				<div class="col-md-12 mt-2">
					<label class="">კომპანიის სახელი</label>
					<input class="form-control INP" name="companyname" placeholder="კომპანიის სახელი"/>
				</div>
				<div class="col-md-12 mt-2">
			<label class="">კომპანიის საიდენტიფიკაციო</label>
			<input class="form-control INP" name="companyid" maxlength="9" placeholder="კომპანიის საიდენტიფიკაციო"/>
				</div>
				<div class="row px-3">
					<div class="col-md-6 mt-2">
				<label class="">სახელი</label>
				<input class="form-control INP" name="name" placeholder="სახელი"/>
					</div>
					<div class="col-md-6 mt-2">
				<label class="">გვარი</label>
				<input class="form-control INP" name="lastname" placeholder="გვარი"/>
					</div>
				</div>
				<div class="col-md-12 mt-2">
			<label class="">პირადი ნომერი</label>
			<input class="form-control INP NUM" name="personalid" maxlength="11" placeholder="პირადი ნომერი"/>
				</div>
				<div class="col-md-12 mt-2">
			<label class="">ტელეფონი</label>
			<input class="form-control INP A5 NUM" name="tel" maxlength="9" placeholder="ტელეფონი"/>
				</div>
				<div class="col-md-12 mt-2">
			<label class="">ელ-ფოსტა</label>
			<input class="form-control INP A6" name="email" placeholder="ელ-ფოსტა"/>
				</div>
				<div class="col-md-12 mt-2">
			<label class="">აირჩიეთ პაროლი</label>			
			<input class="form-control INP A7" name="password" type="password" placeholder="აირჩიეთ პაროლი"/>
				</div>
				<div class="col-md-12 mt-2">
			<label class="">გაიმეორეთ პაროლი</label>
			<input class="form-control INP A8" name="retypepassword" type="password" placeholder="გაიმეორეთ პაროლი"/>
				</div>
				<div class="col-md-12 mt-1">
					<div class="row align-items-end">
						<div class="col-md-8 mt-1 pr-md-0">
					<label class="">Smsკოდი</label>
					<input class="form-control SMSCODE INP" name="smscode" placeholder="კოდი"/>
						</div>
						<div class="col-md-4 pl-0 mt-1 text-md-right">
					<a class="btn btn-primary CP text-white GETSMS">sms კოდი</a>
						</div>
					</div>
				</div>
				<div class="col-md-12 mt-5">
					<div class="row mx-0 align-items-center justify-content-between">
						<button type="submit" class="btn btn-primary sup">რეგისტრაცია</button>
						<a href="<?=$L ?>/signin" class="ml-4">ავტორიზაცია</a>
					</div>
					<div class="fb-login-button" data-max-rows="1" data-scope="email,contact_email,public_profile" scope="email" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>