<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {

		var rnumeric = /[^0-9]/g;
		$('.onlyNumber').keyup(function () {
			this.value = this.value.replace(rnumeric, '');
		}).focusout(function () {
			this.value = this.value.replace(rnumeric, '');
		});

		var alphaNumeric = /[^0-9a-z ]/gi;
		$('.onlyAlphabet').keyup(function () {
			this.value = this.value.replace(alphaNumeric, '');
		}).focusout(function () {
			this.value = this.value.replace(alphaNumeric, '');
		});
	
	});
</script>