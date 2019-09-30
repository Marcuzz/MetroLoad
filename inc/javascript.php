<script>
$(function () {
  $('#music').on('ended', function () {
    let curName = $('.songName').text();
    let curSrc = $(this).attr('src');

    // find next and put old at end
    let next = $(this).next();
    let html = next.clone();
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

function setVolume() {
  music = document.getElementById("music");
  music.volume =<?php echo $music_volume; ?>;
}

$(function () {
  setVolume();
});

function GameDetails(servername, serverurl, mapname, maxplayers, steamid, gamemode) {
  document.getElementById("servername").innerHTML = servername;
  document.getElementById("gamemode").innerHTML = gamemode;
  document.getElementById("max-players").innerHTML = maxplayers;
}

function SetStatusChanged(status) {
  document.getElementById("status").innerHTML = status;
}

function SetFilesTotal(total) {
  document.getElementById("total").innerHTML = total;
}

function SetFilesNeeded(needed) {
  document.getElementById("needed").innerHTML = needed;
}

function DownloadingFile(fileName) {
  document.getElementById("file-dl").innerHTML = fileName;

  let total = document.getElementById('total').innerHTML;
  let needed = document.getElementById('needed').innerHTML;
  CalcPercentage(parseInt(total), parseInt(needed));
}

function CalcPercentage(total, needed) {
  let perc = Math.round((needed / total) * 100);
  let percent = 100 - perc;

  document.getElementById("progressbar").style.width = percent + '%';
  document.getElementById("percent").innerHTML = percent;
}

<?php if($enable_cycle_colours && !$enable_img_cycling){ ?>
  $(function () {
    let colors = <?php echo $colours_l; ?>;
    let i = 0;
    let cont = $('body.bg');

    cont.css('opacity', 1);
    cont.css('backgroundColor', colors[0]);
    cont.css('backgroundColor', colors[1]);

    anim();

    function anim() {
      if (i === colors.length - 1) {
        i = 0;
      }
      cont.css({
        backgroundColor: colors[i],
        opacity: 1
      });
      cont.css({
        backgroundColor: colors[i + 1]
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
