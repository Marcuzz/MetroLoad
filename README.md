REQUIREMENTS
---------------------------
- A webserver with PHP installed


INSTALLATION INSTRUCTIONS
---------------------------
- Upload all the files to your webserver and go to the url
http://yoursite.com/metroload/ or wherever you uploaded it to
- Configure your config.php to your liking.
- Remember to add your SteamAPI key in the config (http://steamcommunity.com/dev/apikey)
- Configure the boxes in boxes/row to your liking.
- READ THE EDITING SECTION BELOW!
- On your Garry's Mod server go to your server.cfg config file and make sure you put your sv_loadingurl to something like this:
sv_loadingurl	"http://yoursite.com/metroload/index.php?steamid=%s&mapname=%m"
- Test it ingame

EDITING INSTRUCTIONS
---------------------------
- fa-icons link = http://fortawesome.github.io/Font-Awesome/icons/

- The folders and files you want to have a look at are
>config.php
>boxes>row1>anyfile.php
>boxes>row2>anyfile.php
>boxes>row3>anyfile.php

- In config.php you have all the global settings regarding the loading screen. Background colours, background images, music settings, etc.
- In the row folders you have the settings for each specific box. Example, editing 1-gamemode.php will edit what shows in the blue gamemode/maxplayers box.
- The 1- represents it's the first box in the row. Make it 3- and the third one 1- and they will switch places. You can add more than 3 files in one row assuming you have enough $size left. If all the boxes sizes equal 12 then you can not add any more boxes.

DEBUGING
---------------------------
- If you are getting warning errors make sure error_reporting in your php.ini is set to a PRODUCTION VALUE(EALL & ~E_DEPRECATED)
- If your loading screen is not working properly ingame please ENSURE that you're using the right sv_loadingurl example:
sv_loadingurl "http://yoursite.com/index.php?steamid=%s&mapname=%m"

- In the browser DO NOT use ?steamid=%s&mapname=%m just simply type in the URL like this: http://yoursite.com/
- Got any suggestions please open an issue on github or add me on Steam, thanks! :)
