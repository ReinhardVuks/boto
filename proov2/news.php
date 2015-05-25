<?php
include "head.php";
?>
	<div class="news-page">

		<div class="news-list">

			<?php

				for($i = 1; $i < 11; $i++){
					echo '<div id="sub-news">';
					echo '<h1 id="news-head">'. $i. '. uudis'. '</h1>';
					echo '<a id="news-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate</a>';
					echo '</div>';
				}
				?>
		</div>

	</div>
<?php
include "footer.php"
?>
