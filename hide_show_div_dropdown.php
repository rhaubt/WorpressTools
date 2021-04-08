<button onclick="myInfobox()" style="width: 100%; color: white; position: relative; top: -3px;">Show Article</button>
						<div id="infobox" style="display: none; margin: auto;">
							<div class="column_full_post">
								<div class="globalmap">
									<?php echo GeoMashup::full_post('for_map=map'); ?>
								</div>
            				</div>
            			</div>
            		<script>
					function myInfobox() {
					var x = document.getElementById("infobox");
					if (x.style.display === "none") {
					x.style.display = "block";
  					} else {
  					x.style.display = "none";
  					}
					}
					</script>
