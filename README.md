themeUpdater
============

Update WP Theme fom GitHub

============

/*
* Road map
*
* 1st check : versions - server vs git - file called ver_x.x.x.wfc 			<<< DONE
*						Match ? -> No update, DONE                 			<<< DONE 
*						Don't Match ? Update needed, 2nd check     			<<< DONE
* 
* 2nd check : get server version, get github files for this old version
*					check if files match
*					No ? -> client has made changes, stop there DONE
*					Yes ? -> No changes, safe to update
*			   
* Update : zip download, replace of a folder, start investigating
*
*/