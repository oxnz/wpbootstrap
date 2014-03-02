#!/bin/sh

case "$1" in
	"")
		$0 "--deploy"
		exit 0
		;;
	"-b"|"--backup")
		echo "back up"
		#rsync -avP -e ssh yunxinyi@frs.sourceforge.net:/home/project-web/xinyi/htdocs/ xinyi-bkp/
		;;
	"-c"|"--count")
		echo "summary code lines of '`pwd`':"
		wc -l *.php \
			page-templates/*.php \
			inc/*.php \
			*.css \
			*.js
		;;
	"-d"|"--deploy")
		echo "deploy"
		rsync -avP -e ssh \
				--delete \
				--exclude "$0" \
				--exclude .DS_Store \
				--exclude .git \
				--exclude front-page.php \
				./ \
				yunxinyi@frs.sourceforge.net:/home/project-web/xinyi/htdocs/wp-content/themes/wpbootstrap/

		;;
	*)
		echo $"Usage: $0 {-b|-c|-d}"
		exit 1
		;;
esac
