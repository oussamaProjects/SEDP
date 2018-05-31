<div class="search_container">
	<form action="<?php bloginfo('url'); ?>" id="searchform" method="get">
		<div class="search_home">
		</div>
		<input type="search" id="searchbox" class="searchbox" name="s" placeholder="Rechercher" required>
		<button class="search_home" ></button>
	</form>	
</div>



<script type="text/javascript">

	$('.searchbox').keypress(function (e) {
	  if (e.which == 13) {
	    $(this).parent("form").submit();
	  }
	});

</script>