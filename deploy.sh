#!/bin/sh
rsync -avP -e ssh \
	--delete \
	--exclude "$0" \
	--exclude .DS_Store \
   	--exclude .git \
	--exclude front-page.php \
	./ \
	yunxinyi@frs.sourceforge.net:/home/project-web/xinyi/htdocs/wp-content/themes/wpbootstrap/
#rsync -avP -e ssh yunxinyi@frs.sourceforge.net:/home/project-web/xinyi/htdocs/ xinyi-bkp/
