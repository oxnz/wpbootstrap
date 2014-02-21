#sudo mysql.server stop
#sudo apachectl stop
#sudo mysql.server start

case "$1" in
	start)
		mysql.server start
		apachectl start
		;;
	stop)
		mysql.server stop
		apachectl stop
		;;
	*)
		echo "$0 start|stop"
		;;
esac
