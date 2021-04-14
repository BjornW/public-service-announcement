=== Public Service Announcement ===
Contributors: BjornW
Tags: splash, public notice, publice service announcement
Requires at least: 5.3.2
Tested up to: 5.7.2
Stable tag:trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display a public service announcement page and show this to a visitor (uses cookies)
Note: requires knowledge of html and is aimed at developers and experienced webmasters.


== Description ==

Display a public service announcement page and show this to a visitor.
After the announcement is shown, a cookie is set. This allows us to show the announcement only 
to visitors without the cookie. By default the cookie will expire after seven days.

If this plugin meets your expectations and you use it commercially
please consider a donation to one of these organisations or your country's equivalents: 

  - <a href='https://www.msf.org/'>Medicines Sans Frontiers</a> 
  - <a href='https://fsfe.org'>Free Software Foundation Europe</a>
  - <a href='https://https://www.bitsoffreedom.nl/english/'>Bits of Freedom</a>
  - <a href='https://edri.org/'>European Digital Rights (EDRi)</a> 
  - <a href='https://fsf.org'>Free Software Foundation</a>
  - <a href='https://eff.org'>Electronic Frontier Foundation</a>

For commercial support (depending on availability) visit <a href='https://burobjorn.nl'>Burobjorn.nl</a> 

== Installation ==
1. Rename index-sample.html into index.html (index-sample.html will be overwritten by updates)
2. Edit the index.html in the 'announcements' directory of this plugin to your liking. This requires knowledge of html, css and perhaps js.  
3. Upload the `public-service-announcement` directory to the `/wp-content/plugins/` directory
4. Activate the plugin through the 'Plugins' menu in WordPress
5. Done!

== Frequently Asked Questions ==
= Why are you not using the current theme for the design? =
For my goal I want to make the announcement stick out like a sore thumb. It needs to be in your face, so you cannot ignore it. I also want it to be as simple
as possible, therefor I'm using this one-off template approach. This approach is also the most flexible solution, you can do what you want with the announcement by editting the /announcements/index.html file.

= Why is there no interface to set the announcement? = 
Building interfaces takes time. Building flexible, user-friendly interfaces takes even more time. 
The current approach is pretty rough, but it is way more flexible than any interface I could have build in the limited time I had.
Maybe in the future this will change, but for now you'll need (depending on how fancy you want to make your announcement) some html, css and perhaps js knowledge.

= What is the default cookie duration? = 
By default a cookie will be set to expire after seven days. After this the visitor will see the announcement again. 
In other words, showing the announcement is depending on the lack of existance of the cookie. If the cookie is found the announcement is not shown. 

= What is the cookie name? = 
At this moment the default cookie name is 'psa' (stands for Public Service Announcement) and contains just the text 'saw_psa'.  

== Notes == 

Credits: 

To Announce icon used in the WordPress plugin repository and found in /assets/icon*
From the series ['Avacado'](http://www.toicon.com/series/avacado) By [Shannon E Thomas](http://www.toicon.com/authors/1)
Direct link: https://www.toicon.com/icons/avocado_announce

Thanks Shannon E Thomas and to[icon] for sharing your work!

WordPress repository header image found in /assets: 
Image from page 128 of "Tresor Des Feves Et Fleur Des Pois" (1853) (https://www.flickr.com/photos/internetarchivebookimages/14752306382)
Editted by BjornW.

Thanks Internet Archive & Flickr Commons - flickr.com/commons

