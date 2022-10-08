</body>


<script>
function cancelSub() {
    alert('Are you sure you want to cancel your subscription?')
	//toastr.success('Please write to us at hello@tweetgram.me to cancel your subscription.')
}

function goPro() {
    toastr.error('Upgrade to PRO to unlock')
}
</script>

{{--
<div class="row">
	<div class="col-12">
		<footer class="c-footer">
			<p>© 2022 TweetGram</p>
			<span class="c-footer__divider">|</span>
			<nav>
				<a class="c-footer__link" href="https://tweetgram.me/terms">Terms</a>
				<a class="c-footer__link" href="https://tweetgram.me/privacy">Privacy</a>
				<a class="c-footer__link" href="https://tweetgram.me/#faq">FAQ</a>
				<!--<a class="c-footer__link" href="https://tweetgram.me/help">Help</a>-->
			</nav>
		</footer>
	</div>
</div>
--}}
<!-- Main JavaScript -->
<script src="{{ ('neat/assets/js/neat.min.js') }}"></script>
<script src="{{ ('neat/assets/js/toastr.min.js') }}"></script>
<script>
toastr.options.showEasing = "swing";
toastr.options.progressBar = true;
</script>

<!--Start of Tidio Script-->
<script src="//code.tidio.co/fwbsvdt1ms9uhdgwhrcybdi577pdiasr.js" async></script>
<!--End of Tidio Script-->

</html>
