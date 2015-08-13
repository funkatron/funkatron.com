#!/bin/bash
cd ~/Sites/funkatron_jekyll/
php _bin/build_items.php > ./items.html
lessc css/site.less css/site.css
jekyll server --watch
