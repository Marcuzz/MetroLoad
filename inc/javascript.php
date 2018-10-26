<script>
		$(function(){
			$('#music').on('ended', function(){
				var curName = $('.songName').text();
				var curSrc = $(this).attr('src');
				
				// find next and put old at end
				var next = $(this).next();
				var html = next.clone();
				$(html).find('.file').text(curSrc);
				$(html).find('.name').text(curName);
				$(this).parent().append(html);

				// replace old values with new and remove new
				$(this).attr('src', $(next).find('.file').text());
				$('.songName').text($(next).find('.name').text());
				$(next).remove();

				this.currentTime = 0;
				this.play();
			});
		});

		function setVolume()
		{
			music=document.getElementById("music");
			music.volume=<?php echo $music_volume; ?>;
		}
		
		$(function () {
			setVolume();
		});

		function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode )
		{
			var servername=servername
			var gamemode=gamemode
			var maxplayers=maxplayers
			document.getElementById("servername").innerHTML=servername;
			document.getElementById("gamemode").innerHTML=gamemode;
			document.getElementById("maxplayers").innerHTML=maxplayers;
		}

		function SetStatusChanged( status )
		{
			var status=status;
			document.getElementById("status").innerHTML=status;
		}
		function SetFilesTotal( total )
		{
			var total=total;
			document.getElementById("total").innerHTML=total;
		}
		function SetFilesNeeded( needed )
		{
			var needed=needed;
			document.getElementById("needed").innerHTML=needed;
		}
		function DownloadingFile( fileName )
		{
			var dfile=fileName;
			document.getElementById("fileDL").innerHTML=dfile;

			var total = document.getElementById('total').innerHTML;
			var needed = document.getElementById('needed').innerHTML;
			CalcPercentage(parseInt(total), parseInt(needed));
		}
		function CalcPercentage(total, needed){
			var perc=Math.round((needed/total)*100);
			var percent = 100-perc;

			document.getElementById("progressbar").style.width=percent+'%';
			document.getElementById("percent").innerHTML=percent;
		}

		<?php if($enable_cycle_colours && !$enable_img_cycling){ ?>
		$(function () {
			var colors = <?php echo $colours_l; ?>;
			var i = 0;
			var cont = $('body.bg');
			cont.css('opacity', 1);
			cont.css('backgroundColor', colors[0]);
			cont.css('backgroundColor', colors[1]);
			anim();

				function anim() {
					if (i == colors.length - 1) {
						i=0;
					}
					cont.css({
						backgroundColor: colors[i],
						opacity: 1
					});
					cont.css({
						backgroundColor: colors[i+1]
					});
					i++;
					cont.stop().animate({
						opacity: 1
					}, 2000, anim);
				}
		});
		<?php } ?>

		<?php if($enable_img_cycling && !$enable_cycle_colours){ ?>
		$(function () {
			$('.slideshow img:gt(0)').hide();

			setInterval(function () {
				$('.slideshow :first-child').fadeOut()
										 .next('img')
										 .fadeIn()
										 .end()
										 .appendTo('.slideshow');
			}, <?php echo $img_cycling_timer; ?>);
		});
		<?php } ?>
</script>
